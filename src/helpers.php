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
            if (!is_null($match)) { // if a match function is set
                if (!$match($insert)) { // if item doesn't match the given function
                    return ''; // return nothing
                }
            }
            if (!is_null($template) && is_callable($template)) { // if a template is set and is a function
                return $template($insert); // insert value into the template
            }
            return $insert; // else, return the value
        }
        if (!is_null($template) && !is_callable($template)) { // if the template variable is not a function
            return $template; // use the template as the default
        }
        return ''; // if item doesn't exist, return nothing
    }
}