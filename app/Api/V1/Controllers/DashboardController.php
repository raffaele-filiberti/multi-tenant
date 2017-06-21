<?php

namespace App\Api\V1\Controllers;

use App\Agency;
use App\Http\Controllers\Controller;
use App\Task;
use HipsterJazzbo\Landlord\Facades\Landlord;

class DashboardController extends Controller
{
    public function cardsCounter()
    {
        if(Auth::user()->hasRole(['admin', 'designer', 'creative_director'])) {
            $agency = Agency::withCount([
                'users','customers', 'customers.projects', 'customers.projects.tasks'
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
}
