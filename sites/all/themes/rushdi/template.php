<?php

function rushdi_process_page(&$variables) {
  $menu_item = menu_get_item();
  if ($menu_item['path'] == 'node/%') {
    $node = menu_get_object('node');
    if ($node->type == 'recipes' or $node->type == 'article' or $node->type == 'product_display') {
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
    'special_pages' => 'field_title_color',
  );

  if (isset($fields[$node->type])) {
    $field_name = $fields[$node->type];
    $term_ref = field_get_items('node', $node, $field_name);
    if ($term_ref) {
      $name = $term_ref[0]['taxonomy_term']->name;
      $variables['title_attributes_array']['class'][] = drupal_html_class($name);
    }
  }
}

function rushdi_preprocess_select_as_links(&$variables) {
  if ($variables['element']['#name'] == 'field_recipe_category_tid') {
    $variables['theme_hook_suggestions'][] = 'select_as_links__recipe_category';
  }
}

function rushdi_select_as_links__recipe_category($vars) {
  $element = $vars['element'];

  $output = '';
  $name = $element['#name'];

  // Collect selected values so we can properly style the links later.
  $selected_options = array();
  if (empty($element['#value'])) {
    if (!empty($element['#default_value'])) {
      $selected_options[] = $element['#default_value'];
    }
  }
  else {
    $selected_options[] = $element['#value'];
  }

  // Add to the selected options specified by Views whatever options are in the
  // URL query string, but only for this filter.
  $urllist = parse_url(request_uri());
  if (isset($urllist['query'])) {
    $query = array();
    parse_str(urldecode($urllist['query']), $query);
    foreach ($query as $key => $value) {
      if ($key != $name) {
        continue;
      }
      if (is_array($value)) {
        // This filter allows multiple selections, so put each one on the
        // selected_options array.
        foreach ($value as $option) {
          $selected_options[] = $option;
        }
      }
      else {
        $selected_options[] = $value;
      }
    }
  }

  // Clean incoming values to prevent XSS attacks.
  if (is_array($element['#value'])) {
    foreach ($element['#value'] as $index => $item) {
      unset($element['#value'][$index]);
      $element['#value'][check_plain($index)] = check_plain($item);
    }
  }
  elseif (is_string($element['#value'])) {
    $element['#value'] = check_plain($element['#value']);
  }
 
  // load terms
  if ($element['#options']) {
    $terms = taxonomy_term_load_multiple(array_keys($element['#options']));
  }
  else {
    $terms = array();
  }
  // Go through each filter option and build the appropriate link or plain text.
  foreach ($element['#options'] as $option => $elem) {
    if (!empty($element['#hidden_options'][$option])) {
      continue;
    }

    $icon = '';
    if (isset($terms[$option])) {
      $icon = field_view_field('taxonomy_term', $terms[$option], 'field_category_icon', array('label' => 'hidden'));
      $icon = drupal_render($icon);
    }

    $element_set = array($option => $icon . $elem);

    $links = array();
    $multiple = !empty($element['#multiple']);

    // If we're in an exposed block, we'll get passed a path to use for the
    // Views results page.
    $path = '';
    if (!empty($element['#bef_path'])) {
      $path = $element['#bef_path'];
    }

    foreach ($element_set as $key => $value) {
      $element_output = '';
      // Custom ID for each link based on the <select>'s original ID.
      $id = drupal_html_id($element['#id'] . '-' . $key);
      $elem = array(
        '#id' => $id,
        '#markup' => '',
        '#type' => 'bef-link',
        '#name' => $id,
      );

      $link_options = array('html' => TRUE);
      // Add "active" class to the currently active filter link.
      if (in_array((string) $key, $selected_options)) {
        $link_options['attributes'] = array('class' => 'active');
      }
      $url = bef_replace_query_string_arg($name, $key, $multiple, FALSE, $path);
      $elem['#children'] = l($value, $url, $link_options);
      $element_output = theme('form_element', array('element' => $elem));

      if (!empty($element['#settings']['combine_param']) && $element['#name'] == $element['#settings']['combine_param'] && !empty($element['#settings']['toggle_links'])) {
        $sort_pair = explode(' ', $key);
        if (count($sort_pair) == 2) {
          // Highlight the link if it is the selected sort_by (can be either
          // asc or desc, it doesn't matter).
         if (strpos($selected_options[0], $sort_pair[0]) === 0) {
            $element_output = str_replace('form-item', 'form-item selected', $element_output);
          }
        }
      }
      $output .= $element_output;

    }
  }

  $properties = array(
    '#description' => isset($element['#bef_description']) ? $element['#bef_description'] : '',
    '#children' => $output,
  );

  $output = '<div class="bef-select-as-links">';
  $output .= theme('form_element', array('element' => $properties));

  // Add attribute that hides the select form element.
  $vars['element']['#attributes']['style'] = 'display: none;';
  $output .= theme('select', array('element' => $vars['element']));
  if (!empty($element['#value'])) {
    if (is_array($element['#value'])) {
      foreach ($element['#value'] as $value) {
        $output .= '<input type="hidden" class="bef-new-value" name="' . $name . '[]" value="' . $value . '" />';
      }
    }
    else {
      $output .= '<input type="hidden" class="bef-new-value" name="' . $name . '" value="' . $element['#value'] . '" />';
    }
  }
  $output .= '</div>';

  return $output;
}


