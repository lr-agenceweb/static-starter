<?php

function truncate_chars($text, $limit = 150, $ellipsis = '...') {
  if( strlen($text) > $limit ) {
    $endpos = strpos(str_replace(array("\r\n", "\r", "\n", "\t"), ' ', $text), ' ', $limit);
  if($endpos !== FALSE)
    $text = trim(substr($text, 0, $endpos)) . $ellipsis;
  }
  return $text;
}

function truncate_words($text, $limit, $ellipsis = '...') {
  $words = preg_split("/[\n\r\t ]+/", $text, $limit + 1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_OFFSET_CAPTURE);
  if (count($words) > $limit) {
    end($words); //ignore last element since it contains the rest of the string
    $last_word = prev($words);
    $text =  substr($text, 0, $last_word[1] + strlen($last_word[0])) . $ellipsis;
  }
  return $text;
}

function strip_tags_and_truncate($text, $limit = 150) {
  $strip = strip_tags($text);
  $strip = str_replace(array("\r", "\n"), '', $strip);
  return truncate_chars($strip, $limit);
}