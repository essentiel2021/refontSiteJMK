<?php
// Connexion à la base de données
$host = 'localhost'; // Nom de l'hôte (souvent localhost)
$dbname = 'jmk_bd'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur
$password = ''; // Mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $sujet = htmlspecialchars(trim($_POST['sujet']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Valider les champs requis
    if (!empty($name) && !empty($email) && !empty($sujet) && !empty($message)) {
        // Préparer la requête SQL
        $sql = "INSERT INTO contact (name, email, phone, sujet, message) VALUES (:name, :email, :phone, :sujet, :message)";
        $stmt = $pdo->prepare($sql);

        // Exécuter la requête avec les données du formulaire
        try {
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':phone' => $phone,
                ':sujet' => $sujet,
                ':message' => $message
            ]);

            echo "Merci, votre message a bien été envoyé.";
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs requis.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr-FR" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- TITLE -->
    <title>JMK CONSULTING COMPANY: Negoce de matières premières & services agricoles</title>

    <!--  FAVICON  -->
    <link rel="shortcut icon" href="images/icons/favicon.png">

    <!-- FONT AWESOME ICONS LIBRARY -->
    <link rel="stylesheet" href="fonts/css/all.min.css">

    <!-- REVOLUTION ADDONS -->
    <link href="../../css?family=Roboto%3A700%2C300" rel="stylesheet" property="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="revolution/fonts/font-awesome/css/font-awesome.css">

    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css">

    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="revolution/css/layers.css">

    <!-- REVOLUTION NAVIGATION STYLES -->
    <link rel="stylesheet" type="text/css" href="revolution/css/navigation.css">

    <!-- CSS LIBRARY STYLES -->
    <link rel="stylesheet" href="css/lib/bootstrap.min.css">
    <link rel='stylesheet' href="css/lib/flickity.min.css">
    <link rel='stylesheet' href="css/lib/magnific-popup.min.css">
    <link rel="stylesheet" href="css/lib/owl.carousel.min.css">
    <link rel="stylesheet" href="css/lib/slick.min.css">
    <link rel="stylesheet" href="css/lib/aos.min.css">
    <link rel="stylesheet" href="css/navbar.css">

    <!-- CSS TEMPLATE STYLES -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/rev-slider.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- MODERNIZR LIBRARY -->
    <script src="js/modernizr-custom.js"></script>

</head>

