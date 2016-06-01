<?php
/**
 * @file
 * bean_blocks.bean.inc
 */

/**
 * Implements hook_bean_admin_ui_types().
 */
function bean_blocks_bean_admin_ui_types() {
  $export = array();

  $bean_type = new stdClass();
  $bean_type->disabled = FALSE; /* Edit this to true to make a default bean_type disabled initially */
  $bean_type->api_version = 5;
  $bean_type->name = 'footer_block';
  $bean_type->label = 'footer block';
  $bean_type->options = '';
  $bean_type->description = '';
  $export['footer_block'] = $bean_type;

  $bean_type = new stdClass();
  $bean_type->disabled = FALSE; /* Edit this to true to make a default bean_type disabled initially */
  $bean_type->api_version = 5;
  $bean_type->name = 'hp_gallery';
  $bean_type->label = 'hp gallery';
  $bean_type->options = '';
  $bean_type->description = '';
  $export['hp_gallery'] = $bean_type;

  $bean_type = new stdClass();
  $bean_type->disabled = FALSE; /* Edit this to true to make a default bean_type disabled initially */
  $bean_type->api_version = 5;
  $bean_type->name = 'social_link_block';
  $bean_type->label = 'social icons';
  $bean_type->options = '';
  $bean_type->description = '';
  $export['social_link_block'] = $bean_type;

  return $export;
}
