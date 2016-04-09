<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Olive Manager</title>

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    </head>
    <body class="gray-bg">

        <div class="middle-box text-center loginscreen  animated fadeInDown">

            <div>
                <div>
                    <h4 class="logo-name">Oli</h4>
                </div>
                
                <h3>Welcome to Olive Manager</h3>
                <p>
                    Everything in one place!
                </p>
                <p>Login in to see it in action.</p>
                 <?php echo validation_errors(); ?>    
                <form action="<?php echo base_url(); ?>home" method="post" accept-charset="utf-8" class="m-t" role="form">
                    <div class="form-group">
                        <input type="text" id="login" name="username" class="form-control" placeholder="Username" required="">

                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">

                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                    </div>

                    <a href="<?php echo base_url(); ?>forgot_password"><small>Forgot password?</small></a>
                    <p class="text-muted text-center"><small>Do not have an account?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url(); ?>users_creation/add">Create an account</a>
                </form>
                <p class="m-t"> <small>DATA Team &copy; 2016</small> </p>
            </div>
        </div>

        <div class="footer">
            <div class="pull-right">
                Olive <strong>Manager</strong>
            </div>
            <div>
                <strong>Copyright</strong> DATA Team &copy; 2016
            </div>
        </div>

<!-- Mainly scripts -->
<script src="assets/js/jquery-2.1.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="assets/js/inspinia.js"></script>
<script src="assets/js/plugins/pace/pace.min.js"></script>

<script>
$(document).ready(function(){
    $("#login").focus();
});
</script>

</body>
</html>

