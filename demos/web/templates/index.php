<?php

require_once './functions.php';
require_once './model.php';

?>

<?php theHeader('galette-rois'); ?>

<h1>Site web</h1>

<h2>Liste des étudiant·es</h2>

<?php if (!empty($students)) : ?>
    <p>Il y a <?php echo count($students) ?> étudiant·es : </p>
    <ul>
        <?php foreach ($students as $student) : ?>
            <li><?php echo htmlentities($student); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php theFooter(); ?>
