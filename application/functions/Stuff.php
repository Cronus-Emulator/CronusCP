<?php
	
	/**
	  * @arquivo: Stuff.php
	  * @versão: 1.0
	  * @descrição: Funções gerais básicas
	  */
	
	// Checagem (caso o index.php não carregue as funções corretamente)
	require_once( 'application/functions/Mysql.php' );
	
	class	stuff	extends	mysql
	{
	
		/**
		  * sobrepõe a classe mysql
		  */
		function	__construct(){
		
		}
		/**
		  * @nome: countUsersOnline
		  * @parametros: ( )
		  * @retorno: int
		  * @descrição: retorna o número de usuários online
		  */
		public	function	countUsersOnline()
		{
			$sql = $this->mysqlQuery( "SELECT * FROM `char` WHERE `online`='1'" );
			$sql = $this->mysqlExecute();
			$count = $this->mysql_countrows();
			return $count;
		}
	}

?>