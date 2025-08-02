<?php require base('views/partials/header.php') ?>
<?php require base('views/partials/navigations.php') ?>
<?php require base('views/partials/banner.php') ?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p><?= htmlspecialchars($note["title"]) ?> </p>
    <p><a href="/notes" class="text-blue-500 hover:underline">Go back...</a></p>
    <footer class="mt-6">
      <a href="/notes/edit?id=<?= $note["id"] ?>" class="inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</a>
    </footer>
    <!-- <form class="mt-6" method="POST" action="/note">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="id" value=<?= $note["id"] ?>>
      <button class="text-s text-red-500">Delete</button>
    </form> -->
  </div>
</main>
<?php require base("views/partials/footer.php") ?>