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
​
  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
​
      <?php if ($display_submitted): ?>
        <p class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </p>
      <?php endif; ?>
​
      <?php if ($unpublished): ?>
        <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
      <?php endif; ?>
    </header>
  <?php endif; ?>
​
  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
  ?>
​
  <div id="recipe-container">
   <div id="recipe-container-left">
     <div class="recipe-container-left-main-recipe-image">
      <?php print render($content['field_recipe_image']); ?>
     </div>
     <div class="recipe-container-left-sharing-area">
      <?php print render($content['field_sharing_recipe']); ?>
     </div>
     <div class="recipe-container-left-related-product-area">
      <?php
        $my_block = module_invoke('views', 'block_view', 'block-views-product-display-view-block-1');
        print render($my_block['content']); 
      ?>
     </div>
   </div>
   <div id="recipe-container-right">
     <div class="recipe-container-right-node-tiltle">
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
     </div>
     <div class="recipe-conatiner-right-recipe-tags-icons">
      <?php print render($content['field_recipe_category']); ?>
     </div>
     <div class="recipe-container-right-servsnumber">
      <?php print render($content['field_number_of_servs']); ?>
     </div>
     <div class="recipe-container-right-ingredients">
      <?php print render($content['field_ingrideients']); ?>
     </div>
     <div class="recipe-container-right-recipe-tags">
      <?php print render($content['field_new_recipe_tags']); ?>
     </div>
     <div class="recipe-container-right-preperation-steps">
      <?php print render($content['field_preparetion_steps']); ?>
     </div>
​
   </div>
    
  </div>
​
  <?php print render($content['links']); ?>
​
  <?php print render($content['comments']); ?>
​
</article>