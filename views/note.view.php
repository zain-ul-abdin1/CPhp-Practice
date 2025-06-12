<?php require("partials/navigations.php")?>
<?php require("partials/header.php")?>
<?php require("partials/banner.php")?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
<p>       <?=htmlspecialchars($note["title"])?> </p>
<p><a href="/notes" class="text-blue-500 hover:underline">Go back...</a></p>
  </div>
  </main>
<?php require("partials/footer.php")?>
