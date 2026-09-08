<?php
require_once __DIR__ . '/includes/config.php';
http_response_code(404);
$PAGE_TITLE = 'Page not found — SoloLedge';
$PAGE_DESC  = 'That page could not be found.';
$PAGE_PATH  = '/404';
$PAGE_NOINDEX = true;
require __DIR__ . '/includes/header.php';
?>
<section class="section section--flush">
  <div class="container" style="max-width:560px;text-align:center">
    <h1>Page not found</h1>
    <p class="section__lead">The page you were looking for isn't here.</p>
    <p><a class="btn btn--primary" href="/">Back to home</a></p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
