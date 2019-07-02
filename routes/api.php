<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//Route::apiResource('document', 'DocumentController');
//Route::post('document/{document}/publish', 'PublishDocumentController@store');

Route::prefix('v1')->group(function () {

    Route::resource('document', 'DocumentController');

    Route::post('document/{document}/publish', [
        'uses' => 'PublishDocumentController@store'
    ]);
    Route::fallback(function(){
        return response()->json([], 404);
    });
});

