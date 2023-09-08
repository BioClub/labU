<?php namespace ProcessWire; 

// Template file for pages using the “inventory” template

?>

<article id="content" class="pv5">
  <div class="f1 i pb3">
    Inventory
  </div>
  <div class="f3 mb3">
    <span class="pa1 mr2">All</span>
    <span class="pa1 mr2 bt bl br ">Devices</span>
    <span class="pa1 mr2">Reagents</span>
    <span class="pa1 mr2">Consumables</span>
  </div>
  
  <table class="f5 w-100 center" cellspacing="0">
    <thead>
      <tr>
        <th class="fw6 pa1 bb b--black-20 tl">Name</th>
        <th class="fw6 pa1 bb b--black-20 tl">ID</th>
        <th class="fw6 pa1 bb b--black-20 tl">Owner</th>
      </tr>
    </thead>
    <tbody class="lh-copy">
<?php
// Future Events
$page->children()->each(function($item) {
  $u = $item->user_reference->first();
?>
    
      <tr onclick='window.location="<?=$item->url?>"'>
        <td class="pa1 bb bl b--black-20"><?=$item->title?></td>
        <td class="pa1 bb bl b--black-20"><?=$item->inventory_id?></td>
        <td class="pa1 bb bl br b--black-20"><?=$u->user_display_name?></td>
      </tr>
    

<?php
})
?>
      </tbody>
    </table>
  
  <div id="byline" class="pv5 moon-gray">
    Author: <?php $createdUser = $page->createdUser; echo $createdUser->user_display_name; ?><br />
    Published: <?php echo date('l jS \of F Y h:i:s A', $page->published); ?>, 
    Last Update: <?php echo date('l jS \of F Y h:i:s A', $page->modified); ?>
    <?php if($page->editable()): ?><a href='<?php echo $page->editUrl(); ?>'>Edit</a></p><?php endif; ?>
  </div>
</article>
