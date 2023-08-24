<?php 
  global $con;
  $fname=$_SESSION['name'];
  $email=$_SESSION['email'];
  $get_details="Select * from `user` where first_name='$fname' and email='$email'";
  $result_query=mysqli_query($con,$get_details);
  $row_data=mysqli_fetch_assoc($result_query);
  $u_last_name=$row_data['last_name'];
  $u_email=$row_data['email'];
  $u_phone=$row_data['phone'];
  $u_address=$row_data['address'];

  echo "<div class='heading'>
          <ion-icon name='arrow-back-outline' class='contact-icon'></ion-icon>
          <h2 class='heading-tertiary'>Edit Account</h2>
        </div>
        <hr>
        <form action='' method='post'>
          <div class='side-by--side'>
            <input type='text' placeholder='Firstname' class='input-box' name='first_name' autocomplete='off' value='$fname' required>
            <input type='text' placeholder='Lastname' class='input-box' name='last_name' autocomplete='off' value='$u_last_name' required>
          </div>
          <div class='side-by--side'>
            <input type='email' placeholder='Someone@example.com' name='email' class='input-box' value='$u_email' required>
            <input type='text' placeholder='Phone number' name='phone_num' class='input-box' value='$u_phone' required>
          </div>
          <input type='text' placeholder='Address' class='address-box' name='address' value='$u_address' required>
          <input type='submit' class='btn btn--search' name='update_user' value='Save'>
        </form>";

if(isset($_POST['update_user'])){
  $update_id=$row_data['user_id'];
  $first_name=$_POST['first_name'];
  $lname=$_POST['last_name'];
  $user_email=$_POST['email'];
  $user_phone=$_POST['phone'];
  $user_address=$_POST['address'];

  $update_data="update `user` set first_name='$first_name',
   last_name='$lname',user_email='$user_email',user_address='$user_address',user_mobile='$user_phone' where user_id=$update_id";
  $result_query_update=mysqli_query($con,$update_data);
  if($result_query_update){
    echo "<script>alert('Data uploaded succesfully')</script>";
    echo "<script>window.open('users_area/logout.php', '_self')</script>";
  }
}

  ?>