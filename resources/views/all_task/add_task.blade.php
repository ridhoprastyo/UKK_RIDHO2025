@extends('kerangka.index')
@section('content')
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Add Task</h1>

    <form action="#"
      method="POST"class="max-w-sm mx-auto bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
      @csrf
      <div class="mb-4">
        <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Task Name
        </label>
        <input type="text" id="large-input" name="task"
          class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base 
             focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
             dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          required>
      </div>

      <div class="mb-4">
        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Note
        </label>
        <input type="text" id="base-input" name="note"
          class="block w-full p-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
             focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
             dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      </div>

      <div class="mb-4">
        <label for="date-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Select Date
        </label>
        <input type="date" id="date-input" name="date"
          class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs 
           focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
           dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          required>
      </div>

      <div class="mb-4">
        <label for="priority" class="block mb-2 text-gray-900 font-medium dark:text-white text-sm">Priority:</label>
        <select id="priority"
          class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs 
           focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 
           dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          name="priority" required>
          {{-- <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
          <option value="medium" {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>Medium</option>
          <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option> --}}
        </select>
      </div>

      <div class="flex justify-between mt-4">
        <!-- Tombol Simpan -->
        <button type="submit"
          class="w-1/2 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 
                 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-green-500 dark:hover:bg-green-600 
                 dark:focus:ring-green-800">
          Simpan
        </button>

        <!-- Tombol Batal -->
        <button type="button" onclick="window.history.back();"
          class="w-1/2 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-200 
                 font-medium rounded-lg text-sm px-5 py-2.5 ml-2 dark:bg-red-700 dark:text-white 
                 dark:hover:bg-red-600 dark:focus:ring-red-800">
          Batal
        </button>
      </div>

    </form>
  </div>
@endsection
