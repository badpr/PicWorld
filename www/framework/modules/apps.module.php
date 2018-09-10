<?php
class app {
    static $appname;
    function __construct()
    {
        app::$appname = null;
    }
    public static function set($name = null)
    {
        app::$appname = $name;
    }
    public static function get(){
        return app::$appname;
    }
    public static function getCountry(){
        if( $curl = curl_init() ) {
            $ip = $_SERVER["REMOTE_ADDR"];
            curl_setopt($curl, CURLOPT_URL, 'http://ip-whois.net/ip_geo.php?ip='.$ip);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
            $out = curl_exec($curl);
            $matches = array();
            $country = preg_match_all("/Страна: (.*)/i", $out, $matches);
            curl_close($curl);
            return $country;
        }
    }
}