<body>

    <!-- LOADER -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <!-- LOADER -->

    <header>
        <!-- TOP HEADER START -->
        <div class="top-header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top-header-left">
                            <p class="address">Abidjan-Cocody Angré 8eme Tranche (Carrefour prière) : (+225) 0787767134</p>
                        </div>
                    </div>

                    <div class="col-md-6 text-right">
                        <div class="top-header-right">  
                            <a href="mailto:infos@jmkconsulting-ci.com"><p class="schedule">infos@jmkconsulting-ci.com</p></a>
                            <ul class="top-social">
                                <li><a href="https://www.facebook.com/jmkconsultingcompany" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/jmk-consulting-company/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                            <a class="btn btn-default" href="contacts.php" role="button">CONTACT</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- TOP HEADER END -->

        <!-- NAV START -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a href="index.html" class="navbar-brand"><img src="images/logos/logo-default.png" alt=""></a>

                <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#main-nav">
                    <span class="menu-icon-bar"></span>
                    <span class="menu-icon-bar"></span>
                    <span class="menu-icon-bar"></span>
                </button>

                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="dropdown">
                            <a href="index.html" class="nav-item nav-link active">ACCUEIL</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-item nav-link" data-toggle="dropdown">A PROPOS</a>
                            <div class="dropdown-menu">
                                <a href="presentation.html" class="dropdown-item">Présentation</a>
                                <a href="equipe.html" class="dropdown-item">Notre Equipe</a>
                                <a href="approche.html" class="dropdown-item">Nos Valeurs</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="tous_services.html" class="nav-item nav-link">SERVICES</a>
                        </li>
                        <li class="dropdown">
                            <a href="synergie_jmk.html" class="nav-item nav-link">SYNERGIE</a>
                        </li>
                        <li class="dropdown">
                            <a href="prod_fieldconnect.html" class="nav-item nav-link">PRODUITS</a>
                        </li>
                        <li class="dropdown">
                            <a href="actus.html" class="nav-item nav-link">ACTUALITES</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAV END -->
        <!--PAGES HERO START -->
        <div class="pages-hero">
            <div class="container">
                <div class="pages-title">
                    <h1>Contactez nous</h1>
                </div>
            </div>
        </div>
        <!--PAGES HERO END -->
    </header>
    <!-- content start  -->
    <section>
        <div class="container mt-5 mb-5">
            <!-- <div class="section-title">
                <h2>RESTEZ EN CONTACT</h2>
            </div> -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-col">
                        <figure class="cc-icon">
                            <img src="images/icons/icon_contact_jmk.png" alt="...">
                        </figure>
                        <h5><a href="tel:+2250787767134">(+225) 0787767134</a></h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-col">
                        <figure class="cc-icon">
                            <img src="images/icons/icon_email_jmk.png" alt="...">
                        </figure>
                        <h5><a href="mailto:infos@jmkconsulting-ci.com">infos@jmkconsulting-ci.com</a></h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-col">
                        <figure class="cc-icon">
                            <img src="images/icons/clock.png" alt="...">
                        </figure>
                        <h5>Abidjan - Cocody Angré 8eme Tranche (Carrefour prière)</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-left" style="margin-top: 60px;">
                        <h3>Contactez-nous</h3>
                        <p>Notre équipe est heureuse de répondre à vos questions. Remplissez le formulaire et nous vous contacterons dès que possible.</p>
                        
                    </div>
                </div>
                <div class="col-lg-6 spacing-md">
                    <form id="contact-form" method="post" action="contacts.php">
                        <div class="messages"></div>
                        <div class="controls">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="name" class="form-control custom-form"
                                            placeholder="*Nom et Prenons" required="required" data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input id="form_email" type="email" name="email"
                                            class="form-control custom-form" placeholder="*Email address"
                                            required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input id="form_phone" type="tel" name="phone" class="form-control custom-form"
                                            placeholder="*Numéro de Téléphone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input id="form_sujet" type="text" name="sujet" class="form-control custom-form"
                                            placeholder="*Sujet" required="required" data-error="Sujet is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="message"
                                            class="form-control message-form custom-form" placeholder="*Your message"
                                            rows="6" required="required"
                                            data-error="Ecris un message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-12 btn-send">
                                    <p><input type="submit" class="btn btn-default" value="SOUMETTRE"></p>
                                </div>
                                <div class="col-sm-12">
                                    <p class="required">
                                        * Ces champs sont obligatoires.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>    

    <!-- content end -->
    
    <!-- FOOTER START -->
    <footer>
        <div class="container mt-5">
            <div class="center-footer">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="footer-col footer-left-col">
                            <figure class="site-footer-logo">
                                <img src="images/logos/footer-logo.png" alt="">
                            </figure>
                            <p>« Construire et développer des filières agricoles résilientes et des PME durables »
                            </p>
                            <ul class="footer-social">
                                <li><a href="https://www.facebook.com/jmkconsultingcompany" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/jmk-consulting-company/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-col">
                            <h5>Liens utiles</h5>
                            <ul class="quick-links">
                                <li><a href="index.html">Accueil</a></li>
                                <li><a href="presentation.html">A propos</a></li>
                                <li><a href="tous_services.html">Services</a></li>
                                <li><a href="prod_fieldconnect.html">Produits </a></li>
                                <li><a href="actus.html">Actualités</a></li>
                                <li><a href="contacts.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer-col">
                            <h5>Nous contacter</h5>
                            <ul class="quick-links">
                                <li><a href="tel:+2250709095378">(+225) 0787767134</a></li><br>
                                <li><a href="#">RCI, Abidjan Cocody Angré 8eme Tranche</a></li><br>
                                <li><a href="mailto:infos@jmkconsulting-ci.com">infos@jmkconsulting-ci.com</a></li>                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="footer-line">
            <div class="bottom-footer">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="footer-copyright">
                            <p>© 2022 <a href="#">Copyright © 2022, Tous droits réservés, JMK CONSULTING COMPANY</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->

    <!--SCROLL TOP START-->
    <a href="#0" class="cd-top">Top</a>
    <!--SCROLL TOP START-->

    <!-- JAVASCRIPTS -->
    <script src="js/lib/jquery-3.5.1.min.js"></script>
    <script src="js/lib/bootstrap.min.js"></script>
    <script src="js/lib/plugins.js"></script>
    <script src="js/lib/nav.fixed.top.js"></script>
    <script src="js/lib/contact.js"></script>
    <script src="js/main.js"></script>
    <!-- JAVASCRIPTS END -->

    <!-- REVOLUTION JS FILES -->
    <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="js/rev-sliders/slider-home-2.js"></script>

    <script>
    </script>

</body>

</html>