<?php

namespace App\Tasks\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class TaskResource extends JsonResource {
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'task_name' => $this->task_name,
            'description' => $this->description,
            'project_id' => $this->project_id,
            'subscribers_user_id' => $this->subscribers_user_id,
            'is_completed' => $this->is_completed,
            'user_id' => $this->created_by,
            'planned_start' => $this->planned_start,
            'planned_end' => $this->planned_end,
            'planned_time' => $this->planned_time,
            'created_at	' => $this->created_at,
            'updated_at	' => $this->updated_at
        ];
    }
}