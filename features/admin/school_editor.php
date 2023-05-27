

<?php 



?>


<form class="school-editor" method="post" action="/api/admin.php">

    <h3 class="title">Créer une école</h3>

    <label for="school-name">Nom de l'école</label>
    <input class="row" type="text" name="school-name" id="school-name" placeholder="Nom de l'école">

    <label for="school-description">Description de l'école</label>
    <textarea class="row" name="school-description" id="school-description" cols="30" rows="2" placeholder="Description de l'école"></textarea>

    <label for="school-image">Image de l'école</label>
    <input class="row" type="text" name="school-image" id="school-image" placeholder="Image de l'école">

    <label for="school-video">Vidéo de l'école</label>
    <input class="row" type="text" name="school-video" id="school-video" placeholder="Vidéo de l'école">

    <input type="submit" value="Créer l'école">

</form>