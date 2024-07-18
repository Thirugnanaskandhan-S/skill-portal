<!DOCTYPE html>
<html lang="en">
<?php
include 'components/head.php';
session_start();
?>

<body class="inner_page login">
   <div class="full_container">
      <div class="container">
         <div class="center verticle_center full_height">
            <div class="login_section">
               <div style="background: url('images/bit_banner.jpg');padding: 100px 0;background-position: center center;position: relative;background-size: cover;" class="logo_login">
                  <div class="center">
                     <!-- <img width="210" src="images/bit_banner.jpg" alt="#" /> -->
                  </div>
               </div>
               <div class="login_form">
                  <form action="api/auth/login.php" method="post">
                     <?php if (isset($_GET['error'])) { ?>
                        <p style="background-color: rgba(255, 0, 0, 0.7);padding: 5px;margin-bottom: 30px;color: white;font-weight: 400;" class="error"><?php echo $_GET['error']; ?></p>
                     <?php } ?>
                     <fieldset>
                        <div class="field">
                           <label class="label_field">UserName</label>
                           <input type="text" name="username" placeholder="Enter Username" />
                        </div>
                        <div class="field">
                           <label class="label_field">Password</label>
                           <input type="password" name="password" placeholder="Enter Password" />
                        </div>
                        <div class="field">
                           <!-- <label class="label_field hidden">hidden label</label>
                           <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember
                              Me</label> -->
                           <a class="forgot" href="">Forgotten Password?</a>
                        </div>
                        <div class="field margin_0">
                           <label class="label_field hidden">hidden label</label>
                           <button class="main_bt">Sign In</button>
                        </div>
                     </fieldset>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>

</html>