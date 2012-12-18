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
		
		/**
		  * @nome: SessionVar
		  * @parametros: ( <var a ser pega>{,<novo valor>} )
		  * @retorno: void
		  * @descrição: pega o valor ou seta uma variavel de sessão
		  */
		public	function	SessionVar( $a, $b = 0 )
		{
			if( !$b )
			{
				return ( isset( $_SESSION[ $a ] ) ? $_SESSION[ $a ]:0 );
			}
			else
			{
				$_SESSION[ $a ] = $b;
			}
			return;
		}
		/**
		  * @nome: isLoggedIn
		  * @parametros ()
		  * @retorno: boolen
		  * @descrição: retorna true se o usuário estiver logado e false se não.
		  */
		public	function	isLoggedIn()
		{
			return ( isset( $_SESSION[ 'isLoggedIn' ] ) ? $_SESSION[ 'isLoggedIn' ]:0 );
		}
	}

?>