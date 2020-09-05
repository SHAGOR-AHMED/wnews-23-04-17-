<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<?php
include'class.banglaDate.php';
$bn = new BanglaDate(time());
$bn->set_time(time(), 0);
$array1 = $bn->get_date();
foreach($array1 as $abc)
{
  print  $abc." " ;
} 

?>