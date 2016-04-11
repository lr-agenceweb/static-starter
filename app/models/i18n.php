<?php

namespace App;

class I18N {

  private $locale;
  private $term_separator = ".";

  public function __construct($locale = null) {
    $this->set_locale($locale);
  }

  private function set_locale($locale = null) {
    $locale = is_null($locale) ? DEFAULT_LOCALE : $locale;
    $this->locale = $locale;
  }

  private function get_locale() {
    return $this->locale;
  }

  public function _translate($term) {
    $path = $this->build_file_path();
    $yaml_parsed = \Spyc::YAMLLoad($path);
    return $this->find($term, $yaml_parsed);
  }

  private function find($term, Array $yaml_data) {
    $locale=$this->get_locale();
    if(!empty($yaml_data[$locale])) {
      $yaml_data_last = $yaml_data[$locale];
      $terms = explode($this->term_separator, $term);
      foreach($terms as $keyword) {
        if(empty($yaml_data_last[$keyword]))
          return "Translation missing for {$locale}#{$term}";
        $yaml_data_last = $yaml_data_last[$keyword];
      }
      return $yaml_data_last;
    }
    return "Translation missing for {$locale}";
  }

  private function build_file_path() {
    return DIR_LOCALE . DIRECTORY_SEPARATOR . $this->get_locale() . ".yml";
  }

  public static function translate($term, $locale = null) {
    $i18n = new self($locale);
    return $i18n->_translate($term);
  }

  public static function t($term, $locale = null) {
    return self::translate($term, $locale);
  }
}