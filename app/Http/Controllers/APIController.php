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

        $emp = Employee::where('biometric_id', $id)->first();
        $welcum_url = 'Employee not yet enrolled in the system.';
        $emp_id = null;
        $local_ip = '192.168.2.90';

        if($emp){
            $welcum_url = 'http://' . $local_ip . ':8000/clockin/' . $emp->id;
            $emp_id = $emp->id;
        }

        $callback = [
            'status' => 200,
            'data' => [
                'welcome_url' => $welcum_url,
                'emp_id' => $emp_id,
                'ip' => $local_ip,
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

    public function clockin($id)
    {
        $emp = Employee::where('biometric_id', $id)->first();
        $img = 'default-human';

        if($emp){
            $img = $emp->gender == '1' ? 'leni' : 'bong';
        }

        return view('clockin', compact('emp','img'));
    }


}
