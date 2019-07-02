<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'document' => [
                'id' => $this->id,
                'status' => $this->status,
                'payload' => $this->payload,
                'created_at' => (string) $this->created_at,
                'updated_at' => (string) $this->created_at
            ]
        ];
    }
}
