<div class="item-wrapper row-fluid">
  <div class="description-wrapper span6"><?php print $item->description; ?></div>
  <div class="project-wrapper span2"><?php print $item->clientName . ' : ' . $item->projectName; ?></div>
  <div class="total-time-wrapper span1"><?php print gmdate("H:i:s", $item->total); ?></div>
  <div class="startend-time-wrapper span2"><?php print date('h:i A', $item->created) . '-' . date('h:i A', $item->ended); ?></div>
  <div class="action-wrapper span1">continue</div>
</div>