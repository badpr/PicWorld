<?php
class route
{
    public static
        $urls = array();
    public static function get($path, $view, $alias)
    {
        $urls = array(
        'path' => $path,
        'view' => $view,
        'alias' => $alias
        );
        route::$urls[] = $urls;
    }

    public static function convert_url($path)
    {
        $rgp = array();
        $rgp[] = '#^';
        $rgp[] = preg_replace_callback('#\{[A-z0-9]+\}#', function ($match) {
            return '(.+?)';
        }, $path);
        $rgp[] = '/*$#i';
        return join('', $rgp);
    }
    public static function get_urls_web($path){
        require $path;
        return route::$urls;
    }
}