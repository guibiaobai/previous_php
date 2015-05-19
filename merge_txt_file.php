<?php


function merge($basedir,$pre,$resultname)
{
	$filelist=scandir($basedir);
	$result='';
	foreach($filelist as $k=>$v)
	{
		if($v!='.'and $v!='..')
		{
			$filename=$pre.$v;
			$result.=file_get_contents($filename);
		}
	}
	file_put_contents($resultname,$result);
	
}

$basedir="E:\\network\\www\\previous_php\\demo";
$pre="E:\\network\\www\\previous_php\\demo\\";
merge($basedir,$pre,"A.txt");
echo 'ok';










?>