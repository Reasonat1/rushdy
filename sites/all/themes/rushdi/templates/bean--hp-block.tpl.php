<?php
/**
 * @file
 * Default theme implementation for beans.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) entity label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-{ENTITY_TYPE}
 *   - {ENTITY_TYPE}-{BUNDLE}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>
<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div id="hp-bean-container">
	<div id="hp-bean-container-image">
		<?php print render($content['field_hp_image_main']); ?>
	</div>
	<div id="hp-bean-container-text">
		<div id="top-text">
			<h1 class="hp-bean-title">
			  <?php print $title; ?>
			</h1>
			<div class="hp-bean-slogan">
			  <?php print render($content['field_hp_slogan']); ?>
			</div>
		</div>
		<div id="bottom-text">
			<div class="hp-bean-link1">
			  <?php print render($content['field_hp_link_1']); ?>
			</div>
			<div class="hp-bean-link2">
			  <?php print render($content['field_hp_link_2']); ?>
			</div>
		</div>
	</div>
  </div>
  
</div>