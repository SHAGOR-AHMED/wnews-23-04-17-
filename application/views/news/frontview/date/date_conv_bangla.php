<?php
$mktime=mktime()+6*3600;
$day=gmdate("l",$mktime);
switch ($day)
 {
 case "Saturday":
 $bar="&#2486;&#2472;&#2495;&#2476;&#2494;&#2480;";
 break;
 
 case "Sunday":
 $bar="&#2480;&#2476;&#2495;&#2476;&#2494;&#2480;";
 break;

 case "Monday":
 $bar="&#2488;&#2507;&#2478;&#2476;&#2494;&#2480;";
 break;

 case "Tuesday":
 $bar="&#2478;&#2457;&#2509;&#2455;&#2482;&#2476;&#2494;&#2480;";
 break;

 case "Wednesday":
 $bar="&#2476;&#2497;&#2471;&#2476;&#2494;&#2480;";
 break;

 case "Thursday":
 $bar="&#2476;&#2499;&#2489;&#2488;&#2509;&#2474;&#2468;&#2495;&#2476;&#2494;&#2480;";
 break;

 case "Friday":
 $bar="&#2486;&#2497;&#2453;&#2509;&#2480;&#2476;&#2494;&#2480;";
 break;
 }
//print $bar;
$replacements = array("&#2534;","&#2535;", "&#2536;", "&#2537;", "&#2538;","&#2539;","&#2540;","&#2541;","&#2542;","&#2543;");
$days=gmdate("d",$mktime);

$bangla_day_count='';
for($i=0;$i<=strlen($days);$i++)
{
$bangla_day=@$replacements[$days{$i}];
$bangla_day_count.=$bangla_day;
}
//print $bangla_day_count;
$month=gmdate("m",$mktime);

switch ($month)
 {
 case 1:
 $mash="&#2460;&#2494;&#2472;&#2497;&#2527;&#2494;&#2480;&#2495;";
 break;
 
 case 2:
 $mash="&#2475;&#2503;&#2476;&#2509;&#2480;&#2497;&#2527;&#2494;&#2480;&#2495;";
 break;

 case 3:
 $mash="&#2478;&#2494;&#2480;&#2509;&#2458;";
 break;

 case 4:
 $mash="&#2447;&#2474;&#2509;&#2480;&#2495;&#2482;";
 break;

 case 5:
 $mash="&#2478;&#2503;";
 break;

 case 06:
 $mash="&#2460;&#2497;&#2472;";
 break;

 case 7:
 $mash="&#2460;&#2497;&#2482;&#2494;&#2439;";
 break;

 case 8:
 $mash="&#2438;&#2455;&#2487;&#2509;&#2463;";
 break;

 case 9:
 $mash="&#2488;&#2503;&#2474;&#2509;&#2463;&#2503;&#2478;&#2509;&#2476;&#2480;";
 break;

 case 10:
 $mash="&#2437;&#2453;&#2509;&#2463;&#2507;&#2476;&#2480;";
 break;

 case 11:
 $mash="&#2472;&#2477;&#2503;&#2478;&#2509;&#2476;&#2480;";
 break;
 
 case 12:
 $mash="&#2465;&#2495;&#2488;&#2503;&#2478;&#2509;&#2476;&#2480;";
 break;
 }
 //print $mash;
 $replacements = array("&#2534;","&#2535;", "&#2536;", "&#2537;", "&#2538;","&#2539;","&#2540;","&#2541;","&#2542;","&#2543;");

 $year=gmdate("Y",$mktime);
 
$bangla_year_count='';
for($i=0;$i<=strlen($year);$i++)
{
$bangla_year=@$replacements[$year{$i}];
$bangla_year_count.=$bangla_year;
}
$today="<img src='images/fav.png' width='15' height='14' align='absmiddle'> ".$bar.","." ".$bangla_day_count." ".$mash." ".$bangla_year_count." ,"." ";
print "$today";
?>