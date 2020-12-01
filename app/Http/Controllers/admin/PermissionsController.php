<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data = User::UsersAll();
        $count = $data->count();
        $data = $data->paginate(10);
        
        $offset = $data->count();
        $first = ($count==0) ? 0 : 1;
        $end = ($count<10) ? $count : 10;
        return view('site.admin.permissions.index', compact(['data','count','first','end']))->render();
    }

    function fetch_data(Request $request){
        if($request->ajax()){
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('users') 
                        ->Where('student_id', 'like', '%'.$query.'%')
                        ->orWhere('fname', 'like', '%'.$query.'%')
                        ->orWhere('lname', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type);
            $count = $data->count();
            $data = $data->paginate(10);

            return view('site.admin.permissions.data-row', compact(['data']))->render();
        }
    }

    function pagination_link(Request $request){
        if($request->ajax()){
            $page = $request->get('page');
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('users')
                        ->Where('student_id', 'like', '%'.$query.'%')
                        ->orWhere('fname', 'like', '%'.$query.'%')
                        ->orWhere('lname', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type);
            $count = $data->count();
            $data = $data->paginate(10);
            
            $offset = $data->count();
            $first = ($page-1 == 0) ? 1 : $page-1 . 1;
            $end = ($offset!=10) ? ($page-1 == 0) ? $offset : $page-1 . $offset : $page . 0;
            
            return view('site.admin.permissions.pagination-link', compact(['data','count','first','end']))->render();
        }
    }

    function change_status(Request $request){
        if($request->ajax()){
            $id = $request->get('id');
            $status_user = $request->get('status_user');            

            $Event = User::find($id);
            $Event->status_user = $status_user;
            $Event->save();

            return 'change';
        }
    }


}
