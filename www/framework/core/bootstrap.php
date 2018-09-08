<?php
/**
 * Engine
 */
class PcWEng
{
	public 
		$config, // Config
		$uri, // Url current
		$app, // App current
		$appc; // App controller
	public function __construct($config){
		$this->config = $config;
		$this->uri = urldecode(preg_replace('~(?<=\?)p=\d+&|&p=\d+|\?p=\d+$~', '', $_SERVER['REQUEST_URI']));
		$this->app = false;
		$this->appStarting();
		$this->activeApp();
		$this->loadPages();
	}
	public function appStarting(){
		foreach ($this->config['apps'] as $iapp) {
			$iurl = require(BASE_DIR . 'apps/' . $iapp . '/web.php');
			foreach ($iurl as $pat => $met) {
				$args = array();
				if( preg_match($pat, $this->uri, $args) ){
					$this->app = array($iapp, array('pat' => $pat, 'met' => $met, 'args' => $args));
					break(2);
				}		
			}
		}
		if($this->app === false){
			exit('App not found');
		}
	}
	public function activeApp(){
	    define('ACTIVE_APP', $this->app['0']);
}
	public function loadPages(){
		if( $this->app || is_array($this->app) ){
		    if( is_array($this->app['1']['met']) ){
		        view($this->app['1']['met']['view'], $this->app['1']['met']['vars']);
            }else {
		        // Method render
                require BASE_DIR . 'apps/' . $this->app['0'] . '/controller.php';
                $cn = $this->app['0'] . 'Controller';
                $this->appc = new $cn();
                $this->appc->{$this->app['1']['met']}($this->app['1']['args']);
            }
		}
	}
}