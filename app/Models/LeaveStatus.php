<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveStatus extends Model
{
    /**
     * @var string
     */
    protected $table = 'leave_status';

    public function employee_leave()
    {
        return $this->belongsTo(\App\EmployeeLeaves::class, 'status');
    }
}
