<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body class="bg-[#FDF7ED] font-[Poppins] flex">

  <!-- Sidebar -->
  <aside
    class="w-64 min-h-screen bg-gradient-to-b from-[#FA812F] to-[#FF9F43] text-black px-6 py-8 fixed top-0 left-0 shadow-lg">
    <div class="flex items-center gap-2 mb-10">
      <h1 class="text-2xl font-bold tracking-wide px-10">To Do App</h1>
    </div>

    <nav>
      <ul class="space-y-4 text-sm font-medium">
        <li>
          <a href="#"
            class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-[#FAB12F]  transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
              class="bi bi-list-task" viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z" />
              <path
                d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z" />
              <path fill-rule="evenodd"
                d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z" />
            </svg>
            All Tasks
          </a>
        </li>
        <li>
          <a href="#"
            class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-[#FAB12F] transition duration-200">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
              <path d="M7.005 3.1a1 1 0 1 1 1.99 0l-.388 6.35a.61.61 0 0 1-1.214 0zM7 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0" />
            </svg>
            Today
          </a>
        </li>
      </ul>
    </nav>
  </aside>
  <!-- End Sidebar -->


  <!-- Main Content -->
  <main class="ml-64 flex-1 p-6 flex flex-col min-h-screen">
    <div class="flex-grow">
      @yield('content')
    </div>

    <!-- Footer -->
    <footer class="mt-auto text-center py-4 bg-[#FA812F] rounded-md text-black">
      <p>&copy;
        <script>
          document.write(new Date().getFullYear());
        </script>, made by Ridho
      </p>
    </footer>
    <!-- End Footer -->
  </main>
  <!-- End Main Content -->

</body>

</html>
