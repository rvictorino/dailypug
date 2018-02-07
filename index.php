<?php
define('IMAGEPATH', 'img/');

function getCurrentDayImageURL() {
  $currentDayOfTheYear = date("z");
  $images = glob(IMAGEPATH.'*');
  $availableImagesCount = count($images);
  // prevent error modulo 0 if count = 0
  if($availableImagesCount == 0) {
    throw new Exception('No image was found.');
  }
  $imageIndex = $currentDayOfTheYear % $availableImagesCount;
  //TODO change array access to be sure images[x] is always the xth image in the glob list order
  return $images[$imageIndex];
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Daily dose of pugs!</title>
    <link rel="stylesheet" href="master.css">
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
  </head>
  <body style="background-image: url('<?php echo getCurrentDayImageURL(); ?>');">
    <div class="disclaimer">
      <p>All images are licensed under the <a href="https://creativecommons.org/publicdomain/zero/1.0/deed.en">Creative Commons CC0</a>.</p>
      <p>You can share your pug pictures by sending an email at: victorino.robin@gmail.com</p>
    </div>
  </body>
</html>
