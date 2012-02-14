<?php

/**
* Implementation of THEMEHOOK_settings() function.
*
* @param $saved_settings
*   array An array of saved settings for this theme.
* @return
*   array A form array.
*/
function piratenhagenlsa_settings($saved_settings) {

  $defaults = array(
    'piratenhagenlsa_smallbuttons' => 0,
    'piratenhagenlsa_printauthors' => 0,
    'piratenhagenlsa_alternativestyle' => 0
  );

  $settings = array_merge($defaults, $saved_settings);

  $form['piratenhagen_smallbuttons'] = array(
    '#type' => 'checkbox',
    '#title' => t('Benutze kleine Block Köpfe'),
    '#default_value' => $settings['piratenhagenlsa_smallbuttons'],
  );

  $form['piratenhagenlsa_printauthors'] = array(
    '#type' => 'checkbox',
    '#title' => t('Zeige Autoren an'),
    '#default_value' => $settings['piratenhagenlsa_printauthors'],
  );

  $form['piratenhagenlsa_alternativestyle'] = array(
    '#type' => 'checkbox',
    '#title' => t('Benutze alternativen Style'),
    '#default_value' => $settings['piratenhagenlsa_alternativestyle'],
  );

  return $form;
}


?>
