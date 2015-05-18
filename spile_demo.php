<?php
//Address collecting images from websites

//Obtaining a first-level directory

//$first_level=['www.yuhuagu.com/tupian/ye/list_37_1.html','2'];

function generating_first_level($baseurl,$length)
{
	$first_level=array();
	for ($i=1;$i<=$length;$i++){
		$url=$baseurl.$i.'.html';
		array_push($first_level,$url);
	}
	return $first_level;
}

$baseurl='http://www.yuhuagu.com/tupian/ye/list_37_';

$first_level=generating_first_level($baseurl,8);

//down generating_first-leavel  html list
$first_levle_list=array('first_level01.html','first_level02.html');    //how to download the file?


//Analytical first-leavel directory, get second-leavel directory
function get_second_level($first_level_patten,$first_levle_list)
{
	$pre='http://www.yuhuagu.com';
	$second_levellist=array();
	foreach($first_levle_list as $filename)
	{
			//array_push($second_levellist,parsehtml($first_level_patten,$filename));
			$temparray=parsehtml($first_level_patten,$filename);
			foreach ($temparray as $url)
			{
				array_push($second_levellist,$pre.$url);
			}
	}
	
	return $second_levellist;
}
$first_level_patten='/\/tupian\/ye\/\d{2,5}\/\d{2,7}\/\d{2,7}.html/';
$second_levlelist=get_second_level($first_level_patten,$first_levle_list);




//Analytical second-leavel directory,get pirctrue address
function get_picture_address($second_level_patten,$second_levlelist)
{
		$picture_address_list=array();
		$pre='http://www.yuhuagu.com';
		foreach($second_levlelist as $filename)
		{
			//array_push($picture_address_list,parsehtml($second_level_patten,$filename));
			$temparray=parsehtml($second_level_patten,$filename);
			foreach($temparray as $url)
			{
				array_push($picture_address_list,$pre.$url);
			}
		}
		return $picture_address_list;
}

$second_level_patten="/\/uploads\/allimg\/\d{2,7}\/\d{2,5}-\w{2,19}.jpg/";
$second_levlelist=array('second_level01.html','second_level02.html');    ////how to download the file?
$picture_address=get_picture_address($second_level_patten,$second_levlelist);

print_r($picture_address);

//regular expresss 
function parsehtml($patten,$filename)
{
	$filecontent=file_get_contents($filename);
	preg_match_all($patten,$filecontent,$out);
	return array_unique(array_values($out[0]));
}

//batch download























//










?>
