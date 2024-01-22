<?php

namespace App\Timeentries\Models;

use Model;
use RainLab\User\Models\User;
use App\Tasks\Models\Task;
use Illuminate\Support\Carbon;

/**
 * timeEntry Model
 */
class TimeEntry extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'app_timeentries';

    protected $guarded = ['*'];

    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsTo = [
        'user' => [User::class],
        'task' => [Task::class]
    ];

    public function getDurationAttribute()
    {
        if ($this->start && $this->end && $this->end>$this->start)  {
            $totalMinutes = Carbon::parse($this->start)->diffInMinutes($this->end);
            $hours = floor($totalMinutes / 60);
            $minutes = $totalMinutes % 60;

            return sprintf('%02d:%02d', $hours, $minutes);
        }

        return 'End time have to be higher then start time !';
    }
}
