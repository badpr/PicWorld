<?php
class newsController extends Controller{
    public function only($args){
        view::render('only', array('id' => $args['1']));
    }
}