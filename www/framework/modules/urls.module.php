<?php

function url($path, $view, $alias){
    return array(
        'path' => $path,
        'view' => $view,
        'alias' => $alias
    );
}