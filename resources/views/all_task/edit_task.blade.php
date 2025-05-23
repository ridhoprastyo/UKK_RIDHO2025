@extends('kerangka.index')

@section('content')
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

    <form action="{{ route('Task.update', [$task->id]) }}" method="POST" class="max-w-sm mx-auto bg-white p-6 rounded-lg ">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label for="large-input" class="block mb-2 text-sm font-medium text-black-800 ">
          Task Name
        </label>
        <input type="text" id="large-input" name="task"
          class="block w-full p-2 text-black border border-black rounded-lg bg-white text-base"
          value="{{ old('task', $task->task) }}" required> </div>

        <div class="mb-4">
          <label for="base-input" class="block mb-2 text-sm font-medium text-black-800">
            Note
          </label>
          <input type="text" id="base-input" name="note"
            class="block w-full p-5 text-black border border-black rounded-lg bg-white text-base"
            value="{{ old('note', $task->note) }}">
        </div>

        <div class="mb-4">
          <label for="date-input" class="block mb-2 text-sm font-medium text-black-800">
            Select Date
          </label>
          <input type="date" id="date-input" name="date"
            class="block w-full p-2 text-black border border-black rounded-lg bg-white text-base"
            value="{{ old('date', $task->date) }}" required>
        </div>

        <div>
          <div class="mb-4">
            <label for="priority" class="block mb-2 text-black-800 font-medium  text-sm">Priority:</label>
            <select id="priority"
              class="block w-full p-2 text-black border border-black rounded-lg bg-white text-base"
              name="priority" required>
              <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
              <option value="medium" {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>Medium</option>
              <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
            </select>
          </div>

          <div class="flex justify-between mt-4">
            <!-- Tombol Simpan -->
            <button type="submit"
              class="w-1/2 text-black bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300
                 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-green-500 dark:hover:bg-green-600
                 dark:focus:ring-green-800">
              Simpan
            </button>

            <!-- Tombol Batal -->
            <button type="button" onclick="window.history.back();"
              class="w-1/2 text-black bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-200
                 font-medium rounded-lg text-sm px-5 py-2.5 ml-2 dark:bg-red-700 
                 dark:hover:bg-red-600 dark:focus:ring-red-800">
              Batal
            </button>
          </div>
    </form>
  </div>
  </div>
@endsection
