<?php
$link = mysqli_connect('localhost', 'root', 'root', 'hack');
$minX=390;
$maxX=540;

$minY=280;
$maxY=790;

for ($i=0; $i<= 300; $i++)
{

	$arrayX = rand($minX,$maxX);
	$arrayY = rand($minY,$maxY);
	$lat = (4464252 + $arrayX)/100000;
	$long = (-6357653 - $arrayY)/100000;
	var_dump($lat." ".$long);
	$query = $link->query("call insertGeode(1,".$lat.",".$long.",null,'2014-01-18 10:23:22','This has been fun".$i."',5,'http://lorempixel.com/200/200/','Z',1)");
}


?>