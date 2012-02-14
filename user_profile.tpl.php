<?php

  if (!function_exists('invisimail')) {
    function invisimail ($emailaddr, $option) {
      return str_replace(array("@", "."), array("[at]", "[dot]"), $emailaddr);
    }
  }

?>
<div class="profile">
  <?php if($account->picture) { ?><img src="/<?php print check_plain($account->picture) ?>" alt="" title="" style="float: right; margin-left: 16px; margin-bottom: 8px" /><?php } ?>
  <?php if($account->profile_name || $account->profile_nick || $account->profile_alter || $account->profile_wohnort || $account->profile_beruf || $account->profile_kinder || $account->profile_interessen || $account->profile_politik) { ?>
  <h3>Allgemein</h3>
  <ul>
    <?php if($account->profile_name) { ?><li><strong>Name:</strong> <?php print check_plain($account->profile_name) ?></li><?php } ?>
    <?php if($account->profile_nick) { ?><li><strong>Nickname:</strong> <?php print check_plain($account->profile_nick) ?></li><?php } ?>
    <?php if($account->profile_alter) { ?><li><strong>Alter:</strong> <?php print check_plain($account->profile_alter) ?></li><?php } ?>
    <?php if($account->profile_wohnort) { ?><li><strong>Wohnort:</strong> <?php print check_plain($account->profile_wohnort) ?></li><?php } ?>
    <?php if($account->profile_beruf) { ?><li><strong>Beruf:</strong> <?php print check_plain($account->profile_beruf) ?></li><?php } ?>
    <?php if($account->profile_kinder) { ?><li><strong>Kinder:</strong> <?php print check_plain($account->profile_kinder) ?></li><?php } ?>	
    <?php if($account->profile_interessen) { ?><li><strong>Interessen:</strong> <?php print check_plain($account->profile_interessen) ?></li><?php } ?>
    <?php if($account->profile_politik) { ?><li><strong>politische Schwerpunkte:</strong> <?php print check_plain($account->profile_politik) ?></li><?php } ?>
  </ul>
  <?php } ?>
  
  <?php if($account->profile_politikfreifeld){?>
  <h3>Politik 2.0</h3>
    <?php print check_markup($account->profile_politikfreifeld) ?>
  <?php } ?>
  
  <?php if($account->profile_mail || $account->profile_icq || $account->profile_msn || $account->profile_jabber || $account->profile_telefon || $account->profile_homepage || $account->profile_blog || $account->profile_myspace || $account->profile_twitter || $account->profile_piratenwiki) { ?>
  <h3>Kontakt</h3>
  <ul>
    <?php if($account->profile_mail) { ?><li><strong>E-Mail:</strong> <?php print invisimail(check_plain($account->profile_mail), 1) ?></li><?php } ?>
    <?php if($account->profile_icq) { ?><li><strong>ICQ:</strong> <?php print check_plain($account->profile_icq) ?></li><?php } ?>
    <?php if($account->profile_msn) { ?><li><strong>MSN:</strong> <?php print invisimail(check_plain($account->profile_msn), 1) ?></li><?php } ?>
    <?php if($account->profile_jabber) { ?><li><strong>Jabber:</strong> <?php print invisimail(check_plain($account->profile_jabber), 1) ?></li><?php } ?>
    <?php if($account->profile_telefon) { ?><li><strong>Telefon:</strong> <?php print check_plain($account->profile_telefon) ?></li><?php } ?>
    <?php if($account->profile_homepage){ ?><li><strong>Homepage:</strong> <a href="<?php print check_url($account->profile_homepage) ?>" target="_blank"><?php print check_url($account->profile_homepage) ?></a></li><?php }?>
    <?php if($account->profile_blog){ ?><li><strong>Blog:</strong> <a href="<?php print check_plain($account->profile_blog) ?>" target="_blank"><?php print check_plain($account->profile_blog) ?></a></li><?php }?>
    <?php if($account->profile_myspace){ ?><li><strong>MySpace:</strong> <a href="http://www.myspace.com/<?php print check_plain($account->profile_myspace) ?>" target="_blank"><?php print check_plain($account->profile_myspace) ?></a></li><?php }?>
    <?php if($account->profile_twitter){ ?><li><strong>Twitter:</strong> <a href="http://twitter.com/<?php print check_plain($account->profile_twitter) ?>" target="_blank">@<?php print check_plain($account->profile_twitter) ?></a></li><?php }?>
    <?php if($account->profile_piratenwiki) { ?><li><strong>Profil in der Piratenwiki:</strong> <a href="http://wiki.piratenpartei.de/Benutzer:<?php print check_plain($account->profile_piratenwiki) ?>" target="_blank"><?php print check_plain($account->profile_piratenwiki) ?></a></li><?php } ?> 
 </ul>
  <?php } ?>
  
  <?php if($account->profile_sonstiges) { ?>
  <h3>Sonstiges</h3>
  <?php print check_markup($account->profile_sonstiges) ?>
  <?php } ?>
</div>
