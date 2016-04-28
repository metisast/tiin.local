<?php

class Helpers
{
    public static function select($options = [], $selected = 1, $first_options = '', $attrs = [])
    {
        return view('_helpers.select')
            ->with('options', $options)
            ->with('selected', $selected)
            ->with('first_options', $first_options)
            ->with('attrs', $attrs);
    }
    public static function script($path = '')
    {
        return "<script src='/js/$path'></script>";
    }
}