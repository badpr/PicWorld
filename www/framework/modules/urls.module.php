<?php

function url($path, $view, $alias){
    return array(
        'path' => $path,
        'view' => $view,
        'alias' => $alias
    );
}
function convertUri($path){
    $rgp = array();
    $rgp[] = '#^';
    $rgp[] = preg_replace_callback('#\{[A-z0-9]+\}#', function($match){
        return '(.+?)';
    }, $path);
    $rgp[] = '/*$#i';
    return join('', $rgp);
}