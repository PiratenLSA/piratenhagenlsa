<?php
  // $title, $file_name, $posx=23, $posy=32, $size=11.0, $font_name='FreeSans.ttf', $fontbold_name='FreeSansBold.ttf', ......

  if (theme_get_setting('piratenhagenlsa_smallbuttons') == 1) {
    $blockimage = piratenhagenlsa_createblockimage('small', $block->subject, 'button-klein.png', 23, 26, 10.0);
    $blockheight = 36;
  } else {
    $blockimage = piratenhagenlsa_createblockimage('big', $block->subject, 'button.png', 23, 32, 10.5);
    $blockheight = 52;
  }
?>

<div class="block block-<?php print $block->module; ?>" id="block-<?php print $block->module; ?>-<?php print $block->delta; ?>">
  <?php
    /* kein Kopf bei Teaser */
    if ( substr( $block->delta, 0, 6 ) != 'Teaser' ) {
      $isframe = !$block->subject || $block->subject == 'frame';
  ?>
  <div class="blockkopf<?php if ($isframe) print " frame"; ?>" style="background-image: url(<?php print $blockimage; ?>); <?php if (!$isframe): ?>height: <?php print $blockheight; ?>px<?php endif; ?>" title="<?php echo str_replace("##", "", $block->subject); ?>"></div>
  <?php
    }
  ?>

  <div class="blockinhalt">
  <?php
    /* --- MORE-LINK FILTERING - hatch 2009-11-17 */
    $more = ( strpos( strval( $content ), "more-link" ) > 0 );
    preg_match( '#<div class=[\'"]?more-link[\'"]?><a href="([^"]*)"(?:[^>]*title="([^"]*)"[^>]*|)>[^<]*</a></div>#', $content, $my_more_link );
    print preg_replace('#<div class=[\'"]more-link[\'"].*?</div>#', '', $content );
  ?>
  </div>

  <?php
    /* kein fuss bei Teaser */
    if (substr($block->delta, 0, 6 ) != 'Teaser') {
  ?>
  <!--<div class="blockfuss <?php print !$more ? 'no-' : '' ?>more-link">-->
  <div class="blockfuss<?php print !$more ? ' no-more-link' : '' ?>">

  <?php
      $link = 'Weiter';
      $title = 'Mehr lesen.';
    }
  ?>

  <?php if ($more) { ?>
    <!--<a href="<?php print $my_more_link[1]; ?>" title="<?php print $title; ?>"><?php print $link; ?></a>
  </div>
  <div class="blockfuss2">-->
  <?php } ?>
  </div>
</div>
