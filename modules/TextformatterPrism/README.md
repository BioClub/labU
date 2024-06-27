# ProcessWire Prism JS Syntax Highlighter
A module to parse given HTML and syntax-highlight `code` elements using [Prism](http://prismjs.com)
 
## Changelog
+ v2.0.0
    + Improved language parsing logic
    + Prevent 404s from nonexistent files
    + Renamed hookable functions, **update your hooks accordingly**. See below for more information.

## Features
+ Support for [120 languages](http://prismjs.com/#languages-list)
+ Very lightweight, core weights 2KB minified & gzipped.  
+ Customizable. [Specify your own CSS](http://prismjs.com/faq.html#how-do-i-know-which-tokens-i-can-style-for), or use one of [8 default themes](http://prismjs.com/)
+ Hookable. Use hooks to specify your own custom CSS, and JS
+ Plugin support. You can use [all available plugins](http://prismjs.com/#plugins) that come with Prism JS.
  
## Installation
+ Add module to `/site/modules/` and then install.  
  Or go to `Modules > Install > Add New` and use any of the options provided to to install.
+ Create a text/textarea field and pick **Prism Syntax Highlighter** from `Details > Text Formatters`.
  > **Protip:** This module parses HTML markup, so it should come after HTML parsers such as Markdown textformatters.  
  
+ Add `code` elements within the field content with `language-xxxx` classes.
  Or pick a default language from configuration page if you are unable to specify the classes.
  
+ Select any plugins you want. To use some plugins, extra classes are required. See [plugin documentation](http://prismjs.com/#plugins).
+ Install these recommended modules for the best experience:
    + [Parsedown Extra module](http://modules.processwire.com/modules/textformatter-parsedown-extra-plugin/) to render [Markdown Extra](http://parsedown.org/extra/) into HTML. You can also set custom attributes for each element unlike vanilla Markdown.



## Customization
+ Go to module configuration to specify:
+ Auto inclusion of highlighters for parsed languages
+ Default language for inline `code` elements or ones without `language-xxxx` classes.
+ Ability to use minified/non-minified component and parser files
+ Plugins
+ Themes
+ Custom JS and CSS for configuration / theming
+ Ability to use hooks to specify custom CSS and JS
    
## Hooks
Hook into `TextformatterPrism::getCss` and `TextformatterPrism::getJs` in your ready.php file. 
+ `$event->arguments` includes two arguments, first one `$languages` an array of parsed language names, second `$plugins` an array of picked plugin names. To include your own JS/CSS mutate `$event->return`.
 
```php
// specify custom CSS
wire()->addHookAfter('TextformatterPrism::getCss', function (HookEvent $event) {
    $css = $event->return;
    $css[] = '/path/to/custom.css'
    // return an array of urls
    $event->return = $css;
});
```

```php
// Specify custom JS
wire()->addHookAfter('TextformatterPrism::getJs', function (HookEvent $event) {
    $js = $event->return;
    $js[] = '/path/to/custom.js'
    // return an array of urls
    $event->return = $js;
});
```
    
