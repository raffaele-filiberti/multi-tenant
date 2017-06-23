<?php

namespace App\Api\V1\Controllers;

use App\Agency;
use App\Http\Controllers\Controller;
use App\Task;
use Auth;
use HipsterJazzbo\Landlord\Facades\Landlord;
use DB;

class DashboardController extends Controller
{
    public function cardsCounter()
    {
        if(Auth::user()->hasRole(['admin', 'designer', 'creative_director'])) {
            $agency = Agency::where('id', '=', Auth::user()->agency_id)->withCount([
                'customers', 'projects', 'tasks', 'users'
            ])->get();
        }

        if(Auth::user()->can('view_tasks')) {
            $task_count = Task::where('archivied', '=', false)
                ->where('private', '=', false)
                ->get();
        }

        return response()->json([
            'counter' => $agency
        ]);
    }

    public function userChart()
    {
        if(Auth::user()->hasRole(['admin', 'creative_director'])) {
            $chart = DB::table('users')
                ->select(DB::raw('MONTHNAME(created_at) as month'), DB::raw("DATE_FORMAT(created_at,'%Y-%m') as monthNum"), DB::raw('count(*) as users'))
                ->groupBy('monthNum')
                ->get();

            return response()->json([
                'user_chart_data' => $chart
            ]);
        }
    }
}
