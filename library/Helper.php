<?php namespace Monogram;


class Helper
{
    public static function jsonTransformer ($json, $separator = null)
    {
        if(null === $separator){
            $separator = "\n";
        }
        $formatted_string = '';

        foreach ( json_decode($json, true) as $key => $value ) {
            $formatted_string .= sprintf("%s = %s%s", str_replace("_", " ", $key), $value, $separator);
        }

        return $formatted_string;
    }

    public static function dateTransformer ($date)
    {
        return date("F j, Y / g:i a", strtotime($date));
    }
}