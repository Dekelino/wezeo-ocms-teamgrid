<?php

namespace App\Projects\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use LibUser\Userapi\Http\Resources\UserResource;

class ProjectResource extends JsonResource {
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'is_done' => $this->is_done,
            'customer' => $this->customer,
            'coworkers' => UserResource::collection($this->coworkers),
            'list' => $this->list,
            'user' => new UserResource($this->user)
        ];
    }
}