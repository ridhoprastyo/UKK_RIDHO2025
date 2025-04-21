<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

// <?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Task_Controller;
// use App\Http\Controllers\TodayTask_Controller;


// Route::resource('/Task', Task_Controller::class);
// Route::patch('/Task/{id}/done', [Task_Controller::class, 'markAsDone'])->name('Task.done');
// Route::resource('/TodayTask', TodayTask_Controller::class);
// Route::patch('/TodayTask/{id}/done', [TodayTask_Controller::class, 'markAsDone'])->name('TodayTask.done');

// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Task extends Model
// {
//     use HasFactory;

//     protected $table = 'tasks';

//     protected $fillable = [
//         'task',
//         'note',
//         'date',
//         'priority',
//         'status',
//     ];

//     public function getPriorityLabelAttribute()
//     {
//         return ucfirst($this->priority);
//     }

//     public function getPriorityAttribute($value)
//     {
//         return match ($value) {
//             'high' => 3,
//             'medium' => 2,
//             'low' => 1,
//             default => 0
//         };
//     }
// }


    // public function up(): void
    // {
    //     Schema::create('tasks', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('task');
    //         $table->string('note');
    //         $table->date('date');
    //         $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
    //         $table->enum('status', ['not_done', 'done'])->default('not_done');
    //         $table->timestamps();
    //     });
    // }

    

    // {{ route('Task.destroy', $task->id) }}



// @extends('kerangka.index')

// @section('content')
// <div class="container mx-auto p-14">
//     <h1 class="text-2xl font-bold mb-6">All Tasks</h1>

//     <!-- On Progress Tasks -->
//     <div class="mb-6">
//         <!-- Header and Add Task Button -->
//         <div class="flex items-center justify-between mb-4">
//             <h3 class="text-lg font-semibold">On Progress</h3>
//             <a href="{{ route('Task.create') }}" class="flex items-center text-yellow-600 hover:text-yellow-700">
//                 <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 16 16" fill="currentColor">
//                     <path fill-rule="evenodd"
//                         d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
//                 </svg>
//                 <span class="ml-2 text-sm">Add Task</span>
//             </a>
//         </div>

//         <div class="space-y-2">
//             @foreach ($tasks->where('status', 'not_done')->sortByDesc('priority') as $task)
//             <div class="flex items-center justify-between p-3 my-3 bg-white rounded-md shadow-md">
//                 <div class="flex items-center">
//                     <!-- Complete Button -->
//                     <button type="button" onclick="openModal('{{ $task->id }}')"
//                         class="text-white bg-[#FA812F] hover:bg-[#FAB12F] font-medium rounded-lg text-sm px-2 py-1 mr-5">
//                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
//                             class="bi bi-check" viewBox="0 0 16 16">
//                             <path
//                                 d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
//                         </svg>
//                     </button>
//                     <!-- Task Info -->
//                     <div>
//                         <p class="text-gray-800 font-medium text-sm">{{ $task->task }}</p>
//                         <p class="text-gray-500 text-xs">{{ $task->note ?? '-' }}</p>
//                         <p class="text-gray-500 text-xs">{{ $task->date }}</p>
//                     </div>
//                 </div>

//                 <!-- Action Buttons -->
//                 <div class="flex space-x-2">
//                     <a href="{{ route('Task.edit', $task->id) }}" class="text-blue-600 hover:text-blue-700">
//                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
//                             class="bi bi-pencil-fill" viewBox="0 0 16 16">
//                             <path
//                                 d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
//                         </svg>
//                     </a>
//                     <form action="{{ route('Task.destroy', $task->id) }}" method="POST"
//                         onsubmit="return confirm('Hapus task ini?');">
//                         @csrf
//                         @method('DELETE')
//                         <button type="submit" class="text-red-600 hover:text-red-800">
//                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
//                                 class="bi bi-trash-fill" viewBox="0 0 16 16">
//                                 <path
//                                     d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
//                             </svg>
//                         </button>
//                     </form>
//                 </div>
//             </div>
//             @endforeach
//         </div>
//     </div>

//     <!-- Done Tasks -->
//     <div>
//         <h3 class="text-lg font-semibold mb-3">Done</h3>
//         <div class="space-y-2">
//             @foreach ($tasks->where('status', 'done') as $task)
//             <div class="flex items-center justify-between p-3 bg-gray-100 rounded-md shadow-md">
//                 <div class="flex items-center">
//                     <button type="button"
//                         class="text-white bg-[#FA812F] hover:bg-[#FAB12F] font-medium rounded-lg text-sm px-2 py-1 mr-5">
//                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
//                             class="bi bi-check" viewBox="0 0 16 16" disabled>
//                             <path
//                                 d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
//                         </svg>
//                     </button>
//                     <div>
//                         <p class="text-gray-600 text-sm">{{ $task->task }}</p>
//                         <p class="text-gray-500 text-xs">{{ $task->note ?? '-' }}</p>
//                         <p class="text-gray-500 text-xs">{{ $task->date }}</p>
//                     </div>
//                 </div>
//                 <div class="flex space-x-2">
//                     <a href="{{ route('Task.edit', $task->id) }}" class="text-blue-600 hover:text-blue-700"></a>
//                     <form action="{{ route('Task.destroy', $task->id) }}" method="POST"
//                         onsubmit="return confirm('Hapus task ini?');">
//                         @csrf
//                         @method('DELETE')
//                         <button type="submit" class="text-red-600 hover:text-red-800 text-sm">🗑️</button>
//                     </form>
//                 </div>
//             </div>
//             @endforeach
//         </div>
//     </div>
// </div>

