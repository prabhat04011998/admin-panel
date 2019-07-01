<?php
include('includes/config.php');

// Check connection
$result = mysqli_query($db,"SELECT * FROM sub_category");
?>
<!DOCTYPE html>
<html>
<head>
      <title>Subcategories</title>
      
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap Core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="./css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="./css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    

   </head>
<body>
<?php include('includes/navbar.php');?>
<div class="row" style="margin-top: 40px">
	<div class="col-md-4"></div>
	<div class="col-md-8"> 
		<div class="table-responsive" style="margin-top:30px;">
	<?php
$answer= "<table class='table table-bordered table-dark table-hover' >
<thead>
<tr>
<th>Id</th>
<th>Category_id</th>
<th>Name</th>
<th>Tabindex</th>
<th>Timestamp</th>
</tr>
</thead><tbody>";

$result = mysqli_query($db,"SELECT * FROM sub_category");
while($row = mysqli_fetch_array($result))
{
$row_id=$row['id'];
$Category_id=$row['category_id'];
$name=$row['name'];
$tabindex=$row['tabindex'];
$Timestamp=$row['timestamp'];		
$answer.=<<<DELIMETER
<tr>
	<td>$row_id</td>
	<td>$Category_id</td>
	<td>$name</td>
	<td>$tabindex</td>
	<td>$Timestamp</td>
    <td><a href="showsubcategory.php?delete=$row_id">Delete</a></td>
</tr>
DELIMETER;
}
$answer.="</tbody></table>";
echo($answer);
if($_GET){
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		$result = mysqli_query($db,"DELETE FROM `sub_category` WHERE id = '$id'");
		echo($id);
        if(!$result){
            die(mysqli_error($db));
        }else{
            header("Location :showsubcategory.php");
        }
        echo('deleted');

	}
}
?>
</div>
</div>

</body>
</html>
