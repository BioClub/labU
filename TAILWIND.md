# Tailwind Installation

## Installing Tailwind CSS

Using Tailwind CSS with Processwire:

0. Go to `/site/templates`
1. Install [Tailwind CLI](https://tailwindcss.com/docs/installation)
1.1 `npm install -D tailwindcss`
1.2 `npx tailwindcss init`
1.3 Configure `tailwind.config.js`

## Running & Watching

Start watching: 
`npx tailwindcss -i ./styles/main.css -o ./styles/tailwind_output.css --watch`

Example output:
```
Rebuilding...
Done in 292ms.
```


## Building for Production

Build & [Minify](https://tailwindcss.com/docs/optimizing-for-production)

`npx tailwindcss -i ./styles/main.css -o ./styles/tailwind_output.css --minify`



