<?php

namespace App\Http\Controllers;

use App\Models\ContinueWatch;
use App\Models\User;
use App\Models\VideoContent;
use App\Models\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Add Comment for Testing
        // dd(auth()->user()->roles()->get()[0]->name);

        # code...
        $users = User::all();
        $no_users = User::where('user_type', 'business_user')->get();
        $no_super = User::where('user_type', 'super_admin')->get();
        $no_admin = User::where('user_type', 'admin')->get();

        $videoQuery = VideoContent::query();
        $videoQuery->with(['category', 'views', 'user', 'continueWatches', 'video_tags.tag_name']);
        // $videoQuery->where('total_views', $videoQuery-);
        // $no_views = DB::table('views')->where('total_views', DB::raw("(select max(`total_views`) from views)"))->get();
        // foreach ($no_views as  $value) {
        //     # code...
        //     $theviewsid = $value['v_id'];
        //   return  $theviewsid;

        // }
        // $no_v = DB::table('video_contents')->where('id', $theviewsid )->get();
        $vidcont = VideoContent::with(['category'])->get();

        $vidcount = count($vidcont);
        $view = array();
        $allmaxviews = array();
        $allmax = array();



        foreach ($vidcont as $key => $value) {
            # code...

            array_push($view, $value->views->count());

            $viewers = max($view);
            if ($viewers == $value->views->count()) {
                # code...
                array_push($allmaxviews, $value);
            }
            if (sizeof($allmaxviews) > 1) {

                $allmax[] = array_pop($allmaxviews);
            }
        }







        $viewed = (count($view) > 0) ? max($view) : 0;






        return view('dashboard', compact('users', 'no_users', 'no_super', 'no_admin',  'vidcont', 'allmax', 'viewed'));



        //$popvid = $vidcont->views->max()->get();



    }

    public function allUsers()
    {
        $users = User::all();
        $no_users = User::where('user_type', 'business_user')->get();
        $no_super = User::where('user_type', 'super_admin')->get();
        $no_admin = User::where('user_type', 'admin')->get();
        return view('layouts.dashboard', compact('users', 'no_users', 'no_super', 'no_admin'));
    }


    // public function fow(Type $var = null)
    // {
    //     # code...
    // }
}
