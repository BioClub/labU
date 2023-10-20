# Installation

Installation Notes for [ProcessWire](https://www.processwire.com).

## Why ProcessWire?
ProcessWire ticks all the boxes we need from a CMS (or CMF).
- [x] Free and Open Source
- [x] Runs on Apache on a Shared Server
- [x] User Management
- [x] Build-in Custom Fields
- [x] Integrated multi-language


## Tailwind CSS

Using Tailwind CSS with Processwire:

1. Install [Tailwind CLI](https://tailwindcss.com/docs/installation)
2. Watch for changes `npx tailwindcss -i ./styles/main.css -o ./styles/tailwind_output.css --watch`
3. Build & [Minify](https://tailwindcss.com/docs/optimizing-for-production) `npx tailwindcss -i ./styles/main.css -o ./styles/tailwind_output.css --minify`


https://tailwindcss.com/docs/optimizing-for-production

## Prerequisits
- MySQL/MariaDB
- PHP 8?
- Apache


## Templates

In ProcessWire the atomic elements are `fields`, which can be used to assemble `templates`.

### Inventory Template

Fields: 
`title`
`content`
`inventory_id`: TextArea
`images`, image(s) showing inventory item
`user_reference`, owner of inventory item

Template: `inventory`, `inventory_overview`


## ProcessWire: Resetting Passwords
On a production server, resetting via email works.

## ProcessWire: Resetting Passwords (The Hard Way)
On a dev server, email sending is usually not configured, we need to reset the password the _hard_ way. (Well, not really _that_ hard.)
https://processwire.com/talk/topic/1736-forgot-backend-password-how-do-you-reset/

>>> You can always reset your password just by pasting this temporarily into any one of your templates, and then viewing a page that uses the template:

```
$u = $users->get('admin'); // or whatever your username is
$u->of(false); 
$u->pass = 'your-new-password';
$u->save();
```

>>> Passwords are in a table called field_password. They are hashed and salted, and not reversible, so no way to set or change them without going directly through the API.

Ok, interesting & secure. In WP it's possible to change a password - if there is access to the DB.