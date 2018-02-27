<?php
define('IMAGEPATH', 'img/');

header('Content-Type: image/png')

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

readfile(getCurrentDayImageURL());
?>
