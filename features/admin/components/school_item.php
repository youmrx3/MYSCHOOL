<?php
echo '<div class="school-item" id="school-' . $school->schoolId . '">';




echo '<img class="school-image col" src="' . $school->imageUrl . '" alt="school image">';
echo '<h3 class="school-name col">' . $school->name . '</h3>';
echo '<p class="school-description col">' . $school->description . '</p>';

echo '<button class="school-action" id="' . $school->schoolId . '">Supprimer</button>';

echo '</div>';
?>