<?php include 'config.php';
 
$id= $_GET['id'];


$insert = $con->query("DELETE FROM `category_table` WHERE `id`='$id'"); 
             if($insert)
             { 
               
                header('Location:http://localhost/webforms/admin/category.php');

            }else{ 
                header('Location:http://localhost/webforms/admin/category.php');
            }  

?>