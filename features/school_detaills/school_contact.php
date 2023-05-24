<section id="contact">

        <h1 class="title">Contact</h1>
        <form method="POST" action="api/registerNewApplication.php">
            <div class="left-right">
                <div class="left">
                    <?php 
                        echo '<input type="hidden" name="formationId" value="' . $schoolId.'" />'; 
                    ?>
                    <label>Nom Complet</label>
                    <input type="text" name="nom">
                    <label>Objet</label>
                    <input type="text" name="objet">
                    <label>Email</label>
                    <input type="text" name="email">
                    <label>Commentaire</label>
                    <textarea name="commentaire" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="right">
                    <label>Numéro</label>
                    <input type="text" name="numero">
                    <label>Date</label>
                    <input type="text"  name="date">
                    <label>Autres Details</label>
                    <input type="text"  name="autres">
                    <label>Adresse</label>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9916256937595!2d2.292292615509614!3d48.85837007928746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1647531560805!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <input type="submit" value="Envoyer" />
        </form>
    </section>