<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\EventCategory;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data = EventCategory::CategoryAll();
        $count = $data->count();
        $data = $data->paginate(10);
        
        $offset = $data->count();
        $first = ($count==0) ? 0 : 1;
        $end = ($count<10) ? $count : 10;
        return view('site.admin.category.index', compact(['data','count','first','end']))->render();
    }

    function fetch_data(Request $request){
        if($request->ajax()){
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('eventcategory') 
                        ->Where('category_id', 'like', '%'.$query.'%')
                        ->orWhere('name', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type);
            $count = $data->count();
            $data = $data->paginate(10);

            return view('site.admin.category.data-row', compact(['data']))->render();
        }
    }

    function pagination_link(Request $request){
        if($request->ajax()){
            $page = $request->get('page');
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('eventcategory')
                        ->Where('category_id', 'like', '%'.$query.'%')
                        ->orWhere('name', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type);
            $count = $data->count();
            $data = $data->paginate(10);
            
            $offset = $data->count();
            $first = ($page-1 == 0) ? 1 : $page-1 . 1;
            $end = ($offset!=10) ? ($page-1 == 0) ? $offset : $page-1 . $offset : $page . 0;
            
            return view('site.admin.category.pagination-link', compact(['data','count','first','end']))->render();
        }
    }

    public function store(Request $request){
        $name = $request->get('name');

        $query = DB::table('eventcategory')->where('name', '=', $name);
        $count = $query->count();

        if($count>='1'){
            return back()->with('Warning', 'Cannot Add because \nit contains information of \''.$name.'\' ');
        }else{
            $EventCategory = new EventCategory();
            $EventCategory->name = $name;
            $EventCategory->save();
            
            return back()->with('Success', 'Finished..');
        }
    }

    public function update(Request $request){
        $category_id = $request->get('category_id-edit');
        $name = $request->get('name-edit');       

        // --------------------------------------------
        
        $category_old = EventCategory::where('category_id', $category_id)->get(['name',]);
        $collection = collect($category_old);
        $category_old = $collection->implode('name', ', ');

        if((string)$category_old==$name)
        {
            // return 'old name';
            $EventCategory = EventCategory::find($category_id);
            $EventCategory->save(); 
            
            return back()->with('Success', 'Finished..');

        }else if((string)$category_old!=$name)
        {
            // return 'new name';
            $query = DB::table('eventcategory')->where('name', '=', $name);
            $count = $query->count();
            if($count>='1'){
                return back()->with('Warning', 'Cannot Edit because \nit contains information of \''.$name.'\' ');
            }else{
                $EventCategory = EventCategory::find($category_id);
                $EventCategory->name = $name;    
                $EventCategory->save(); 
                
                return back()->with('Success', 'Finished..');
            }      
        }    
    }

    public function del(Request $request){
        if($request->ajax()){
            $category_id = $request->get('category_id');

            $EventCategory = EventCategory::find($category_id);
            $EventCategory->delete();

            return 'del';
        }
    }
}
