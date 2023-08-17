
<!-- backend php script -->

<?php
 include 'config.php';//include config file
//declare variable for error
 $error="";
 $full_nameErr=""; $user_nameErr=""; $passwordErr="";$RepasswordErr=""; $cityErr=""; $emailErr=""; $mobileErr="";

 if(isset($_POST['signup'])) //check signup button is clicked or not
 {
   
    $data = $_POST;


    // check empty data
    if($data==null)
    {
        $error="Please fill the form!";
    }

    if (empty($data['full_name']) ||
    empty($data['user_name']) ||
    empty($data['password']) ||
    empty($data['retypePassword'])||empty($data['city']) ||empty($data['email'])||empty($data['mobile']) ) 
{
    
    $error="Please fill all required fields!";
}
//get data from input
$full_name=$data['full_name'];
$user_name=$data['user_name'];
$password=$data['password'];
$city=$data['city'];
$email=$data['email'];
$mobile=$data['mobile'];

//validate full name
$regex = '/^[a-zA-Z\s]{3,100}$/';//regular expression

if (preg_match($regex , $full_name)) {
    $full_nameErr= "valid";
} 
else 
{
    $full_nameErr="Full Name should be at least 3-100 characters in length and should include at least one upper case letter and 1 lowercase letter.";
}
// validate user name


if (preg_match('/^[a-zA-Z0-9]{8,100}$/', $user_name)) 
{
    $user_nameErr= "valid";
} else {
    $user_nameErr= "Must be 8 to 100 characters in length, should contain alphabets and alphanumeric characters with no special characters and space.";
}

if (empty($_POST["email"])) 
  {
    $emailErr = "Email is required";
  } 
  else
   {
    $email = $_POST["email"];
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
  $emailErr = "Invalid email format"; 
}
else {$emailErr="valid";}

  }
	
if ($data['password'] !== $data['retypePassword']) 
{
    $RepasswordErr="Password and Confirm password should match!";   
}
$password=$data['password'];
// Validate password strength
if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,20}$/', $password))
 {
    $passwordErr= "valid";
} 
else 
{
    $passwordErr="Password is invalid.";
}

//mobile validation
$mobile=$data['mobile'];
if(preg_match('/^[0-9]{10}+$/', $mobile)) {
    $mobileErr= "valid";
    } 
    else
     {
        $mobileErr=" Invalid Phone Number";
    }

    if ($full_nameErr== "valid" && $user_nameErr== "valid" && $passwordErr== "valid"  && $emailErr== "valid" && $mobileErr== "valid")
    {
        //insert data into table                                       
     echo   $query= "INSERT INTO `users`(`full_name`, `user_name`, `password`, `city`, `email`, `mobile`) VALUES ('$full_name','$user_name','$password','$city','$email','$mobile')";
        $insert = mysqli_query($con,$query);
        $error=" User Registered Successfully!";

    }




 }

 if(isset($_POST['reset'])) //check reset button is clicked or not
 {
    header('Location:'.'signup.php');
 }
 ?>


<!-- Signup Interface  -->
<?php include_once "header.php"; ?>
<main>
    <section>
    <?php include_once "nav.php"; ?>
    </section>
    
    <section>
    <form method="post" action="signup.php">
<div>
    
 
<table>
<tr> <td> <h3>Please fill the form</h3></td> <td> <span class="error" ><?php echo $error?></span ></td>   </tr>
<tr> <td>Full Name </td> <td><input type="text" name="full_name"><span class="error" ><?php echo   $full_nameErr?></span ></td>   </tr>
<tr> <td>User Name </td> <td><input type="text" name="user_name"><span class="error" ><?php echo   $user_nameErr?></span ></td>   </tr>
<tr><td> Password </td> <td><input type="password" name="password"><span class="error" ><?php echo   $passwordErr?></span ></td>   </tr>
<tr><td> Retype Password </td> <td><input type="password" name="retypePassword"><span class="error" ><?php echo  $RepasswordErr?></span ></td>   </tr>
<tr><td>City </td> <td>
<select name="city" id="city" >
  <option value="Chunian">Chunian</option>
  <option value="Pattoki">Pattoki</option>
  <option value="Lahore">Lahore</option>
  <option value="Islamabad">Islamabad</option>
  <option value="Karachi">Karachi</option>
  <option value="Peshawar">Peshawar</option>
  <option value="Jahlem">Peshawar</option>
  <option value="Gujrat">Gujrat</option>
  
</select>
   </td>   </tr>
<tr> <td>Email</td> <td><input type="text" name="email"> <span class="error" ><?php echo $emailErr?></span >   </td>  
 </tr>
<tr> <td>Mobile No </td> <td><input type="number" name="mobile"> <span class="error" >  <?php echo   $mobileErr?></span >   </td>   </tr>

<tr> <td>  <button type="submit" name="signup"> Signup </button> </td>
 <td>  <button type="submit" name="reset"> Reset </button> </td>   </tr>


</table>

</div>
</form>
    </section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>