// <!-- Modal -->
// <div id="modal" class="fixed hidden inset-0 z-50 items-center justify-center">
//     <div class="bg-[#FA812F] rounded-lg shadow-lg w-80 p-6 text-center">
//         <h2 class="text-lg text-white font-semibold mb-4">Tandai Task Selesai?</h2>
//         <p class="text-sm text-white mb-4">Apakah kamu yakin ingin menyelesaikan task ini?</p>
//         <form id="modalForm" method="POST">
//             @csrf
//             @method('PATCH')
//             <div class="flex justify-center gap-4">
//                 <button type="button" onclick="closeModal()"
//                     class="flex-1 px-4 py-2 text-sm text-white rounded bg-red-500 hover:bg-red-600">Batal</button>
//                 <button type="submit"
//                     class="flex-1 px-4 py-2 text-sm bg-green-500 text-white rounded hover:bg-green-600">Selesai</button>
//             </div>
//         </form>
//     </div>
// </div>
// @endsection

// <script>
//     function openModal(taskId) {
//         const modal = document.getElementById('modal');
//         const form = document.getElementById('modalForm');
//         modal.classList.remove('hidden');
//         modal.classList.add('flex');

//         // Set URL sesuai dengan route PATCH
//         form.action = `/Task/${taskId}/done`; // HARUS sesuai dengan rute yang kamu define

//         modal.classList.remove('hidden');
//         window.currentTaskId = taskId;
//     }

//     function closeModal() {
//         document.getElementById('modal').classList.add('hidden');
//         modal.classList.remove('flex');
//         modal.classList.add('hidden');
//         window.currentTaskId = null;
//     }
// </script>




// @extends('kerangka.index')

// @section('content')
//   <div class="container mx-auto p-4">
//     <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

//     <form action="{{ route('Task.update', $task->id) }}" method="POST"
//       class="max-w-sm mx-auto bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
//       @csrf
//       @method('PUT')

//       <div class="mb-4">
//         <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
//           Task Name
//         </label>
//         <input type="text" id="large-input" name="task"
//           class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base 
//              focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
//              dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
//           value="{{ old('task', $task->task) }}" required>
//       </div>

//       <div class="mb-4">
//         <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
//           Note
//         </label>
//         <input type="text" id="base-input" name="note"
//           class="block w-full p-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
//              focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
//              dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
//           value="{{ old('task', $task->note) }}">
//       </div>

//       <div class="mb-4">
//         <label for="date-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
//           Select Date
//         </label>
//         <input type="date" id="date-input" name="date"
//           class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs 
//            focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
//            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
//           value="{{ old('task', $task->date) }}" required>
//       </div>

//       <div>
//         <div class="mb-4">
//           <label for="priority" class="block mb-2 text-gray-900 font-medium dark:text-white text-sm">Priority:</label>
//           <select id="priority"
//             class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs 
//            focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
//            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
//             name="priority" required>
//             <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
//             <option value="medium" {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>Medium</option>
//             <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
//           </select>
//         </div>

//         <div class="flex justify-between mt-4">
//           <!-- Tombol Simpan -->
//           <button type="submit"
//             class="w-1/2 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 
//                  font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-green-500 dark:hover:bg-green-600 
//                  dark:focus:ring-green-800">
//             Simpan
//           </button>

//           <!-- Tombol Batal -->
//           <button type="button" onclick="window.history.back();"
//             class="w-1/2 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-200 
//                  font-medium rounded-lg text-sm px-5 py-2.5 ml-2 dark:bg-red-700 dark:text-white 
//                  dark:hover:bg-red-600 dark:focus:ring-red-800">
//             Batal
//           </button>
//         </div>
//     </form>
//   </div>
//   </div>
// @endsection



// @extends('kerangka.index')
// @section('content')
//   <div class="container mx-auto p-4">
//     <h1 class="text-2xl font-bold mb-4">Add Task</h1>

//     <form action="{{ route('Task.store') }}"
//       method="POST"class="max-w-sm mx-auto bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
//       @csrf
//       <div class="mb-4">
//         <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
//           Task Name
//         </label>
//         <input type="text" id="large-input" name="task"
//           class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base 
//              focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
//              dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
//           required>
//       </div>

//       <div class="mb-4">
//         <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
//           Note
//         </label>
//         <input type="text" id="base-input" name="note"
//           class="block w-full p-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
//              focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
//              dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
//       </div>

//       <div class="mb-4">
//         <label for="date-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
//           Select Date
//         </label>
//         <input type="date" id="date-input" name="date"
//           class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs 
//            focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
//            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
//           required>
//       </div>

