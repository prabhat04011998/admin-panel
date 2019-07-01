<?php
   include("includes/config.php");
   
   
   if(isset($_POST["submit"])) {
      // username and password sent from form 
      
      $categ=$_POST['categ'];
      $name = mysqli_real_escape_string($db,$_POST['name']);
      $tabindex=$_POST['tabindex'];

      if($categ=='gold'){
        $category_id=1;
      }else{
        $category_id=2  ;
      }
      
     
  
      $query=mysqli_query($db,"INSERT INTO sub_category (category_id, name,tabindex) VALUES ('$category_id','$name','$tabindex')");

      if(!$query){
        die(mysqli_error($db));
      }
      echo("successfully Saved");

   }
?>




<html>
   
   <head>
      <title>Subcategory:</title>
      
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
    <?php include('includes/navbar.php')?>
    
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333;margin-top: 10%; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Subcategory</b>
              </div>

                
            <div style = "margin:30px">
               
               <form action = "subcategory.php" method = "post">
                  
                  <label>Name  :</label><input type = "text" name = "name" class = "box" required="" /><br/><br />
                  <label>TabIndex  :</label><input type = "number" name = "tabindex" class = "box" required /><br/><br />
                  
                  <label>Category :</label><br>
                    <select name="categ">
                      <option value="gold">Gold</option>
                      <option value="Silver">Silver</option>
                      
                    </select> 
                    <br><br>
                    <input type = "submit" name="submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                    
            </div>
                
         </div>
            
      </div>

   </body>
</html>