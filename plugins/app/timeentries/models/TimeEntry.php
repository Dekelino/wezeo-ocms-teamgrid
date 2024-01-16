<?php namespace App\Timeentries\Models;

use Model;

/**
 * timeEntry Model
 */
class TimeEntry extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'app_timeentries';

    protected $primaryKey = 'entry_id'; //defined custom primary key

    protected $guarded = ['*'];

    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsTo = [
        'task' => ['App\Tasks\Models\Task']
    ];
}
