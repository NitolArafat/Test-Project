
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Soulmate</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes"> 

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/pages/signin.css" rel="stylesheet" type="text/css">

    </head>

    <body>
        <div class="navbar navbar-fixed-top">

            <div class="navbar-inner">

                <div class="container">

                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <a class="brand" href="index.html">
                        Soulmate				
                    </a>		

                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="">						
                                <a href="login.html" class="">
                                    Already have an account? Login now
                                </a>

                            </li>
                            <li class="">						
                                <a href="index.html" class="">
                                    <i class="icon-chevron-left"></i>
                                    Back to Homepage
                                </a>

                            </li>
                        </ul>

                    </div><!--/.nav-collapse -->	

                </div> <!-- /container -->

            </div> <!-- /navbar-inner -->

        </div> <!-- /navbar -->



        <div class="account-container register">

            <div class="content clearfix">

                <form action="<?php echo base_url() ?>save-image" method="post" enctype="multipart/form-data">

                    <h2>Signup for Free Account</h2>			

                    <div class="login-fields">

                        <span style="color: green; font-weight: bold;font-size: 16px;">.

                            <?php
                            $msg = $this->session->userdata('message');
                            if ($msg) {
                                echo $msg;
                                $this->session->unset_userdata('message');
                            }
                            ?>

                        </span>
                        <span style="color: Red; font-weight: bold;font-size: 16px;">.

                            <?php
                            $msg = $this->session->userdata('execption');
                            if ($msg) {
                                echo $msg;
                                $this->session->unset_userdata('execption');
                            }
                            ?>

                        </span>

                        <div class="field">
                            <label for="confirm_password">Picture</label>
                            <input type="file" id="image" name="image"  class="login"/>

                        </div> <!-- /field -->
                    </div> <!-- /login-fields -->

                    <div class="login-actions">


                        <button class="button btn btn-primary btn-large">Register</button>

                    </div> <!-- .actions -->

                </form>

            </div> <!-- /content -->

        </div> <!-- /account-container -->


        <!-- Text Under Box -->
        <div class="login-extra">
            Already have an account? <a href="login.html">Login to your account</a>
        </div> <!-- /login-extra -->


        <script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>js/signin.js"></script>
    </body>

</html>
<script type="text/javascript">

  function checkPass()
    {
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
  //  alert(pass1);
    var pass2 = document.getElementById('pass2');
    // alert(pass2);
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match.
        //Set the color to the good color and inform
        //the user that they have entered the correct password
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  
</script>
 