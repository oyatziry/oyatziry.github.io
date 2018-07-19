#!/usr/local/bin/php
<?php print('<?xml version = "1.0" encoding="utf-8"?> ');
print "\n";
print('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"');
print "\n";
print('"http://www.w3.org/TR/xhtml1/DTD/xhtml11.dtd">');
print "\n";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<title> Calendar </title>
<link rel="stylesheet" type="text/css" href="calendar.css" />
</head>
<body>
<div class="container">
<?php 

date_default_timezone_set('America/Los_Angeles');
$timestamp = time(); 
//get current time
$current_hour = date("g", $timestamp);
$current_min = date("i", $timestamp);
$meridiem = date("a", $timestamp);
$dayofweek=date("D", $timestamp); //current day of the week
$month=date("F", $timestamp); //current month
$dayofMonth=date("j", $timestamp); //current day
$year=date("Y", $timestamp); //current year
//print out header
print('<h1> To do today | '.$dayofweek.', '.$month.' '.$dayofMonth.', '.$year.', '.$current_hour.':'.$current_min.' '.$meridiem.'</h1>');
//print table
print(' <table id="event_table"> ');
print(' <tr> <th class="hr_td_"> &nbsp; </th> <th class="table_header"> Yatziry </th> <th class="table_header"> Joe Bruin </th> <th class="table_header"> Josephine Bruin </th> </tr>');
$hours_to_show=12;
for($i=0; $i<=$hours_to_show; $i++){
	$projected_hour = $current_hour + $i;
	if($i % 2 == 0){
		print("<tr class='even_row'>");
	}
	else{
		print("<tr class='odd_row'>");
	}

	print("<td class='hr_td'>".get_hour_string($projected_hour)."</td> <td></td> <td></td> <td></td>");
	print("</tr> ");
}
print('</table>');

//get time as a string
function get_hour_string($projected_hour){
	$meridiem = date("a", $timestamp);
	if($projected_hour > 12){
		if($meridiem == 'am')
			$meridiem = 'pm';
		else
			$meridiem = 'am';
	}

	$projected_hour = $projected_hour % 12;
	if($projected_hour == 0)
		$projected_hour = 12;
	else
		$projected_hour = $projected_hour;

	return $projected_hour.'.'.'00'.$meridiem;
}

?> 
</div>
</body>
</html>