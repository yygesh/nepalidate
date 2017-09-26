<?php 
/**
* 
*/
include('YearType.php');
class MonthEn
{
	
	function __construct()
	{
		# code...
	}
	function getEMonthEnd($year)
	{
		$return=array();
		$feb=null;
		$year_type= $this->getType($year);

		if($year_type=='leap')
		{
			$feb=29;
		}
		elseif($year_type=='simple')
		{	
			$feb=28;
		}

		$data=array(
				'1'=>31,
				'2'=>$feb,
				'3'=>31,
				'4'=>30,				
				'5'=>31,
				'6'=>30,
				'7'=>31,
				'8'=>31,
				'9'=>30,
				'10'=>31,
				'11'=>30,
				'12'=>31,
				);
		return $data;
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