@extends('kerangka.index')
@section('content')
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4 bg-">Add Task</h1>

    <form action="{{ route('Task.store') }}"
      method="POST"class="max-w-sm mx-auto bg-white p-6 rounded-lg shadow-md ">
      @csrf
      <div class="mb-4">
        <label for="large-input" class="block mb-2 text-sm font-medium text-black">
          Task Name
        </label>
        <input type="text" id="large-input" name="task"
          class="block w-full p-2 text-black border border-black rounded-lg bg-white text-base"
          required>
      </div>

      <div class="mb-4">
        <label for="base-input" class="block mb-2 text-sm font-medium text-black-800 ">
          Note
        </label>
        <input type="text" id="base-input" name="note"
          class="block w-full p-5 text-black border border-black rounded-lg bg-white text-base">
      </div>

      <div class="mb-4">
        <label for="date-input" class="block mb-2 text-sm font-medium text-black-800 ">
          Select Date
        </label>
        <input type="date" id="date-input" name="date"
          class="block w-full p-2 text-black border border-black rounded-lg bg-white text-base"
          required>
      </div>

      <div class="mb-4">
        <label for="priority" class="block mb-2 text-black font-medium e text-sm">Priority:</label>
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
                 font-medium rounded-lg text-sm px-5 py-2.5 ml-2 dark:bg-red-700 dark:text-black
                 dark:hover:bg-red-600 dark:focus:ring-red-800">
          Batal
        </button>
      </div>

    </form>
  </div>
@endsection
