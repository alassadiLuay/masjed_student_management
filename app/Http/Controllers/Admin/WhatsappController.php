<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Semester;
class WhatsappController extends Controller
{
    //
    public function index()
    {
        return view('admin.whatsapp.index', ['data' => [] , 'attend' => false]);
    }

    public function multiCast()
    {
    	$semesters    = Semester::where('enabled',true)->get();
        return view('admin.whatsapp.multi-cast', ['data' => [] , 'attend' => false , 'semesters' => $semesters]);
    }

    public function send_multi_message(Request $request)
    {
    	# code...
    	$message = $request->get('message');
    	$numbers_string =  $request->get('receiver_numbers');
    	$numbers = explode('_,_',$numbers_string);
    	if( isset($message) && isset($numbers) ){
	    	if(strlen($message) > 5){
	    		for ($i=0; $i < sizeof($numbers); $i++) { 
	    			# code...
	    			$temp_object = explode('_::_',$numbers[$i]);
		    			if( strlen($temp_object[1]) > 8 && !$this->startsWith($temp_object[1],'011')){
		    				$this->wassenger_send_message(str_replace('$$student_name$$',$temp_object[0],$message),$temp_object[1]);

		    				$resultOfSending[] = array('student_name' => $temp_object[0] , 'status_id'=> 200, 'sent' => $temp_object[1], 'status' => 'نجح الإرسال' , 'message'=>str_replace('$$student_name$$',$temp_object[0] , $message));
		    			}
		    			else{
		    				$resultOfSending[] = array('student_name' => $temp_object[0] , 'status_id'=> 500, 'f_sent' => array($temp_object[1]) , 'status' => 'فشل الإرسال', 'message'=>str_replace('$$student_name$$',$temp_object[0] ,$message) ); 
		    			}
	    		}
				 //Session::flash('whats_app_message_report',$resultOfSending);
	    	}
	    	else{
	    		Session::flash('message','Message text are not valid');
		    	Session::flash('message_status','danger');
		    	Session::flash('message_value',$request->get('message'));
	    	} 		
    	}
    	else{
			Session::flash('message','Message is empty Or Numbers are empty');
	    	Session::flash('message_status','danger');
	    	Session::flash('message_value',$request->get('message'));
    	}
    	if(!isset($resultOfSending))
    		$resultOfSending = [];
    	
		Session::flash('whats_app_message_report',$resultOfSending);

		$semesters    = Semester::where('enabled',true)->get();
        return view('admin.whatsapp.multi-cast', ['data' => [] , 'attend' => false, 'semesters' => $semesters]);
    }

    public function send_message(Request $request)
    {
    	echo " >> ";
    	$message = $request->get('message');
    	$number1 =  $request->get('receiver_number');
    	$number2 = $request->get('receiver_number_search');
    	if(isset($message) && (isset($number1) || isset($number2))){
	    	if(strlen($message) > 5){
	    		if( strlen($number1) > 8 && !$this->startsWith($number1,'011'))
	    			$this->wassenger_send_message($message,$number1);
	    		else if (!$this->startsWith($number2,'011') && strlen($number2)> 8)
	    			$this->wassenger_send_message($message,$number2);
		    	Session::flash('message','Message Sent Successfully');
		    	Session::flash('message_status','success');
		    	Session::flash('message_value',$request->get('message'));
		    	Session::flash('message_number',$number1." - ".$number2);
	    	}
	    	else{
	    		Session::flash('message','Message text Or Numbers are not valid');
		    	Session::flash('message_status','danger');
		    	Session::flash('message_value',$request->get('message'));
		    	Session::flash('message_number',$number1." - ".$number2);
	    	} 		
    	}
    	else{
			Session::flash('message','Message is empty Or Numbers are empty');
	    	Session::flash('message_status','danger');
	    	Session::flash('message_value',$request->get('message'));
	    	Session::flash('message_number',$number1." - ".$number2);
    	}
    	
        return view('admin.whatsapp.index', ['data' => [] , 'attend' => false]);
    }

    function wassenger_send_message($message,$phone){
    	echo $message;
    	echo "<br>";
    	echo $phone;
    	echo "<hr>";
		// create a new cURL resource
		/*$ch = curl_init();
		if(!$this->startsWith($phone,'+963') && $this->startsWith($phone,'09'))
			$phone = '+963'.substr($phone, 1);
		else if (!$this->startsWith($phone,'+963') && $this->startsWith($phone,'9'))
			$phone = '+963'.$phone;
		// set URL and other appropriate options
	    echo "http://manartiapp.com/test.php?phone=".$phone."&message=".$message."&password=123987456HHE";
		curl_setopt($ch, CURLOPT_URL, "http://manartiapp.com/test.php?phone=".urlencode(utf8_encode($phone))."&message=".urlencode(utf8_encode($message))."&password=123987456HHE");
		curl_setopt($ch, CURLOPT_HEADER, 0);

		// grab URL and pass it to the browser
		curl_exec($ch);

		// close cURL resource, and free up system resources
		curl_close($ch);*/
    }

    function startsWith($haystack, $needle)
	{
	     $length = strlen($needle);
	     return (substr($haystack, 0, $length) === $needle);
	}

	function endsWith($haystack, $needle)
	{
	    $length = strlen($needle);
	    if ($length == 0) {
	        return true;
	    }

	    return (substr($haystack, -$length) === $needle);
	}

}


