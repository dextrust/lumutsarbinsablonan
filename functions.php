<?php
// Theme Setup
function yourtheme_setup() {
  // Enable support for Post Thumbnails
  add_theme_support('post-thumbnails');

  // Add default posts and comments RSS feed links to head
  add_theme_support('automatic-feed-links');

  // Let WordPress manage the document title
  add_theme_support('title-tag');

  // Enable HTML5 markup support
  add_theme_support('html5', [
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption',
    'style',
    'script'
  ]);

  // Register Navigation Menus
  register_nav_menus([
    'primary' => 'Primary Menu',
    'footer'  => 'Footer Menu'
  ]);
}
add_action('after_setup_theme', 'yourtheme_setup');

// Enqueue Styles and Scripts
function yourtheme_enqueue() {
  // Bootstrap CSS
  wp_enqueue_style(
    'bootstrap-css',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
    [],
    '5.3.0'
  );

  // Custom SCSS (compiled to CSS)
  wp_enqueue_style(
    'yourtheme-style',
    get_template_directory_uri() . '/css/main.css', // Path to compiled CSS
    ['bootstrap-css'], // Dependency on Bootstrap
    filemtime(get_template_directory() . '/css/main.css') // Versioning based on file modification time
  );

  // Bootstrap JS (with Popper.js)
  wp_enqueue_script(
    'bootstrap-js',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
    [], // No dependencies
    '5.3.0',
    true // Load in footer
  );

  // Custom JavaScript
  wp_enqueue_script(
    'yourtheme-scripts',
    get_template_directory_uri() . '/js/scripts.js',
    ['bootstrap-js'], // Dependency on Bootstrap JS
    filemtime(get_template_directory() . '/js/scripts.js'), // Versioning
    true // Load in footer
  );

  // Add comment-reply script for threaded comments
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'yourtheme_enqueue');

// Register Widget Areas
function yourtheme_widgets_init() {
  register_sidebar([
    'name'          => 'Main Sidebar',
    'id'            => 'sidebar-1',
    'description'   => 'Add widgets here.',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ]);
}
add_action('widgets_init', 'yourtheme_widgets_init');