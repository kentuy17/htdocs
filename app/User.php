<?php

namespace App;
use App\Models\Employee;
use App\Models\Project;
use App\Models\UserRole;
use App\Models\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->hasOne('App\Models\UserRole', 'user_id', 'id');
    }

    public function roleName(){
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_id', $userId)->first();
        $role = Role::where('id', $userRole->role_id)->first();
        return $role->name;
    }

    public function isHR()
    {
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_id', $userId)->first();
        if($userRole->role_id == 7 || $userRole->role_id == 1)
        {
            return true;
        }
        return false;
    }

    public function notAnalyst()
    {
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_id', $userId)->first();
        if($userRole->role_id != 3)
        {
            return true;
        }
        return false;
    }

    public function isCoordinator()
    {
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_id', $userId)->first();
        $roleIds = [2,5,7,8,9,10,14,16,17];
        if(in_array($userRole->role_id, $roleIds) )
        {
            return true;
        }
        return false;
    }

    public function isManager()
    {
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_id', $userId)->first();
        if($userRole->role_id == 16)
        {
            return true;
        }
        return false;
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    // public function isNormalUser()
    // {
    //     $userId = Auth::user()->id;
    //     $userRole = UserRole::where('user_id', $userId)->first();
    //     return $userRole->role_id == 17 ? true : false;
    // }
}
