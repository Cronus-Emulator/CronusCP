<?php
session_start(); // inicial a sessao

//para gerar o codigo aleatorio
$input = array("a","b","c","d","e","0","1","2","3","4","5","6","7","8","9");
//escolhe 5 elementos
$rand_keys = array_rand($input,5);

//codigo criado
$codigo = $input[$rand_keys[0]].$input[$rand_keys[1]].$input[$rand_keys[2]].$input[$rand_keys[3]].$input[$rand_keys[4]];


header("Content-type:image/gif");
$img = imagecreate(80,30);
$preto = imagecolorallocate($img,0,0,0);
//defino algumas outras cores
$branco = imagecolorallocate($img,255,255,255);
//IMPORTANTE: Neste exemplo copie o arquivo de fonte para a mesma pasta que este arquivo
imagettftext($img,15,10,10,28,$branco,"verdana.ttf","$codigo");
imagegif($img);
imagedestroy($img);

$_SESSION["codigo"] = $codigo ;
?>
