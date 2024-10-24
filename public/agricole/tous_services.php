<!DOCTYPE html>
<html lang="fr-FR" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- TITLE -->
    <title>Services - JMK CONSULTING COMPANY: Negoce de matières premières & services agricoles</title>

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
                    <h1>Nos services</h1>
                </div>
            </div>
        </div>
        <!--PAGES HERO END -->

    </header>

    <!-- CONTENT START -->
    <section>



    <?php
    // Requête pour récupérer les données de la table services
    $sql = "SELECT * FROM services";
    $stmt = $pdo->query($sql);
    // Récupérer les résultats sous forme de tableau associatif
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <div class="container mt-5 mb-5">
            <div class="row">
            <?php foreach ($services as &$service): ?>
                <div class="col-lg-4">
                    <div class="project-box-alt">
                        <figure class="pba-thumbnail">
                        <a href="#"><img class="mx-auto d-block" src="<?= convertBackslashToSlashForStorage($service['image']) ?>" alt="<?= $service['titre'] ?>"></a>                           
                        </figure>
                        <div class="project-caption">
                        <h4><?= $service['titre'] ?></h4> <br>
                             <p class="text"><?= substr($service['description'], 0, 150) ?>...
                            </p>
                            <button class="toggle-button">Lire plus</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- CONTENT END -->
    
    <?php include 'component/footer.php';?>
    
    <!--SCROLL TOP START-->
    <a href="#0" class="cd-top">Top</a>
    <!--SCROLL TOP START-->
    
    <?php include 'component/script.php';?>

    <script>
    </script>

</body>

</html>