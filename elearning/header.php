<!DOCTYPE html>
<html lang="ar">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
    <?php wp_head();?>
</head>
<body>

	<!-- <div id="preloader"></div> -->


    <!-- Start of Header section
        ============================================= -->
    <header>
        <div id="main-menu"  class="main-menu-container header-style-2">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="header-top-text">
                                <span>Université Mohamed Seddik Benyahia, Jijel</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="header-top-bar ul-li">
                                <ul>
                                    <li><i class="fas fa-phone-square"></i>0672083940</li>
                                    <li>
                                        <select>
                                            <option value="12">Français</option>
                                        </select>
                                    </li>
                                    <?php if (!is_user_logged_in())
                                    { ?>
                                    <li>
                                        <a data-toggle="modal" data-target="#myModal" href="#">Espace membre</a>
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header backgroud-style">
                                                        <div class="gradient-bg"></div>
                                                        <div class="popup-logo">
                                                            <img src="<?php echo get_theme_file_uri('assets/img/logo/logo.png'); ?>" alt="">
                                                        </div>
                                                        <div class="popup-text text-center">
                                                            <h2> <span>Espcace Membre</span></h2>
                                                            <p><span>connectez-vous pour gérer votre compte</span></p>
                                                        </div>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="contact_form">
                                                            <div class="contact-info">
                                                                <input class="name" name="user_login" id="user_login" type="text" placeholder="Entrer votre pseudo">
                                                            </div>
                                                            <div class="contact-info">
                                                                <input class="email" name="user_pass" id="user_pass" type="password" placeholder="Entrer votre mot de passe">
                                                            </div>
                                                            <div class="nws-button text-center white text-capitalize">
                                                                <button type="submit" id="submit" value="Submit">Connexion</button>
                                                            </div>
                                                        </div>
                                                        <div class="log-in-footer text-center">
                                                            <p style="color:blue">قال الله جل وعلا: {إِنَّ اللَّهَ وَمَلائِكَتَهُ يُصَلُّونَ عَلَى النَّبِيِّ يَا أَيُّهَا الَّذِينَ آمَنُوا صَلُّوا عَلَيْهِ وَسَلِّمُوا تَسْلِيمًا} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                        <?php
                                    }
                                    else
                                    {?>
                                        <li><a href="<?php echo site_url('/wp-admin');?>">Cpanel</a></li>
                                       <li><a href="<?php echo wp_logout_url();?>">Déconnexion</a></li>
                                    <?php }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="main-menu">
                <div class="container">
                    <div class="navbar-default">
                        <div class="navbar-header float-left">
                            <a class="navbar-brand text-uppercase" href="#"><img src="<?php echo get_theme_file_uri('assets/img/logo/logo.png');?>" alt="logo"></a>
                        </div><!-- /.navbar-header -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <nav class="navbar-menu float-right">
                            <div class="nav-menu ul-li">
                                <ul>
                                    <li><a href="<?php echo get_home_url(); ?>">Accueil</a></li>
                                    <li><a href="<?php echo site_url('/category/affichage'); ?>">Affichage</a></li>
                                    <li><a href="<?php echo site_url('/blog'); ?>">Articles</a></li>
                                    <li class="menu-item-has-children ul-li-block">
                                        <a href="#!">Modules</a>
                                        <ul class="sub-menu">
                                            <li><a href="<?php echo site_url('/category/l2'); ?>">Licence 2 (L2)</a></li>
                                            <li><a href="<?php echo site_url('/category/l3'); ?>">Licence 3 (L3)</a></li>
                                            <li><a href="<?php echo site_url('/category/m1'); ?>">Master 1</a></li>
                                            <li><a href="<?php echo site_url('/category/m2'); ?>">Master 2</a></li>
                                            </ul>
                                    </li>
                                    <li><a href="<?php echo site_url('/video'); ?>">Vidéos</a></li>
                                </ul>
                            </div>
                        </nav>

                        <div class="mobile-menu">
                            <div class="logo"><a href="#"><img src="<?php echo get_theme_file_uri('assets/img/logo/logo.png')?>" alt="Logo"></a></div>
                            <nav>
                                <ul>
                                    <li><a href="<?php echo get_home_url(); ?>">Accueil</a></li>
                                    <li><a href="<?php echo site_url('/category/affichage'); ?>">Affichage</a></li>
                                    <li><a href="<?php echo site_url('/blog'); ?>">Articles</a></li>
                                    <li>
                                        <a href="#!">Modules</a>

                                        <ul>
                                            <li><a href="<?php echo site_url('/category/l2'); ?>">Licence 2 (L2)</a></li>
                                            <li><a href="<?php echo site_url('/category/l3'); ?>">Licence 3 (L3)</a></li>
                                            <li><a href="<?php echo site_url('/category/m1'); ?>">Master 1</a></li>
                                            <li><a href="<?php echo site_url('/category/m2'); ?>">Master 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo site_url('/video'); ?>">Vidéos</a></li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Start of Header section
        ============================================= -->