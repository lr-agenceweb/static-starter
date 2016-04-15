<?php

namespace App;
use samdark\sitemap\Sitemap;
use samdark\sitemap\Index;

class SitemapHelper {

  static function already_generated() {
    return file_exists(public_path . '/sitemap.xml');
  }

  static function create_folders() {
    if (!file_exists(public_path . '/sitemaps')) {
      mkdir(public_path . '/sitemaps');
    }
  }

  static function set_sitemap($pages) {
    $index = new Index(public_path . '/sitemap.xml');

    foreach (AVAILABLE_LOCALES as $locale) {
      $sitemap = new Sitemap(public_path . "/sitemaps/$locale.xml");
      foreach($pages as $page){
        if($page->get('locale') == $locale){
          $sitemap->addItem(SITE_URL . $page->getUrl(), time(), Sitemap::NEVER);
        }
        $sitemap->write();
        $sitemapUrls = $sitemap->getSitemapUrls(SITE_URL . '/sitemaps/');
      }

      foreach ($sitemapUrls as $sitemapUrl) {
        $index->addSitemap($sitemapUrl);
      }
    }

    $index->write();
  }

}
