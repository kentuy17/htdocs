<?php

namespace App;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaves extends Model
{
    public function leaveType()
    {
        return $this->belongsTo('App\Models\LeaveType', 'leave_type_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function leaveStatus()
    {
        return $this->belongsTo(\App\Models\LeaveStatus::class, 'status');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
