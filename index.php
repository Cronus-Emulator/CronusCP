<?php

	// Verificação de Instalação
	if( !file_exists( 'application/MySql.php' ) )
	{
		exit( "<a href=\"install\">Instalar CronusCP.</a>" );
	}
	// Sistema trabalhando
	DEFINE( 'IS_RUN', true );
	header( "Content-Type: text/html; charset=utf8", true );
	
	/** 
	  * Configurações
	  */
	require_once( 'application/Application.php' );
	
	/**
	  * Funções do Sistema
	  */
	require_once( FUNCTIONS_URL.'/Core.php' );
	require_once( FUNCTIONS_URL.'/Mysql.php' );
	require_once( FUNCTIONS_URL.'/Recaptchalib.php');
	require_once( FUNCTIONS_URL.'/Stuff.php' );
	  
	// Core.php
	$core = new core( $config );
	// Mysql.php
	$mysql = new mysql( $config[ 'mysql' ] );
	// Stuff.php
	$stuff = new stuff();
	
	// Variáveis do Sistema
	$key = "6LccYdoSAAAAANC-9VnOVIXO7F1XSo9CCYtqcR6s";
	$app = $core->appConfig();
	$menu = $core->menuConfig();
	$class = $core->classData();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	// Arquivos CSS
	$core->requireCssFile( 'padrao.css' );
	$core->requireCssFile( 'tipsy.css' );
	$core->requireCssFile( 'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz', true );
	$core->requireCssFile( 'http://fonts.googleapis.com/css?family=Cagliostro', true );
	$core->requireCssFile( 'http://fonts.googleapis.com/css?family=Balthazar', true );
	// Arquivos JavaScript
	$core->requireJsFile( 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', true );
	$core->requireJsFile( 'tipsy.js' );
?>
<title><?php print( $app[ 'title' ] ) ?></title>
<script>
	$(document).ready(function() {
        /**
		  * jQuery Events
		  */
		<?php
			/**
			  * subMenu PHP Generator
			  * by: Maat
			  */
			foreach( $menu as $indice => $valor )
			{
					if( is_array( $valor ) )
					{
						// Javascript
						print("\t\t$('#menu-{$indice}').click(function(){\n");
						print("\t\t\t$('#list-sub-menu').html('');\n");
						foreach( $valor as $name => $link )
						{
							print("\t\t\t$('#list-sub-menu').append('<li><a href=\"?page={$link}\">{$name}</a></li>');\n");
						}
						print("\t\t\t$('#sub-menu').fadeIn();\n");
						print("\t\t});\n");
					}
			}
		?>
		$('.button-box').tipsy({gravity: 's', fade: true});
		$('.users-online-count').tipsy({gravity: 's', fade: true});
    });
</script>
</head>
<body>
    <!-- MENU -->
    <div id="menu">
      <div class="menuFix">
        <ul id="list-menu">
          <?php
		  	foreach( $menu as $indice => $valor )
			{
				if( is_array( $valor ) )
				{
					print( "\t<li><span class=\"submenu-link\" id=\"menu-{$indice}\">{$indice}</span></a></li>\n" );
				}
				else
				{
					print( "\t<li><a href=\"?page={$valor}\">{$indice}</a></li>\n" );
				}
			}
		  ?>
        </ul>
      </div>
    </div>
    <div id="sub-menu">
        <ul id="list-sub-menu">
          
        </ul>
    </div>
    <!-- --> 
    <!-- HEADER -->
    <div id="header">
      <div id="server-status">
        <div id="j-status" class="status-offline">Servidor de Login:</div>
        <div id="j-status" class="status-offline">Servidor de Char:</div>
        <div id="j-status" class="status-online border-dashed-bottom">Servidor de Map:</div>
        <?php if( $app[ 'user_online_count' ] == true ): ?>
		<div id="users-online">Usuários Online: <a href="?page=whoisonline" class="users-online-count" title="Clique para ver a lista"><?=$stuff->countUsersOnline();?></a></div>
		<?php endif; ?>
      </div>
    </div>
    <!-- -->
    <!-- CONTENT -->
    <div id="content">
      <!-- VISITANT MESSAGE -->
      <div id="yellow-box">
      	<div class="title">Bem-vindo</div>
        <div class="msg">
        	Bem-vindo jogador ! Registre-se no painel e obtenha acesso a todos os módulos. Você poderá se <b>cadastrar</b>, <b>criar contas</b>, <b>alterar
sua senha</b>, <b>resetar sua posição</b> e muito mais!
		</div>
        <div class="button-actions">
        	<a href="?page=registrar"><button class="button-box" id="yellowBox-create" title="Crie uma conta e tenha várias vantagens!">Criar uma Conta</button></a>
            <a href="?page=login"><button class="button-box" id="yellowBox-login" title="Já possui uma conta ? Faça o login.">Efetuar Login</button></a>
        </div>
      </div>
      <!-- -->
      <div id="contentText">
      	<?php
			if( !isset( $_GET[ 'page' ] ) )
			{
				require_once( 'home.php' );
			}
			else
			{
				if( file_exists( $_GET[ 'page' ].'.php' ) && !strstr( $_GET[ 'page' ], '/' ) )
				{
					require_once( $_GET[ 'page' ].'.php' );
				}
				else
				{
					require_once( 'error.php' );
				}
			}
		?>
      </div>
    </div>
	<!-- -->
    <!-- RODAPÉ -->
    <div id="rodape">CronusCP 1.0.0 <br /> Desenvolvido por Matheus</div>
	<!-- -->
</body>
</html>