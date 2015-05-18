<?php

$info = array ();
$info["Halley"] 	= "Amarelo";
$info["Encke"] 		= "Vermelho";
$info["Wolf"] 		= "Preto";
$info["Kushida"] 	= "Azul";

foreach($info as $comet => $group)
{
	$commetValue = calcValue($comet);
	$groupValue = calcValue($group);

	if ($commetValue !== $groupValue)
    {
	    echo 'Quem NÃO irá será o grupo '.$group;
    }
}

function calcValue($string)
{
    $letters = str_split(strtoupper($string));
    $final = 1;

    foreach($letters as $letter) 
    {
    	$final = $final*(ord($letter)-64);
    }
    
    return $final%45;
}

?>