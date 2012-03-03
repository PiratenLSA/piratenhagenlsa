<?php
  $seclinks = theme('links', $secondary_links, array('class' => 'menu'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <?php print $scripts; ?>
  </head>

  <body>
    <?php if (trim($seclinks) != ''): ?><div style="height: 6px; background-color: #8b9096;"></div><?php endif; ?>
    <div style="margin: 0 auto; width: 964px">
      <?php if (trim($seclinks) != ''): ?>
      <div id="heimathafen">
        <?php print $seclinks; ?>
      </div>
      <?php endif; ?>

      <?php if (theme_get_setting('piratenhagenlsa_alternativestyle') != 1): ?>
      <div id="oben"><a href="/"><img src="<?php print $logo; ?>" alt="<?php if ($site_name) print $site_name; ?>" title="<?php if ($site_name) print $site_name; ?>" /></a></div>
      <?php endif; ?>

      <div style="clear: both"></div>

      <?php if (theme_get_setting('piratenhagenlsa_alternativestyle') != 1): ?>
      <div id="toplinks">
        <div class="toplinkstext">
          <?php print piratenhagenlsa_menubarlinks($primary_links, array('class' => 'links-menu')); ?>
        </div>
      </div>
      <?php else: ?>
      <div id="toplinks-alt"></div>
      <?php endif; ?>

      <div id="container">
        <?php if (theme_get_setting('piratenhagenlsa_alternativestyle') == 1): ?>
        <div id="con-oben">
          <a href="/"><img src="<?php print $logo; ?>" alt="<?php if ($site_name) print $site_name; ?>" title="<?php if ($site_name) print $site_name; ?>" /></a>
        </div>
        <?php endif; ?>

        <div id="linksaussen">&nbsp;</div>

        <?php if ($left): ?>
        <div id="links">
          <div id="sidebarl">
            <?php print $left ?>
          </div>
        </div>
        <?php endif; ?>

        <div id="mitte" style="width: <?php print 508 + (!$left ? 198 : 0) + (!$right ? 198 : 0) ?>px">
          <div id="brot">
            <?php print $breadcrumb ?>
          </div>
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs pagetitle"' : ' class="pagetitle"') .'>'. $title .'</h2>'; endif; ?>
          <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help ?>
          <?php print $content; ?>
        </div>

        <?php if ($right): ?>
        <div id="rechts">
          <div id="sidebarr">
            <?php print $right ?>
          </div>
        </div>
        <?php endif; ?>

        <div id="rechtsaussen">&nbsp;</div>

        <div class="clr"></div>

      </div>

      <div id="unten"></div>
    </div>

    <div id="fusslinie">
      <?php
        if ($footer) { 
          print $footer;
          print "<br /><br />";
        }
      ?>

      <?php
        if ($footer_message) {
          print $footer_message;
          print "<br /><br />";
        }
      ?>

      <span id="serverinfo">
        <a href="https://github.com/christophlsa/piratenhagenlsa">Design</a> von den <a href="http://piraten-hagen.de">Piraten Hagen</a>.
        <br />Angepasst von der <a href="http://www.piraten-lsa.de">Piratenpartei Sachsen-Anhalt</a>.
      </span>
    </div>

    <!-- TagMonitoring -->

  <?php print $closure ?>
  </body>
</html>
