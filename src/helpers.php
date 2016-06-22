<?php

if (! function_exists('insert_if_exists')) {
    function insert_if_exists ($insert, $template = null, $match = null) {
        if (!is_null($insert)) { // if item exists
            if (is_array($insert)) { // if more than one item is given
                $ret = ''; // total of all items to return
                foreach ($insert as $in) { // for each item
                    $ret .= insert_if_exists($in, $template, $match); // get the value if it exists
                }
                return $ret; // return total
            }
            if (!is_null($match) && !$match($insert)) { // if a match function is set and item doesn't match
                return ''; // return nothing
            }
            if (!is_null($template)) { // if a template is set
                if (is_callable($template)) { // if the template is a function
                    return $template($insert); // insert value into the function
                }
                return $template; // use the template as a replacement
            }
            return $insert; // else, return the value
        }
        return ''; // if item doesn't exist, return nothing
    }
}