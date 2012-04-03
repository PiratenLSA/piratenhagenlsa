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
          <?php if ($tabs): print '<div id="tabs-wrapper" class="clearfix">'; endif; ?>
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs pagetitle"' : ' class="pagetitle"') .'>'. $title .'</h2>'; endif; ?>
          <?php if ($tabs): print '<ul class="tabs primary">'. render($tabs) .'</ul></div>'; endif; ?>
          <?php //if ($tabs2): print '<ul class="tabs secondary">'. render($tabs2) .'</ul>'; endif; ?>
          <?php if ($show_messages && $messages): print $messages; endif; ?>
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
          print "<br /><br />";
        }
      ?>

      <span id="serverinfo">
        <a href="https://github.com/christophlsa/piratenhagenlsa">Design</a> von den <a href="http://piraten-hagen.de">Piraten Hagen</a>.
        <br />Angepasst von der <a href="http://www.piraten-lsa.de">Piratenpartei Sachsen-Anhalt</a>.
      </span>
    </div>

    <!-- TagMonitoring -->
