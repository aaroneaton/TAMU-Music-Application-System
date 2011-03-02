<?php
/* 
 * This view, as of now, contains the entire form for the application.
 *
 * It will be split up into a few steps in the future
 */
?>

<h3>General Admissions Questions</h3>

<?php echo validation_errors(); ?>

<?php echo form_open('apply/create_form'); ?>

<p>Current GPA:<br />
<?php echo form_input($curr_gpa, set_value('curr_gpa')); ?>
</p>

<?php echo form_checkbox($inst_areas['composition'], set_checkbox('inst_areas[]', 'composition')); ?> Composition
<br />
<?php echo form_checkbox($inst_areas['musc_hist'], set_checkbox('inst_areas[]', 'musc_hist')); ?> Music History
<br />
<?php echo form_checkbox($inst_areas['musc_theo'], set_checkbox('inst_areas[]', 'musc_theo')); ?> Music Theory
<br />
<?php echo form_checkbox($inst_areas['ethno_musc'], set_checkbox('inst_areas[]', 'ethno_musc')); ?> Ethnomusicology
<br />
<?php echo form_checkbox($inst_areas['musc_tech'], set_checkbox('inst_areas[]', 'musc_tech')); ?> Music Technology
<br />
<?php echo form_checkbox($inst_areas['musc_perf'], set_checkbox('inst_areas[]', 'musc_perf')); ?> Performance
<br />

<div><?php echo form_submit('submit_app', 'Submit!'); ?></div>
