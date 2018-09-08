<?php
function view($name, $arguments = array()){
    $loader = new Twig_Loader_Filesystem(TMP_DIR . ACTIVE_APP);
    $twig = new Twig_Environment($loader, array(
        //'cache' => TWIG_CACHE
    ));
    $template = $twig->load($name.'.twig.html');
    $template->display( $arguments );
}
function url_view($view, $vars = array()){
    return array(
        'view' => $view,
        'vars' => $vars
    );
}