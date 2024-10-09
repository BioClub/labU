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
  $templatePrefix = "project-template-";

  // If page template is project, clone template
  if ("project" == $page->template) {
    $t = templates();
    //$newTemplate = $t->get("project");
    $newTemplate = $page->template;
    $this->message("Making new Template: $newTemplate");
    $name = $templatePrefix . $page->id;
    if (!$t->get($name)) {
      $t->clone($newTemplate, $name);

      // Assign current Page to new Template
      $page->template = $name;

      // Add 'Alternate Template Filename'. New Projects should refer to 'project.php'
      $page->template->altFilename = "project"; // Template file extension is assumed to be: .php

      // Update Labels of Template
      $enID = languages()->getLanguage("en")->id;
      $page->template->label = "Project: " . $page->title;
      $page->template["label$enID"] = "Project: " . $page->getLanguageValue("en", "title");
      $page->template->save();
      $page->save();

      $this->message("New Template created: ". $page->template["label$enID"]);

      // Roles
      $roles = roles();
      $roleName = $rolePrefix . $page->id;
      $role = $roles->find("name=$roleName", array('findOne'=>true))[0]; // check if role exists, get first one
      if ($role) {
        $this->message("Found a Role: '$rolePrefix $role'");

      } else { // if role does not exist, make it
        $this->message("Making new Role: $roleName");
        $role = $roles->add($roleName);
        $this->message("New Role created: $role");
      }

      // Setting Persmissions at Role
      // General "page-edit" checkbox
      $role->addPermission("page-edit");
      $role->save();
      // Checkbox at "Edit Pages"
      $page->template->addPermissionByRole('page-edit', $role);
      $page->template->save();

      // Add Role to each Project Member
      if (count($page->user_reference) > 0) {
        foreach($page->user_reference as $u) {
          $this->message("Adding User $u->name to role $roleName");
          $u->addRole($roleName);
          $u->save();
        }
      }

    }
  }

  if (substr($page->template, 0, strlen($templatePrefix)) == $templatePrefix) {
    // Update Users for Role when Project is saved.

    $roleName = $rolePrefix . $page->id;

    // Remove Role from All Users. case: when a project removes a user
    $users = users();
    foreach($users as $u) {
      $u->removeRole($roleName);
      $u->save();
    }

    // Add Role to each Project Member
    if (count($page->user_reference) > 0) {
      foreach($page->user_reference as $u) {
        $this->message("Adding User $u->name to $roleName.");
        $u->addRole($roleName);
        $u->save();
      }
    }
  }

  // $this->message($page);

  /* Your code here, perhaps modifying the return value */

  // Populate back return value, if you have modified it
  //$event->return = $return;

});
