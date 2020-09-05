<?php
$replacements = array("&#2534;","&#2535;", "&#2536;", "&#2537;", "&#2538;","&#2539;","&#2540;","&#2541;","&#2542;","&#2543;");
$mktime=mktime()+6*3600;
$hour=gmdate("H",$mktime);
$bangla_hour_count='';
for($i=0;$i<=strlen($hour);$i++)
{
$bangla_hour=@$replacements[$hour{$i}];
$bangla_hour_count.=$bangla_hour;
}

$minute=gmdate("i",$mktime);
$bangla_minute_count='';
for($i=0;$i<=strlen($minute);$i++)
{
$bangla_minute=@$replacements[$minute{$i}];
$bangla_minute_count.=$bangla_minute;
}

$second=gmdate("s",$mktime);
$bangla_second_count='';
for($i=0;$i<=strlen($second);$i++)
{
$bangla_second=@$replacements[$second{$i}];
$bangla_second_count.=$bangla_second;
}

$today="<img src='date/watch.png' width='15' height='14' align='absmiddle'> ".$bangla_hour_count.":".$bangla_minute_count .":".$bangla_second_count;
print $today;
?>