<?php
	
	
	$link_link = mysql_connect("localhost","root","");
	mysql_set_charset('utf8', $link_link);
	mysql_select_db("world_news");
	

//*********************************************************

	function BanglaNumber($int)
	{
		$engNumber = array(1,2,3,4,5,6,7,8,9,0);
		$bangNumber = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
		
		$converted = str_replace($engNumber, $bangNumber, $int);
		return $converted;
	}
	
	function limit_words($string, $word_limit)
    {
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }


?>