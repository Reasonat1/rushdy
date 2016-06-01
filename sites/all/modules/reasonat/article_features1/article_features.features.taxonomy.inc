<?php
/**
 * @file
 * article_features.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function article_features_taxonomy_default_vocabularies() {
  return array(
    'article_tags' => array(
      'name' => 'article tags',
      'machine_name' => 'article_tags',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}
