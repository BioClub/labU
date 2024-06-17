# Tailwind Installation

#### Installing Tailwind

Using Tailwind CSS with Processwire:

1. Go to `/site/templates`
2. Install [Tailwind CLI](https://tailwindcss.com/docs/installation)
3. `npm install -D tailwindcss`
4. `npx tailwindcss init`

#### Configure Tailwind
- Configure `tailwind.config.js`

## Running & Watching

During development we need to watch for changes in the template files and update the CSS accordingly.

#### Start watching for changes

`cd site/templates/`  
`npx tailwindcss -i ./styles/additional.css -o ./styles/bioclub.css -w`

`-i` ... _--input_, Input file  
`-o` ... _--output_, Output file  
`-w` ... _--watch_, Watch for changes and rebuild as needed

Example output:
```
Rebuilding...
Done in 292ms.
```
The `tailwind.config.js` file is stored at `site/templates/tailwind.config.js`, therefore `tailwindcss` needs to be invoked at `site/templates/`.

`additonal.css` are any _additional_ CSS rules, `bioclub.css` is the output file.

## Building for Production

As a final step in each dev cycle, build and minfy the css.

Build & [Minify](https://tailwindcss.com/docs/optimizing-for-production)

`cd site/templates/`  
`npx tailwindcss -i ./styles/additional.css -o ./styles/bioclub.css --minify`

`-m` ... _--minify_, Minify the output


