<?php
include('includes/config.php');
// Check connection

$result = mysqli_query($db,"SELECT * FROM Products");
?>

<!DOCTYPE html>
<html>
<head>
      <title>Product</title>
      
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
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    

   </head>
<body>
<?php include('includes/navbar.php');?>
<div class="row" style="margin-top:40px;">
	<div class="col-md-3"></div>
	<div class="col-md-9"> 
		<div class="table-responsive" style="margin-top:30px;">
	<?php
$answer="<table class='table table-bordered table-hover table-responsive table-dark' >
<thead>
<tr>
<th>Id</th>
<th>Category_id</th>
<th>SubCategoryId</th>
<th>Name</th>
<th>Net-Wt.</th>
<th>Fine-Wt.</th>
<th>Purity</th>
<th>Price</th>
<th>Image1</th>
<th>Image2</th>
<th>Image3</th>
<th>Stock</th>
<th>DesignId</th>
<th>Timestamp</th>
</tr>
</thead><tbody>";
while($row = mysqli_fetch_array($result))
{
$row_id=$row['id'];
$row_cat=$row['category_id'];
$row_subcat=$row['sub_category_id'];
$row_name=$row['name'];
$row_nw=$row['net_weight'];
$row_fw=$row['fine_weight'];
$row_purity=$row['purity'];
$row_price=$row['price'];
$row_image1=$row['image1'];
$row_image2=$row['image2'];
$row_image3=$row['image3'];
$row_stock=$row['stock'];
$row_designId=$row['design_id'];
$row_timestamp=$row['timestamp'];
$answer.=<<<DELIMETER

<tr>
    <td>  $row_id</td>
    <td> $row_cat </td>

    <td> $row_subcat </td>
    <td>$row_name</td>
    <td>$row_nw</td>
    <td> $row_fw </td>
    <td> $row_purity </td>
    <td> $row_price </td>
    <td><img style="height:100px;width:100px" src="uploads/$row_image1"/></td>
    <td><img style="height:100px;width:100px" src="uploads/$row_image2"/></td>
    <td><img style="height:100px;width:100px" src="uploads/$row_image3"/></td>
    <td> $row_stock </td>
    <td> $row_designId </td>
    <td> $row_timestamp </td>
    <td><a href="products.php?delete=$row_id">Delete</a></td>
</tr>

DELIMETER;
}

$answer.="</tbody></table>";
echo $answer;


if($_GET){
    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
        $result = mysqli_query($db,"DELETE FROM `Products` WHERE id = '$id'");
        if(!$result){
            die(mysqli_error($db));
        }else{
            echo "done";
            header("Location:products.php");
        }
        echo("deleted");
    }//elseif(isset($_GET['select'])){
        //select();
    //}
}

    
?>
</div>
</div>

</body>
</html>
