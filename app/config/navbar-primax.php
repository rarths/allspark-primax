<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',
 
    // Here comes the menu strcture
    'items' => [

        // This is a menu item
        'home'  => [
            'text'  => '<i class="fa fa-home fa-fw"></i>&nbsp; Home',
            'url'   => $this->di->get('url')->create(''),
            'title' => 'Hem till Allspark'
        ],
 
        // This is a menu item
        'site-subs'  => [
            'text'  => '<i class="fa fa-diamond"></i>&nbsp; Subs',
            'url'   => null,
            'title' => 'Här samlas alla moduler som tillkommer till projektet under kursens gång',

            // Here we add the submenu, with some menu items, as part of a existing menu item
            'submenu' => [

                'items' => [

                    // This is a menu item of the submenu
                    'item 0'  => [
                        'text'  => '<i class="fa fa-money"></i>&nbsp; Dicegame',
                        'url'   => $this->di->get('url')->create('dicegame'),
                        'title' => 'Dicegame modul from early course'
                    ],

                    // This is a menu item of the submenu
                    'item 1'  => [
                        'text'  => '<i class="fa fa-comments"></i>&nbsp; Comments',
                        'url'   => $this->di->get('url')->create('comment'),
                        'title' => 'Modules for creating comments'
                    ],

                    // This is a menu item of the submenu
                    'item 2'  => [
                        'text'  => '<i class="fa fa-wordpress"></i>&nbsp; Theme',
                        'url'   => $this->di->get('url')->create('theme.php'),
                        'title' => 'Genomgång av olika tekniker gällande LESS'
                    ],
                ],
            ],
        ],
 
        // This is a menu item
        'redovisning' => [
            'text'  =>'<i class="fa fa-info"></i>&nbsp; Presentation',
            'url'   => $this->di->get('url')->create('redovisning'),
            'title' => 'Här samlas alla redovisningstexter under kursen',
        ],

        // This is a menu item
        'source' => [
            'text'  =>'<i class="fa fa-file-code-o"></i>&nbsp; Source',
            'url'   => $this->di->get('url')->create('source'),
            'title' => 'Källkoden för me-sidan'
        ],
    ],
 


    /**
     * Callback tracing the current selected menu item base on scriptname
     *
     */
    'callback' => function ($url) {
        if ($url == $this->di->get('request')->getCurrentUrl(false)) {
            return true;
        }
    },



    /**
     * Callback to check if current page is a decendant of the menuitem, this check applies for those
     * menuitems that has the setting 'mark-if-parent' set to true.
     *
     */
    'is_parent' => function ($parent) {
        $route = $this->di->get('request')->getRoute();
        return !substr_compare($parent, $route, 0, strlen($parent));
    },



   /**
     * Callback to create the url, if needed, else comment out.
     *
     */
   /*
    'create_url' => function ($url) {
        return $this->di->get('url')->create($url);
    },
    */
];
