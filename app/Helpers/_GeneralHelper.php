<?php
use Illuminate\Support\Str;

if (!function_exists('set_full_request_class')) {

    function set_full_request_class($path, $class)
    {
        return call_user_func_array('Request::is', (array) $path) ? $class : '';
    }
}

if (!function_exists('thousandsFormat')) {
    function thousandsFormat($num)
    {

        if ($num > 1000) {

            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('k', 'm', 'b', 't');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= ' ' . $x_parts[$x_count_parts - 1];

            return $x_display;

        }

        return $num;
    }
}

if (!function_exists('split_sentence')) {
    function split_sentence($input, int $len, string $end)
    {
        $str = $input;
        if (strlen($input) > $len) {
            $str = explode("\n", wordwrap($input, $len));
            $str = $str[0] . $end;
        }

        return $str;
    }
}

if (!function_exists('replace_string')) {
    function replace_string(string $string)
    {
        return str_replace("-", " ", $string);
    }
}

if (!function_exists('words')) {
    /**
     * Limit the number of words in a string.
     *
     * @param  string  $value
     * @param  int     $words
     * @param  string  $end
     * @return string
     */
    function words($value, $words = 100, $end = '...')
    {
        return Str::words(html_entity_decode(strip_tags($value)), $words, $end);
    }
}

if (!function_exists('check_even_integer')) {
    function check_even_integer(int $num)
    {
        // if ($num % 2 == 0) {
        //     return true;
        // }

        // return false;

        return ($num % 2 == 0) ? true : false;
    }
}

if (!function_exists('render_conditional_class')) {
    function render_conditional_class($condition, $class, $sub_class)
    {
        return ($condition) ? $class : $sub_class;
    }
}