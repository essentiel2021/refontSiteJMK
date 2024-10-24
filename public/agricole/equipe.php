<!DOCTYPE html>
<html lang="fr-FR" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- TITLE -->
    <title>Equipe - JMK CONSULTING COMPANY: Negoce de matières premières & services agricoles</title>

    <?php include 'component/style.php';?>

</head>

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
                       <h1>Notre équipe</h1>
                    </div>
                </div>
            </div>
        <!--PAGES HERO END -->

    </header>

    <!-- CONTENT START -->

    <section>

    <?php
    // Requête pour récupérer les données de la table équipes
    $sql = "SELECT * FROM equipes";
    $stmt = $pdo->query($sql);
    // Récupérer les résultats sous forme de tableau associatif
    $equipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

        <div class="container mt-5 mb-5">
                <div class="section-title">
                    <h2>Rencontrez nos professionnels</h2>
                    <p>Des experts qui allient savoir-faire et innovation pour vous accompagner.</p>
                </div>
            <div class="row">

                <?php foreach ($equipes as &$equipe): ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="team-box">
                            <figure class="team-portrait">
                            <img src="<?= convertBackslashToSlashForStorage($equipe['photo']) ?>" alt="<?= $equipe['nom_prenom'] ?>">
                                <ul class="tc-social d-flex justify-content-center">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.linkedin.com/company/jmk-consulting-company/"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </figure>
                            <div class="team-caption">
                            <h4><?= $equipe['nom_prenom'] ?></h4>
                            <p><?= $equipe['poste'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>        
        
            </div>
        </div>
    </section>
    <!-- TEAM END -->

    
    <?php include 'component/footer.php';?>
    
    <!--SCROLL TOP START-->
    <a href="#0" class="cd-top">Top</a>
    <!--SCROLL TOP START-->
    
    <?php include 'component/script.php';?>

    <script>
    </script>

</body>

</html>