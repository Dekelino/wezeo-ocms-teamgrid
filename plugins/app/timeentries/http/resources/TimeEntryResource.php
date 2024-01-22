<?php

namespace App\TimeEntries\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeEntryResource extends JsonResource 
{
    public function toArray($request)
    {
        return [
            'task_id' => $this->task_id,
            'worker_id' => $this->worker_id,
            'start' => $this->start,
            'end' => $this->end
        ];
    }
}