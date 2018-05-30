<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: quangctn
 * Date: 18/05/2017
 * Time: 09:39
 */?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content=""/>
<meta name="keywords" content="" />
<meta name="robots" content="all,index,follow"/>
<!--Logo --> 
<link rel="icon" href="" type="image/png">
<!-- Css/Js -->
<link href='<?php echo base_url();?>/css/layout.css' rel="stylesheet" type="text/css" media="all">
<link href='<?php echo base_url();?>/css/phone.css")' rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="'<?php echo base_url();?>js/bootstrap.min.js")"></script>
<!-- Title -->
<title>TranhTuongNhuKom</title>
</head>
<body id="bottom">
        <?php $this->load->view("online/component/phone.php"); ?>
            
            <!-- Top Background Image Wrapper -->
        <?php $this->load->view("online/component/top.php");?>
        <?php $this->load->view("online/component/menu.php");?>

            <!-- End Top Background Image Wrapper -->
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
        <div class="wrapper row3">
            <main class="hoc container clear">
                    <!-- main body -->
                    <!-- ################################################################################################ -->
                <br>
                <br>
                <br>
                @for(menu <- lstMenu) {
                    @if(menu.id.equals(2) || menu.id.equals(3)) {
                        @groupLayout(lstSubMenu.apply(menu.id), menu.name)
                    }
                }

                    <!-- ################################################################################################ -->
                    <!-- / main body -->
                <div class="clear"></div>
            </main>
        </div>
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->

            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
        @bottom.render(true, true)

            <!-- JAVASCRIPTS -->
        <script src="@routes.Assets.versioned("javascripts/jquery.min.js")"></script>
        <script src="@routes.Assets.versioned("javascripts/jquery.backtotop.js")"></script>
        <script src="@routes.Assets.versioned("javascripts/jquery.mobilemenu.js")"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script src="@routes.Assets.versioned("javascripts/gmaps.js")"></script>

</body>
</html>