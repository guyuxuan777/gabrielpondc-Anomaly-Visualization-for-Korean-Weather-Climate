<?php
DEFINE ('DB_USER','root');
DEFINE ('DB_PASSWORD','caucse1234');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','virus');
$name=$_GET['name'];
$date=$_GET['date'];
$dbc=@mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('Could not to connect to Mysql:'.mysqli_connect_error());
header("content-type:text/json;charset=utf-8");
$db_selected=@mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('Could not to connect to Mysql:'.mysqli_connect_error());
  if (!$db_selected) 
  { 
    die ("Can\'t use  " ); 
  } 
  //执行MySQL查询-设置UTF8格式
  // mysqli_query("SET NAMES utf8");  
  // mysqli_query()
  $sql = "SELECT weather.qiwen,weather.shidu,weather.zhengqiya,weather.ludianwendu,weather.dangdiqiya,weather.haimianqiya,weather.dimianqiya FROM weather,test where weather.KID=test.KID and test.city='$name' and weather.date ='$date'";
  $data="";
  $result = mysqli_query($dbc,$sql); 
  $time=array();
  $array1= array();
  while ($row = mysqli_fetch_row($result))
  { 
    array_push($time,$row);  
    
    //数组赋值
   
  }
  for ($i=0;$i<count($time);$i++){
    $array1[] = [floatval($time[0][0]),floatval($time[0][1]),floatval($time[0][2]),floatval($time[0][3]),floatval($time[0][4]),floatval($time[0][5]),floatval($time[0][6])];
  }
  $data = json_encode($array1[0]);
  echo $data;
  ?>