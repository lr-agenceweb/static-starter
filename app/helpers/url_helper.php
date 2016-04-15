<?php

/* Return site title */
function site_title($page = null) {
  $site_title = (isset($page) && !is_null($page->title)) ? $page->title . ' | ' : '';
  $site_title .= SITE_TITLE;
  return $site_title;
}

/* Return meta image */
function meta_image($page = null) {
  $meta_image = get_base_url();
  $meta_image .= $page->image;
  return $meta_image;
}

/* Check if page has image */
function has_image($page) {
  return $page->image != null;
}

/* Return site base url */
function get_base_url() {
  $url  = isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http';
  $url .= '://' . $_SERVER['SERVER_NAME'];
  $url .= in_array( $_SERVER['SERVER_PORT'], array('80', '443') ) ? '' : ':' . $_SERVER['SERVER_PORT'];
  return $url;
}

/* Return current page url */
function get_current_url() {
  $url = get_base_url();
  $url .= $_SERVER['REQUEST_URI'];
  return $url;
}

/* Return current menu item */
function get_current_menu_item($menu_item, $page) {
  return $menu_item == $page ? 'active' : '';
}