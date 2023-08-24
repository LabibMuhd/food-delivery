<?php 
  global $con;
  $msg = "";

  if(isset($_POST['submit'])){
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
    $password=$_POST['current_password'];
    $new_password=$_POST['new_password'];
    $c_password=$_POST['confirm_password'];
    $password_hash=password_hash($new_password,PASSWORD_DEFAULT);
    
    $select_query="Select * from `user` where email='$email'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $name=$row_data['first_name'];
    $user_ip=getIPAddress();
    
    if(password_verify($password, $row_data['password'])){
      // Validate password strength
      $password_check = preg_match_all('/(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[@_*^`~":!?])[a-zA-Z0-9@_*^`~":!?]{8,}/m', $new_password);
      if($new_password!=$c_password){
        $msg = "<div class='alert alert-error'><p>Passwords do not match</p></div>";
        
      }
      else if(!$password_check) {
        $msg = "<div class='alert alert-error'>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</div>"; 
      }
      else{
        $update_query = mysqli_query($con,"update user set password='$password_hash' where email='$email'");
        if($update_query){
          echo "<script>window.open('signin.php','_self')</script>";
        }
      }
    }
    else{
        $msg = "<div class='alert alert-error'>Incorrect Password.</div>";
    }
  }
?>
        
        <form class="delete_account" action='' method='post'>  
          <?php echo $msg; ?>  
          <input type='password' placeholder='Enter current password' class='email' name='current_password' required>
          <input type='password' placeholder='Enter new password' class='email' name='new_password' required>
          <input type='password' placeholder='Confirm new password' class='email' name='confirm_password' required>
          <input type='submit' class='btn btn--search' name='submit' value='Change Password'>
        </form>