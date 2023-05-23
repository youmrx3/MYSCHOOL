<section id="a-propos">
    <h1 class="title">à propos</h1>
    <div class="img-desc">
       <div class="left">
            <?php 
                echo '<video src="' .$school->videoUrl.'" autoplay loop></video>';
            ?>
       </div>
        <div class="right">
            <?php 
                echo '<h3>'.$school->name.'</h3>';
                echo '<p>'.$school->description.'</p>';
            
            ?>
        </div>
    </div>
    
</section>