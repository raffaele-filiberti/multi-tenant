<?php

namespace App\Api\V1\Controllers;

use App\Date;
use App\Detail_Step_Task;
use App\Http\Controllers\Controller;
use App\Step_Task;
use Dingo\Api\Http\Request;
use Illuminate\Contracts\Logging\Log;

class DateController extends Controller
{
    function check($step_task_id, $detail_step_task_id){
        //check if detail_step_task is approved
        $count = 0;
        $step_task = Step_Task::find($step_task_id);
        $detail_step_task = Detail_Step_Task::find($detail_step_task_id);
        $dates = $detail_step_task->dates()->get();
        foreach ($dates as $detail_step_task_date) {
            if($detail_step_task_date->pivot->status == 1) {
                $count++;
            }
        }
        if($count == count($detail_step_task_date))
        {
            $step_task->details()->updateExistingPivot($detail_step_task->detail_id,
                [
                    'status' => 1
                ]);
        }
        else {
            $step_task->details()->updateExistingPivot($detail_step_task->detail_id,
                [
                    'status' => 0
                ]);

        }

        $count = 0;
        //check if step_task is approved
        $step_task = Step_Task::find($step_task_id);
        $details = $step_task->details()->get();
        foreach ($details as $detail_step_task) {
            if($detail_step_task->pivot->status == 1) {
                $count++;
            }
        }
        if($count == count($details))
        {
            $step_task->status = 1;
        } else {
            $step_task->status = 0;
        }

        $step_task->save();
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

        $this->check($step_task_id, $detail_step_task_id);

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

        $this->check($step_task_id, $detail_step_task_id);

        return response()->json([
            'status' => 'date approved',
        ]);
    }

    public function destroy($customer_id, $project_id, $task_id, $step_task_id, $detail_step_task_id, $date_id)
    {
        $date = Date::find($date_id);
        $date->delete();

        $this->check($step_task_id, $detail_step_task_id);

        return Response()->json([
            'status' => 'date deleted successfully'
        ]);
    }

}
