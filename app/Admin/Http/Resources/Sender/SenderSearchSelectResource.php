<?php

namespace App\Admin\Http\Resources\Sender;

use Illuminate\Http\Resources\Json\JsonResource;

class SenderSearchSelectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->fullname . ' - ' . $this->phone
        ];
    }
}