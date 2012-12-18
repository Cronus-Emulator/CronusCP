<div id="content-title">Ranking de Clã</div>
<div id="content-html">
  <table width="100%" border="0" cellpadding="3" cellspacing="5" id="whoisonline">
    <thead>
        <tr>
		  <td width="11%" align="center">Posição</td>
          <td width="20%">Nome do Clã</td>
		  <td width="19%">Líder</td>
          <td width="20%">Level</td>
	    </tr>
    </thead><?php
	
	// Quantidade de guildas a serem selecionados
	$j = 50;
	// HTML caso o personagem esteja online
	$online = "<span class=\"badge badge-green corner-3\">Online</span>";
	// HTML caso o personagem esteja offline
	$offline = "<span class=\"badge badge-red corner-3\">Offline</span>";
	
	$sql = $mysql->mysqlQuery( "SELECT `guild_id`, `name`,`master`,`guild_lv` FROM `guild` ORDER BY `guild_lv` DESC  LIMIT 0,{$j}" );
	$sql = $mysql->mysqlExecute();
	$i = 1;
	while( $guild = $mysql->mysql_fetchassoc() )
	{
		print( "\n\t<tr>\n" );
			print( "\t\t<td align=\"center\">". getrankimage( $i ) ."</td>\n" );
			print( "\t\t<td>{$guild['name']}</td>\n" );
			print( "\t\t<td>{$guild['master']}</td>\n" );
			print( "\t\t<td>{$guild['guild_lv']}</td>\n" );
		print( "\t</tr>" );
		$i++;
	}
	
	function	getrankimage( $id )
	{
		$array = array( 
			1 => '<img src="style/img/trofeu-ouro.png">',
			2 => '<img src="style/img/trofeu-prata.png">',
			3 => '<img src="style/img/trofeu-bronze.png">'
		);
		return ( isset( $array[ $id ] ) ? $array[ $id ]: $id.'º' );
	}

?>
  </table>
</div>