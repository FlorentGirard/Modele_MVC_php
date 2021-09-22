<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>oShop BackOffice</title>

  <!-- bootstrap v4 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- font awesome v4.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- custom css -->
  <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
// On inclut des sous-vues => "partials"
include __DIR__.'/../partials/nav.tpl.php';
?>

<?php

  // si on a un tableau contenant des erreurs
  // liées par exemple à des données manquantes ou incorrectes lors des remplissages de formulaire
  if (isset($errorTableau))
  {

    // on boucle dessus pour afficher chacun des messages qu'elle contient
    foreach($errorTableau as $errorMessage)
    { ?>

      <div class="alert alert-warning" role="alert">
          <?= $errorMessage ?>
      </div>

<?php

    }
  }
  
?>

<!-- ici commence un .container :B -->
<div class="container my-4">