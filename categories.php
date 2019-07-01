<?php
include('includes/config.php');
// Check connection

?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>
<body>

<div class="container" style="margin-top: 100px;">
  <?php include('includes/navbar.php')?> 
  <div class="row">
    
    <div class="col-md-4"></div>
    <div class="col-md-8">
  <table class="table table-dark table-hover">
    <thead style="background-color: #454d55">
      <tr >
        <th>ID</th>
        <th>Category-Name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Gold</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Silver</td>
      </tr>

    </tbody>
  </table>
  </div>
  </div>       
</div>

</body>
</html>
