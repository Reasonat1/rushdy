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
  if ($node->type == 'recipes') {
    $recipe_type = field_get_items('node', $node, 'field_new_recipe_type');
    $name = $recipe_type[0]['taxonomy_term']->name;
    $variables['classes_array'][] = drupal_html_class('node-recipe-type-' . $name);
  }
}

