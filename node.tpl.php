<?php
$commentzeusch = '';//$node->links['comment_comments'] ? $node->links['comment_comments'] : $node->links['comment_add'];
?>

<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

<?php if ($page == 0): ?>
<?php print render($title_prefix); ?>
<div class="nodeTitle"><a class="nodeTitle" href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title; ?></a></div>
<?php print render($title_suffix); ?>
<?php endif; ?>
<?php if (theme_get_setting('piratenhagenlsa_printauthors') == 1): ?>
<div style="color: grey; font-size: 8pt;">erstellt von <?php print $name; ?></div>
<?php endif; ?>

  <div class="haupttext">
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
	<div class="comment_left"></div>
	<div class="comment_right">
		<?php if (isset($commentzeusch) && !empty($commentzeusch)): ?>
		<a href="/<?php print $commentzeusch['href']; ?>" title="<?php print $commentzeusch['attributes']['title']; ?>">
			<?php print $commentzeusch['title'];?>
		</a>
		<?php
		else:
		print t('Kommentare deaktiviert');
		endif; ?>
	</div>

	<?php if (isset($node->links['node_read_more'])): ?>
        <div class="readmore"><a href="/<?php print $node->links['node_read_more']['href']; ?>" title="<?php print $node->links['node_read_more']['attributes']['title']; ?>"><?php print $node->links['node_read_more']['title']; ?>...</a></div>
        <?php endif; ?>

        <?php if (module_exists('creativecommons') && $node->cc && $node->cc->is_available()): ?>
        <div class="nodeCC"><a href="<?php print $node->cc->uri; ?>" rel="license" title="<?php print $node->cc->get_name('full'); ?>"><?php print $node->cc->get_image('tiny_icons'); ?></a></div>
        <?php endif; ?>

        <?php
          if (module_exists('flattr')) {
            $account = user_load($node->uid);
            if (user_access('use flattr', $account) && $account->flattr['uid']) {
              print theme('flattr_button', array('node' => $node, 'account' => $account));
            }
          }
        ?>

        <div class="nodeMeta"><?php setlocale(LC_TIME, "de_DE.UTF8"); print strftime('%e.&nbsp;%B %Y', $node->created); ?></div>
        <div style="clear: both"></div>
  </div>
<?php }; ?>

</div>
