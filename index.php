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
      <p>All images are licensed under the <a href="https://creativecommons.org/publicdomain/zero/1.0/deed.en">Creative Commons CC0</a>. You can share your pug pictures by sending an email at: victorino.robin@gmail.com</p>
    </div>
    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//analytics.rvictorino.com/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', '3']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <noscript><p><img src="//analytics.rvictorino.com/piwik.php?idsite=3&rec=1" style="border:0;" alt="" /></p></noscript>
    <!-- End Piwik Code -->
  </body>
</html>
