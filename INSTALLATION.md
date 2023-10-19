# Installation

Installation Notes for [ProcessWire](https://www.processwire.com).

## Why Processwire?


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


## Resetting Passwords (Hard Way)
https://processwire.com/talk/topic/1736-forgot-backend-password-how-do-you-reset/

>>> You can always reset your password just by pasting this temporarily into any one of your templates, and then viewing a page that uses the template:

```
$u = $users->get('admin'); // or whatever your username is
$u->of(false); 
$u->pass = 'your-new-password';
$u->save();
```

```
$users->get("admin")->of(false)->set('pass', 'yo12345')->save();
```

>>> Passwords are in a table called field_password. They are hashed and salted, and not reversible, so no way to set or change them without going directly through the API.