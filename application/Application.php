<?php


	/**
	  * @arquivo: Application.php
	  * @versão: 1.0
	  * @descrição: responsável por salvar as configurações em um arquivo
	  */
	  
	/// Definições
	// Pasta de Estilos (css, imagem)
	DEFINE( 'STYLES_URL', 'style' );
	// Pasta de scripts (javascript)
	DEFINE( 'SCRIPTS_URL', 'js' );
	// Pasta de funções
	DEFINE( 'FUNCTIONS_URL', 'application/functions' );
	
	// Configurações
	$config = array(
		'app' => require_once( 'Application/Global.php' ),
		'menu' => require_once( 'Application/Menu.php' ),
		'mysql' => require_once( 'Application/MySql.php' ),
		'account' => require_once( 'Application/Account.php' ),
		'class' => require_once( 'Application/Classes.php' )
	);

?>