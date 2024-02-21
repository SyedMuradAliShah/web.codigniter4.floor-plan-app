<?php

/**
 * Here we are rendering header form the template.
 */

echo $header;


/**
 * Here we are rendering navigation form the template.
 */
if ($navigation ?? '')
    echo $navigation;

/**
 * Here we are rendering dashboard navigation form the template.
 */
if ($dashboard_navigation ?? '')
    echo $dashboard_navigation;

/**
 * Here we are rendering navigation form the template.
 */
echo $sidebar ?? '';

/**
 * Here we are rendering the content page.
 */
echo $content_page;


/**
 * Here we are rendering footer form the template.
 */
echo $footer;
