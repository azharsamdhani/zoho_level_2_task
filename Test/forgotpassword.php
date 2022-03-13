
    <?php
    require('config.php');
    session_start();
    
    if (isset($_POST['submit'])) {
        
        $email = stripslashes($_REQUEST['email']);    
        $name = mysqli_real_escape_string($con, $email);
        $secret = stripslashes($_REQUEST['secret']);
        $secret = mysqli_real_escape_string($con, $secret);
        
        $query    = "SELECT * FROM `tblsignup` WHERE email='$email'
                     AND secret='" . $secret . "'";
        $ret = mysqli_query($con, $query) or die(mysql_error());
        
        $result=mysqli_fetch_assoc($ret);
        
        if ($result > 0 ) {
           
            $_SESSION['secret'] = $result['secret'];
            
            header("Location: newpassword.php");
        } else {

          echo "<script>location.href=''</script>";
        }
    }
?>
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
        <div class="signup-page">
            <div class="form">
              
              <form class="signup-form" method="POST">
                  <h3 class="message1">Forgot Password</h3>
                
                <input type="email" placeholder="email address" name="email" />
                
                <input type="text" placeholder="secret" name="secret" />
    
        
         <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
         <p class="message"><a href="newpassword.php"></a></p>
        </form>

       </div>
    </body>
    <script>
        $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>



</html>
