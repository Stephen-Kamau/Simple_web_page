<?php
	function new_connection(){
		//Connection variables
		//do connection
		$server='localhost';
		$user='stephen';
		$password='stiveckamash';
		$db = "webapp";
		
		return mysqli_connect($server,$user,$password,$db);
	}
 ?>