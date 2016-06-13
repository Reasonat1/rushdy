<?php
/**
 * @file
 * article_features.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function article_features_field_group_info() {
  $field_groups = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_general|node|article|form';
  $field_group->group_name = 'group_general';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'article';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_vertab';
  $field_group->data = array(
    'label' => 'general',
    'weight' => '2',
    'children' => array(
      0 => 'body',
      1 => 'field_image',
      2 => 'field_sharing',
      3 => 'title',
    ),
    'format_type' => 'tab',
    'format_settings' => array(
      'formatter' => 'closed',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-general field-group-tab',
        'required_fields' => 1,
      ),
    ),
  );
  $field_groups['group_general|node|article|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_references|node|article|form';
  $field_group->group_name = 'group_references';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'article';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_vertab';
  $field_group->data = array(
    'label' => 'references',
    'weight' => '4',
    'children' => array(
      0 => 'field_tags',
      1 => 'field_related_articles',
      2 => 'field_refer_to_products',
    ),
    'format_type' => 'tab',
    'format_settings' => array(
      'formatter' => 'closed',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-references field-group-tab',
        'required_fields' => 1,
      ),
    ),
  );
  $field_groups['group_references|node|article|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_vertab|node|article|form';
  $field_group->group_name = 'group_vertab';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'article';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'vtab',
    'weight' => '0',
    'children' => array(
      0 => 'group_general',
      1 => 'group_references',
    ),
    'format_type' => 'tabs',
    'format_settings' => array(
      'formatter' => '',
      'instance_settings' => array(
        'classes' => 'group-vertab field-group-tabs',
        'id' => '',
      ),
    ),
  );
  $field_groups['group_vertab|node|article|form'] = $field_group;

  // Translatables
  // Included for use with string extractors like potx.
  t('general');
  t('references');
  t('vtab');

  return $field_groups;
}
