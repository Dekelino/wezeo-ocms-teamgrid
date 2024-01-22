<?php

namespace App\Projects\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use LibUser\Userapi\Http\Resources\UserResource;

class ProjectResource extends JsonResource {
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'is_done' => $this->is_done,
            'project_manager' => new UserResource($this->project_manager),
            'customer' => new UserResource($this->customer),
            'list' => $this->list,
        ];
    }
}