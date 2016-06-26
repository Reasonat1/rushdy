<?php

function rushdi_process_page(&$variables) {
  $menu_item = menu_get_item();
  if ($menu_item['path'] == 'node/%') {
    $node = menu_get_object('node');
    if ($node->type == 'recipes') {
      $variables['title'] = '';
    }
  }
}

function rushdi_preprocess_node(&$variables) {
  $node = $variables['node'];
  $fields = array(
    'recipes' => 'field_new_recipe_type',
    'article' => 'field_article_color_title',
    'product_display' => 'field_product_color_title',
  );

  if (isset($fields[$node->type])) {
    $field_name = $fields[$node->type];
    $term_ref = field_get_items('node', $node, $field_name);
    $name = $term_ref[0]['taxonomy_term']->name;
    $variables['classes_array'][] = drupal_html_class('node-recipe-type-' . $name);
  }
}

