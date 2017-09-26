<form action="" method="POST">
	<input type="text" name="year">
	<input type="text" name="month">
	<input type="text" name="day">
	<input type="submit" value="submit">
</form>
<?php
include('month.php');
include('emonth.php');

$month_obj=new MonthNep();
$emonth_obj=new MonthEn();
//var_dump($days);
	
	$temp_year=$_POST['year']-56;
	$temp_start_year=$temp_year-1;
	$temp_year_type=$temp_year%4;

	if($temp_year_type)
	{
		$temp_start_day=13;
	}
	else
	{
		$temp_start_day=14;
	}
	$emonthend=$emonth_obj->getEMonthEnd($_POST['year']);
	//var_dump($emonthend);
	$first_month=$emonthend['4']-$temp_start_day;
	//var_dump($first_month);
	$year=$temp_start_year;
	$month=4;
	if($_POST)
	{
		$days= 0;
		$monthend=$month_obj->getMonthEnd($_POST['year']);
		//var_dump($monthend);
		$i=1;
		if($_POST['month']==1)
		{
			$days=$_POST['day'];
			$except_days=$temp_start_day+$days;
		}
		else
		{
			do{
				$days=$days+(int)$monthend[$i];
				$i++;
			}
			while($i!=(int)$_POST['month']);
			$temp_total_days=$days+$_POST['day'];
			$except_days=$temp_total_days-$first_month;
			$month=$month+1;
		}
		
		$j=5;
		while($except_days>=$emonthend[$j])
		{
			$except_days=$except_days-(int)$emonthend[$j];
			$month=$month+1;
			$j++;
			if($j>12)
			{
				$year=$year+1;
				$month=1;
				$j=1;
			}
		};
		echo $year.' /'.$month.' /'.$except_days;
		
	}

?>