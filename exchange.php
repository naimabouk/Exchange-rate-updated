<?php
$con=mysqli_connect('localhost','root','','rate');
include 'functions.php';
require 'simple_html_dom.php';

$html = file_get_html('https://www.bank-of-algeria.dz/');

$content = $html->find('marquee.style23');

$comma_separated = implode(",", $content);

$str=strip_tags($comma_separated);

$usdStr = substr($str, 6, 17);

$eurstr = substr($str, 33, 17);

$GBPstr = substr($str, 59, 17);

$JPYstr = substr($str, 87, 17);

$CNYstr = substr($str, 113, 15);

$CHFstr = substr($str, 137, 17);

compareUsdValuesAndInsert($usdStr);

compareEurValuesAndInsert($eurstr);







echo '<br>';



// $getlastData="SELECT * FROM rate WHERE id=(SELECT MAX(id) FROM rate)";

// $rungetlastData=mysqli_query($con,$getlastData);

// $getlastDataRow=mysqli_fetch_assoc($rungetlastData);

// $lastdatausd=$getlastDataRow['rateusd'];

// $lastdataeuro=$getlastDataRow['rateeuro'];


// if($str1 != $lastdatausd){

//     $query="INSERT INTO rate(rateusd,rateeuro) VALUES ('{$str1}','{$lastdataeuro}') ";

//     $query_run=mysqli_query($con,$query);

//     $lastdatausd=$str1;

//     if(!$query_run ) {
          
//         die("QUERY FAILED ." . mysqli_error($con));
 
        
//     }

//  }
// if($str2 != $lastdataeuro){

//     $query="INSERT INTO rate(rateusd,rateeuro) VALUES ('{$lastdatausd}','{$str2}') ";

//     $query_run=mysqli_query($con,$query);

//     if(!$query_run ) {
          
//         die("QUERY FAILED ." . mysqli_error($con));
 
        
//     }

// }

?>