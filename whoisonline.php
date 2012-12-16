<div id="content-title">Quem está online ?</div>
<div id="content-html">
  <table width="100%" border="0" cellpadding="3" id="whoisonline">
    <thead>
        <tr>
          <td>Nome</td>
          <td>Classe</td>
          <td>Posição</td>
        </tr>
    </thead><?php

	$sql = $mysql->mysqlQuery( 'SELECT `name`,`class`,`last_map` FROM `char` WHERE `online`=1' );
	$sql = $mysql->mysqlExecute();
	while( $player = $mysql->mysql_fetchassoc() )
	{
		print( "\n\t<tr>\n" );
			print( "\t\t<td>{$player['name']}</td>\n" );
			print( "\t\t<td>{$class[$player['class']]}</td>\n" );
			print( "\t\t<td>{$player['last_map']}</td>\n" );
		print( "\t</tr>" );
	}

?>
  </table>
</div>