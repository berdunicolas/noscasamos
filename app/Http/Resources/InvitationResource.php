<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvitationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'event' => $this->event,
            'name' => $this->name,
            'seller_id' => null,
            'plan' => $this->plan,
            'date' => $this->date,
            'time' => $this->time,
            'time_zone' => $this->time_zone,
            'duration' => $this->duration,
            'active' => $this->active,
            'created_by' => $this->createdBy?->name,
            'path_name' => $this->path_name,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,

            'url_item' => route('api.invitations.show', $this->id)
        ];
    }
}
