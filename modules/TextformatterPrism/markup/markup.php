<?php namespace Processwire;
/**
 * Created by PhpStorm.
 * User: Abdus
 * Date: 11.01.2017
 * Time: 14:50
 */


?>
<?php foreach ($css as $c): ?>
    <link rel="stylesheet" href="<?php echo $c ?>">
<?php endforeach; ?>

<?php foreach ($js as $j): ?>
    <script src="<?php echo $j ?>"></script>
<?php endforeach; ?>