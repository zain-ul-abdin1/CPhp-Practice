<?php require base('views/partials/header.php') ?>
<?php require base('views/partials/navigations.php') ?>
<?php require base('views/partials/banner.php') ?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8"> 
    <ul>
  <?php foreach ($notes as $note): ?>
      <li>
        <a href="/note?id=<?= $note["id"] ?>" class="text-blue-500 hover:underline">
          <?= htmlspecialchars($note["title"]) ?>
        </a>
      </li>
    <?php endforeach; ?>
    </ul>
    <p class="mt-6">
      <a href="/notes/create" class="text-blue-500 hover:underline">Create a note here...</a>
    </p>
  </div>
</main>
<?php require base("views/partials/footer.php") ?>