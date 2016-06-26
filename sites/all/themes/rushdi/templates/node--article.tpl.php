<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php if ($display_submitted): ?>
        <p class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </p>
      <?php endif; ?>
      <?php if ($unpublished): ?>
        <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
      <?php endif; ?>
    </header>
  <?php endif; ?>
  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
  ?>
  <div id="article-container">
   <div id="article-container-left">
     <div class="article-container-left-image">
      <?php print render($content['field_article_image']); ?>
     </div>
     <div class="article-container-left-sharing-area">
      <?php print render($content['field_sharing']); ?>
     </div>
     <div class="article-container-left-related-product-area">
      <?php
        $my_block = module_invoke('views', 'block_view', 'product_display_view-block_4');
        print render($my_block['content']); 
      ?>
     </div>
   </div>
   <div id="article-container-right">
     <div class="article-container-right-body">
      <?php print render($content['body']); ?>
     </div>
     <div class="article-container-right-article_tags">
      <?php print render($content['field_tags']); ?>
     </div>
   </div>
    
  </div>
  <?php print render($content['links']); ?>
  <?php print render($content['comments']); ?>
</article>
