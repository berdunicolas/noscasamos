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
            'event_id' => $this->event_id,
            'name' => $this->event->name,
            'event' => $this->event->event,
            'id' => $this->id,
            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,
            'path_name' => $this->path_name,
            'seller_id' => $this->seller_id,
            'seller_name' => $this->seller?->name ?? 'Legacy',
            'plan' => $this->event->plan,
            'validity' => $this->stillValid(),
            'date' => $this->date,
            'time' => $this->time,
            'time_zone' => $this->time_zone,
            'duration' => $this->duration,
            'active' => $this->active,
            'created_by' => $this->createdBy?->name,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'is_legacy' => $this->is_legacy,

            'can_delete' => auth()->user()->isAdmin(),
            'url_item' => route('api.invitations.show', $this->id),
            'invitation_url' => route('invitation', ['invitation' => $this->path_name]),
        ];
    }
}
