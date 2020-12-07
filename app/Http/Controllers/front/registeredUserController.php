<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\Captcha;
use Illuminate\Support\Facades\Validator;
use App\RegisteredUser;
use Auth;
use PDF;

class registeredUserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function ruleCaptcha(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => new Captcha(),
        ]);
        if ($validator->passes()) {
            return response()->json(['status' => '1']); // success
        }
        return response()->json(['status' => '0']); // not success
    }

    public function registered(Request $request)
    {
        if($request->ajax()){
            $RegisteredUser = new RegisteredUser();
            $RegisteredUser->user_id = Auth::user()->id;
            $RegisteredUser->event_id = $request->event_id;
            $RegisteredUser->registered_date = date('Y-m-d');
            $RegisteredUser->save();

            return 'success';
        }
    }

    public function report(Request $request){
        $event_id = $request->get('event_id');
        $name = $request->get('Ename');
        $organizer = $request->get('organizer');
        $event_date = $request->get('event_Date');

        $data = RegisteredUser::ReportRegisteredUser($event_id)->get();
       
        return view('site/reports/registeredUser/reports', [
            'event_id' => $event_id,
            'name' => $name,
            'organizer' => $organizer,
            'event_date' => $event_date,
            'data' => $data,
        ]);
    }

    public function pdf(Request $request){
        $event_id  =  $request->get('event_id');
        $name = $request->get('name');
        $organizer = $request->get('organizer');
        $event_date = $request->get('event_date');

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_report_to_html($event_id, $name, $organizer, $event_date));
        // Paper Size
        $pdf->setPaper('A4');
        
        return @$pdf->stream();
    }

    function convert_report_to_html($event_id, $name, $organizer, $event_date)
    {
        $event_id = $event_id;
        $name = $name;
        $organizer = $organizer;
        $event_date = $event_date;

        $data = RegisteredUser::ReportRegisteredUser($event_id)->get();

        return view('site/reports/registeredUser/pdf',
            [
                'name' => $name,
                'organizer' => $organizer,
                'event_date' => $event_date,
                'data' => $data,
            ]
        );
    }
    
}
