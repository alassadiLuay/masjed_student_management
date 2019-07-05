<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReportsModel;

class ReportsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    function student_semester_attend(Request $request){
        $teachers = ReportsModel::teachers();
        $semesters = ReportsModel::semesters();
        //$this->_users_output(null,"std_attend","التقارير","غيابات الطلاب"); 
        return view('reports/std_attend', [
            'semesters'=>$semesters,
            'teachers' => $teachers
        ]);
    }

    function student_semester_attend_data(Request $request){
        $data = (object) $_POST;
        if(isset($data->semester_id)){
            $this->data["teachers"] = ReportsModel::teachers();
            $this->data["semesters"] = ReportsModel::semesters();
            $this->data["semester_id"] = $data->semester_id;
            $this->data["teacher_id"] = $data->teacher_id;
            $this->data["selected_date"] = $data->selected_date;

            $this->data["results"] = ReportsModel::attend_data($data->semester_id,$data->teacher_id,$data->selected_date);
            $this->_users_output(null,"std_attend","التقارير","غيابات الطلاب"); 
        }
        else
            $this->student_semester_attend($request);
    }

    function student_semester_attend_percentage(Request $request){
        $this->data["semesters"] = ReportsModel::semesters();
        $this->_users_output(null,"std_attend_percentage","التقارير","دوام الطلاب");    
    }

    function student_semester_attend_percentage_data(Request $request){
        $data = (object) $_POST;
        if(isset($data->semester_id)){
            $this->data["semesters"] = ReportsModel::semesters();
            $this->data["semester_id"] = $data->semester_id;
            $temp = ReportsModel::attend_data_percentage($data->semester_id);
            $this->data["results"] = $temp["results"];
            $this->data["min"] = $temp["min"];
            $this->data["max"] = $temp["max"];
            $this->_users_output(null,"std_attend_percentage","التقارير","دوام الطلاب");    
        }
        else
            $this->student_semester_attend_percentage();

    }

    function student_semester_points(Request $request){
        $this->data["semesters"] = ReportsModel::semesters();
        $this->_users_output(null,"std_points","التقارير","نقاط الطلاب");   
    }

    function student_semester_points_data(Request $request){
        $data = (object) $_POST;
        if(isset($data->semester_id)){
            $this->data["semesters"] = ReportsModel::semesters();
            $this->data["semester_id"] = $data->semester_id;
            $arr_data = ReportsModel::students_points($data->semester_id);
            $this->data["results"] = $arr_data["results"];
            $this->data["types_data"] = $arr_data["types_data"];
            $this->_users_output(null,"std_points","التقارير","نقاط الطلاب");
        }
        else
            $this->student_semester_points();
    }

    function download_attend_csv(Request $request)
    {
        $data = (object) $_POST;
        if(isset($data->semester_id)){
            $result = ReportsModel::attend_data($data->semester_id,$data->teacher_id,$data->selected_date);
            header('Content-Encoding: UTF-8');
            header("Content-type: application/csv; charset=UTF-8");
            header("Content-Disposition: attachment; filename=\"exprot".".csv\"");
            header("Pragma: no-cache");
            header("Expires: 0");
            $handle = fopen('php://output', 'w');
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
           fputcsv($handle, array('#','اسم الطالب', 'الصف', 'رقم هاتف ولي الأمر', 'النتيجة', 'التاريخ'));
                            $i = 1;
                            foreach ($result as $sdata) {
                                fputcsv($handle, array($i, $sdata["student_name"], $sdata["class_name"], $sdata["father_phone"], "لم يحضر",$data->selected_date));
                                $i++;
                            }
                                fclose($handle);
                            exit;
        }
    }

    function download_attend_percentage_csv(Request $request)
    {
        $data = (object) $_POST;
        if(isset($data->semester_id)){
        
            $this->data["semesters"] = ReportsModel::semesters();
            $this->data["semester_id"] = $data->semester_id;
            $temp = ReportsModel::attend_data_percentage($data->semester_id);
            $min = $temp["min"];
            $max = $temp["max"];

            $result = $temp["results"];
            header('Content-Encoding: UTF-8');
            header("Content-type: application/csv; charset=UTF-8");
            header("Content-Disposition: attachment; filename=\"exprot".".csv\"");
            header("Pragma: no-cache");
            header("Expires: 0");
            $handle = fopen('php://output', 'w');
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
           fputcsv($handle, array('#','اسم الطالب', 'الصف', 'رقم هاتف ولي الأمر', 'عدد جلسات الحضور', 'عدد الجلسات الكلي','معدل الحضور'));
                            $i = 1;
                            foreach ($result as $data) {
                                fputcsv($handle, array($i, $data["student_name"], $data["class_name"], $data["father_phone"], $data["count"] , $max, round((int)$data["count"]/(int)$max,2) * 100));
                                $i++;
                            }
                                fclose($handle);
                            exit;
        }
    }

    function download_points_csv(Request $request)
    {
        $data = (object) $_POST;
        if(isset($data->semester_id)){
            $this->data["semester_id"] = $data->semester_id;
            $arr_data = ReportsModel::students_points($data->semester_id);
            $result = $arr_data["results"];
            $types_data = $arr_data["types_data"];

            $tempDataHeader[] = '#';
            $tempDataHeader[] = 'اسم الطالب';
            foreach($types_data as $k=>$v) 
                $tempDataHeader[] = $k;
            $tempDataHeader[] = 'مجموع نقاطه في الفصل';

            header('Content-Encoding: UTF-8');
            header("Content-type: application/csv; charset=UTF-8");
            header("Content-Disposition: attachment; filename=\"exprot".".csv\"");
            header("Pragma: no-cache");
            header("Expires: 0");
            $handle = fopen('php://output', 'w');
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
           fputcsv($handle, $tempDataHeader );
                $i = 1;
                foreach ($result as $data) {
                    $rowData = array();
                    $rowData[] = $i;
                    $rowData[] = $data["student_name"];
                    foreach($types_data as $k=>$v)
                        if(isset($data[$k]))
                            $rowData[] = $data[$k];
                        else
                            $rowData[] = 0;
                    $rowData[] = $data["points"];
                    fputcsv($handle, $rowData);
                    $i++;
                }
                    fclose($handle);
                exit;
        }
    }
}
