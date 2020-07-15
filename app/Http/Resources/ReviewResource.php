<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'user_id' => $this->user_id,
            'book_id' => $this->book_id,
            'review' => $this->review,
            'created_at' => (string) $this->creaated_at,
            'updated_at' => (string) $this->updated_at,
            'book' => $this->book,
        ];
    }
}
