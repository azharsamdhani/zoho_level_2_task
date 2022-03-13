<html>
    <head>
<style>


.signup-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #060f01; 
  background: -webkit-linear-gradient(right, #060f01, #060f01);
  background: -moz-linear-gradient(right, #060f01, #060f01);
  background: -o-linear-gradient(right, #060f01, #060f01);
  background: linear-gradient(to left, #060f01, #060f01);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
.message1{
    font-family: 'Fredoka', sans-serif;
}
</style>
    </head>
    <body>


    <?php
    include('config.php');
    session_start();
    



    if(isset($_POST['save'])){
        $newpassword = $_POST['newpassword'];
        $confirmpassword = $_POST['confirmpassword'];
        $_POST['newpassword'] === $_POST['confirmpassword'];
        $secret = $_SESSION['secret'];
        
        
       
            
        $query = mysqli_query($con, "update tblsignup SET password='$newpassword' where secret='$secret'");

        
        
        if($query){
            
            echo"<script>['newpassword'] === ['confirmpassword']</script>";
            echo "<script>alert('Password updated Successfully!')</script>";
            session_destroy();
            echo "<script>window.location.href='login.php';</script>";
        } else {
            
            echo "<script>alert('Something went wrong. Please try again.')</script>";
            
        }
        


    }
    ?>

        <div class="signup-page">
            <div class="form">
              
              <form class="signup-form" method="POST" action='#' >
                  
              <h2 class="message1">New password</h2>
                  
 
                <input type="password" placeholder="newpassword" name="newpassword"  minlength="6" maxlength="10"  />
                <input type="password" placeholder="confirmpassword" name="confirmpassword"  minlength="6" maxlength="10"  />
                <div id="message">
  
</div>
         <button type="save" class="btn btn-primary" name="save" >SAVE</button>
         
         
        </form>

       </div>
    </body>
    
    <script>
        $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
        
     


</html>
