<?php
//Address collecting images from websites

//Obtaining a first-level directory

$first_level=['wwww.yuhuagu.com/tupian/ye/list_37_1.html','2'];

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


//test


//down generating_first-leavel html




//Analytical first-leavel directory, get second-leavel directory





//Analytical second-leavel directory,get pirctrue address



//regular expresss




$picture_address=[1,2,3];


//batch download























//










?>
