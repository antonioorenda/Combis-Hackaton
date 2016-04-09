<?php
    var_dump($_SESSION);
    if (!array_key_exists ('user', $_SESSION)) {
        redirect("login");
    }
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Olive manager</title>
    
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url(); ?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    
    <!--clockpicker-->
    <link href="<?php echo base_url(); ?>assets/clockpicker/bootstrap-clockpicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/clockpicker/jquery-clockpicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/clockpicker/jquery-clockpicker.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/clockpicker/standalone.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/clockpicker/bootstrap-clockpicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/clockpicker/jquery-clockpicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/clockpicker/jquery-clockpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/clockpicker/clockpicker.js"></script>
    <!--end of clockpicker-->

    <!--datepicker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <link href="<?php echo base_url(); ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url(); ?>assets/img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['user']->ime . " " . $_SESSION['user']->prezime ?></strong>
                             </span> <span class="text-muted text-xs block"><?= $_SESSION['user']->naziv ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a id="logout_submit" href="<?php base_url() ?>login/logout">Logout</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    
                    <?php $this->load->view("menu/".$_SESSION['user']->naziv.".php");?>
                    
                    
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Olive Manager</span>
                </li>
                
                <li>
                    <a href="<?php base_url() ?>login/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>
        </nav>
        </div>
    
        <div class="row">
            <div class="col-lg-12">
                
                <?php echo $body ?>
                
                <div class="footer">
                    <div>
                        <strong>Copyright</strong> DATA Team &copy; 2016
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- EayPIE -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo base_url(); ?>assets/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo base_url(); ?>assets/js/plugins/chartJs/Chart.min.js"></script>



    <script>
        $(document).ready(function() {

            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#464f88"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );

            var doughnutData = [
                {
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 50,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 100,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var doughnutOptions = {
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                percentageInnerCutout: 45, // This is 0 for Pie charts
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };

            var ctx = document.getElementById("doughnutChart").getContext("2d");
            var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

            var polarData = [
                {
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 140,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 200,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var polarOptions = {
                scaleShowLabelBackdrop: true,
                scaleBackdropColor: "rgba(255,255,255,0.75)",
                scaleBeginAtZero: true,
                scaleBackdropPaddingY: 1,
                scaleBackdropPaddingX: 1,
                scaleShowLine: true,
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };
            var ctx = document.getElementById("polarChart").getContext("2d");
            var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

        });
    </script>
</body>
</html>
