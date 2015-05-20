
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd";>
<html>
 <head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<?php

$file=file_get_contents("eng.txt");
$arr=unserialize($file);
$eng=$arr[0];//   english key
$fan=$arr[1];//   translated results set


$num=isset($_POST["value"])?$_POST["value"]:-1;//get index
$num=($num+1)%count($fan);//index add one，do not jump out of range
echo "<br>";

function getrand($fan)
{
	shuffle($fan);
	return array($fan[0],$fan[1],$fan[2]);
}

function echochoise($fan,$index)
{
	$str="<form action=\"choose_word.php\" method=\"post\" >";
	foreach($fan as $key)
	{
		$str.="
		<input type=\"hidden\" name=\"value\" value=$index>
		<input type=\"submit\" name=\"submit\" value=\"$key\">
		";
	}
	return $str."<form>";
}

function echohtml2($eng,$fan,$value_index)
{
	$temp=getrand($fan);   //random selection
	array_push($temp,$fan[$value_index]);//add to he correct result
	
		while(count(array_unique($temp))!=4)//when the random result does not equal 4,rejoing
		{
			$temp=getrand($fan);
			array_push($temp,$fan[$value_index]);
		}
		
		echo $eng[$value_index]."<br>";//word to be translated
		echo echochoise($temp,$value_index);
		echo "<br>";
}

echohtml2($eng,$fan,$num);

?>