<?php
if (is_user_logged_in())
{
    wp_redirect(home_url());
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Espace membre</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/assets/assets_login_page/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/assets_login_page/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/assets_login_page/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/assets_login_page/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/assets_login_page/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/assets_login_page/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Espace membre
				</span>
				<div class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Entrer votre pseudo">
						<input class="input100" id="user_login" type="text" name="user_login" placeholder="Entrer votre pseudo">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Entrer le mote de passe">
						<input class="input100" id="user_pass" type="password" name="user_pass" placeholder="Mot de passe">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" id="submit">
							Connexion
						</button>
                    </div>
                    <span class="log-in-footer"></span>

                </div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php bloginfo('template_url'); ?>/assets/assets_login_page/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
   <script src="<?php bloginfo('template_url'); ?>/assets/assets_login_page/js/main.js"></script>

   <script>
       $('document').ready(function(){
             $('#submit').on('click',function(){

            var userLogin = $('#user_login').val(),
                userPass  = $('#user_pass').val(),
                action    = 'custom_login',
                param     = 'test_login';

            $.ajax({
                url: "http://automatique-jijel.ml/wp-admin/admin-ajax.php",
                type: "POST",
                beforeSend: function(){
                    $('#submit').text("Vérification...");
                },
                data: {action:action,param:param,userLogin:userLogin,userPass:userPass},
                success: function(response)
                {
                    var data = $.parseJSON(response);
                    if (data.status == 1)
                    {
                        $('.log-in-footer').html("<center><b style='color:green'>Informations Correctes</b></center>");
                        setTimeout("window.location.href='http://automatique-jijel.ml/'",1000);
                    }
                    else
                    {
                        $('.log-in-footer').html("<center><b style='color:red'>Informations Incorrectes</b></center>");
                        $('#submit').text("Connection");
                    }
                }
            });
            });
       });
   </script> 
</body>
</html>