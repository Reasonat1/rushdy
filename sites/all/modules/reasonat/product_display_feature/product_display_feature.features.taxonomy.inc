<?php
/**
 * @file
 * product_display_feature.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function product_display_feature_taxonomy_default_vocabularies() {
  return array(
    'product_categories' => array(
      'name' => 'Product categories',
      'machine_name' => 'product_categories',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}
