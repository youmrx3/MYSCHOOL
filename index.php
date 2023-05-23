<?php
include_once 'components/header.php';


    error_reporting(E_ALL);
    ini_set('display_errors', 1);


?>


<body>

    <?php
    include_once 'components/home_navbar.php';
    ?>

    <section id="Acceuil">
        <h2> Bienvenue</h2>
        <h4>Une génération productrice de savoir</h4>
        <p> Ce site web vous aide à trouver les emplacements de toutes les écoles</p>
        <p>nous vous donnons également la possibilité de voir tous tous les cours disponibles </p>
        <p>auxquels vous pouvez vous inscrire en ligne po vous épargner beaucoup de temps et d'efforts! </p>

    </section>

    <?php

        include_once 'features/school/school_grid.php';
    ?>

</body>

</html>