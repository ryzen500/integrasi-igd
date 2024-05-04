<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('count_sentences')) {
    function count_sentences($text) {
        return preg_match_all('/[.!?]+/', $text);
    }
}

if ( ! function_exists('get_preview')) {
    function get_preview($text, $limit = 10) {
        // Ensure the text has valid content
        if (empty($text)) {
            return ''; // Return an empty string if no content
        }
    
        // Use preg_match to find up to $limit sentences
        preg_match('/(?:[^.!?]+[.!?]+){1,' . $limit . '}/', $text, $matches);
    
        // Check if any matches were found
        if (!empty($matches) && isset($matches[0])) {
            return $matches[0]; // Return the first matched part
        } else {
            return $text; // Fallback to the original text if no match
        }
    }
    
}
