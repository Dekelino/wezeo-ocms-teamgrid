<?php

namespace App\Tasks\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class TaskResource extends JsonResource {
    public function toArray($request)
    {
        return [
            'project_id' => $this->project_id,
            'title' => $this->title,
            'description' => $this->description,
            'customer' => $this->customer,
            'project_manager' => $this->project_manager,
            'list' => $this->list,
            'created_by' => $this->created_by
        ];
    }
}