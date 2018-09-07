<?php
function view($name, $arguments = []){
    $loader = new Twig_Loader_Filesystem(TEMPLATES_DIR);
    $twig = new Twig_Environment($loader, array(
        //'cache' => TWIG_CACHE
    ));
    $template = $twig->load($name.'.twig.html');
    $template->display( $arguments );
}