<?php
   include("includes/config.php");
   include('session.php');
   
   
   if(isset($_POST["submit"])) {
      // username and password sent from form 
      
      $categ=$_POST['categ'];
      $sub_category_id=$_POST['subcategory'];
      $name = mysqli_real_escape_string($db,$_POST['designname']);
      echo($name);
      echo($categ);
      if($categ=='gold'){
        $category_id=1;
      }else{
        $category_id=2  ;
      }
      
     
  
      $query=mysqli_query($db,"INSERT INTO design (category_id,sub_category_id, name) VALUES ('$category_id','$sub_category_id','$name')");

      if(!$query){
        die(mysqli_error($db));
      }
      echo("successfully Saved");

   }
?>




<html>
   
   <head>
      <title>Add Design:</title>
      
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> Add Subcategory </title>

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
   
   <body bgcolor = "#FFFFFF">
      <div id="wrapper">
        <?php include('includes/navbar.php')?>
    
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; margin-top:20px" align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Add Design</b></div>
                
            <div style = "margin:30px">
               
               <form action = "design.php" method = "post">
                  
                  <label>Name  :</label><input type = "text" name = "designname" class = "box" required/><br/><br />
                  
                  <label>Category :</label><br>
                    <select name="categ" required>
                      <option value="gold">Gold</option>
                      <option value="Silver">Silver</option>
                      
                    </select> 
                    <br><br>

                    <label>Sub-Category :</label><br>
                    <?php

                        $sql=mysqli_query($db,"SELECT id,name FROM sub_category");
                            if(mysqli_num_rows($sql)){
                            $select= '<select name="subcategory">';
                            while($rs=mysqli_fetch_array($sql)){
                                  $select.='<option value="'.$rs['id'].'">'.$rs['name'].'</option>';
                              }
                            }
                            $select.='</select>';
                            echo $select;
                        ?>
                    <br><br>
                    <input type = "submit" name="submit" value = " Submit "/><br />
               </form>
               
               
                    
            </div>
                
         </div>
            
      </div>
   </div>
        <script src="./js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="./js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="./js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="./js/raphael.min.js"></script>
        <script src="./js/morris.min.js"></script>
        <script src="./js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="./js/startmin.js"></script>

   </body>
</html>