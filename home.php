<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

  <div class="container">
    <?php include_once('header.php')?>
    <?php include_once('login.php')?>
    <h1>Site De Recette</h1>
    <!-- Avec Mysqli j'aurais utilisé une query + une boucle pour afficher des données -->
    <!-- Par simplicité, et par bonne lecture du code, je vais créer une fonction pour afficher mes données -->
    <!-- Ma fonction s'appelle get_recipes -->
    <?php foreach(get_recipes($recipes, $limit) as $recipe) : ?>
    <?php endforeach; ?>
  </div>





  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>