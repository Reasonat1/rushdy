<div class="<?php print $classes; ?> search-grid">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <div class="left">
    <?php if ($exposed): ?>
    <div class="view-filters">
      <div id="my-location">My location</div>
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>
  <?php if (true): ?>
    <div class="view-header">
      <?php print $header; ?>
      <div id="rushdi-map"> </div>
     
    </div>
  <?php endif; ?>
</div>


  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
     <div class="right">
    <div id="list-title">Location (by distance)</div>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>