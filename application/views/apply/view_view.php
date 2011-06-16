<?php
/* 
 * This view presents the application information to the user
 */
?>

<?php
if(!isset ($app))
{
  echo $err_msg;
}
else {
?>

<?php echo form_fieldset('Interested Areas', $inst_areas_field); ?>
    <ul>
    <?php foreach($app['inst_areas'] as $area) : ?>

        <li><?php echo $area; ?></li>

    <?php endforeach; ?>
    </ul>
<?php echo form_fieldset_close(); ?>

<?php echo form_fieldset('Ensembles', $ensembles_field); ?>
    <ul>
    <?php foreach($app['ensembles'] as $ensemble) : ?>

        <li><?php echo $ensemble; ?></li>

    <?php endforeach; ?>
    </ul>
<?php echo form_fieldset_close(); ?>

<ul>
<?php foreach ($app as $value) : ?>

    <li><?php echo $value; ?></li>

<?php            endforeach; ?>
</ul>
<?php
}
?>
