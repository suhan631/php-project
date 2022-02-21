<?php
include('function1.php');
$objCruddAdmin = new crudApp();
$objCruddAdmin->redirect_page();


  
  if(isset($_GET['status'])) {
    if($_GET['status']='delete'){
      $delete_id = $_GET['Id'];
      $objCruddAdmin->delete_data($delete_id);
      $empty_check1 = $objCruddAdmin->empty_data1();
      
      if($empty_check1==0){
        header('Location: empty.php');
      }else{
        header('Location: data.php');
      }
      
     }
  }
  $stdInfo = $objCruddAdmin->display_data();
  
      
  


?>
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container my-4 p-4 shadow">
    <table class="table table-responsive">
        <thead>
        <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $count = 1;
             while($suhan=mysqli_fetch_assoc($stdInfo)){ ?>
            <tr>
            <td> <?php if(isset($suhan['Id'])){
              
              echo $count;}  ?> </td>
            <td>
            <?php  if(isset($suhan['std_name'])){echo $suhan['std_name'];} ?>
            
            </td>
            <td>
            <?php if(isset($suhan['std_roll'])){echo $suhan['std_roll'];} ?>
            </td>
            <td> <img style="height: 20px;width: 20px;" src="upload/<?php  if(isset($suhan['std_img'])){echo $suhan['std_img'];}?>" alt=""> </td>
            <td>
                <a class="btn btn-success" href="edit1.php?status=edit&&Id=<?php echo $suhan['Id'];?>">Edit</a>
                <a class="btn btn-warning" href="?status=delete&&Id=<?php echo $suhan['Id']; ?>" name="del">Delete</a>
           
            </td> 
            </tr>
            
           <?php
            $count = $count + 1;
          } ?>
        </tbody>
        <a class="btn btn-primary" name="back" href="index.php">Back to add information page</a>
        </table>
      

    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>