<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

<?php print render($title_prefix); ?>
<?php if (!$page): ?>
<h2<?php print $title_attributes; ?> class="nodeTitle"><a href="<?php print $node_url; ?>" class="nodeTitle"><?php print $title; ?></a></h2>
<?php endif; ?>
<?php print render($title_suffix); ?>

<?php if (theme_get_setting('piratenhagenlsa_printauthors') == 1): ?>
<div style="color: grey; font-size: 8pt;">erstellt von <?php print $name; ?></div>
<?php endif; ?>

  <div class="haupttext">
        <?php hide($content['comments']); ?>
        <?php hide($content['links']); ?>
	<?php print render($content); ?>
	<?php if ($page != 0 && module_exists('creativecommons')) print $node->cc->get_html(); ?>
  </div>

  <?php //if ($page != 0 && module_exists('taxonomy') && $taxonomy): ?>
    <!-- <div class="nodeTags">
      <div style="float: left">Tags:</div>
      <div style="float: left"><?php //print theme('links', taxonomy_link('taxonomy terms', $node), array('class' => 'tags')); ?></div>
      <div style="clear: both;"></div>
    </div> -->
  <?php //endif;?>

  <?php if (/*$links &&*/ (!$sticky || ($sticky && $page != 0))) { ?>
  <div class="nodeLinks">
	<?php if (!empty($content['links']['comment']['#links'])): ?>
          <div class="comment_left"></div>
          <div class="comment_right">
            <?php print render($content['links']['comment']); ?>
          </div>
        <?php endif; ?>

	<?php if (!empty($content['links']['node']['#links'])): ?>
          <div class="readmore">
            <?php print render($content['links']['node']); ?>
          </div>
        <?php endif; ?>

        <?php
          render($content['links']);
        ?>

        <div class="nodeMeta"><?php setlocale(LC_TIME, "de_DE.UTF8"); print strftime('%e.&nbsp;%B %Y', $node->created); ?></div>
        <div style="clear: both"></div>
  </div>

  <?php print render($content['comments']); ?>
<?php }; ?>

</div>
