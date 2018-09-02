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
		$this->prw();
		$this->prc();
	}
	public function prw(){
		foreach ($this->config['apps'] as $iapp) {
			$iurl = require(BASE_DIR . 'apps/' . $iapp . '/web.php');
			foreach ($iurl as $pat => $met) {
				$args = array();
				if( preg_match($pat, $this->uri) ){
					$this->app = array($iapp, array('pat' => $pat, 'met' => $met, 'args' => $args));
					break(2);
				}		
			}
		}
		if($this->app === false){
			exit('App not found');
		}
	}
	public function prc(){
		if( $this->app || is_array($this->app) ){
			require BASE_DIR.'apps/'.$this->app['0'].'/controller.php';
			$cn = $this->app['0'].'Controller';
			$appc = new $cn();
			$this->appc->{$this->app['1']['met']}($this->app['1']['args']);
		}
	}
}