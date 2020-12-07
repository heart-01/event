<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;
use Auth;
use Image; 
use File;
use Illuminate\Support\Str;

class calendarEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('su');
    }

    public function index()
    {
        $data = Event::EventAll();
        $count = $data->count();
        $data = $data->paginate(10);
        
        $offset = $data->count();
        $first = ($count==0) ? 0 : 1;
        $end = ($count<10) ? $count : 10;
        return view('site.admin.calendarEvent.index', compact(['data','count','first','end']))->render();
    }

    function fetch_data(Request $request){
        if($request->ajax()){
            $status =  Auth::user()->status_user;

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('event')
                        ->where(function($query) use ($status) {
                            if ($status != 1) {
                                return $query->where('postedBy', '=', Auth::user()->id );
                            }
                        })  
                        ->Where('name', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type);
            $count = $data->count();
            $data = $data->paginate(10);

            return view('site.admin.calendarEvent.data-row', compact(['data']))->render();
        }
    }

    function pagination_link(Request $request){
        if($request->ajax()){
            $status =  Auth::user()->status_user;

            $page = $request->get('page');
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('event')
                        ->where(function($query) use ($status) {
                            if ($status != 1) {
                                return $query->where('postedBy', '=', Auth::user()->id );
                            }
                        })  
                        ->Where('name', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type);
            $count = $data->count();
            $data = $data->paginate(10);
            
            $offset = $data->count();
            $first = ($page-1 == 0) ? 1 : $page-1 . 1;
            $end = ($offset!=10) ? ($page-1 == 0) ? $offset : $page-1 . $offset : $page . 0;
            
            return view('site.admin.calendarEvent.pagination-link', compact(['data','count','first','end']))->render();
        }
    }

    public function store(Request $request){  
        $name = $request->get('name');
        $description = $request->get('description');
        $category_id = $request->get('category');

        $data_eventDateFormTo = explode(" ", $request->get('eventDateFormTo'));
        $eventDateForm = date('Y-m-d', strtotime($data_eventDateFormTo[0]));
        $eventDateTo = date('Y-m-d', strtotime($data_eventDateFormTo[2]));

        $data_registerStartEndDate = explode(" ", $request->get('registerStartEndDate'));
        $registerStartDate = date('Y-m-d', strtotime($data_registerStartEndDate[0]));
        $registerEndDate = date('Y-m-d', strtotime($data_registerStartEndDate[2]));

        $postedDate = date('Y-m-d');    
        $postedBy = Auth::user()->id;
        $surveyRequired = $request->get('SurveyRequired');
        $certificateAvailable = $request->get('certificateAvailable');
        $place = $request->get('place');  
        $organizer = $request->get('organizer');  

        // ------------------------------------

        $query = DB::table('event')->where('name', '=', $name);
        $count = $query->count();

        if($count>='1'){
            return back()->with('Warning', 'Cannot Add because \nit contains information of \''.$name.'\' ');
        }else{

            $Event = new Event();
            $Event->name = $name;
            $Event->description = $description;
            $Event->category_id = $category_id;

            $Event->eventDateForm = $eventDateForm;
            $Event->eventDateTo = $eventDateTo;

            $Event->registerStartDate = $registerStartDate;
            $Event->registerEndDate = $registerEndDate;

            $Event->postedDate = $postedDate;    
            $Event->postedBy = $postedBy;
            $Event->surveyRequired = $surveyRequired;
            $Event->certificateAvailable = $certificateAvailable;
            $Event->place = $place;
            $Event->organizer = $organizer;  

            if ($request->hasFile('poster')) {
                $filename = Str::random(10) . '.' . $request->file('poster')->getClientOriginalExtension();
                $folder = explode(".", $filename);
                $request->file('poster')->move(public_path() . '/images/front/img_event/'.$folder[0].'/', $filename); //save image
                Image::make(public_path() . '/images/front/img_event/'.$folder[0].'/'.$filename)->resize(160, 240)->save(public_path() . '/images/front/resize/banner/'.$filename); //resize
                $Event->poster = $filename;
                $Event->banner = $filename;
            } else {
                $Event->poster = 'nopic.jpg';
                $Event->banner = 'nopic.jpg';
            }
            $Event->save();
            
            return back()->with('Success', 'Finished..');
        }
    }

    public function update(Request $request){
        $event_id = $request->get('event_id-edit');
        $name = $request->get('name-edit');     
        $description = $request->get('description-edit');
        $category_id = $request->get('category-edit');

        $data_eventDateFormTo = explode(" ", $request->get('eventDateFormTo-edit'));
        $eventDateForm = date('Y-m-d', strtotime($data_eventDateFormTo[0]));
        $eventDateTo = date('Y-m-d', strtotime($data_eventDateFormTo[2]));

        $data_registerStartEndDate = explode(" ", $request->get('registerStartEndDate-edit'));
        $registerStartDate = date('Y-m-d', strtotime($data_registerStartEndDate[0]));
        $registerEndDate = date('Y-m-d', strtotime($data_registerStartEndDate[2]));

        $surveyRequired = $request->get('SurveyRequired-edit');
        $certificateAvailable = $request->get('certificateAvailable-edit');
        $place = $request->get('place-edit');  
        $organizer = $request->get('organizer-edit');  

        // --------------------------------------------
        
        $event_old = Event::where('event_id', $event_id)->get(['name',]);
        $collection = collect($event_old);
        $event_old = $collection->implode('name', ', ');

        if((string)$event_old==$name)
        {
            // return 'old name';
            $Event = Event::find($event_id);
            $Event->description = $description;
            $Event->category_id = $category_id;
            $Event->eventDateForm = $eventDateForm;
            $Event->eventDateTo = $eventDateTo;
            $Event->registerStartDate = $registerStartDate;
            $Event->registerEndDate = $registerEndDate;
            $Event->surveyRequired = $surveyRequired;
            $Event->certificateAvailable = $certificateAvailable;
            $Event->place = $place;
            $Event->organizer = $organizer;
            
            if ($request->hasFile('poster-edit')) {
                if ($Event->poster != 'nopic.jpg') { 
                    $filename = $Event->poster;
                    $folder = explode(".", $filename);
                    File::deleteDirectory(public_path() . '\\images\\front\\img_event\\' . $folder[0]);
                    File::delete(public_path() . '\\images\\front\\resize\\banner\\' . $filename);
                }
                $filename = Str::random(10) . '.' . $request->file('poster-edit')->getClientOriginalExtension();
                $folder = explode(".", $filename);
                $request->file('poster-edit')->move(public_path() . '/images/front/img_event/'.$folder[0].'/', $filename); //save image
                Image::make(public_path() . '/images/front/img_event/'.$folder[0].'/'.$filename)->resize(160, 240)->save(public_path() . '/images/front/resize/banner/'.$filename); //resize
                
                $Event->poster = $filename;
                $Event->banner = $filename;
            }            
            $Event->save(); 
            
            return back()->with('Success', 'Finished..');

        }else if((string)$event_old!=$name)
        {
            // return 'new name';
            $query = DB::table('event')->where('name', '=', $name);
            $count = $query->count();
            if($count>='1'){
                return back()->with('Warning', 'Cannot Edit because \nit contains information of \''.$name.'\' ');
            }else{
                $Event = Event::find($event_id);
                $Event->name = $name;
                $Event->description = $description;
                $Event->category_id = $category_id;
                $Event->eventDateForm = $eventDateForm;
                $Event->eventDateTo = $eventDateTo;
                $Event->registerStartDate = $registerStartDate;
                $Event->registerEndDate = $registerEndDate;
                $Event->surveyRequired = $surveyRequired;
                $Event->certificateAvailable = $certificateAvailable;
                $Event->place = $place;
                $Event->organizer = $organizer;

                if ($request->hasFile('poster-edit')) {
                    if ($Event->poster != 'nopic.jpg') { 
                        $filename = $Event->poster;
                        $folder = explode(".", $filename);
                        File::deleteDirectory(public_path() . '\\images\\front\\img_event\\' . $folder[0]);
                        File::delete(public_path() . '\\images\\front\\resize\\banner\\' . $filename);
                    }
                    $filename = Str::random(10) . '.' . $request->file('poster-edit')->getClientOriginalExtension();
                    $folder = explode(".", $filename);
                    $request->file('poster-edit')->move(public_path() . '/images/front/img_event/'.$folder[0].'/', $filename); //save image
                    Image::make(public_path() . '/images/front/img_event/'.$folder[0].'/'.$filename)->resize(160, 240)->save(public_path() . '/images/front/resize/banner/'.$filename); //resize
                    
                    $Event->poster = $filename;
                    $Event->banner = $filename;
                }                
                $Event->save(); 
                
                return back()->with('Success', 'Finished..');
            }      
        }
    }

    public function del(Request $request){
        if($request->ajax()){
            $event_id = $request->get('event_id');

            $Event = Event::find($event_id);
            if ($Event->poster != 'nopic.jpg') { 
                $filename = $Event->poster;
                $folder = explode(".", $filename);
                File::deleteDirectory(public_path() . '\\images\\front\\img_event\\' . $folder[0]);
                File::delete(public_path() . '\\images\\front\\resize\\banner\\' . $filename);
            }
            $Event->delete();

            return 'del';
        }
    }

}
