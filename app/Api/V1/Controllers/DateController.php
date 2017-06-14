<?php

namespace App\Api\V1\Controllers;

use App\Date;
use App\Detail_Step_Task;
use App\Http\Controllers\Controller;
use App\Step_Task;
use Dingo\Api\Http\Request;

class DateController extends Controller
{
    function check($step_task_id, $detail_step_task_id){
        //check if detail_step_task is approved

    }

    public function storeStepDates(Request $request, $customer_id, $project_id, $task_id, $step_task_id, $detail_step_task_id)
    {
        Detail_Step_Task::find($detail_step_task_id)->dates()->create([
            'data' => $request->input('data'),
            'description' => $request->input('description')
        ]);

        return response()->json([
            'status' => 'date stored successfully',
        ]);

    }

    public function getStepDates(Request $request, $customer_id, $project_id, $task_id, $step_task_id, $detail_step_task_id)
    {
        $detail_step_task = Detail_Step_Task::find($detail_step_task_id);

        return response()->json([
            'dates' => $detail_step_task->dates()->get(),
        ]);
    }

    public function approveStepDates(Request $request, $customer_id, $project_id, $task_id, $step_task_id, $detail_step_task_id, $date_id)
    {
        $date = Date::find($date_id)->detail_step_task()->updateExistingPivot(
            $detail_step_task_id, [
            'status' => 1
        ]);

        $count = 0;
        $step_task = Step_Task::find($step_task_id);
        $detail_step_task = Detail_Step_Task::find($detail_step_task_id);
        $details = $detail_step_task->dates()->get();
        foreach ($details as $detail_step_task_date) {
            if($detail_step_task_date->pivot->status == 1) {
                $count = 1;
            }
            return response()->json([
                'status' => 'detail verified',
                'obj' => $detail_step_task_date
            ]);
        }
        if($count)
        {
            $step_task->details()->updateExistingPivot($detail_step_task_id,
                [
                    'status' => 1
                ]);
        }

        $count = 0;
        //check if step_task is approved
        $step_task = Step_Task::find($step_task_id);
        foreach ($step_task->details as $detail_step_task) {
            if($detail_step_task->status == 1) {
                $count = 1;
            }
        }
        if($count)
        {
            $step_task->status = 1;
            $step_task->save();
        }

        return response()->json([
            'status' => 'date approved'
        ]);
    }

    public function disapproveStepDates(Request $request, $customer_id, $project_id, $task_id, $step_task_id, $detail_step_task_id, $date_id)
    {
        Date::find($date_id)->detail_step_task()->updateExistingPivot(
            $detail_step_task_id, [
            'status' => 0
        ]);

        $count = 0;
        $step_task = Step_Task::find($step_task_id);
        $detail_step_task = Detail_Step_Task::find($detail_step_task_id);
        $details = $detail_step_task->dates()->get();
        foreach ($details as $detail_step_task_date) {
            if($detail_step_task_date->pivot->status == 1) {
                $count = 1;
            }
            return response()->json([
                'status' => 'detail verified',
                'obj' => $detail_step_task_date
            ]);
        }
        if($count)
        {
            $step_task->details()->updateExistingPivot($detail_step_task_id,
                [
                    'status' => 1
                ]);
        }

        $count = 0;
        //check if step_task is approved
        $step_task = Step_Task::find($step_task_id);
        foreach ($step_task->details as $detail_step_task) {
            if($detail_step_task->status == 1) {
                $count = 1;
            }
        }
        if($count)
        {
            $step_task->status = 1;
            $step_task->save();
        }

        return response()->json([
            'status' => 'date disapproved'
        ]);
    }

    public function destroy($customer_id, $project_id, $task_id, $step_task_id, $detail_step_task_id, $date_id)
    {
        $date = Date::find($date_id);
        $date->delete();

        check($step_task_id, $detail_step_task_id);

        return Response()->json([
            'status' => 'date deleted successfully'
        ]);
    }

}
