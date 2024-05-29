<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('find_separator')) {
    function find_separator($file) {
        $fp = fopen($file, "r");
        if ($fp) {
            $first_line = fgetcsv($fp, 0);
            $list_separator = array(',', ';', '-'); 
            $true_separator = null;
            $max_field_number = 0;
            foreach ($list_separator as $separator) {
                $fields = explode($separator, $first_line[0]);
                $number_of_fields = count($fields);  

                if ($number_of_fields > $max_field_number) {
                    $max_field_number = $number_of_fields;
                    $true_separator = $separator;
                }
            }
            fclose($fp);  
            return $true_separator;  
        }
        return null;  
    }
}
