<?php

namespace App\Libraries;

use App\Libraries\Options; // Loading Options Library

/**
 * This is this library for template view for CodeIgniter 4.
 *  
 * @author  Syed Murad Ali Shah
 * @version 1.0
 * 
 * @license MIT 
 * @link    https://github.com/SyedMuradAliShah/codeigniter4-template-library
 *
 */



class Template
{
    private static $template_data = [];

    // $uri->getSegment(1) == 'ukbookride';

    /**
     * This function will use to set template data.
     * 
     * @param mixed $name this will be the name of the variable which will show in view template.
     * @param mixed $value this will be the return value from the view, passed to variable $view.
     * @return void 
     */
    private static function _set($name, $value)
    {
        self::$template_data[$name] = $value;
    }


    /**
     * @param mixed $folder_name it will be the folder name where you have your template.
     * @param mixed $view it will be the view file under your folder/pages/.
     * @param array $view_data it will be the data which will be passed to the view.
     * @return string
     */

    private static function _load($folder_name, mixed $view = '', array $view_data = [])
    {
        $option = new Options(); // Loading Options Library
        $option->load(); // Loading Options

        $view_data['option'] = $option->key;

        $view_data['uri'] = service('uri');
        $view_data['session'] = session();

        $view_data['shopping_cart'] = \Config\Services::cart();

        $view_data['request'] = \Config\Services::request();

        self::_set('header', view("{$folder_name}/layout/header", $view_data));
        self::_set('navigation', view("{$folder_name}/layout/navigation", $view_data));
        self::_set('content_page', view("{$folder_name}/pages/{$view}", $view_data));
        self::_set('footer', view("{$folder_name}/layout/footer", $view_data));
        return view("template", self::$template_data);
    }

    /**
     * @param mixed $folder_name it will be the folder name where you have your template.
     * @param mixed $view it will be the view file under your folder/pages/.
     * @param array $view_data it will be the data which will be passed to the view.
     * @return string
     */

    private static function _dashboard_load($folder_name, mixed $view = '', array $view_data = [])
    {
        $option = new Options(); // Loading Options Library
        $option->load(); // Loading Options

        $view_data['option'] = $option->key;

        $view_data['uri'] = service('uri');
        $view_data['session'] = session();

        $view_data['shopping_cart'] = \Config\Services::cart();

        $view_data['request'] = \Config\Services::request();

        self::_set('header', view("{$folder_name}/layout/header", $view_data));
        self::_set('dashboard_navigation', view("{$folder_name}/layout/dashboard_navigation", $view_data));
        self::_set('content_page', view("{$folder_name}/pages/dashboard/{$view}", $view_data));
        self::_set('footer', view("{$folder_name}/layout/footer", $view_data));
        return view("template", self::$template_data);
    }


    /**
     * @param mixed $folder_name it will be the folder name where you have your template.
     * @param mixed $view it will be the view file under your folder/pages/.
     * @param array $view_data it will be the data which will be passed to the view.
     * @return string
     */

    private static function _admin_load($folder_name, mixed $view = '', array $view_data = [])
    {
        $option = new Options(); // Loading Options Library
        $option->load(); // Loading Options

        $view_data['option'] = $option->key;

        $view_data['uri'] = service('uri');
        $view_data['session'] = session();

        $view_data['request'] = \Config\Services::request();

        self::_set('header', view("{$folder_name}/layout/header", $view_data));
        self::_set('navigation', view("{$folder_name}/layout/navbar", $view_data));
        self::_set('sidebar', view("{$folder_name}/layout/sidebar", $view_data));
        self::_set('content_page', view("{$folder_name}/pages/{$view}", $view_data));
        self::_set('footer', view("{$folder_name}/layout/footer", $view_data));
        return view("template", self::$template_data);
    }

    /**
     * This function will use to load template.
     * 
     * @param mixed $view this will be the view file name.
     * @param array $view_data this will be the data you want to pass to the view.
     * @param mixed $folder_name it will be the folder name where you have your template.
     * @return string 
     */

    public static function Home(mixed $view = '', array $view_data = [], $folder_name = 'home')
    {
        return self::_load($folder_name, $view, $view_data);
    }

    /**
     * This function will use to load template.
     * 
     * @param mixed $view this will be the view file name.
     * @param array $view_data this will be the data you want to pass to the view.
     * @param mixed $folder_name it will be the folder name where you have your template.
     * @return string 
     */

    public static function Dashboard(mixed $view = '', array $view_data = [], $folder_name = 'home')
    {
        return self::_dashboard_load($folder_name, $view, $view_data);
    }

    /**
     * This function will use to load template.
     * 
     * @param mixed $view this will be the view file name.
     * @param array $view_data this will be the data you want to pass to the view.
     * @param mixed $folder_name it will be the folder name where you have your template.
     * @return string 
     */

    public static function Admin(mixed $view = '', array $view_data = [], $folder_name = 'admin')
    {
        return self::_admin_load($folder_name, $view, $view_data);
    }
}
