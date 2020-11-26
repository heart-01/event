<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;
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
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('event')
                        ->where('event_id', 'like', '%'.$query.'%')
                        ->orWhere('name', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type);
            $count = $data->count();
            $data = $data->paginate(10);

            return view('site.admin.calendarEvent.data-row', compact(['data']))->render();
        }
    }

    function pagination_link(Request $request){
        if($request->ajax()){
            $page = $request->get('page');
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('event')
                        ->where('event_id', 'like', '%'.$query.'%')
                        ->orWhere('name', 'like', '%'.$query.'%')
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
        $date_time = date('Y-m-d H:i:s');        

        $query = DB::table('event')->where('name', '=', $name);
        $count = $query->count();

        if($count>='1'){
            return back()->with('Warning', 'Cannot Add because \nit contains information of \''.$name.'\' ');
        }else{

            $Event = new Event();
            $Event->name = $name;
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

        $query = DB::table('event')->where('name', '=', $name);
        $count = $query->count();
        if($count>='1'){
            return back()->with('Warning', 'Cannot Edit because \nit contains information of \''.$name.'\' ');
        }else{
            $Event = Event::find($event_id);
            $Event->name = $name;
            $Event->save(); 
            
            return back()->with('Success', 'Finished..');
        }      
    }

    public function del(Request $request){
        if($request->ajax()){
            $event_id = $request->get('event_id');

            $Event = Event::find($event_id);
            $Event->delete();

            return 'del';
        }
    }

}
