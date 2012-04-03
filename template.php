<?php

function piratenhagenlsa_calendar_ical_icon($variables) {
  $url = $variables['url'];

  if ($image = theme('image', array('path' => drupal_get_path('theme', 'piratenhagenlsa') .'/images/ical-icon.png', 'alt' => t('Add to calendar'), 'title' => t('Add to calendar')))) {
    return '<div style="text-align:right"><a href="'. check_url($url) .'" class="ical-icon" title="ical">'. $image .'</a></div>';
  }
}

function piratenhagenlsa_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">Sie befinden sich auf: '. implode(' ', $breadcrumb) .'</div>';
  }
}

/* --- NODE/Pager - hatch 2009-12-23 */
function piratenhagenlsa_pager($variables) {
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  if ($pager_total[$element] > 1) {
    $output = '<div class="pager">';
    $output .= theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
    $output .= theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
    /*$output .= theme('pager_list', $limit, $element, ($tags[2] ? $tags[2] : 4 ), '', $parameters);*/
    $output .= "&emsp;";
    $output .= theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
    $output .= theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));
    $output .= '</div><div class="pagerseparator"></div>';
    return $output;
  }
}

/**
 * email-Adressen maskieren
 *
 * sollte bei email-Adressen funktionieren, die nur aus ascii-Zeichen bestehen.
 */
function emailkodieren($strEmail) {
  // per Hand mailto: maskiert
  $strMailto = "&#109;&#097;&#105;&#108;&#116;&#111;&#058;";

  // Schleife, um email-Adresse zu maskieren
  $strEncodedEmail="";
  for ($i=0; $i < strlen($strEmail); $i++) {
     // ord gibt den ascii-Wert des ersten Zeichens eines strings zurueck
     // dieser string ist der substring ab Position $i der email-Adresse
     $strEncodedEmail .= "&#".ord(substr($strEmail,$i)).";";
  }

  return $strEncodedEmail;
}

/*function phptemplate_node_submitted($node) {
  return t('!datetime',
    array(
      '!username' => theme('username', $node),
      '!datetime' => format_date($node->created, 'large'),
    ));
}*/

function piratenhagenlsa_menubarlinks($links, $attributes = array('class' => 'links')) {
  global $language;
  $output = '';

  if (count($links) > 0) {
    //$output = '<div'. drupal_attributes($attributes) .'>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = 'menubutton ' . $key;

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class .= ' first';
      }
      if ($i == $num_links) {
        $class .= ' last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
          && (empty($link['language']) || $link['language']->language == $language->language)) {
        $class .= ' active';
      }
      $output .= '<div'. drupal_attributes(array('class' => $class)) .'>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      else if (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span'. $span_attributes .'>'. $link['title'] .'</span>';
      }

      $i++;
      $output .= "</div>\n";
    }

    $output .= '<div style="clear: both"></div>';

    //$output .= '</div>';
  }

  return $output;
}

/**
* Convert hex colorcode in seperate integers
* @return array An array of the three color integers (red, green, blue)
*/
function piratenhagenlsa_hexrgb($hexstr) {
  $int = hexdec($hexstr);

  return array('r' => 0xFF & ($int >> 0x10),
               'g' => 0xFF & ($int >> 0x8),
               'b' => 0xFF & $int);
}

/**
* Create an image with a given text
* @return string The url to the generated image
*/
function piratenhagenlsa_createblockimage($prefix, $title, $file_name, $posx=23, $posy=32, $ptSize=11.0, $font_name='FreeSans.ttf', $fontbold_name='FreeSansBold.ttf', $color='FFFFFF', $shadowcolor='000000', $shadowopacity=44) {
  global $theme;

  // if title is empty or 'frame' return the frame image
  if (trim($title) == 'frame' || trim($title) == '')
    return '/' . drupal_get_path('theme', $theme) . '/block-no-kopf.png';

  // path to the font directory
  $fontpath = drupal_get_path('theme', 'piratenhagenlsa') . '/fonts/';
  // path to the directory with the block images
  $savepath = variable_get('file_public_path', conf_path() . '/files') . '/' . $theme . '/blockimage/';

  // if directory do not exists: create it
  if (!file_exists($savepath))
    mkdir($savepath, 0777, TRUE);

  // filename to save
  $savefile = $savepath . $prefix . '-' . sha1($title) . '.png';

  // if file exists return the image and do not create it
  if (file_exists($savefile))
    return '/' . $savefile;

  $sBgIm = drupal_get_path('theme', $theme) . '/' . $file_name;

  $pthFt = $fontpath . $font_name;
  $pthFtBd = $fontpath . $fontbold_name;

  // hex to rgb
  $color_rgb = piratenhagenlsa_hexrgb($color);
  $shadowcolor_rgb = piratenhagenlsa_hexrgb($shadowcolor);

  // Create canvas.
  $imgCanvas = imagecreatefrompng($sBgIm);

  // Ready palette.
  $colTextShadow = imagecolorallocatealpha($imgCanvas, $shadowcolor_rgb['r'], $shadowcolor_rgb['g'], $shadowcolor_rgb['b'], $shadowopacity);
  $colText = imagecolorallocatealpha($imgCanvas, $color_rgb['r'], $color_rgb['g'], $color_rgb['b'], 0);

  // Ready strings.
  $sTitle = explode('##', $title, 2);
  $sFirst = strtoupper($sTitle[0]);

  imagettftext($imgCanvas, $ptSize, 0, $posx + 1, $posy + 1, $colTextShadow, $pthFt, $sFirst);
  imagettftext($imgCanvas, $ptSize, 0, $posx, $posy, $colText, $pthFt, $sFirst);

  if (count($sTitle) == 2) {
    $sLast = strtoupper($sTitle[1]);

    $bboxLetter = imagettfbbox($ptSize, 0, $pthFt, $sFirst);
    $startbold = $bboxLetter[2] + 2;

    if (substr($sFirst, 0, 1) != ' ')
      $startbold += 1;

    imagettftext($imgCanvas, $ptSize, 0, $posx + 1 + $startbold, $posy + 1, $colTextShadow, $pthFtBd, $sLast);
    imagettftext($imgCanvas, $ptSize, 0, $posx + $startbold, $posy, $colText, $pthFtBd, $sLast);
  }

  // Finish the job.
  imagepng($imgCanvas, $savefile);
  imagedestroy($imgCanvas);

  return '/' . $savefile;
}
