<?php

class Main extends Controller {

	function index()
	{
		$header['title'] 	= 'Mini Framework';
		$main['welcome']   	= 'Mini Framework';
		$this->loadView('header', 	$header);
		$this->loadView('main', 	$main);
		$this->loadView('footer');
	}

}

?>
