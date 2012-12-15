<?php

	/**
	  * @arquivo: Mysql.php
	  * @versão: 1.0
	  * @descrição: responsável pelas funções do mysql
	  */
	 
	// Checagem (caso o index.php não carregue as funções corretamente)
	require_once( 'application/functions/Core.php' );
	
	// Classe
	class	mysql	extends	core
	{
		
		private
			$a,
			$b,
			$c;
		
		/**
		  *
		  */
		public	function	__construct( $config )
		{
			$this->db = $config;
		}
		/**
		  * @nome: dbConn
		  * @parametros: ()
		  * @retorno: void
		  * @descrição: s
		  */
		public	function	dbConn( )
		{

			$sql = $this->db;
			$this->conn = mysql_connect( $sql[ 'mysql_host' ], $sql[ 'mysql_user' ], $sql[ 'mysql_pass' ] ) or die( mysql_error() ); 
			$this->conn = mysql_select_db( $sql[ 'mysql_database' ], $this->conn  ) or die( mysql_error() );
			return;
		}
		
		/**
		  * @nome: mysqlQuery
		  * @parametros: ( <query a ser guardada > )
		  * @retorno: (int) -> true/false
		  * @descrição: prepara uma query para ser executada
		  */
		public	function	mysqlQuery( $query )
		{
			$this->query = $query;
		}
		
		/**
		  * @nome: mysqlExecute
		  * @parametros: ( < query a ser executada > ) - parâmetro opcional
		  * @retorno: (int) -> true/false
		  * @descrição: executa uma query
		  */
		public	function	mysqlExecute( $execQuery = 0 )
		{
			
			if( !$execQuery )
			{
				if( isset( $this->query ) )
				{
					$this->query = mysql_query( $this->query ) or die( mysql_error() );
				}
			}
			else
			{
				$this->query = mysql_query( $execQuery ) or die( mysql_error() );
			}
			return $this->query;
			
		}
		
		/**
		  * @nome: mysql_countrows
		  * @parametros: ()
		  * @retorno: (int)
		  * @descrição: retorna a quantidade de tabelas afetadas
		  */
		public	function	mysql_countrows()
		{
			return mysql_num_rows($this->query);
		}
		
		/**
		  * @nome: mysql_fetchassoc
		  * @parametros: ()
		  * @retorno: (int)
		  * @descrição: retorna o resultado do mysql
		  */
		public	function	mysql_fetchassoc()
		{
			$b = mysql_fetch_assoc( $this->query ) or die( mysql_error() );
			return $b;
		}
		
		
	}

?>