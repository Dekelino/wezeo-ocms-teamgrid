<?php

namespace App\TimeEntries\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeEntryResource extends JsonResource 
{
    public function toArray($request)
    {
        return [
            'start_time' => $this->start_time,
            'end_time' => $this->end_time
        ];
    }
}