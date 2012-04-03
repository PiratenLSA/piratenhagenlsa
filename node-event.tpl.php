<?php 
$commentzeusch = $node->links['comment_comments'] ? $node->links['comment_comments'] : $node->links['comment_add'];
?>

<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

<?php if ($page == 0): ?>
<?php print render($title_prefix); ?>
<div class="nodeTitle"><a class="nodeTitle" href="<?php print $node_url ?>" title="Diesen Beitrag aufrufen."><?php print $title; ?></a></div>
<?php print render($title_suffix); ?>
<?php endif; ?>

  <div class="haupttext">
    <div><?php print $node->content['body']['#value']; ?></div>
    <div><strong>Datum:</strong><br /><?php print $node->field_date[0]['view']; ?></div><br />
    <div>
      <?php
        if (isset($node->field_noderef[0]['nid']) && !empty($node->field_noderef[0]['nid'])) {
          print '<strong>Referenz:</strong><br />';

          foreach ($node->field_noderef as $ref) {
            print $ref['view'].'<br />';
          }
        }
      ?>
    </div>
  </div>

  <?php //if ($page != 0 && module_exists('taxonomy') && $taxonomy): ?>
    <!-- <div class="nodeTags">
      <div style="float: left">Tags:</div>
      <div style="float: left"><?php //print theme('links', taxonomy_link('taxonomy terms', $node), array('class' => 'tags')); ?></div>
      <div style="clear: both;"></div>
    </div> -->
  <?php //endif;?>

  <?php if ($links && (!$sticky || ($sticky && $page != 0))) { ?>
  <div class="nodeLinks">
        <div class="comment_left"></div>
        <div class="comment_right"><a href="/<?php print $commentzeusch['href']; ?>" title="<?php print $commentzeusch['attributes']['title']; ?>"><?php print $commentzeusch['title']; ?></a></div>
        <?php if (isset($node->links['node_read_more'])) { ?><div class="readmore"><a href="/<?php print $node->links['node_read_more']['href']; ?>" title="<?php print $node->links['node_read_more']['attributes']['title']; ?>"><?php print $node->links['node_read_more']['title']; ?>...</a></div><?php } ?>
        <div class="nodeMeta"><?php setlocale(LC_TIME, "de_DE.UTF8"); print strftime('%e.&nbsp;%B %Y', $node->created); ?></div>
        <div style="clear: both"></div>
  </div>
<?php }; ?>

</div>
