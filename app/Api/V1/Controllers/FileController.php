<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\FileRequest;
use App\Detail_Step_Task;
use App\Jobs\GoogleDriveFilesUpload;
use App\Task;
use Dingo\Api\Http\Request;

use App\File;
use App\Api\V1\GoogleUpload;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

class FileController extends Controller
{
    //TODO:delete
    public function getStepFiles (Request $request, $customer_id, $project_id, $task_id, $detail_step_task_id)
    {
        $detail_step_task = Detail_Step_Task::find($detail_step_task_id);

        return response()->json([
            'files' => $detail_step_task->files()->get(),
        ]);

    }

    //TODO: get file id from drive upload
    public function storeStepFiles(Request $request, $customer_id, $project_id, $task_id)
    {
        $task = Task::find($task_id);
        $detail_step_task = Detail_Step_Task::find($request->input('step_task_id'));

        $detail_step_task->files()->create([
            'file_id' => 1,
            'filename' => trim($request->file('file')->getClientOriginalName()),
            'description' => $request->input('description'),
            'path' => $task->folder_id,
            'mime' => $request->file('file')->getClientMimeType(),
            'size' => $request->file('file')->getClientSize()
        ]);

        dispatch(new GoogleDriveFilesUpload($request->file('file')->getClientOriginalName(), $request->file('file')->getRealPath(), $request->file('file')->getClientOriginalExtension(), $task->folder_id));

        return response()->json([
            'status' => 'file uploaded successfully',
            'files' => $detail_step_task->files()->get()
        ]);
    }

    public function approveStepFiles(Request $request, $customer_id, $project_id, $task_id, $detail_step_task_id, $file_id)
    {
        File::find($file_id)->detail_step_task()->updateExistingPivot(
            $detail_step_task_id, [
                    'status' => 1
                ]);

        return response()->json([
            'status' => 'file approved'
        ]);
    }

    public function disapproveStepFiles(Request $request, $customer_id, $project_id, $task_id, $detail_step_task_id, $file_id)
    {
        File::findOrFail($file_id)->detail_step_task()->updateExistingPivot(
            $detail_step_task_id, [
            'status' => 0
        ]);

        return response()->json([
            'status' => 'file disapproved '
        ]);
    }

    public function deleteStepFiles(Request $request, $customer_id, $project_id, $task_id, $detail_step_task_id, $file_id){
        $file = File::findOrFail($file_id);

//        TODO: file id is missed
//        $google_drive = new GoogleUpload();
//        $google_drive->delete_files($file->file_id);

        $file->delete();

        return response()->json([
            'status' => 'file deleted successfully'
        ]);
    }
}
