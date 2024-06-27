<?php namespace Processwire;
/**
 * Created by PhpStorm.
 * User: Abdus
 * Date: 11.01.2017
 * Time: 15:22
 */

class TextformatterPrismConfig extends ModuleConfig
{

    /**
     * Return associative array of property name => default value
     *
     * No need to implement this method in your class if defining the config as an array.
     * If implementing a getInputfields() method then you'll want to implement this one as well
     *
     * @return array of 'fieldName' => 'default value'
     *
     */
    public function getDefaults()
    {
        return [
            'autoInclude' => true,
            'defaultLang' => '',
            'useMinified' => true,
            'theme' => 'prism.css',
            'plugins' => [
                'normalize-whitespace'
            ],
            'customJs' => '',
            'customCss' => ''
        ];
    }

    /**
     * Return an InputfieldWrapper of Inputfields necessary to configure this module
     *
     * Values will be populated to the Inputfields automatically. However, you may also retrieve
     * any of the values from $this->[property]; as needed.
     *
     * Descending classes should call this method at the top of their getInputfields() method.
     *
     * Use this method only if defining Inputfield objects programatically. If definining via
     * an array then you should not implement this method.
     *
     * @return InputfieldWrapper
     *
     */
    public function getInputfields()
    {
        $defaults = $this->getDefaults();

        $fieldList = new InputfieldWrapper();


        /* @var $confSet InputfieldFieldset */
        /* @var $autoInclude InputfieldCheckbox */
        $generalConf = $this->modules->get('InputfieldFieldset');
        $generalConf->label = 'General Options';

        $autoInclude = $this->modules->get('InputfieldCheckbox');
        $autoInclude->name = 'autoInclude';
        $autoInclude->label = 'Auto include';
        $autoInclude->description = 'Deselect this if you dont want to include highlighters for languages parsed from `<code>` classes. Default highlighter will be used otherwise.';
        $autoInclude->set('value', empty($this->autoInclude) ? $defaults['autoInclude'] : $this->autoInclude);
        $autoInclude->columnWidth = 50;
        $generalConf->add($autoInclude);

        /* @var $defaultLang InputfieldSelect */
        $defaultLang = $this->modules->get('InputfieldSelect');
        $defaultLang->name = 'defaultLang';
        $defaultLang->label = 'Default language';
        $defaultLang->description = 'Pick the default language class for `<code>` elements with no language class (such as inline elements)';
        $defaultLang->set('value', empty($this->defaultLang) ? $defaults['defaultLang'] : $this->defaultLang);
        $defaultLang->addOptions($this->getLanguageList());
        $defaultLang->columnWidth = 50;
        $generalConf->add($defaultLang);

        /* @var $minified InputfieldCheckbox */
        $minified = $this->modules->get('InputfieldCheckbox');
        $minified->name = 'useMinified';
        $minified->label = 'Use minified files';
        $minified->description = 'Deselect if you want to use non-minified JS files instead.';
        $minified->set('value', empty($this->useMinified) ? $defaults['useMinified'] : $this->useMinified);
        $minified->columnWidth = 50;
        $generalConf->add($minified);


        /* @var $themeOpts InputfieldRadios */
        $themeOpts = $this->modules->get('InputfieldRadios');
        $themeOpts->label = 'Theme';
        $themeOpts->description = 'Select the theme for highlighing the code';
        $themeOpts->notes = 'Go to [Prism homepage](http://prismjs.com) for preview';
        $themeOpts->optionColumns = 2;
        $themeOpts->collapsed = Inputfield::collapsedBlank;
        $themeOpts->attr('name', 'theme');
        $themeOpts->set('value', empty($this->theme) ? $defaults['theme'] : $this->theme);
        $themeOpts->addOptions($this->getThemeList());
        $generalConf->add($themeOpts);

        $fieldList->add($generalConf);


        /* @var $pluginOpts InputfieldCheckboxes */
        $pluginOpts = $this->modules->get('InputfieldCheckboxes');
        $pluginOpts->label = 'Plugins';
        $pluginOpts->collapsed = Inputfield::collapsedBlank;
        $pluginOpts->description = 'Pick the plugins to include';
        $pluginOpts->notes = 'Go to [Prism Plugins](http://prismjs.com/plugins/#available-plugins) page for details and options';
        $pluginOpts->attr('name', 'plugins');
        $pluginOpts->optionColumns = 2;
        $pluginOpts->set('value', empty($this->plugins) ? $defaults['plugins'] : $this->plugins);
        $pluginOpts->addOptions($this->getPluginList());
        $generalConf->add($pluginOpts);


        /* @var $confSet InputfieldFieldset */
        $confSet = $this->modules->get('InputfieldFieldset');
        $confSet->label = 'Advanced Configuration';
        $confSet->description = "Specify custom JS for configuration or custom CSS for styling.\nYou can use `TextformatterPrism::getJs` and `TextformatterPrism::getCss` hooks to specify (an array of) URLs as well.\nThese hooks will be provided an array of parsed languages and array of selected plugins as arguments. Return an array of urls from these hooks";

        $confJs = $this->modules->get('InputfieldText');
        $confJs->attr('name', 'customJs');
        $confJs->label = 'Custom JS';
        $confJs->description = "Specify URL of js file for plugin configuration if needed.";
        $confJs->notes = 'See [PrismJS Plugins](http://prismjs.com/plugins/#available-plugins) page and [Prism API](http://prismjs.com/extending) for documentation';
        $confJs->collapsed = Inputfield::collapsedBlank;
        $confJs->columnWidth = 50;
        $confSet->add($confJs);

        $confCss = $this->modules->get('InputfieldText');
        $confCss->attr('name', 'customCss');
        $confCss->label = 'Custom CSS';
        $confCss->description = "Specify URL of CSS file for custom theming.";
        $confCss->notes = 'You can study default themes or use [this](http://prismjs.com/faq.html#how-do-i-know-which-tokens-i-can-style-for) as guide to create your own theme or override an existing one';
        $confCss->collapsed = Inputfield::collapsedBlank;
        $confCss->columnWidth = 50;
        $confSet->add($confCss);


        $fieldList->add($confSet);

        return $fieldList;
    }

    private function getLanguageList()
    {
        $languagesPath = dirname(__FILE__) . '/prism/components/';
        $languages = glob($languagesPath . '*.min.js');

        return array_reduce($languages, function ($carry, $lang) {
            $lang = basename($lang);
            preg_match('/prism-(.*).min.js/', $lang, $nameMatch);
            $carry[$nameMatch[1]] = $nameMatch[1];
            return $carry;
        }, []);
    }

    private function getPluginList()
    {
        $pluginsPath = dirname(__FILE__) . '/prism/plugins/';
        $plugins = glob($pluginsPath . '*', GLOB_ONLYDIR);

        return array_reduce($plugins, function ($carry, $plg) {
            $plg = basename($plg);
            $cleanName = ucwords(preg_replace('/\W/', ' ', $plg));
            $carry[$plg] = $cleanName;
            return $carry;
        }, []);
    }

    private function getThemeList()
    {
        $themesPath = dirname(__FILE__) . '/prism/themes/';
        $themes = glob($themesPath . '*.css', GLOB_NOSORT);

        return array_reduce($themes, function ($carry, $thm) {
            $thm = basename($thm);
            $cleanName = $thm === 'prism.css'
                ? 'Default'
                : trim(ucwords(preg_replace('/(\W+|css)/', ' ', $thm)));
            $carry[$thm] = $cleanName;
            return $carry;
        }, []);
    }

}