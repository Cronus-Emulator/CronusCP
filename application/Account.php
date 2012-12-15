<?php
		
	/**
	  * @arquivo: Account.php
	  * @versão: 1.0
	  * @descrição: configurações de contas
	  */
	return array(
		// MD5 habilitado ?
		'md5_mode' => true,
		// Liberar a criação de novas contas ?
		'allow_new_account' => true,
		// Número limite de contas
		'max_account' => 0,
		// Nome dos grupos (antigo 'level' na tabela login do mysql)
		'group_id_names' => array(
			0 => 'Jogador',
			1 => 'Jogador VIP',
			2 => 'Game Helper',
			3 => 'Game Master',
			4 => 'GM-Chefe',
			10 => 'Sub-administrador',
			99 => 'Administrador'
		),
		/** CONFIGURAÇÕES SOBRE O REGISTRO */
		// Caracteres mínimos e máximos para o login
		'LoginLength' => array( 4, 23 ),
		// Caracteres mínimos e máximos para a senha
		'PasswordLength' => array( 4, 31 ),
		// Quantas contas por email ?
		'MaxAccountPerEmail' => 1
	);

?>