<?php
/**
 * Class Name: Bootstrap_5_Nav_Walker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 5 navigation style in a custom theme using the WordPress built-in menu manager.
 * Author: AlexWebLab (based on WP Bootstrap Navwalker by Edward McIntyre)
 * License: GPL-2.0+
 */

class Bootstrap_5_Nav_Walker extends Walker_Nav_Menu {
  /**
   * Starts the list before the elements are added.
   */
  public function start_lvl(&$output, $depth = 0, $args = null) {
    $output .= '<ul class="dropdown-menu">';
  }

  /**
   * Starts the element output.
   */
  public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = 'nav-item';

    if (in_array('menu-item-has-children', $classes)) {
      $classes[] = 'dropdown';
    }

    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

    $output .= '<li' . $class_names . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $item_output = $args->before;
    $item_output .= '<a class="nav-link' . (in_array('menu-item-has-children', $classes) ? ' dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"' : '"') . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }

  /**
   * Ends the element output.
   */
  public function end_el(&$output, $item, $depth = 0, $args = null) {
    $output .= '</li>';
  }

  /**
   * Ends the list of after the elements are added.
   */
  public function end_lvl(&$output, $depth = 0, $args = null) {
    $output .= '</ul>';
  }
}