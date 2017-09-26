<?php 
/**
* 
*/
/**
* 
*/
class YearType 
{
	
	function __construct()
	{
		# code...
	}
	function getType($year)
	{
		$cal_year_type=$year%4;
		
		if($cal_year_type)
		{
			return 'simple';
		}
		else
		{
			return 'leap';
		}
	}
}

?>