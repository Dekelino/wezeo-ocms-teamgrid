<?php

namespace App\Projects\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ProjectResource extends JsonResource {
    public function toArray($request)
    {
        return [
            'project_id' => $this->project_id,
            'title' => $this->title,
            'description' => $this->description,
            'customer' => $this->customer,
            'coworkers' => $this->coworkers,
            'list' => $this->list,
            'created_by' => $this->created_by
        ];
    }
}