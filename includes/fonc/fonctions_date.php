<?php
/**
 * formate une date AAAA-MM-JJ sous la forme JJ/MM/AAAA
 
 * @param $dt au format AAAA-MM-JJ 
 * @return date au format JJ/MM/AAAA  
*/
function getDateJMA($dt)
{
	if (isset($dt))
	{	$maDate=explode("-",$dt) ;
	    if ($maDate[0]=="00")
		return "" ;
		else
		return $maDate[2]."/".$maDate[1]."/".$maDate[0] ;
	}
	else
		return "" ;
}

/**
 * formate une date JJ/MM/AAAA sous la forme AAAA-MM-JJ 
 
 * @param $dt au format JJ/MM/AAAA
 * @return date au format AAAA-MM-JJ  
*/
function getDateAMJ($dt)
{
	$maDate=explode("/",$dt) ;
	return $maDate[2]."-".$maDate[1]."-".$maDate[0] ;
}

?>
