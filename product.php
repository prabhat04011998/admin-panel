<?php 
 include("includes/config.php");
   session_start();
   $subcategoryquery="SELECT * FROM sub_category" ;
   $subcategoryquery=mysqli_query($db,$subcategoryquery);

   $subcategoryrow = mysqli_fetch_array($subcategoryquery,MYSQLI_ASSOC);

      


   if(isset($_POST['submit'])){
    $date = date('Y-m-d').rand(1,10000000); 
    $extensions = array("jpeg","jpg","png");  

      $image1           = $date.$_FILES['img1']['name'];
      $image_old_path1        = $_FILES['img1']['tmp_name'];
      $image_new_path1        ='uploads/' . $image1; 
      if($image1!==""){
        move_uploaded_file($image_old_path1, $image_new_path1);
      }else{
        echo("File not selected");
      }
  

      $image2           = $date.$_FILES['img2']['name'];
      $image_old_path2        = $_FILES['img2']['tmp_name'];
      $image_new_path2        ='uploads/' . $image2;
      if($image2!==""){
      move_uploaded_file($image_old_path2, $image_new_path2);
      }else{
        echo("File not Selected");
      }

      $image3           = $date.$_FILES['img3']['name'];
      $image_old_path3        = $_FILES['img3']['tmp_name'];
      $image_new_path3        ='uploads/' . $image3;
      if($image3!==""){
      move_uploaded_file($image_old_path3, $image_new_path3); 
      }else{
        echo("File not Seleccted");
    }
    $productName=$_POST['productName'];
    $netWt=$_POST['netWt'];
    $fineWt=$_POST['fineWt'];
    $categ=$_POST['categ'];
    $subcategory=$_POST['subcategory'];
    $purity=$_POST['purity'];
    $price=$_POST['price'];
    $tags=$_POST['tags'];
    $stock=$_POST['stock'];
    $description=$_POST['description'];
    $caption=$_POST['caption'];
    $length=$_POST['length'];
    if($length==''){
        $length==0;
    };
    $breadth=$_POST['breadth'];
    if($breadth==''){
        $Breadth==0;
    };
    $design_id=$_POST['design'];
    if($categ=='gold'){
        $category_id=1;
      }else{
        $category_id=2  ;
      }

    
    

    $insertquery="INSERT INTO Products( category_id, sub_category_id, design_id, name, net_weight,fine_weight, image1, image2, image3, purity, price, tags, stock, description, caption, length, breadth) VALUES ('$category_id','$subcategory','$design_id','$productName','$netWt','$fineWt','$image1','$image2','$image3','$purity','$price','$tags','$stock','$description','$caption','$length','$breadth')";

     echo($insertquery);
      if(!$insertquery){
        die(mysqli_error($db));
      }
      echo("successfully Saved");
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ADD PRODUCT</title>

        <!-- Bootstrap Core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="./css/metisMenu.min.css" rel="stylesheet">

        <!-- Social Buttons CSS -->
        <link href="./css/bootstrap-social.css" rel="stylesheet">

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
        <div class="wrapper">
    
          <div align = "center">
             <div style = "width:100%; border: solid 1px #333333; " align = "left">
                <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>ADD A NEW PRODUCT</b>
                <div style="float:right;"><a style="text-decoration: none;color:white;" href="./index.php">Home</a></div>
            </div>

                    
                <div style = "margin:30px">
                   
                   <form action = "product.php" method = "post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                      
                      <label>Product Name  :</label><br/><input type = "text" name = "productName" class = "box" /><br/><br />

                      <label>Net Weight  :</label><br/><input type = "text" name = "netWt" class = "box" value="0" /><br/><br />

                      <label>Fine Weight  :</label><br/><input type = "text" name = "fineWt" class = "box" value="0" /><br/><br />

                      <label>Image 1 :</label><br/><input type="file" name="img1" class="box" required/><br/><br/>
                      <label>Image 2 :</label><br/><input type="file" name="img2" class="box" /><br/><br/>
                      <label>Image 3 :</label><br/><input type="file" name="img3" class="box" /><br/><br/>

                        <label>Category :</label><br/><br>
                        <select name="categ">
                          <option value="gold">Gold</option>
                          <option value="Silver">Silver</option>
                          
                        </select> 
                        <br><br>
                        <label> Sub Category :</label><br/><br>
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
                          
                        </div> 
                        <div class="col-md-6">

                    <label>Purity :</label><br/><input type="text" name="purity"/><br/><br/>

                    <label>Price :</label><br/><input type="number" name="price" value="0" /><br/><br/>

                    <label>Tags :</label><br/><input type="text" name="tags"/><br/><br/>

                    <label>Stock :</label><br/><input type="number" name="stock" value="0" /><br/><br/>

                    <label>Description :</label><br/><input type="text" name="description"/><br/><br/>

                    <label>Caption :</label><br/><input type="text" name="caption"/><br/><br/>

                    <label>Length :</label><br/><input type="number" name="length"  value="0" /><br/><br/>
                    <label>Breadth :</label><br/><input type="number" value="0" name="breadth"  /><br/><br/>

                    <label>Design :</label><br/>
                    <?php

                        $sql=mysqli_query($db,"SELECT id,name FROM design");
                            if(mysqli_num_rows($sql)){
                            $select= '<select name="design">';
                            while($rs=mysqli_fetch_array($sql)){
                                  $select.='<option value="'.$rs['id'].'">'.$rs['name'].'</option>';
                              }
                            }
                            $select.='</select>';
                            echo $select;
                        ?><br><br>
                </div>
                <br>
                <br>

                        <input style="margin:20px 0 0 30%;" type = "submit" name="submit" value = " Submit "/><br />

                   </form>
                   
                   <!-- <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div> -->
                        
                </div>
                    
             </div>
                
          </div>
        </div>

   </body>
</html>
