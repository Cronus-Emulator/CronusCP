<div id="content-title">Ranking Forja</div>
<div id="content-html">
  <table width="100%" border="0" cellpadding="3" cellspacing="5" id="whoisonline">
    <thead>
        <tr>
		  <td width="13%" align="center">Posição</td>
          <td width="41%">Nome</td>
          <td width="25%">Base / Job</td>
          <td width="21%">Pontos</td>
		  <td width="5%" align="center">Status</td>
        </tr>
    </thead><?php
	
	// Quantidade de personagens a serem selecionados
	$j = 50;
	// HTML caso o personagem esteja online
	$online = "<span class=\"badge badge-green corner-3\">Online</span>";
	// HTML caso o personagem esteja offline
	$offline = "<span class=\"badge badge-red corner-3\">Offline</span>";
	
	$sql = $mysql->mysqlQuery( "SELECT `name`, `base_level`, `job_level`, `fame`, `online` FROM `char` WHERE `fame` >= '1' AND (`class` = '10' OR `class` = '4011' OR `class` = '4058' OR `class` = '4064') ORDER BY `fame` LIMIT 0,{$j}" );
	$sql = $mysql->mysqlExecute();
	$i = 1;
	while( $player = $mysql->mysql_fetchassoc() )
	{
		$status = ( !$player['online'] ) ? $offline:$online;
		print( "\n\t<tr>\n" );
			print( "\t\t<td align=\"center\">". getrankimage( $i ) ."</td>\n" );
			print( "\t\t<td>{$player['name']}</td>\n" );
			print( "\t\t<td>{$player['base_level']} / {$player['job_level']}</td>\n" );
			print( "\t\t<td>{$player['fame']}</td>\n" );
			print( "\t\t<td align=\"center\">{$status}</td>\n" );
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