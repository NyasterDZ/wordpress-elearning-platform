<!-- Start of footer section
 		============================================= -->
<footer>
    <section id="footer-area" class="footer-area-section">
        <div class="container">
            <div class="footer-content pb10">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-widget">
                            <div class="footer-logo mb35">
                                <img src="<?php echo get_theme_file_uri('assets/img/logo/logo.png');?>" alt="">
                            </div>
                            <div class="footer-about-text">
                                <p>Le but de cette plateforme est de faciliter aux étudiants l'accès au contenu des cours en ligne, rendre le partage plus facile et établir une communication entre l'enseignant et l'étudiant.</p>
                                <p>La plateforme est développée par le département d'Automatique de l'université Mohamed Seddik Benyahia - jijel.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="footer-widget">
                            <div class="footer-menu ul-li-block">
                                <h2 class="widget-title">Modules</h2>
                                <ul>
                                    <?php
                                    $argsModuleRequired = array(
                                        'post_type' => 'module',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 6,
                                        'orderby' => 'rand',
                                        'order' => 'ASC',

                                    );
                                    $moduleRequired = new WP_Query($argsModuleRequired);
                                    while($moduleRequired->have_posts())
                                    {
                                    $moduleRequired->the_post();

                                    ?>
                                    <li><a href="<?php the_permalink();?>"><i class="fas fa-caret-right"></i><?php the_title();?></a></li>
                                   <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-menu ul-li-block "  >
                            <h2 class="widget-title">Liens Utiles</h2>
                            <ul>
                                <li><a href="<?php echo site_url('/wp-register.php'); ?>"><i class="fas fa-caret-right"></i>Inscription</a></li>
                                <li><a href="<?php echo site_url('/login'); ?>"><i class="fas fa-caret-right"></i>Espace Membre</a></li>
                                <li><a href="#"><i class="fas fa-caret-right"></i>Développement</a></li>
                                <li><a href="#"><i class="fas fa-caret-right"></i>Forum</a></li>
                                <li><a href="#"><i class="fas fa-caret-right"></i>FAQ</a></li>
                                <li><a href="#"><i class="fas fa-caret-right"></i>Trouvez-nous</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /footer-widget-content -->
            <div class="copy-right-menu">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copy-right-text">
                            <p>© 2020 - tous droits réservés</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="copy-right-menu-item float-right ul-li">
                            <ul>
                                <li><a href="#">Licence</a></li>
                                <li><a href="#">Politique de confidentialité</a></li>
                                <li><a href="#">Termes du contrat de service</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<!-- End of footer section
    ============================================= -->
        
        <?php wp_footer();?>
	</body>
	</html>     