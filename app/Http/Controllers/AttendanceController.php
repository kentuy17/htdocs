<?php

  namespace App\Http\Controllers;

  use App\Models\AttendanceManager;
  use App\Models\AttendanceFilename;
  use App\Models\BiometricLogs;
  use App\Models\Employee;
  use App\Repositories\ExportRepository;
  use App\Repositories\ImportAttendanceData;
  use App\Repositories\UploadRepository;
  use GuzzleHttp\Client;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Input;


  class AttendanceController extends Controller
  {
    public $export;
    public $upload;
    public $attendanceData;

    /**
     * AttendanceController constructor.
     * @param ExportRepository $exportRepository
     * @param UploadRepository $uploadRepository
     * @param ImportAttendanceData $attendanceData
     */
    public function __construct(ExportRepository $exportRepository, UploadRepository $uploadRepository, ImportAttendanceData $attendanceData)
    {
      $this->export = $exportRepository;
      $this->upload = $uploadRepository;
      $this->attendanceData = $attendanceData;
    }

    public function pretty($data)
    {
      if(is_array($data) || is_object($data)){
        return response()->json($data);
      }
      
      if(json_decode($data, true) !== null){
        return json_decode($data, true);
      }
    }

    public function getBiometricLogs()
    {
      // $client = new Client(['base_uri' => 'http://hrms-acsat.rf.gd/']);
      // $response = $client->request('GET', '/fetch_logs.php');
      // return json_decode($response->getBody(), true);
      // return $response->getBody();
      // return response()->json($data);
      // return response()->json( $response );
      return view('pages.attendance.list_attendance');
    }

    public function allTimeshit(Request $request)
    {
      $logs = BiometricLogs::has('employee')
        ->with('employee')
        ->get();
      return [
        'data' => $logs,
        'length' => count($logs)
      ];
    }

    public function myTimeshit()
    {
      $shit = BiometricLogs::where('userid', \Auth::user()->employee->biometric_id)->get();
      return $this->pretty($shit);
      

      // $team = Team::where('member_id', \Auth::user()->employee->id)->first();
    }

    // public function getLogs()
    // {
    //   $json = json_decode(file_get_contents('http://hrms-acsat.rf.gd/fetch_logs.php'), true);
    //   echo $json;
    // }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function importAttendanceFile()
    {
      $files = AttendanceFilename::paginate(10);
      return view('hrms.attendance.upload_file', compact('files'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadFile(Request $request)
    {
      if (Input::hasFile('upload_file')) {
        $file = Input::file('upload_file');
          $filename = $this->upload->File($file, $request->description, $request->date);

        try {
          if($filename) {
            $this->attendanceData->Import($filename);
          }
        } catch(\Exception $e) {

          \Session::flash('flash_message1', $e->getMessage());

          \Log::info($e->getLine(). ' '. $e->getFile());
          return redirect()->back();
        }
      }
      else {

        return redirect()->back()->with('flash_message', 'Please choose a file to upload');
      }



      \Session::flash('flash_message1', 'File successfully Uploaded!');
      return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showSheetDetails()
    {
      $column = '';
      $string = '';
      $dateFrom = '';
      $dateTo = '';
      $attendances = AttendanceManager::paginate(20);
      return view('hrms.attendance.show_attendance_sheet_details', compact('attendances', 'column', 'string', 'dateFrom', 'dateTo'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doDelete($id)
    {
      $file = AttendanceFilename::find($id);
      $file->delete();

      \Session::flash('flash_message1', 'File successfully Deleted!');
      return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function searchAttendance(Request $request)
    {
      try {
        $string = $request->string;
        $column = $request->column;

        $dateTo = date_format(date_create($request->dateTo), 'd-m-Y');
        $dateFrom = date_format(date_create($request->dateFrom), 'd-m-Y');

        if ($request->button == 'Search') {
          /**
           * send the post data to getFilteredSearchResults function
           * of AttendanceManager class in Models folder
           */
          $attendances = AttendanceManager::getFilterdSearchResults($request->all());
          return view('hrms.attendance.show_attendance_sheet_details', compact('attendances', 'column', 'string', 'dateFrom', 'dateTo'));
        }
        else
        {
          if ($column && $string) {
            if ($column == 'status') {
              $string = convertAttendanceTo($string);
            }
            $attendances = AttendanceManager::whereRaw($column . " like '%" . $string . "%'")->get();
          } else {
            $attendances = AttendanceManager::get();
          }

          $file = 'Attendance_Listing_';
          $headers = ['id', 'name', 'code', 'date', 'day', 'in_time', 'out_time', 'hours_worked', 'difference', 'status', 'leave_status', 'user_id', 'created_at', 'updated_at'];

          /**
           * sending the results fetched in above query to exportData
           * function of ExportRepository class located in
           * app\Repositories folder
           */

          $fileName = $this->export->exportData($attendances, $file, $headers);

          return response()->download(storage_path('exports/') . $fileName);
        }

      } catch (\Exception $e) {
        return redirect()->back()->with('message', $e->getMessage());
      }
    }
  }