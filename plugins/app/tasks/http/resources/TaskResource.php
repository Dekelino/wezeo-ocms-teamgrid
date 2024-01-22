<?php

namespace App\Tasks\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class TaskResource extends JsonResource {
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'project_id' => $this->project_id,
            'is_completed' => $this->is_completed,
            'project_manager_id' => $this->project_manager_id,
            'planned_start' => $this->planned_start,
            'planned_end' => $this->planned_end,
            'planned_time' => $this->planned_time,
        ];
    }
}