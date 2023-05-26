<section id="Acceuil">
    <div id="a-propos">
        <div class="bg-d"> </div>
        <div class="content-intro">
            <h1 class="title">à propos</h1>
            <div class="img-desc">
                <div class="left">
                    <?php
                    echo '<video src="' . $school->videoUrl . '" autoplay loop controls></video>';
                    ?>
                </div>
                <div class="right">
                    <?php
                    echo '<h3>' . $school->name . '</h3>';
                    echo '<p>' . $school->description . '</p>';

                    ?>
                </div>
            </div>
        </div>

    </div>
</section>