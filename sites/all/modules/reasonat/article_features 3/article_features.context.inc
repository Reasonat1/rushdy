<?php
/**
 * @file
 * article_features.context.inc
 */

/**
 * Implements hook_context_default_contexts().
 */
function article_features_context_default_contexts() {
  $export = array();

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'article';
  $context->description = '';
  $context->tag = '';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'node/325' => 'node/325',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'views-articles_view-block_1' => array(
          'module' => 'views',
          'delta' => 'articles_view-block_1',
          'region' => 'content',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 0;
  $export['article'] = $context;

  return $export;
}
