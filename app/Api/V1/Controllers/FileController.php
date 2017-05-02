<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\FileRequest;
use Dingo\Api\Http\Request;

use App\File;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function storeStepFiles(FileRequest $request, $customer_id, $project_id, $task_id)
    {
        return response()->json([
            'description' => $request->input('description'),
            'step_task_id' => $request->input('step_task_id'),
            'file' => $request->all(),
        ]);
    }
}
