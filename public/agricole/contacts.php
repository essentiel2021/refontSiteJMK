<!DOCTYPE html>
<html lang="fr-FR" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- TITLE -->
    <title>Contacts - JMK CONSULTING COMPANY: Negoce de matières premières & services agricoles</title>

    <?php include 'component/style.php';?>

</head>

<?php

// Préparer une requête pour récupérer les données
$sql = "SELECT * FROM contacts";

// Exécuter la requête
$stmt = $pdo->query($sql);

// Récupérer les résultats sous forme de tableau associatif
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Afficher les données récupérées
// var_dump($contacts);
// foreach ($contacts as $contact) {
//     echo "Nom: " . $contact['nom'] . "<br>";
//     echo "Email: " . $contact['email'] . "<br>";
//     echo "Téléphone: " . $contact['telephone'] . "<br><br>";
// }

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
        $sql = "INSERT INTO contacts (nom_prenom, email, sujet, telephone, message) VALUES (:name, :email, :sujet, :phone, :message)";
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

            // echo "Merci, votre message a bien été envoyé.";
        } catch (PDOException $e) {
            // echo "Erreur: " . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs requis.";
    }
}
?>

<body>

    <!-- LOADER -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <!-- LOADER -->

    <header>

        <?php include 'component/nav.php';?>

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
    
    <?php include 'component/footer.php';?>
    
    <!--SCROLL TOP START-->
    <a href="#0" class="cd-top">Top</a>
    <!--SCROLL TOP START-->
    
    <?php include 'component/script.php';?>

    <script>
    </script>

</body>

</html>