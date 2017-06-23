<?php

namespace App\Api\V1\Controllers;

use App\Agency;
use App\Http\Controllers\Controller;
use App\Task;
use App\User;
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
            $user = User::all();
            $u_label = $user->pluck('updated_at');
            $u_data = $user->pluck('name');

            return response()->json([
                'u_label' => $u_label,
                'u_data' => $u_data
            ]);
        }
    }

    public function recentTask()
    {

    }
}
