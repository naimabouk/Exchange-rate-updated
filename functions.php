<?php

function getBuyingrate($str){
    $Rate = explode("/",$str);
    return $BuyingRate=$Rate[1];
}

function getSellingrate($str){
    $Rate = explode("/",$str);
    return $sellingRate=$Rate[0];
}

function compareUsdValuesAndInsert($val1){
    
        global $con;
        $getlastData="SELECT * FROM rate WHERE id=(SELECT MAX(id) FROM rate)";

        $rungetlastData=mysqli_query($con,$getlastData);

        $getlastDataRow=mysqli_fetch_assoc($rungetlastData);

        $lastdatausd=$getlastDataRow['rateusd'];

        $lastdataeuro=$getlastDataRow['rateeuro'];

        if($val1 != $lastdatausd){

        $query="INSERT INTO rate(rateusd,rateeuro) VALUES ('{$val1}','{$lastdataeuro}') ";
    
        $query_run = mysqli_query($con,$query);
        
        if(!$query_run ) {
              
            die("QUERY FAILED ." . mysqli_error($con));
                
        }
    
     }
}

function compareEurValuesAndInsert($val1){
    
    global $con;
    $getlastData="SELECT * FROM rate WHERE id=(SELECT MAX(id) FROM rate)";

    $rungetlastData=mysqli_query($con,$getlastData);

    $getlastDataRow=mysqli_fetch_assoc($rungetlastData);

    $lastdatausd=$getlastDataRow['rateusd'];

    $lastdataeuro=$getlastDataRow['rateeuro'];

    if($val1 != $lastdataeuro){

    $query="INSERT INTO rate(rateusd,rateeuro) VALUES ('{$lastdatausd}','{$val1}') ";

    $query_run = mysqli_query($con,$query);
    
    if(!$query_run ) {
          
        die("QUERY FAILED ." . mysqli_error($con));
            
    }

 }
}
?>