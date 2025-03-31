<?php namespace ProcessWire;

if(!defined("PROCESSWIRE")) die();

/** @var ProcessWire $wire */

/**
 * ProcessWire Bootstrap API Ready
 * ===============================
 * This ready.php file is called during ProcessWire bootstrap initialization process.
 * This occurs after the current page has been determined and the API is fully ready
 * to use, but before the current page has started rendering. This file receives a
 * copy of all ProcessWire API variables.
 *
 */



// Assign Project page-edit permission for Project Members
// https://processwire.com/api/ref/pages/saved/
// Update/create Roles when Project Pages are saved
$this->addHookAfter('Pages::saved', function(HookEvent $event) {

  // Get the object the event occurred on, if needed
  $pages = $event->object;

  // Get values of arguments sent to hook (if needed)
  $page = $event->arguments(0);
  // $changes = $event->arguments(1);
  // $values = $event->arguments(2);

  // Check if page is of template 'project'
  if ("project" == $page->template) {
    //$this->message("Page $page is a Project Page");  // $this->message, $this->error

    // List all Project Members from field 'user_reference'
    if (count($page->user_reference) > 0) {
      foreach($page->user_reference as $u) {
        // Empty Page Array
        $u->editable_pages->removeAll();

        // Find all Projects where $u is a member
        $projects = $pages->find("template=project, user_reference=$u->id");
        foreach($projects as $p) {
          $u->editable_pages->add($p); // Add all User Project Pages to Editable Pages
        }

        // Save User
        $u->save();
        //$this->message("User Editable Pages updated: " . $u->name . ", ". $u->editable_pages);
      }
    }

  }

});
