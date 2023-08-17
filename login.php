<!-- backend php script -->
<?php include 'config.php'; 
if(isset($_POST['login']))
{
    $user_name = $_POST['user_name'];
	$password = $_POST['password'];
$usertype=$_POST['usertype'];
if($usertype=="admin" && $user_name=="admin@gmail.com" && $password=="admin")
{

    header('Location:http://localhost/webforms/admin/index.php');

}
    $query="SELECT * FROM  `users` where  `user_name`= '$user_name' and  `password`='$password' ";
	
    $result = mysqli_query($con, $query);
       if ($result->num_rows > 0) 
           {
               session_start();//start the session
               $_SESSION['username'] =$user_name;
               header('Location:http://localhost/webforms/user/index.php');
       
           }
       else{
       
       echo"Wrong user id or password";
           }

}


?>


<!-- Login Interface GUI -->
<?php include_once "header.php"; ?>
<main>
    <section>
    <?php include_once "nav.php"; ?>
    </section>
    
    <section>
    <form method="post" action="login.php">
<div>
<table>
<tr> <td>User Type </td>  <td> 
<select name="usertype" id="usertype">
  <option value="admin">Admin</option>
  <option value="user">User</option>
  
</select>
</td> </tr>
<tr> <td>Email <span class="error" >*</span ></td> <td><input type="email" name="user_name" required>    </td>   </tr>
<tr><td>Password <span class="error" >*</span ></td> <td><input type="password" name="password" required> </td>   </tr>

<tr> <td>   </td>
 <td> <button type="submit" name="login"> Login </button>  </td>   </tr>


</table>

</div>
</form>
    </section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>
