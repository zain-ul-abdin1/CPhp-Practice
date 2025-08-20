<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <div class="flex items-center">
        <div class="shrink-0">
          <img class="size-8" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/index" class="rounded-md <?= isUrl("/index") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
            <?php if ($_SESSION["user"] ?? false) : ?>
              <a href="/notes" class="rounded-md <?= isUrl("/notes") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 text-sm font-medium">Notes</a>
            <?php endif; ?>
            <a href="/about" class="rounded-md <?= isUrl("/about") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 text-sm font-medium">About</a>
            <a href="/contact" class="rounded-md <?= isUrl("/contact") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 text-sm font-medium">Contact Us</a>
          </div>
        </div>
      </div>

      <div class="hidden md:block">
        <div class="ml-4 flex items-center md:ml-6">
          <!-- Notification button -->
          <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
          </button>

          <!-- Profile section -->
          <?php if ($_SESSION["user"] ?? false) : ?>
            <div class="ml-3 flex items-center space-x-3">
              <!-- Profile picture -->
              <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </button>

              <!-- Logout button -->
              <form action="/logout" method="post" class="inline">
                <input type="hidden" name="_method" value="DELETE" />
                <button type="submit" class="flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white transition-colors">
                  Log Out
                </button>
              </form>
            </div>
          <?php else : ?>
            <div class="ml-3 flex items-center space-x-1">
              <a href="/register" class="rounded-md <?= isUrl("/register") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 text-sm font-medium">Register</a>
              <a href="/login" class="rounded-md <?= isUrl("/login") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 text-sm font-medium">Log in</a>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Mobile menu button -->
      <div class="-mr-2 flex md:hidden">
        <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!-- Menu open: "hidden", Menu closed: "block" -->
          <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!-- Menu open: "block", Menu closed: "hidden" -->
          <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="md:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="/index" class="block rounded-md <?= isUrl("/index") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 text-base font-medium">Home</a>
      <a href="/notes" class="block rounded-md <?= isUrl("/notes") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 text-base font-medium">Notes</a>
      <a href="/about" class="block rounded-md <?= isUrl("/about") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 text-base font-medium">About</a>
      <a href="/contact" class="block rounded-md <?= isUrl("/contact") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 text-base font-medium">Contact</a>
    </div>

    <!-- Mobile user section -->
    <?php if ($_SESSION["user"] ?? false) : ?>
      <div class="border-t border-gray-700 pt-4 pb-3">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            <img class="size-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
          </div>
          <div class="ml-3">
            <div class="text-base/5 font-medium text-white"><?= $_SESSION["user"]["email"] ?? "User" ?></div>
          </div>
          <button type="button" class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
          </button>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <form action="/logout" method="post">
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
              Log Out
            </button>
          </form>
        </div>
      </div>
    <?php else : ?>
      <div class="border-t border-gray-700 pt-4 pb-3">
        <div class="space-y-1 px-2">
          <a href="/register" class="block rounded-md <?= isUrl("/register") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 text-base font-medium">Register</a>
          <a href="/login" class="block rounded-md <?= isUrl("/login") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 text-base font-medium">Log in</a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</nav>