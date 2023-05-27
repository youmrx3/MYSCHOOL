
<div class="application-item">
    
    <?php 
        echo '<h3 class=" col">'.$application->name.'</h3>';
        echo '<h3 class=" col">'.$application->email.'</h3>';

        echo '<button class="application-action" id="'.$application->id.'">Approver</button>'
    ?>

</div>