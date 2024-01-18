<?php

namespace App\Projects\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ProjectResource extends JsonResource {
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'is_done' => $this->is_done,
            'customer' => $this->customer,
            'coworkers' => $this->coworkers,
            'list' => $this->list,
            'user_id' => $this->user_id
        ];
    }
}