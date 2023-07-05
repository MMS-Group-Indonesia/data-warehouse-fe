<?php

namespace App\Http\Requests\Employee;

use Exception;
use App\Models\Employee;
use Illuminate\Support\Str;
use App\Imports\EventImport;
use App\Models\RequestUpdateLogs;
use Illuminate\Support\Facades\DB;
use App\Imports\RequestUpdateImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Employee\RequestUpdate;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function getColumnRequestUpdate($table = '')
    {
        $tableColumnInfos = DB::select("SELECT
        cols.column_name, (
            SELECT
                pg_catalog.col_description(c.oid, cols.ordinal_position::int)
            FROM
                pg_catalog.pg_class c
            WHERE
                c.oid = (SELECT (cols.table_name)::regclass::oid)
                AND c.relname = cols.table_name
        ) AS column_comment
    FROM
        information_schema.columns cols
    WHERE
        cols.table_catalog    = " . "'data_warehouse'" . "
        AND cols.table_name   = " . "'request_updates'" . "
        AND cols.table_schema = " . "'public'");
        $data = [];
        foreach ($tableColumnInfos as $tableColumnInfo) {
            if($tableColumnInfo->column_comment == null) {
                continue;
            }
            $data[] = [
                'field' => $tableColumnInfo->column_name,
                'comment' => $tableColumnInfo->column_comment,
            ];
        }

        return $data;
    }

    public function getDataRequestUpdate()
    {

        $requestUpdate = RequestUpdate::orderBy('uploaded_at','desc')->get();

        return $requestUpdate;
        
    }

    public function import(){

        try {
            $response = (Object)[
                'status' => 0,
                'message' => 'Not any Activity.',
            ];

            if(config('env') != 'production') {
                $response = (Object)[
                    'status' => 0,
                    'message' => 'Not any Activity.',
                    'code' => 0, 
                    'line' => 0,
                    'trace' => '',
                ];
            }

            $request = (Object)$this->all();
            // return response()->json($this->file);
            if($request->file){
                // $fileHelper = new FileHelper;
                // $file = $fileHelper->fromBase64($request->file);

                $fileName = storage_path("uploads/request_update/add/temp/") . Str::uuid(date('Ymdhis')) . ".xlsx";

                
                $fileTemp = tempnam(sys_get_temp_dir(), $fileName);
                $file = file_put_contents(($fileTemp), base64_decode($request->file));
                // copy(base64_decode($request->file), $fileTemp . '.xlsx');
                // $file = Storage::disk('public')->put($fileName, base64_decode($request->file));

                // $url = Storage::build('public');


                // return ($fileTemp);

                // $import = (new EventImport)->import(public_path($fileName), 'public', \Maatwebsite\Excel\Excel::XLSX);
                // $import =  Excel::import(new EventImport, public_path($fileName), 'public', \Maatwebsite\Excel\Excel::XLSX);
                $import =  (Object)Excel::toCollection(new RequestUpdateImport, $fileTemp, null, \Maatwebsite\Excel\Excel::XLSX);
                // return response()->json($import);

                if (count($import[0]) > 0) {
                    $import = $this->createDataImport($import[0], date('Y-m-d H:i:s'), $this->input('filename'), $this->input('year'), $this->input('month'));

                    if($import != 0) {
                        $response->status = 1;
                        $response->message = 'Data Uploaded Succesfully!';
    
                        // save logs
                        $requestUpdateLogs = new RequestUpdateLogs();
                        $requestUpdateLogs->name = 'Import Excel Successfully';
                        $requestUpdateLogs->request = json_encode($this->all());
                        $requestUpdateLogs->response = json_encode($response);
                        $requestUpdateLogs->save();
                    }else {
                        $response->status = 1;
                        $response->message = 'Data Uploaded has Failed!';
    
                        // save logs
                        $requestUpdateLogs = new RequestUpdateLogs();
                        $requestUpdateLogs->name = 'Import Excel has failed';
                        $requestUpdateLogs->request = json_encode($this->all());
                        $requestUpdateLogs->response = json_encode($response);
                        $requestUpdateLogs->save();
                    }

                    
                }else{
                    $response->status = 0;
                    $response->message = 'Data Uploaded Failed!';

                    // save logs
                    $requestUpdateLogs = new RequestUpdateLogs();
                    $requestUpdateLogs->name = 'Import Excel Failed';
                    $requestUpdateLogs->request = json_encode($this->all());
                    $requestUpdateLogs->response = json_encode($response);
                    $requestUpdateLogs->save();
                }
            }
            
        }catch(\Exception $ex) {
            $response->status = 0;
            $response->message = $ex->getMessage();

            if(config('env') != 'production') {
                $response->code = $ex->getCode();
                $response->line = $ex->getLine();
                $response->trace = $ex->getTrace();
            }

            // save logs
            $eventLogs = new RequestUpdateLogs();
            $eventLogs->name = 'Import Excel Error';
            $eventLogs->request = json_encode($this->all());
            $eventLogs->response = json_encode($response);
            $eventLogs->save();
            
        }

        return $response;
    }

    public function createDataImport($rows, $uploaded_at, $upload_filename, $periode_year, $periode_month)
    {
        $response = 0;
        $vv = [];
        $request = [];
        for($i = 0; $i < count($rows);$i++) {
            $row = $rows[$i];
            // $data = [
            //     'event_id' => $this->getCodeEvent(),
            //     'event_title' => $row['event_title'],
            //     'event_content' => ($row['event_content']),
            //     'event_content_short' => '',
            //     'event_start_date' => Date::excelToDateTimeObject($row['event_start_date'])->format('Y-m-d'),
            //     'event_end_date' => Date::excelToDateTimeObject($row['event_end_date'])->format('Y-m-d'),
            //     'event_start_time' => $row['event_start_time'],
            //     'event_end_time' => $row['event_end_time'],
            //     'event_location' => $row['event_location'] == null ? '' : $row['event_location'],
            //     'event_map' => $row['event_map'] == null ? '' : $row['event_map'],
            //     'photo' => 'event-.',
            //     'banner' => 'event-banner-.',
                
            //     'colour' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)),
            //     'created_by' => 'system',
            //     'edit_by' => '-',
            //     'assigned_user' => json_encode(explode(',', preg_replace('/\s+/', '', $row['user_assigned']))),
            //     'organizer' => 'event@mmsgroup.co.id'
            // ];

            // $end_contractprobationexpire_date = $row['end_contractprobationexpire_date'] == null || $row['end_contractprobationexpire_date'] == "" ? 0 : $row['end_contractprobationexpire_date'];
            // $join_date = $row['join_date'] == null || $row['join_date'] == "" ? 0 : $row['join_date'];

            // $end_contractprobationexpire_date = $end_contractprobationexpire_date == 0 ?  strtotime($row['end_contractprobationexpire_date']);
            // $join_date = strtotime($row['join_date']);

            // $end_contractprobationexpire_date = $end_contractprobationexpire_date ? $end_contractprobationexpire_date : 0;
            // $join_date = $join_date ? $join_date : 0;

            $end_contractprobationexpire_date = Date('Y-m-d', strtotime($row['end_contractprobationexpire_date']));
            $join_date = Date('Y-m-d', strtotime($row['join_date']));

            if($row['hrbp'] == null) {
                continue;
            }
            $data = [
                'hrbp' => $row["hrbp"] ,
                'nik' => $row["id"] ,
                'fullname' => $row["full_name"] ,
                'nationality' => $row["nationality"] ,
                'join_date' => $join_date == '1970-01-01' ? null : $join_date,
                'group' => $row["group"] ,
                'employment' => $row["employment"] ,
                'group_of_dedicated_entity' => $row["group_of_dedicated_entity"] ,
                'entity_of_headcount' => $row["entity_of_headcount"] ,
                'chief_in_charge' => $row["chief_in_charge"] ,
                'business_head' => $row["business_head_function"] ,
                'division' => $row["division"] ,
                'sub_division' => $row["sub_division"] ,
                'department' => $row["department"] ,
                'section' => $row["section"] ,
                'job_title' => $row["job_title"] ,
                'job_position' => $row["job_position"] ,
                'superior1' => $row["superior_1"] ,
                'superior1_nik' => $row["superior_1_nik"] ,
                'work_location' => $row["work_location"] ,
                'work_location_details' => $row["work_location_details"] ,
                'grade' => $row["grade"] ,
                'employee_status' => $row["employee_status"] ,
                'expired_at' => $end_contractprobationexpire_date == '1970-01-01' ? null : $end_contractprobationexpire_date,
                'uploaded_at' => $uploaded_at,
                'upload_filename' => $upload_filename,
                'periode_year' => $periode_year,
                'periode_month' => $periode_month,
            ];

            // foreach ($row as $key => $value) {
            //     echo "'$key' => ";
            //     echo '$row["'. $key .'"] ';
            //     echo ",<br>";
            // }
            // $vv[] = $end_contractprobationexpire_date;

            
            
            $response = $this->createData($data);
            if($response != 0) {
                $request[] = $response;
            }
        }

        // dd($vv);

        if($response != 0) {
            $requestUpdateLogs = new RequestUpdateLogs();
            $requestUpdateLogs->name = 'Create Data Successfully';
            $requestUpdateLogs->request = json_encode($request);
            $requestUpdateLogs->response = json_encode([]);
            $requestUpdateLogs->save();
        }

        return $response;
    }

    public function createData($request, $action = 'import')
    {

        // save
        try {
            $saveData = RequestUpdate::create((Array)$request);
            if($saveData) {
                return $request;
            }
        }catch(Exception $ex) {
            $requestUpdateLogs = new RequestUpdateLogs();
            $requestUpdateLogs->name = 'Create Data Error';
            $requestUpdateLogs->request = json_encode($request);
            $requestUpdateLogs->response = json_encode([
                'code' => $ex->getCode(),
                'message' => $ex->getMessage(),
                'line' => $ex->getLine(),
                'trace' => $ex->getTrace(),
                
            ]);
            $requestUpdateLogs->save();

            return 0;
        }

        

    }
}
