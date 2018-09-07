<?php
/**
 * Controller of PicWorld
 */
class SmPController extends Controller
{
	public function MainPage($args){
		view('main', array('name' => 'Alex'));
	}
}