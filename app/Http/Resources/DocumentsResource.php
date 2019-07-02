<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DocumentsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
    
        return [
            'document' => $this->collection,
            'pagination' => [
                'total' => $this->total(),
                'perPage' => $this->perPage(),
                'page' => $this->currentPage()
            ]   
        ];
    }
    /**
     * Customize response. Delete links and meta fields
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     */
    public function withResponse($request, $response)
    {
        $jsonResponse = json_decode($response->getContent(), true);

        $response->setContent(json_encode($jsonResponse['data']));
    }
}
