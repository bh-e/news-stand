<?php include 'components/session-check-index.php' ?>
<?php require '_database/database.php'; ?>
<?php include 'controllers/base/head.php' ?>
<body>	
    <script type="text/javascript"> 
        ChangeIt();
    </script>
<?php include 'controllers/navigation/index-before-login-navigation.php' ?>
    <section id="home" name="home"></section>
        <div id="headerwrap">
            <div class="container">
                <div class="row centered">
                    <div class="col-lg-12">
                    </div>
                    <div class="row">
                    <div class="col-xs-7 col-sm-6 col-lg-6">
                        <h1><b>News-Stand</b></h1>
                        <h3>Get your news today</h3>
                        <?php include 'controllers/form/registration-form.php' ?>
                    </div>
                <div class="col-xs-5 col-sm-7 col-lg-6"><br><br><br><br>
                 <img src="http://www.dnncserver.nl/portals/dnncsupportlicensing/images/DnnStore/DnnCNewsStand/prod-logo.png">
                </div>
                <div class="col-lg-8">
                </div>
                <div class="col-lg-2">
                    <br>
                </div>
            </div>
        </div> <!--/ .container -->
    </div><!--/ #headerwrap -->
</body>    
