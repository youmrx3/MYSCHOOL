


<div class="box">
    <?php 
    echo '<img src="'.$school->imageUrl.'" alt=""> ' ;
    ?>
    <div class="content">
        <div>
        <?php 
             echo '<h4>'.$school->name.'</h4>';
             echo '<a href="school.php?schoolId='. $school->schoolId .'">Lire Plus</a>';

        ?>
           
        </div>
    </div>
</div>