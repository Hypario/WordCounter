<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Compteur GSI</title>
    <meta name="author" content="DONNE Dylan, DUTERTE Fabien, DASSONNEVILLE Virgile">

    <link rel="stylesheet" href="css/bootstrap-grid.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>

</head>

<body class="d-inline-flex justify-content-center align-items-center flex-column w-100">
<div class="col-sm-12 col-md-8 col-lg-6">
    <form class="d-inline-flex justify-content-center align-items-center flex-column w-100 mb-4" name="compteur"
          method="post" action="index.php">
        <label for="text">Entrez votre texte : </label>
        <textarea class="w-100" type="text" name="text" id="text" rows="20"><?php if(isset($text)) echo $text; ?></textarea>
        <input class="btn btn-success w-100" type="submit" name="valider" value="Envoyer"/>
    </form>

    <?php if (isset($nbWords) && isset($nbSentences) && isset($occurrences)) : ?>
        <!-- words and sentences !-->
        <table class='table'>
            <thead class='bg-primary text-white'>
            <tr>
                <th scope='col'>Mots</th>
                <th scope='col'>Phrases</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td scope='col'><?= $nbWords; ?></td>
                <td scope='col'><?= $nbSentences; ?></td>
            </tr>
            </tbody>
        </table>

        <table class='table'>
        <thead class='bg-info'>
        <tr>
            <th scope='col'>Mot</th>
            <th scope='col'>Occurences</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($occurrences as $mot => $occurrence): ?>
            <tr>
                <td scope='row'><?= $mot; ?></td>
                <td scope="row"><?= $occurrence; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    <?php endif; ?>

</div>
</body>

<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-bundle.min.js"></script>

</html>
