


<section id="formation" style="background-color: rgb(0, 0, 0);">
    <h1 class="title" style="color: rgb(244, 114, 33);">Formation </h1>

    <div class="formations-list">
        <?php 
        
            foreach($formations as $formation){
                echo '<h2 class="text" style="color: rgb(255, 255, 255);">'.$formation->name.'</h2></br>';

            }
        
        ?>
    </div>
  
</section>