<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instalação CronusCP</title>
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css' />
<style>
body 
{
	font-family: arial;
	font-size: 11px;
	color: #305A9A;
}
table {
	font-size: 12px;
	-webkit-box-shadow: 0px 0px 10px #efefef;
	-moz-box-shadow: 0px 0px 10px #efefef;
	box-shadow: 0px 0px 10px #efefef;
	margin-top: 5px;
	border: 1px solid #ccc;
}
span 
{
	font-family: 'Yanone Kaffeesatz', sans-serif;
	font-weight: 0;
	font-size: 19px;
	letter-spacing: 1px;
}
span b 
{
	color: #666;
}
form input
{
	outline: none;
}
form input[type="text"], input[type="password"] 
{
	color:#999;
	padding-left: 5px;
	padding-right: 5px;
	height: 28px;
	border: 1px solid #ccc;
	transition: 0.3s;
	-moz-transition: 0.3s;
	-webkit-transition: 0.3s;
}
form input[type="text"]:focus, input[type="password"]:focus
{
	color:#333;
	border: 1px solid #0CF;
	-webkit-box-shadow: 0px 0px 5px #B3D9FF
}
.clean-button
{
	padding: 6px;
	padding-left: 15px;
	padding-right: 15px;
	background: #eee;
	color: #666;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
	cursor: pointer;
	border: 1px solid #ccc;
	-webkit-box-shadow: 1px 1px 0px #fff inset;
	margin: 3px;
	text-shadow: 1px 1px 0px #fff;
	margin-right: 2px;
	margin-top: 3px;
}
.clean-button:hover {
	background: #F4F4F4;
}
</style>
<body>
<?php

	/**
	  * @arquivo: Index.php
	  * @versão: 1.0
	  * @descrição: responsável pela instalação do sistema (mysql)
	  */
	if( $_POST ):
	
		$connect = @mysql_connect( $_POST[ 'host' ], $_POST[ 'usuario' ], $_POST[ 'senha' ] )
			or die( "<span>Houve um erro ao se comunicar com o banco de dados. Aperte em voltar e tente novamente.</span>" );
		$select_db = @mysql_select_db( $_POST[ 'database' ], $connect )
			or die( "<span>Houve um erro ao selecionar a database. Aperte em voltar e tente novamente.</span>" );
		$buffer = "<?php
		
		/**
		  * @arquivo: MySql.php
		  * @versão: 1.0
		  * @descrição: configurações do mysql
		  */
		
		return array(
		\t// Host MySQL
		\t'mysql_host' => '{$_POST[ 'host' ]}',
		\t// Usuário MySQL
		\t'mysql_user' => '{$_POST[ 'usuario' ] }',
		\t// Senha do MySQL
		\t'mysql_pass' => '{$_POST[ 'senha' ]}',
		\t// Database do Ragnarök
		\t'mysql_database' => '{$_POST[ 'database' ] }'
		);
		
?>";
		
		// Create a file
		$e = fopen ("../application/MySql.php", "w") or die("<span>Falha ao criar arquivo de configuração, confira as permissões.</span>");
		// Write
		fwrite($e, $buffer);
		// Close
		fclose($e);
		// Sucess
		print( "<span>CronusCP instalado com sucesso!</span>" );
	elseif( file_exists('../application/MySql.php' ) ):
		exit( '<span>CronusCP já foi instalado.</span>' );
	else:
?>
<center><span><b>CronusCP</b><br>Configurações do mySQL</span></center>
<form name="install" method="post" action="">
  <table width="291" border="0" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td align="center">Host (IP)</td>
        <td align="center"><input type="text" name="host" id="inputText"></td>
      </tr>
      <tr>
        <td align="center">Usuário</td>
        <td align="center"><input type="text" name="usuario" id="inputText"></td>
      </tr>
      <tr>
        <td align="center">Senha</td>
        <td align="center"><input type="text" name="senha" id="inputText"></td>
      </tr>
      <tr>
        <td align="center">Database (ragnarök)</td>
        <td align="center"><input type="text" name="database" id="inputText"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center"><input type="submit" name="button" class="clean-button" id="button" value="Instalar"></td>
      </tr>
    </table>
</form>
<?php
	endif;
?>
</body>
</head>