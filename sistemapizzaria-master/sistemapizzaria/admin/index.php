<?php

	include_once dirname(__DIR__).'/model/urls.php';

	$page_title = "Login de Administrador";
	$panel_title = "Área do Administrador";

	function page_content(){
		echo "Olá Administrador!";

	}


	include_once $project_path.'/view/template.html';





?>