<?php

	include_once 'model/urls.php';
	include_once 'controller/validate.php';
	include_once 'model/dictionary.php';

	$page_title = "Login";
	$panel_title = "Seja bem Vindo";

	//TESTA SE EXISTE SESSÃO
	session_start();

	if(isset($_SESSION['funcionario'])){
		header("location: funcionario.php");
	}




	function page_content(){

		validate_message();

		if(isset($_GET['option']) && $_GET['option'] == "add_user"){
			include_once 'view/forms/add_user.html';
		}else{

		include_once 'view/welcome.html';
		}
	}


	include_once 'view/template.html';





?>