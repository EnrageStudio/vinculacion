<?php

/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 * custom @ymtorres
 */

/**
 * Implements hook_html_head_alter().
 */
function utpl_html_head_alter(&$head_elements) {
    $head_elements['system_meta_content_type']['#attributes'] = array(
        'charset' => 'utf-8'
    );
}

/**
 * Insert themed breadcrumb page navigation at top of the node content.
 */
function utpl_breadcrumb($variables) {
    $breadcrumb = $variables['breadcrumb'];
    if (!empty($breadcrumb)) {
        // Use CSS to hide titile .element-invisible.
        $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
        // Comment below line to hide current page to breadcrumb.
        $breadcrumb[] = drupal_get_title();
        $output .= '<nav class="breadcrumb">' . implode(' / ', $breadcrumb) . '</nav>';
        return $output;
    }
}

/*
 * URL For anclas function works 
 */

function utpl_url_outbound_alter(&$path, &$options, $original_path) {
    if (strpos($path, '#') !== false) {
        $pathExploded = explode('#', $path);
        list($path, $options['fragment']) = $pathExploded;
    }
}

/**
 * Override or insert variables into the page template.
 */
function utpl_preprocess_page(&$vars) {
    if (isset($vars['main_menu'])) {
        $vars['main_menu'] = theme('links__system_main_menu', array(
            'links' => $vars['main_menu'],
            'attributes' => array(
                'class' => array('links', 'main-menu', 'clearfix'),
            ),
            'heading' => array(
                'text' => t('Main menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
            ),
        ));
    } else {
        $vars['main_menu'] = FALSE;
    }
    if (isset($vars['secondary_menu'])) {
        $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
            'links' => $vars['secondary_menu'],
            'attributes' => array(
                'class' => array('links', 'secondary-menu', 'clearfix'),
            ),
            'heading' => array(
                'text' => t('Secondary menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
            ),
        ));
    } else {
        $vars['secondary_menu'] = FALSE;
    }
    if (module_exists('i18n_menu')) {
        $vars['main_menu_tree'] = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
    } else {
        $vars['main_menu_tree'] = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
    }
}

/**
 * Add Google Fonts.
 */
function utpl_preprocess_html(&$variables) {
    drupal_add_css('https://fonts.googleapis.com/css?family=Roboto+Condensed:300,700', array('type' => 'external'));
   drupal_add_css('https://fonts.googleapis.com/css?family=Montserrat:400,700', array('type' => 'external'));
    drupal_add_css('https://fonts.googleapis.com/icon?family=Material+Icons', array('type' => 'external'));
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function utpl_menu_local_tasks(&$variables) {
    $output = '';

    if (!empty($variables['primary'])) {
        $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
        $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
        $variables['primary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['primary']);
    }
    if (!empty($variables['secondary'])) {
        $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
        $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
        $variables['secondary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['secondary']);
    }
    return $output;
}

/**
 * Override or insert variables into the node template.
 */
function utpl_preprocess_node(&$variables) {
    $node = $variables['node'];
    if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
        $variables['classes_array'][] = 'node-full';
    }
}

function utpl_page_alter($page) {
    $viewport = array(
        '#type' => 'html_tag',
        '#tag' => 'meta',
        '#attributes' => array(
            'name' => 'viewport',
            'content' => 'width=device-width'
        ),
    );
    drupal_add_html_head($viewport, 'viewport');
}
