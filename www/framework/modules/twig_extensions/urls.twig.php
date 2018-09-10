<?php

namespace Twig_Extensions;

class Urls_Twig_Extension extends \Twig_Extension {

    protected
        $placeholder;

    public function  getFunctions()
    {
        return array(
            'url' => new \Twig_SimpleFunction('url', array($this, 'url'))
        );
    }
    public function url($args){
        $this->placeholder = $args;

        if( isset($args['alias']) ){
            $alias_name = $args['alias'];
            unset($args['alias']);
        }

        if( isset($args['app']) ){
            $app_name = $args['app'];
            unset($args['app']);
        }

        // Get iurl
        $iurl = array();
        if( isset($app_name) ){
            $iurl = \route::get_urls_web(APPS_DIR. '/' . strtolower($app_name) . '/web.php');
        }else{
            $conf = require BASE_DIR . 'config.php';
            foreach ($conf['apps'] as $app){
                $iurl = array_merge($iurl, require APPS_DIR. '/' . strtolower($app) . '/web.php');
            }
        }
        // Return
        foreach($iurl as $iu){
            if($alias_name == $iu['alias']){
                return $this->convertParam($iu['path']);
            }
        }
    }
    public function convertParam($path){
        return preg_replace_callback('#\{[A-z0-9]+\}#', array($this, 'convertParamCallback'), $path);
    }
    public function convertParamCallback($match){
        $key = str_replace('{', '', str_replace('}','', $match['0']));
        $val = $this->placeholder[$key];
        unset($this->placeholder[$key]);
        return $val;
    }
    public function getName(){
        return 'meUrls';
    }
}