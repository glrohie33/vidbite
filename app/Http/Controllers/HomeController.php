<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\View;
use App\Models\Category;
use App\Models\VideoContent;
use Illuminate\Http\Request;
use App\Models\ContinueWatch;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

        $today = Carbon::now()->format("Y-m-d");
        $categories = Category::withCount(['views'])->withSum('views', 'time')->orderBy('views_count', 'DESC')->get();
        $activeUsers = User::whereHas('continueWatches', function ($query) use ($today) {
            $query->whereDate('created_at', "=", $today);
        })->get();
        $views = ContinueWatch::whereDate('created_at', "=", $today)->get();
        $activePercentage = round(($activeUsers->count() * 100) / $users->count(), 2);
        $videos = VideoContent::withCount(['views'])->withSum('views', 'time')->orderBy('views_sum_time', 'DESC')->get();
        $viewed = (count($view) > 0) ? max($view) : 0;






        return view('dashboard', compact('users', 'no_users', 'no_super', 'no_admin',  'vidcont', 'allmax', 'viewed', 'categories', 'videos', 'activePercentage', 'views'));



        //$popvid = $vidcont->views->max()->get();



    }

    public function chartData(Request $request)
    {
        $validator = Validator::make($request->all(), ['chartType' => "required"]);
        if ($validator->fails()) {
            return response()->json(["status" => false, "errors" => $validator->errors()->all()]);
        }
        $data = [];
        $labels = [];
        $type = $request->chartType;
        switch ($type) {
            case "daily":
                $today = Carbon::now();
                $today->hour = 0;
                $today->minute = 0;
                $today->second = 0;
                $todays_date = $today->format('Y-m-d');
                $i = 1;
                while ($i <= 24) {
                    $start = $today->format("H:s:i");

                    $end = $today->addHour(1)->format("H:s:i");
                    $end = ($end == "00:00:00") ? "24:00:00" : $end;
                    $data['viewers'][] = User::whereHas('continueWatches', function ($query) use ($today, $start, $end, $todays_date) {
                        $query->whereDate('created_at', $todays_date)
                            ->whereTime('created_at', ">=", $start)
                            ->whereTime('created_at', "<", $end);
                    })->count();


                    $timeSum = ContinueWatch::whereDate('created_at', $todays_date)
                        ->whereTime('created_at', ">=", $start)
                        ->whereTime('created_at', "<=", $end)->sum('time');
                    $data['time_watched'][] = round($timeSum / 3600, 4);
                    $i++;
                }
                break;
            case "weekly":
                $today = Carbon::now();

                $startOfWeek = $today->startOfWeek(Carbon::MONDAY);
                $i = 0;
                $data['viewers'][] = User::whereHas('continueWatches', function ($query) use ($startOfWeek) {
                    $query->whereDate('created_at', "=", $startOfWeek);
                })->count();
                $timeSum = ContinueWatch::whereDate('created_at', '=', $startOfWeek)->sum('time');
                $data['time_watched'][] = round($timeSum / 3600, 4);
                while ($i < 6) {
                    $today = $startOfWeek->addDays(1);
                    $data['viewers'][] = User::whereHas('continueWatches', function ($query) use ($today) {
                        $query->whereDate('created_at', "=", $today);
                    })->count();

                    $timeSum = ContinueWatch::whereDate('created_at', '=', $today)->sum('time');
                    $data['time_watched'][] = round($timeSum / 3600, 4);
                    $i++;
                }
                break;
            case 'monthly':
                $i = 1;
                while ($i <= 12) {
                    $data['viewers'][] = User::whereHas('continueWatches', function ($query) use ($i) {
                        $query->whereYear('created_at', date("Y"))->whereMonth('created_at', "=", $i);
                    })->count();
                    $timeSum = ContinueWatch::whereYear('created_at', date("Y"))->whereMonth('created_at', '=', $i)->sum('time');
                    $data['time_watched'][] = round($timeSum / 3600, 4);
                    $i++;
                }
                break;
            case 'range':
                $start = Carbon::parse($request->input('from'));
                $end = Carbon::parse($request->input('to'));
                $diff = $start->diffInDays($end);
                $i = 0;
                $today = $start;
                while ($i <= $diff) {
                    $labels[] = $today->format('Y-m-d');
                    $data['viewers'][] = User::whereHas('continueWatches', function ($query) use ($today) {
                        $query->whereDate('created_at', "=", $today);
                    })->count();

                    $timeSum = ContinueWatch::whereDate('created_at', '=', $today)->sum('time');
                    $data['time_watched'][] = round($timeSum / 3600, 4);
                    $today = $start->addDays(1);
                    $i++;
                }
                break;
        }
        return response()->json(['status' => true, 'data' => $data, 'labels' => $labels]);
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
