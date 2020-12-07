<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserLoggedIn;
use App\Event;
use App\EventCategory;
use App\RegisteredUser;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        event(new  UserLoggedIn("Your login has success"));

        $event = [];
        $q_category = [];
        $category_id = EventCategory::get(['category_id',]);

        foreach($category_id as $key => $value) {

            $query = DB::table('event AS e')
                        ->join('eventcategory AS ec', 'e.category_id', '=', 'ec.category_id')
                        ->select('*','e.name AS event')
                        ->where('e.category_id', '=', collect($value))
                        ->orderBy('postedDate', 'desc')
                        ->limit(8)
                        ->get();
            $c_query = $query->count();
            
            foreach($query as $key => $value) {
                array_push($q_category, $value->name);
            }
            
            if($c_query > 0) array_push($event, $query); 
        }        
        
        $data = array_values($event);

        $u_category = array_unique($q_category);
        $category = array_values($u_category);
        $c_category = count($category);
        // return print_r($category);   

        return view('site.front.index', compact(['data', 'c_category', 'category']))->render();
    }

    public function category ($name) {
        $category_id = EventCategory::where('name', '=', $name)->select('category_id')->first();
        $data = DB::table('event AS e')
                        ->join('eventcategory AS ec', 'e.category_id', '=', 'ec.category_id')
                        ->select('*','e.name AS event')
                        ->where('e.category_id', '=', $category_id->category_id)
                        ->orderBy('postedDate', 'desc')
                        ->get();

        return view('site.front.category', compact(['data']))->render();
    }

    public function event ($name) {
        $data = Event::where('name', '=', $name)->first();
        $event_id = $data->event_id;
        $no_of_registration = RegisteredUser::where('event_id', '=', $event_id)->count();

        return view('site.front.registeredUser.index', compact(['data', 'no_of_registration']))->render();
    }
}
