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


// https://processwire.com/api/ref/pages/saved/

/**
 * Update/create Roles when Project Pages are saved
 *
 */
$this->addHookAfter('Pages::saved', function(HookEvent $event) {

  // Get the object the event occurred on, if needed
  $pages = $event->object;


  // Check if page is of template 'project'

  // An 'after' hook can retrieve and/or modify the return value
  //$return = $event->return;


  // Get values of arguments sent to hook (if needed)
  $page = $event->arguments(0);
  $changes = $event->arguments(1);
  $values = $event->arguments(2);

  $rolePrefix = "role-for-project-";
  if ("project" == $page->template) {
    $this->message("Current Page is Project!");
    $roles = roles();   // get roles
    $roleName = $rolePrefix . $page->id;
    $role = $roles->find("name=$roleName", array('findOne'=>true))[0]; // check if role exists, get first one
    if ($role) {
      $this->message("Found a Role: '$rolePrefix$role'");

    } else { // if role does not exist, make it
      $this->message("Did not find Role, making new one: $roleName");
      $role = $roles->add($roleName);
      $this->message("New Role created: $role");
    }

    // Add Role to each Project Member
    if (count($page->user_reference) > 0) {
      foreach($page->user_reference as $projectMember) {
        $projectMember->addRole($roleName);
        $projectMember->save();
      }
    }

    // Update Role Permission
  }

  // $this->message($page);

  /* Your code here, perhaps modifying the return value */

  // Populate back return value, if you have modified it
  //$event->return = $return;

});
