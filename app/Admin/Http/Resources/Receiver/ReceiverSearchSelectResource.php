<?php

namespace App\Admin\Http\Resources\Receiver;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceiverSearchSelectResource extends JsonResource
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