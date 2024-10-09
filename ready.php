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
    $templates = templates();
    $projectTemplate = $templates->get("project");
    $this->message("Making new Template: $projectTemplate");
    $newTemplateName = $templatePrefix . $page->id;
    if (!$templates->get($newTemplateName)) {
      $templates->clone($projectTemplate, $newTemplateName);
      $this->message("New Template created: $newTemplateName");
    }

    // Assign current Page to new Template
    $page->template = $newTemplateName;

    // Update Labels of Template
    $enID = languages()->getLanguage("en")->id;
    $page->template->label = "Project: " . $page->title;
    $page->template["label$enID"] = "Project: " . $page->getLanguageValue("en", "title");
    $page->template->save();
    $page->save();

    // Create New Role
  }




  if ("project-template-1037" == $page->template) {
    $this->message("Current Page is Project: " . $page->id);
    $roles = roles();   // get roles
    $roleName = $rolePrefix . $page->id;
    $role = $roles->find("name=$roleName", array('findOne'=>true))[0]; // check if role exists, get first one
    if ($role) {
      $this->message("Found a Role: '$rolePrefix $role'");

    } else { // if role does not exist, make it
      $this->message("Did not find Role, making new one: $roleName");
      $role = $roles->add($roleName);
      $this->message("New Role created: $role");
    }

    // Add Role to each Project Member
    if (count($page->user_reference) > 0) {
      foreach($page->user_reference as $u) {
        $this->message("Adding User $u to Role.");
        $u->addRole($roleName);
        $u->save();
      }
    }

    // Setting Persmissions at Role
    // General "page-edit" checkbox
    $role->addPermission("page-edit");
    $role->save();

    // Checkbox at "Edit Pages"
    $page->template->addPermissionByRole('page-edit', $role);
    $page->template->save();
  }





  // $this->message($page);

  /* Your code here, perhaps modifying the return value */

  // Populate back return value, if you have modified it
  //$event->return = $return;

});
