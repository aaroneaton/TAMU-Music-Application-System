<?php
/* 
 * This view, as of now, contains the entire form for the application.
 *
 * It will be split up into a few steps in the future
 */
?>

<?php echo validation_errors(); ?>

<?php echo form_open('apply/create_form'); ?>



<?php echo form_fieldset('General Adminssions Questions', $general_field); ?>

<h5 class="question">Please check the area(s) you are most interested in studying:</h5>
<?php echo form_checkbox($inst_areas['composition'], '', set_checkbox('inst_areas[]', 'composition')); ?> Composition
<br />
<?php echo form_checkbox($inst_areas['musc_hist'], '', set_checkbox('inst_areas[]', 'musc_hist')); ?> Music History
<br />
<?php echo form_checkbox($inst_areas['musc_theo'], '', set_checkbox('inst_areas[]', 'musc_theo')); ?> Music Theory
<br />
<?php echo form_checkbox($inst_areas['ethno_musc'], '', set_checkbox('inst_areas[]', 'ethno_musc')); ?> Ethnomusicology
<br />
<?php echo form_checkbox($inst_areas['musc_tech'], '', set_checkbox('inst_areas[]', 'musc_tech')); ?> Music Technology
<br />
<?php echo form_checkbox($inst_areas['musc_perf'], '', set_checkbox('inst_areas[]', 'musc_perf')); ?> Performance
<br /><br />

<h5>What is your intended minor?</h5>
    <?php echo form_input($int_minor, set_value('int_minor')); ?>
<br /><br />

<h5>Current GPA:</h5>
<?php echo form_input($curr_gpa, set_value('curr_gpa')); ?>
<br /><br />

<h5>When will you perform an audition?</h5>
<?php echo form_dropdown('perf_aud', $perf_aud, $this->input->post('perf_aud')); ?>

<?php echo form_fieldset_close(); ?>

<?php echo form_fieldset('Incoming Freshmen Only', $attributes); ?>



<?php echo form_fieldset_close(); ?>





<div class="span-10"><?php echo form_submit('submit_app', 'Submit!'); ?></div>
