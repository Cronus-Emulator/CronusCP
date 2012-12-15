<?php
		
	/**
	  * @arquivo: Core.php
	  * @versão: 1.0
	  * @descrição: responsável pelas variáveis e funções usadas pelo sistema
	  */
	  
	class	core
	{
		  
		public
			$set,
			$core;
		
		/**
		  *
		  */
		function	__construct( $config )
		{
			$this->conf = $config;
		}
		/**
		  * @nome: appConfig
		  * @parametros: ()
		  * @retorno: (array)
		  * @descrição: retorna uma array de configurações da aplicação (cp)
		  */
		public	function	appConfig()
		{
			return $this->conf[ 'app' ];
		}
		
		/**
		  * @nome: menuConfig
		  * @parametros: ()
		  * @retorno: (array)
		  * @descrição: retorna uma array de configurações do menu
		  */
		public	function	menuConfig()
		{
			return $this->conf[ 'menu' ];
		}
		
		/**
		  * @nome: mysqlConfig
		  * @parametros: ()
		  * @retorno: (array)
		  * @descrição: retorna uma array de configurações do mysql
		  */
		public	function	mysqlConfig()
		{
			return $this->conf[ 'mysql' ];
		}
		
		/**
		  * @nome: accountConfig
		  * @parametros: ()
		  * @retorno: (array)
		  * @descrição: retorna uma array de configurações das contas
		  */
		public	function	accountConfig()
		{
			return $this->conf[ 'account' ];
		}
		
		/**
		  * @nome: classData
		  * @parametros: ()
		  * @retorno: (array)
		  * @descrição: retorna uma array com as profissões
		  */
		public	function	classData()
		{
			return $this->conf[ 'class' ];
		}
		
		/**
		  * @nome: requireCssFile
		  * @parametros: ( <caminho do arquivo> )
		  * @retorno: void
		  * @descrição: inclui um arquivo css (html)
		  */
		public	function	requireCssFile( $cssfile, $isURL = 0 )
		{
			if( !$isURL )
				$set = "<link href='". STYLES_URL ."/{$cssfile}' rel='stylesheet' type='text/css' />\n";
			else
				$set = "<link href='{$cssfile}' rel='stylesheet' type='text/css' />\n";
			print( $set );
		}
		
		/**
		  * @nome: requireJsFile
		  * @parametros: ( <caminho do arquivo> )
		  * @retorno: void
		  * @descrição: inclui um arquivo javascript (html)
		  */
		public	function	requireJsFile( $jsfile, $isURL = 0 )
		{
			if( !$isURL )
				$set = "<script type='text/javascript' src='js/{$jsfile}'></script>\n";
			else
				$set = "<script type='text/javascript' src='{$jsfile}'></script>\n";
			print( $set );
		}
		
		/**
		  * @nome: setCod
		  * @parametros: ( <codificação> )
		  * @retorno: string
		  * @descrição: troca a codificação da página
		  */
		public	function	setCod( $cod )
		{
			return header( "Content-Type: text/html; charset={$cod}", true );
		}
		  
	}
	
?>