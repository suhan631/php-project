<?php

Class crudApp{
    private $conn;
    public function __construct()
     {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = "";
        $dbname = 'crudapp';

        $this->conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        if(!($this->conn)){
            die("Database Connection Error!!");
        }
     }
     public function add_data($data){
       
         $std_name = $data['std_name'];
         $std_roll = $data['std_roll'];
         $std_img = $_FILES['std_img']['name'];
         $tmp_name = $_FILES['std_img']['tmp_name'];

         $query = "INSERT INTO student(std_name,std_roll,std_img) VALUES('$std_name',$std_roll,'$std_img')";
         if(mysqli_query($this->conn, $query)){
             move_uploaded_file($tmp_name, 'upload/'.$std_img);
             return "Information added successfully";
         }
     }
     public function display_data(){
         $query = "SELECT * FROM student";
         if(mysqli_query($this->conn, $query)){
             $return_data = mysqli_query($this->conn, $query);
             return $return_data;
         }
     }

     public function display_data_by_id($id){
        $query = "SELECT * FROM student WHERE Id=$id";
        if(mysqli_query($this->conn, $query)){
            $return_data = mysqli_query($this->conn, $query);
            $student_data = mysqli_fetch_assoc($return_data);
            return $student_data;
        }
    }
    public function update_data($data){
        $std_name = $data['u_std_name'];
        $std_roll = $data['u_std_roll'];
        $std_id= $data['std_id'];
        $std_img = $_FILES['u_std_img']['name'];
        $tmp_name = $_FILES['u_std_img']['tmp_name'];

        $query = "UPDATE student SET std_name='$std_name', std_roll='$std_roll', std_img='$std_img' WHERE Id='$std_id'";
        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($tmp_name,'upload/'.$std_img);
            return "Information updated successfully";
        }
    }
    public function delete_data($id){
        $catch_img = "SELECT * FROM student WHERE Id=$id";
        $query1 = mysqli_query($this->conn, $catch_img);
        $std_info = mysqli_fetch_assoc($query1);
      
        $query = "DELETE FROM student WHERE Id=$id";
        if(mysqli_query($this->conn, $query)){
         
            return "Information deleted successfully";
        }
    }
    public function redirect_page(){
        if(isset($_GET['Id'])){
            header('Location: data.php');
        }
    }
  
    public function back_data(){
        header('Location: data.php');
    }
    public function empty_data(){
        $query = "SELECT * FROM student";
        $return_data = mysqli_query($this->conn, $query);
        if(mysqli_num_rows($return_data) == 0){
            return 0;
        }else{
            return 1;
        }
    }
    public function empty_data1(){
        $query = "SELECT * FROM student";
        $return_data = mysqli_query($this->conn, $query);
        if(mysqli_num_rows($return_data) == 0){
            return 0;
        }else{
            return 1;
        }
    }
    public function empty_id(){
        $count = 0;
    }
   
}

?>