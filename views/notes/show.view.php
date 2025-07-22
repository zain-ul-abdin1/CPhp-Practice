<?php require base('views/partials/header.php') ?>
<?php require base('views/partials/navigations.php') ?>
<?php require base('views/partials/banner.php') ?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p><?= htmlspecialchars($note["title"]) ?> </p>
    <p><a href="/notes" class="text-blue-500 hover:underline">Go back...</a></p>
    <form class="mt-6" method="post">
      <input type="hidden" name="id" id=<?=$note["id"]?>>
      <button class="text-s text-red-500">Delete</button>
    </form>
  </div>
</main>
<?php require base("views/partials/footer.php") ?>