<?php namespace ProcessWire; 

// Template file for pages using the “inventory” template

?>

<article id="content" class="font-medium">
  <h1 class="mb-8 text-center">
    <?=$page->title?>
  </h1>

  <div class="text-center">
    <span class="bg-gray-200 rounded-full px-2 py-1">All</span>
    <span class="bg-green-200 rounded-full px-2 py-1">Devices</span>
    <span class="bg-red-200 rounded-full px-2 py-1">Reagents</span>
    <span class="bg-yellow-200 rounded-full px-2 py-1">Consumables</span>
  </div>
  
  <table class="border-collapse border border-slate-400 w-100">
    <caption class="caption-top">
      Inventory of BioClub Tokyo Lab
    </caption>
    <thead>
      <tr>
        <th class="border border-slate-300">Name</th>
        <th class="border border-slate-300">ID</th>
        <th class="border border-slate-300">Owner</th>
      </tr>
    </thead>
    <tbody class="">
<?php


$page->children()->each(function($item) {
  $u = $item->user_reference->first();
?>
    
      <tr>
        <td class="border border-slate-300"><a href="<?=$item->url?>"><?=$item->title?></a></td>
        <td class="border border-slate-300"><?=$item->inventory_id?></td>
        <td class="border border-slate-300"><?=$u->user_display_name?></td>
      </tr>
    

<?php
})
?>
      </tbody>
    </table>

</article>