//       <div class="mb-4">
//         <label for="priority" class="block mb-2 text-gray-900 font-medium dark:text-white text-sm">Priority:</label>
//         <select id="priority"
//           class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs 
//            focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
//            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500""
//           name="priority" required>
//           <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
//           <option value="medium" {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>Medium</option>
//           <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
//         </select>
//       </div>

//       <div class="flex justify-between mt-4">
//         <!-- Tombol Simpan -->
//         <button type="submit"
//           class="w-1/2 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 
//                  font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-green-500 dark:hover:bg-green-600 
//                  dark:focus:ring-green-800">
//           Simpan
//         </button>

//         <!-- Tombol Batal -->
//         <button type="button" onclick="window.history.back();"
//           class="w-1/2 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-200 
//                  font-medium rounded-lg text-sm px-5 py-2.5 ml-2 dark:bg-red-700 dark:text-white 
//                  dark:hover:bg-red-600 dark:focus:ring-red-800">
//           Batal
//         </button>
//       </div>

//     </form>
//   </div>
// @endsection



// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Task;
// class Task_Controller extends Controller
// {
//     public function index()
//     {
//         $tasks = Task::all();
//         return view('all_task.index', compact('tasks'));
//     }

//     public function create()
//     {
//         $tasks = Task::all();
//         return view('all_task.add_task', compact('tasks'));

//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'task' => 'required|string|max:25',
//             'note' => 'required|string|max:150',
//             'date' => 'required|date',
//             'priority' => 'required|in:low,medium,high',
//         ]);

//         $task = new Task();
//         $task->task = $request->task;
//         $task->note = $request->note;
//         $task->date = $request->date;
//         $task->priority = $request->priority;
//         $task->save();


//         return redirect()->route('Task.index')->with('succes', 'Task Berhasil dibuat');
//     }

//     public function edit($id)
//     {
//         $task = Task::findOrFail($id);
//         return view('all_task.edit_task', compact('task'));


//     }

//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'task' => 'required|string|max:25',
//             'note' => 'required|string|max:150',
//             'date' => 'required|date',
//             'priority' => 'required|in:low,medium,high',
//         ]);

//         $todo = Task::findOrFail($id);

//         $todo->update([
//             'task' => $request->task,
//             'note' => $request->note,
//             'date' => $request->date,
//             'priority' => $request->priority,
//         ]);


//         return redirect()->route('Task.index')->with('succes', 'Task Berhasil diperbarui');


//     }

//     public function destroy($id)
//     {
//         try {
//             $task = Task::findOrFail($id);
//             $task->delete();
//             return redirect()->route('Task.index')->with('succes', 'Task Berhasil dihapus!');

//         } catch (\Exception) {
//             return redirect()->back()->withErrors(['error' => 'Terdapat eror saat ingin menghapus data ini']);
//         }

//     }

//     public function markAsDone($id)
//     {
//         $task = Task::findOrFail($id);
//         $task->status = 'done';
//         $task->save();

//         return redirect()->route('Task.index')->with('succes', 'Task ditandai selesai');

//     }
// }


// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Task;
// use Carbon\Carbon;
// class TodayTask_Controller extends Controller
// {
//     public function index()
//     {
//         $tasks = Task::whereDate('date', Carbon::today())->get();
//         return view('today_task.index', compact('tasks'));
//     }

//     public function create()
//     {
//         $tasks = Task::all();
//         return view('today_task.add_task', compact('tasks'));

//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'task' => 'required|string|max:25',
//             'note' => 'required|string|max:150',
//             'date' => 'required|date',
//             'priority' => 'required|in:low,medium,high',
//         ]);

//         $task = new Task();
//         $task->task = $request->task;
//         $task->note = $request->note;
//         $task->date = $request->date;
//         $task->priority = $request->priority;
//         $task->save();


//         return redirect()->route('TodayTask.index')->with('succes', 'Task Berhasil dibuat');
//     }

//     public function edit($id)
//     {
//         $task = Task::findOrFail($id);
//         return view('today_task.edit_task', compact('task'));


//     }

//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'task' => 'required|string|max:25',
//             'note' => 'required|string|max:150',
//             'date' => 'required|date',
//             'priority' => 'required|in:low,medium,high',
//         ]);

//         $todo = Task::findOrFail($id);

//         $todo->update([
//             'task' => $request->task,
//             'note' => $request->note,
//             'date' => $request->date,
//             'priority' => $request->priority,
//         ]);


//         return redirect()->route('TodayTask.index')->with('succes', 'Task Berhasil diperbarui');


//     }

//     public function destroy($id)
//     {
//         try {
//             $task = Task::findOrFail($id);
//             $task->delete();
//             return redirect()->route('TodayTask.index')->with('succes', 'Task Berhasil dihapus!');

//         } catch (\Exception) {
//             return redirect()->back()->withErrors(['error' => 'Terdapat eror saat ingin menghapus data ini']);
//         }

//     }

//     public function markAsDone($id)
//     {
//         $task = Task::findOrFail($id);
//         $task->status = 'done';
//         $task->save();

//         return redirect()->route('TodayTask.index')->with('succes', 'Task ditandai selesai');

//     }
// }

