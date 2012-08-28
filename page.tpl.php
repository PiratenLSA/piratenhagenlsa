<?php
  $seclinks = theme('links', array('links' => $secondary_menu, 'attributes' => array('class' => 'menu')));
?>

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
          <?php print piratenhagenlsa_menubarlinks($main_menu, array('class' => 'links-menu')); ?>
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

        <?php if ($page['sidebar_first']): ?>
        <div id="links">
          <div id="sidebarl" class="sidebar">
            <?php print render($page['sidebar_first']); ?>
          </div>
        </div>
        <?php endif; ?>

        <div id="mitte" style="width: <?php print 508 + (!$page['sidebar_first'] ? 198 : 0) + (!$page['sidebar_second'] ? 198 : 0) ?>px">
          <div id="brot">
            <?php print $breadcrumb ?>
          </div>
          <?php if ($page['highlighted']): print '<div id="mission">'. render($page['highlighted']) .'</div>'; endif; ?>

          <?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <h2 class="<?php print $tabs ? 'with-tabs ' : '' ?>pagetitle"><?php print $title ?></h2>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($tabs2); ?>
          <?php print $messages; ?>
          <?php print render($page['help']); ?>
          <?php print render($page['content']); ?>
        </div>

        <?php if ($page['sidebar_second']): ?>
        <div id="rechts">
          <div id="sidebarr" class="sidebar">
            <?php print render($page['sidebar_second']); ?>
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
        if ($page['footer']) {
          print render($page['footer']);
        }
      ?>

      <span id="serverinfo">
        <a href="https://github.com/PiratenLSA/piratenhagenlsa">Design</a> von den <a href="http://piraten-hagen.de">Piraten Hagen</a>.
        <br />Angepasst von der <a href="http://www.piraten-lsa.de">Piratenpartei Sachsen-Anhalt</a>.
      </span>
    </div>

    <!-- TagMonitoring -->
