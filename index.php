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
    <link rel="stylesheet" href="/master.css">
  </head>
  <body style="background-image: url('<?php echo getCurrentDayImageURL(); ?>');">
    
  </body>
</html>