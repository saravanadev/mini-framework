<?php

class Session_helper {

	function set_session($key, $val)
	{
		$_SESSION["$key"] = $val;
	}
	
	function get_session($key)
	{
		return $_SESSION["$key"];
	}
	
	function destroy_session()
	{
		session_destroy();
	}

}

?>