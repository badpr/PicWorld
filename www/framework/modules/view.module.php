<?php
function view($name, $arguments = array()){
    $loader = new Twig_Loader_Filesystem(TMP_DIR . ACTIVE_APP);
    $twig = new Twig_Environment($loader, array(
        //'cache' => TWIG_CACHE
    ));
    // Twig extensions
    // Connect modules
    $exts = glob( TWIG_EXT . '*.twig.php' );
    foreach ($exts as $ext) {
        require $ext;
        $extension = '\\Twig_Extensions\\' . ucfirst(strtolower(str_replace('.twig.php', '', basename($ext)))) . '_Twig_Extension';
        $twig->addExtension( new $extension() );
    }
    view_extend_vars($arguments);
    $template = $twig->load($name.'.twig.html');
    $template->display( $arguments );
}
function url_view($view, $vars = array()){
    view_extend_vars($vars);
    return array(
        'view' => $view,
        'vars' => $vars
    );
}
function view_extend_vars(&$vars){
    $vars['app']['config'] = require CONF_PATH;
    foreach ($vars['app']['config']['apps'] as $app){
        $twig_app_extend = BASE_DIR . '/apps/' . $app . '/twig.php';
        if( file_exists($twig_app_extend) ){
            $vars['apps'][$app] = require $twig_app_extend;
        }
    }
}