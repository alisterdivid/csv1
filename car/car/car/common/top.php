<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
	FB.init({appId: '<?php echo FACEBOOK_APP_ID;?>', cookie: true, status: true, xfbml: true});
</script>
<div class="topArea">
    <div class="header">
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <a class="navbar-brand" href="/" style="margin:0px; padding: 0px;">
                            <img id="logo-header" src="img/logo.png" alt="Logo" style="height:100px;">
							<?php // echo SITE_NAME; ?>
                        </a>
                    </div>
                    <div class="col-md-4"
                         style="color:#aaa; font-size:15px;font-family:'Roboto Condensed';margin-top:20px;">
                        <div>
                            <b>Service:</b> (123) 456-7890&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Sales:</b> (123) 456-7890
                        </div>
                        <div>
                            <i class="icon-envelope"></i>&nbsp;support@autoselectcars.com
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div style="margin-top:15px;">
							<?php if ( EC_isLogin() ) { ?>
                                <a style="color:#da5454; font-size:14px;font-family:'Open Sans';font-weight:600;cursor:pointer;"
                                   onclick="onLogOut()">LOG OUT</a>
							<?php } else { ?>
                                <a style="color:#da5454; font-size:14px;font-family:'Open Sans';font-weight:600;cursor:pointer;"
                                   onclick="onShowLoginForm()">LOG IN</a>
                                <br/>
                                <a style="color:#da5454; font-size:14px;font-family:'Open Sans';font-weight:600;cursor:pointer;"
                                   href="signUp.php">SIGN UP</a>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-default" role="navigation"
             style="border-top: 1px solid #404040; font-size: 14px; font-family:'Open Sans'; ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="topNavigation">
                            <li><a href="index.php" <?php if ( $pageId == 1 ) {
									echo 'class="activeMenu"';
								} ?>>Home</a></li>
                            <li><a href="carList.php" <?php if ( $pageId == 2 ) {
									echo 'class="activeMenu"';
								} ?>>Listing Cars</a></li>
							<?php if ( EC_isLogin() && EC_getCurrentType() != "A" ) { ?>
                                <li><a href="addCar.php" <?php if ( $pageId == 3 ) {
										echo 'class="activeMenu"';
									} ?>>Add Car</a></li>
							<?php } ?>
                            <li><a href="contactUs.php" <?php if ( $pageId == 4 ) {
									echo 'class="activeMenu"';
								} ?>>Contact Us</a></li>
                            <li><a href="aboutUs.php" <?php if ( $pageId == 5 ) {
									echo 'class="activeMenu"';
								} ?>>About Us</a></li>
							<?php if ( EC_isLogin() && EC_getCurrentType() == "A" ) { ?>
                                <li><a href="userMgrList.php" <?php if ( $pageId == 6 ) {
										echo 'class="activeMenu"';
									} ?>>Management</a></li>
							<?php } ?>

                        </ul>
                        <div class="clearboth"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="divLoginBackground"></div>
<div id="divLoginForm" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="reg-page">
                <div class="reg-header">
                    <h2>Login To <?php echo SITE_NAME; ?></h2>
                </div>

                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="icon-user"></i></span>
                    <input type="text" placeholder="Username" class="form-control" id="loginUsername">
                </div>
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                    <input type="password" placeholder="Password" class="form-control" id="loginPassword">
                </div>
                <div class="row" style="text-align:center;">
                    <div class="col-md-10 col-md-offset-1">
                        <button class="btn-u btn-block marginRight10" onclick="onLogInSubmit();">Log In</button>
                    </div>
                </div>
                <div class="row" style="text-align:center;margin-top:5px;">
                    <div class="col-md-10 col-md-offset-1">
                        <button class="btn-u btn-u-blue btn-block marginRight10" onclick="onSignInFacebook();"><i
                                    class="icon-facebook"></i> Sign In With FaceBook
                        </button>
                    </div>
                </div>
                <hr>
                <p><a class="color-blue" href="signUp.php">Click here</a> to register your account.</p>
            </div>
        </div>
    </div>
</div>