<?php

class View {

	private $vars 		= array();
	private $pageVars 	= array();
	private $template;

	public function __construct($template, $vars)
	{
		if($vars != null)
		{
			foreach ($vars as $key => $value) 
			{
				$this->pageVars[$key] = $value;
			}
		}
		extract($this->pageVars);
		ob_start();
		require(APP_DIR .'views/'. $template .'.php');
		echo ob_get_clean();
	}	

}
