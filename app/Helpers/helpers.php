<?php

if (! function_exists('capitalize_and_remove_underscore')) {
    function capitalize_and_remove_underscore($string)
    {
        // Remove underscores and capitalize each word
        $string = str_replace('_', ' ', $string);

        return ucwords(strtolower($string));
    }
}
