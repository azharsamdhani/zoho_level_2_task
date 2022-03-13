<?php
include('config.php');
if(isset($_POST['submit'])){
    

$full_name=$_POST['full_name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];


        $ret=mysqli_query($con, "select id from tblregistration where email='$email' or phone='$phone'");
        $result=mysqli_fetch_array($ret);
        if($result>0){
            echo "<script>alert('This email already associated with another account');</script>";
        }
        else{
            
            
        
            $query = mysqli_query($con, "INSERT INTO tblregistration SET full_name='$full_name', email='$email', phone='$phone' ");
            
            if($query){
                echo "<script>alert('Registered Successfully!')</script>";
                echo "<script>window.location.href='contact.php';</script>";
            } else {
                echo "<script>alert('Something went wrong. Please try again.')</script>";
                
            }
        }




    if(empty($fname))
    {
        $error = "Enter your fullname !";
        $code = 1;
    }


    else{
        
       
    }
}
?>


<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <style>
 input { text-align: center;}
 legend { text-align: center;}
 label { text-align: center}
 th{
    background: #a4a4a4 !important;
    color: #fff;
    border: 1px solid #000 !important;
    padding: 10px !important;
    text-align:center;
}
td{
    text-align:center;
    border: 1px solid #000 !important;
}
 
 </style>  

    <body>
        <div class="container" >

            <form class="well form-horizontal"  method="POST"  id="contact_form">
        <fieldset>
        
        <legend> Contact Form and Contact List Page </legend>
        <legend> Add Contacts </legend>
        
        
        <div class="logout">
            <a href="logout.php" style="float:right;" class="btn btn-primary" >LOGOUT</a>
        
        <div class="form-group">
          <label class="col-md-4 control-label"style="margin-left:auto;margin-right:auto;display:block;margin-top:0%;margin-bottom:0%">Full Name</label>  
          <div class="col-md-4 inputGroupContainer"style="margin-left:auto;margin-right:auto;display:block;margin-top:1%;margin-bottom:0%">
          <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input type="text" placeholder="Full Name" class="form-control"  name="full_name" required>
            </div>
          </div>
        </div>
        
        
               
        <div class="form-group">
          <label class="col-md-4 control-label"style="margin-left:auto;margin-right:auto;display:block;margin-top:0%;margin-bottom:0%">Phone Number  </label>  
            <div class="col-md-4 inputGroupContainer"style="margin-left:auto;margin-right:auto;display:block;margin-top:1%;margin-bottom:0%">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
          <input type="number" placeholder="1234567890"  class="form-control" name="phone" required>
            </div>
          </div>
        </div>



        <div class="form-group">
          <label class="col-md-4 control-label"style="margin-left:auto;margin-right:auto;display:block;margin-top:0%;margin-bottom:0%">E-Mail</label>  
            <div class="col-md-4 inputGroupContainer"style="margin-left:auto;margin-right:auto;display:block;margin-top:1%;margin-bottom:0%">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
          <input type="email"   placeholder="E-Mail Address" class="form-control"  name="email" required>
            </div>
          </div>
        </div>



        <div class="button">
            <button type="submit" style="margin-left:auto;margin-right:auto;display:block;margin-top:3%;margin-bottom:0%"class="btn btn-primary" name="submit"> save </button>
        </div>
        
        
        </fieldset>
        </form>
        </div>

    </div>
        <?php 
        $result=mysqli_query($con, "select * from tblregistration");
        ?>
        <div class="container">
        <html>
<head>
<style>
h2 {
    text-align: center;
}

</style>
</head>
<body>

<h2> Mycontacts </h2>

</body>
</html>
        <table class="table table-bordered" >
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
</tr>
            <tbody>
                <?php 
                $i=1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['full_name'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['email'];?></td>
                
                </tr>
                <?php $i++;} ?>
            </tbody>
        </table>
        
        </div>


            </div>
    </body>
   
</html>