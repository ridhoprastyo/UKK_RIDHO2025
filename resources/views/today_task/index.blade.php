@extends('kerangka.index')

@section('content')
  <div class="container mx-auto p-14">
    <h1 class="text-2xl font-bold mb-6">Today Tasks</h1>

    <!-- On Progress Tasks -->
    <div class="mb-6">
      <!-- Header and Add Task Button -->
      <div class="flex items-center justify-between mb-4">
        <a href="{{ route('TodayTask.create') }}" class="flex items-center text-yellow-600 hover:text-yellow-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 16 16" fill="currentColor">
            <path fill-rule="evenodd"
              d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
          </svg>
          <span class="ml-2 text-sm">Add Task</span>
        </a>
      </div>

      <div class="space-y-2">
        @foreach ($tasks->whereIn('status', ['not_done', 'on_progress'])->sortByDesc('priority') as $task)
          <div class="flex items-center justify-between p-3 my-3 bg-white rounded-md shadow-md">
            <div class="flex items-center">
              <!-- Complete Button -->
              <button type="button" onclick="openModal('{{ $task->id }}')"
                class="text-white bg-[#FA812F] hover:bg-[#FAB12F] font-medium rounded-lg text-sm px-2 py-1 mr-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-check" viewBox="0 0 16 16">
                  <path
                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                </svg>
              </button>
              <!-- Task Info -->
              <div>
                <p class="text-gray-800 font-medium text-sm">{{ $task->task }}</p>
                <p class="text-gray-500 text-xs">{{ $task->note }}</p>
                <p class="text-gray-500 text-xs">{{ $task->date }}</p>
              </div>
              <div class="mx-8">
                @switch($task->priority)
                @case('3')
                <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-red-600/10 ring-inset">High</span>
                    @break
                @case('2')
                <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-yellow-600/20 ring-inset">Medium</span>
                    @break
                @default
                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">Low</span>
            @endswitch
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-2">
              <a href="{{ route('TodayTask.edit', [$task->id]) }}" class="text-blue-600 hover:text-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-pencil-fill" viewBox="0 0 16 16">
                  <path
                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                </svg>
              </a>
              <form action="{{ route('Task.destroy', [$task->id]) }}" method="POST" onsubmit="return confirm('Hapus task ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-800">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path
                      d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                  </svg>
                </button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <!-- Done Tasks -->
    <div>
      <h3 class="text-lg font-semibold mb-3">Done</h3>
      <div class="space-y-2">
        @foreach ($tasks->where('status', 'done') as $task)
        <div class="flex items-center justify-between p-3 bg-gray-100 rounded-md shadow-md">
          <div class="flex items-center">
            <button type="button"
              class="text-white bg-[#FA812F] hover:bg-[#FAB12F] font-medium rounded-lg text-sm px-2 py-1 mr-5">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check" viewBox="0 0 16 16" disabled>
                <path
                  d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
              </svg>
            </button>
            <div>
                <p class="text-gray-600 text-sm">{{ $task->task }}</p>
                <p class="text-gray-500 text-xs">{{ $task->note }}</p>
                <p class="text-gray-500 text-xs">{{ $task->date }}</p>
            </div>
          </div>
          <div class="flex space-x-2">
            <a href="#" class="text-blue-600 hover:text-blue-700"></a>
            <form action="{{ route('Task.destroy', [$task->id]) }}" method="POST" onsubmit="return confirm('Hapus task ini?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-600 hover:text-red-800 text-sm">🗑️</button>
            </form>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="modal" class="fixed hidden inset-0 z-50 items-center justify-center">
    <div class="bg-[#FA812F] rounded-lg shadow-lg w-80 p-6 text-center">
      <form id="modalForm" method="POST">
        <div class="mb-4">
            <label for="status" class="block mb-2 text-black-800 font-medium  text-sm">Status:</label>
            <select id="status"
              class="block w-full p-2 text-black border border-black rounded-lg bg-white text-base"
              name="status" required>
              <option value="not_done" {{ old('status') == 'not_done' ? 'selected' : '' }}>Not done</option>
              <option value="on_progress" {{ old('status', 'on_progress') == 'on_progress' ? 'selected' : '' }}>On progress</option>
              <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
            </select>
          </div>
        @csrf
        @method('PATCH')
        <div class="flex justify-center gap-4">
          <button type="button" onclick="closeModal()"
            class="flex-1 px-4 py-2 text-sm text-black rounded bg-red-500 hover:bg-red-600">Batal</button>
          <button type="submit"
            class="flex-1 px-4 py-2 text-sm bg-green-500 text-black rounded hover:bg-green-600">Selesai</button>
        </div>
      </form>
    </div>
  </div>
@endsection

<script>
  function openModal(taskId) {
    const modal = document.getElementById('modal');
    const form = document.getElementById('modalForm');
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    form.action = `/TodayTask/${taskId}/done`;

    modal.classList.remove('hidden');
    window.currentTaskId = taskId;
  }

  function closeModal() {
    document.getElementById('modal').classList.add('hidden');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
    window.currentTaskId = null;
  }
</script>
