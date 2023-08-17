<?php
include 'config.php';
$message2 = "";
if (isset($_POST['submit'])) 
{
    //`title`, `description`
    $email = $_POST['title'];
           $description=$_POST['description'];
          
         
           


try{
    $to_email =$recipient_email;
    $subject = $description;
    $body = "Hi Please fill the form".'http://localhost/webforms/admin/generateForms2.php';
    $headers = "From: sender email";
    
    if (mail($to_email, $subject, $body, $headers)) {
        $message2= "Email successfully sent to $to_email...";
    } else {
        $message2= "Email sending failed...";
    }


}
catch(Exception $e){
    $message2="mail has been sent";  
}
        

           
}
?>








<?php include_once "header.php"; 
include_once "nav.php";
?>

  
    <!-- main content here -->
 
<main>


<form method="post" action="sendEmail.php">
<div>
    
 
<table>
<tr> <td> <h3>Please fill the form</h3></td> <td> <span ></span ></td>   </tr>
<tr> <td>Enter Email </td> <td><input type="email" name="title"><td> <span >*</span ></td>   </tr>
<tr> <td>Send Message </td> <td><input type="text" name="description"><td> <span >*</span ></td>   </tr>

<tr> <td>  <button type="submit" name="submit"> Submit </button> </td>
 <td> <?php echo $message2?>  </td>  </tr>


</table>

</div>
</form>

</main>


   

<?php include_once "footer.php"; ?>
</body>
</html>
