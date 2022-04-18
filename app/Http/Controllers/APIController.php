<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\BiometricLogs;
use Carbon\Carbon;

class APIController extends Controller
{
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function store($id)
    {
        $data = new BiometricLogs();
        $data->date = Carbon::now();
        $data->user_id = $id;
        $data->save();

        $emp = Employee::where('biometric_id', $id)->get();
        $welcum_url = 'Employee not yet enrolled in the system.';
        $emp_id = null;

        if(count($emp) > 0){
            $welcum_url = 'http://192.168.153.100:8000/welcome/' + $emp->user_id;
            $emp_id = $emp->user_id;
        }

        $callback = [
            'status' => 200,
            'data' => [
                'welcome_url' => $welcum_url,
                'emp_id' => $emp_id,
                'ip' => '192.168.153.100',
                'port' => '8000',
                'time' => Carbon::now()->toTimeString(),
                'date' => Carbon::now()->toDateString()
            ]
        ];

        return response()->json($callback);
    }

    public function getEmployee(Request $request)
    {
        $response = Employee::with('user.role.role')->find($request->id);
        echo json_encode($response);
    }


}
