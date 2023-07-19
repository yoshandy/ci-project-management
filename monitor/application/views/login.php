<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Material Dashboard Pro by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url()?>assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url()?>assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
    
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="<?php echo base_url()?>assets/img/login.jpeg">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form action="<?php echo site_url('Welcome/cek_login')?>" method="post" enctype="multipart/form-data">
                                <div class="card card-login">
                                    <div class="card-header text-center" data-background-color="rose">
                                    <br>
                                        <h4 class="card-title">Login</h4>
                                        <div class="social-line">
                                         
                                          <br>
                                        </div>
                                    </div>
                                    
                                    <div class="card-content">
                                        
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Email address</label>
                                                <input type="text" class="form-control"  name="username">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Password</label>
                                                <input type="password" class="form-control"  name="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Let's go</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    
                   
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/material.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url()?>assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url()?>assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url()?>assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?php echo base_url()?>assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url()?>assets/js/bootstrap-notify.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="<?php echo base_url()?>assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="<?php echo base_url()?>assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="<?php echo base_url()?>assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="<?php echo base_url()?>assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?php echo base_url()?>assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url()?>assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo base_url()?>assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo base_url()?>assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url()?>assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url()?>assets/js/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>