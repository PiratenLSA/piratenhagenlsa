<?php

function piratenhagenlsa_form_system_theme_settings_alter(&$form, $form_state) {
  $form['piratenhagenlsa_smallbuttons'] = array(
    '#type' => 'checkbox',
    '#title' => t('Benutze kleine Block Köpfe'),
    '#default_value' => theme_get_setting('piratenhagenlsa_smallbuttons'),
  );

  $form['piratenhagenlsa_printauthors'] = array(
    '#type' => 'checkbox',
    '#title' => t('Zeige Autoren an'),
    '#default_value' => theme_get_setting('piratenhagenlsa_printauthors'),
  );

  $form['piratenhagenlsa_alternativestyle'] = array(
    '#type' => 'checkbox',
    '#title' => t('Benutze alternativen Style'),
    '#default_value' => theme_get_setting('piratenhagenlsa_alternativestyle'),
  );
}

?>
