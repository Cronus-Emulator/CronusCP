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
		'app' => require_once( 'application/Global.php' ),
		'menu' => require_once( 'application/Menu.php' ),
		'mysql' => require_once( 'application/MySql.php' ),
		'account' => require_once( 'application/Account.php' ),
		'class' => require_once( 'application/Classes.php' )
	);

?>