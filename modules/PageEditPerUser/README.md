# Page Edit Per User

## Assign edit access to users on a per-page basis.

### Overview

The user must already have page-edit permission on one of their roles in order to get 
edit access to assigned pages. Otherwise, they will only gain view access.

This module is fully functional as-is, but intended as a proof-of-concept for those 
wanting to go further with adding custom edit and/or view access.

### How to install

1. Copy the PageEditPerUser.module file to /site/modules/
2. Go to Modules in the ProcessWire admin and click "Check for new modules"
3. Click "install" for "Page Edit Per User"

### How to use

1. Create a new role called "editor" (or whatever you want to call it) and give the role "page-edit" permission. If you already have a role in place that you want to use, that is fine too.
2. Under "Access > Users" locate the user you want to assign edit access to. Edit this user. 
3. For this user's "Roles" field: choose the new role you added, "editor".
4. For this user's "Editable Pages" field: select one or more pages you want them to be able to edit.
5. Save the user and you are done. 
6. To test, login as the user you edited to confirm it works how you expect.

