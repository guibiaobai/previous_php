<?php

//��Ӣ��С˵���л�ȡ����
$str=batch(array("art.txt","art2.txt"));
$arr=explode("-",$str);
$arr1=array_values(array_unique($arr));
$arr1=array_filter($arr1,"len");//�Զ������

foreach($arr1 as $k=>$v)
{
	echo $k."=>".$v."<br>";
}

function batch($arr)
{
	$temp=array();
	foreach($arr as $v)
	{
		$str=getoktxt($v);
		array_push($temp,$str);
	}
	return join("",$temp);
}

function len($var)
{
	return(strlen($var)>=1);
}

//�����ı�
function getoktxt($filename)
{
	$file=file_get_contents($filename);
	$str=strtolower($file);
	preg_match_all('/[a-z\s]+/', $str, $matches);
	$str = join('', $matches[0]);
	$arr=explode(" ",$str);
	$temparr=array();
	foreach($arr as $k=>$value)
	{
		$str=trim($value);
		$str=str_replace('/\s/i','',$str);
		array_push($temparr,$str);
	}
	
	$laststr="";
	foreach($temparr as $value)
	{
		//if(!ctype_space($value)&&strlen($value)){
			$laststr.=$value."-";
	}
	return $laststr;
}

//û��ʹ��
function getstr($filename)
{
	$file=file_get_contents($filename);
	$str=strtolower($file);
	$str=str_replace(",","","$str");
	$str=str_replace(".","","$str");
	$str=str_replace("\"","","$str");
	$str=str_replace("?","","$str");
	$str=str_replace("��","","$str");
	$str=str_replace(":","","$str");
	$str=str_replace("'","","$str");
	$str=str_replace("-","","$str");
	$str=str_replace("[","","$str");
	$str=str_replace("]","","$str");
	$str=str_replace(";","","$str");
	//�����ﴦ����û�пո���ַ�
	$arr=explode(" ",$str);
	$temparr=array();
	foreach($arr as $k=>$value)
	{
		array_push($temparr,trim($value));
	}
	$laststr="";
	foreach($temparr as $value)
	{
		$laststr.=$value." ";
	}
	return $laststr;
}







?>