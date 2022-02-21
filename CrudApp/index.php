<?php
include('function1.php');

$objCruddAdmin = new crudApp();
$empty_check = $objCruddAdmin->empty_data();

if(isset($_POST['disData'])){
  if($empty_check==0){
    header('Location: empty.php');
  }else{
    header('Location: data.php');
  }
  
}
if(isset($_POST['add_info'])){
   $return_msg=  $objCruddAdmin->add_data($_POST);
 }


?>
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <script> </script>
    <title>Crud App</title>
  </head>
  <body>
  
    <div class="container my-4 p-4 shadow">
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <h2><a style="text-decoration: none;" href="">SuhanTech Student Database</a> </h2>
            <input class="mb-2 form-control" type="text" name="std_name" placeholder="Ener Your Name:">
            <input class="mb-2 form-control" type="number" name="std_roll" placeholder="Ener Your Roll:">
            <label for="image">Upload Your Image</label>
            <input class="mb-2 form-control" type="file" name="std_img" id="">
            <input type="submit" name="add_info" class="form-control" style="background-color: blue;color:white">
          
            <button class="mt-2 btn btn-primary" name="disData"> Display Data </button>
            
        </form>
       <?php  if(isset($return_msg)){
           echo $return_msg;
       }
       
        
       ?>
    </div>
    
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
     
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html> 
