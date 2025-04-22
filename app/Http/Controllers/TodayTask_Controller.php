<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class TodayTask_Controller extends Controller
{
    public function index(){
        $tasks = Task::whereDate('date', Carbon::today())->get();
        return view('today_task.index', compact('tasks'));
    }

    public function create(){
        $tasks = Task::all();
        return view('today_task.add_task', compact('tasks'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:25',
            'note' => 'required|string|max:150',
            'date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
        ]);

        $task = new Task();
        $task->task = $request->task;
        $task->note = $request->note;
        $task->date = $request->date;
        $task->priority = $request->priority;
        $task->save();


        return redirect()->route('TodayTask.index')->with('succes', 'Task Berhasil dibuat');
    }


    public function edit($id){
        $task = Task::findOrFail($id);
        return view('today_task.edit_task', compact('task'));
    }


    public function update(Request $request, $id){
        $request->validate([
            'task' => 'required|string|max:25',
            'note' => 'required|string|max:150',
            'date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'task' => $request->task,
            'note' => $request->note,
            'date' => $request->date,
            'priority' => $request->priority,
        ]);
        return redirect()->route('TodayTask.index')->with('succes', 'Task Berhasil diubah');
    }


    public function destroy($id){
        try {
            $task = Task::findOrFail($id);
            $task->delete();

            return redirect()->route('TodayTask.index')->with('succes', 'Task Berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Task Tidak Berhasil dihapus');
        }
    }


    public function markAsDone(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:not_done,on_progress,done',
        ]);

        $task = Task::findOrFail($id);
        $task->status = $request->status;
        $task->save();


        return redirect()->route('TodayTask.index')->with('succes', 'Task Berhasil diubah');
    }
}
