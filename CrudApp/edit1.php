<?php
include('function1.php');

$objCruddAdmin = new crudApp();



if(isset($_GET['status'])){
    if($_GET['status']='edit'){
        $id = $_GET['Id'];
        $return_suhan = $objCruddAdmin->display_data_by_id($id);
    }
}
if(isset($_POST['edit_btn'])){
  
  $return_msg = $objCruddAdmin->update_data($_POST);
}

if(isset($_POST['back'])){
  $objCruddAdmin->back_data();
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

    <title>Crud App</title>
  </head>
  <body>
     
    <div class="container my-4 p-4 shadow">
    <?php  if(isset($return_msg)){
           echo $return_msg;
       }; ?>
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <h2><a style="text-decoration: none;" href="">SuhanTech Student Database</a> </h2>
            <input class="mb-2 form-control" type="text" name="u_std_name" value="<?php echo $return_suhan['std_name']; ?>">
            <input class="mb-2 form-control" type="number" name="u_std_roll" value="<?php echo $return_suhan['std_roll']; ?>">
            <label for="image">Upload Your Image</label>
            <input class="mb-2 form-control" type="file" name="u_std_img" id="">
            <input type="hidden" name="std_id" value="<?php echo $return_suhan['Id']; ?>">
            <input type="submit" value="Update Information" name="edit_btn" class="form-control" style="background-color: blue;color:white">
            <button class="mt-2 btn btn-primary" name="back"> Back to Display </button>
          </form>
      
    </div>
    
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html> 
