# Development Notes

- Processwire


## Project Edit access for Project Members

Problem: Give Project Members edit access to their Project Pages, without making them site-wide Editors.

Solution:
- Install the [PageEditPerUser](https://processwire.com/modules/page-edit-per-user/) Module
- `user_reference` field needs to be present at `project` templates
- In `ready.php` add the follwing function:


```
$this->addHookAfter('Pages::saved', function(HookEvent $event) {
  $pages = $event->object;                      // Get the object the event occurred on, if needed
  $page = $event->arguments(0);                 // Get values of arguments sent to hook (if needed)
  if ("project" == $page->template) {           // Check if page is of template 'project'
    if (count($page->user_reference) > 0) {     // List all Project Members
      foreach($page->user_reference as $u) {    // Loop over Users
        $u->editable_pages->removeAll();        // Empty Page Array, so when Members gets removed from Project, permissons will reflect it
        $projects = $pages->find("template=project, user_reference=$u->id"); // Find all Projects where $u is a member
        foreach($projects as $p) {
          $u->editable_pages->add($p);          // Add all User Project Pages to Editable Pages
        }
        $u->save();                             // Save User
        // $this->message("User Editable Pages updated: " . $u->name . ", ". $u->editable_pages);
      }
    }
  }
});
```
