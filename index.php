<?php include"exchange.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exchange Rates</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <!-- <link rel="stylesheet" href="magnify/magnify.min.css"> -->
</head>

<style>

</style>
<body>
<!-- <h1 class="styled-table">USD EURO Exchange Rates</h1> -->
<div class="col-md-2"></div>
<div class="table-responsive col-md-8">
<table class="styled-table table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>Currency</th>
            <th>purchasing exchange</th>
            <th>selling exchange</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>USD</td>
            <td><?php echo getBuyingrate($usdStr); ?></td>
            <td><?php echo getSellingrate($usdStr); ?></td>
        </tr>
        <tr class="active-row">
            <td>EURO</td>
            <td><?php echo getBuyingrate($eurstr); ?></td>
            <td><?php echo getSellingrate($eurstr); ?></td>
        </tr>
       
    </tbody>
</table>
<?php
 $getlastData="SELECT * FROM rate WHERE id=(SELECT MAX(id) FROM rate)";

 $rungetlastData=mysqli_query($con,$getlastData);
 if(! $rungetlastData ) {
              
    die("QUERY FAILED ." . mysqli_error($con));
        
}

 $getlastDataRow=mysqli_fetch_assoc($rungetlastData);

 $lastdatadate=$getlastDataRow['date'];
?>
<p>Last Updated : <?php echo  $lastdatadate; ?></p>
<button type="button" onClick="refreshPage()">Refresh</button>
</div>
<div class="col-md-2"></div>


<script>
function refreshPage(){
    window.location.reload();
} 
</script>
</body>
<script src="js/jquery-331.min.js"></script>  
<script src="js/bootstrap-337.min.js"></script>
</html>


