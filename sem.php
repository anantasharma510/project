<?php
// Define an array of semesters
$semesters = array("Semester 1", "Semester 2", "Semester 3", "Semester 4", "Semester 5", "Semester 6", "Semester 7", "Semester 8");
?>

<!-- Now, within the <div class="semester-options">...</div>, add the following PHP code to generate links for each semester -->
<?php foreach($semesters as $semester): ?>
    <a href="semester.php?semester=<?php echo urlencode($semester); ?>"><?php echo $semester; ?></a>
<?php endforeach; ?>
