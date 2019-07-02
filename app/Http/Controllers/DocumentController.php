<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Resources\DocumentsResource;
use App\Http\Resources\DocumentResource;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = \Request::get('perPage') ?: 20;
        $documents = Document::paginate($perPage);

        return new DocumentsResource($documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return DocumentResource
     */
    public function store(Request $request)
    {
        $document = Document::create(['payload' => []]);

        return (new DocumentResource($document))->response()->setStatusCode(200);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return DocumentResource
     */
    public function show(Document $document)
    {
        return new DocumentResource($document);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return DocumentResource
     */
    public function update(Request $request, Document $document)
    {
        if ( $document->status == "published" ) {
            return response()->json([], 400);
        }
        $data = $request->json()->all();
        if ( !isset($data['document']['payload']) ) {
            return response()->json([], 400);
        }
        $document->touch();
        $document->payload = $data['document']['payload'];
        $document->save();
        return new DocumentResource($document);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        return response()->json([], 400);
    }
}
