<?php
class newsController extends Controller{
    public function news($args){
        view('main');
    }
    public function only($args){
        view('only', array('id' => $args['1']));
    }
}