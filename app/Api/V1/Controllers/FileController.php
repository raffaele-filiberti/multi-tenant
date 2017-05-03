<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\FileRequest;
use App\Detail_Step_Task;
use Dingo\Api\Http\Request;

use App\File;
use App\Api\V1\GoogleUpload;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function storeStepFiles(Request $request, $customer_id, $project_id, $task_id)
    {
        $extension = $request->file('file')->getClientOriginalExtension();
        $contents = ( $extension == 'jpg' || $extension == 'png' )? file_get_contents($request->file('file')->getRealPath()) : utf8_encode(file_get_contents($request->file('file')->getRealPath()));

        $google_drive = new GoogleUpload();
        $folder_id = $google_drive->create_folder('tasks');
        $google_drive->upload_files(trim($request->file('file')->getClientOriginalName()), $contents, $folder_id);
//        Storage::disk('google')->put(trim($request->file('file')->getClientOriginalName()), $contents);

        Detail_Step_Task::find($request->input('step_task_id'))->files()->create([
            'filename' => trim($request->file('file')->getClientOriginalName()),
            'description' => $request->input('description'),
            'path' => $folder_id,
            'mime' => $request->file('file')->getClientMimeType(),
            'size' => $request->file('file')->getClientSize()
        ]);

        return response()->json([
            'description' => $request->input('description'),
            'detail_step_task_id' => $request->input('step_task_id'),
            'file' => $request->file('file')->getClientOriginalName(),
            'file_content' => utf8_encode(file_get_contents($request->file('file')->getRealPath()))
        ]);
    }
}
