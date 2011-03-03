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

    <h5>Please check the area(s) you are most interested in studying:</h5>
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

    <h5>Please check the ensembles that you would like to perform in:</h5>
        <?php echo form_checkbox($ensembles['brazos_chorale'], '', set_checkbox('ensembles[]', 'brazos_chorale')); ?> Brazos Valley Chorale
        <br />
        <?php echo form_checkbox($ensembles['cent_singers'], '', set_checkbox('ensembles[]', 'cent_singers')); ?> Century Singers
        <br />
        <?php echo form_checkbox($ensembles['singing_cadets'], '', set_checkbox('ensembles[]', 'singing_cadets')); ?> Singing Cadets
        <br />
        <?php echo form_checkbox($ensembles['womens_chorus'], '', set_checkbox('ensembles[]', 'womens_chorus')); ?> Women's Chorus
        <br />
        <?php echo form_checkbox($ensembles['bvso'], '', set_checkbox('ensembles[]', 'bvso')); ?> Brazos Valley Symphony Orchestra
        <br />
        <?php echo form_checkbox($ensembles['aggie_band'], '', set_checkbox('ensembles[]', 'aggie_band')); ?> Aggie Band (Marching Band)
        <br />
        <?php echo form_checkbox($ensembles['concert_band'], '', set_checkbox('ensembles[]', 'concert_band')); ?> Concert Band
        <br />
        <?php echo form_checkbox($ensembles['symph_band'], '', set_checkbox('ensembles[]', 'symph_band')); ?> Symphonic Band
        <br />
        <?php echo form_checkbox($ensembles['wind_symph'], '', set_checkbox('ensembles[]', 'wind_symph')); ?> Wind Symphony
        <br />
        <?php echo form_checkbox($ensembles['jazz_band'], '', set_checkbox('ensembles[]', 'jazz_band')); ?> Jazz Band
        <br />
        <?php echo form_checkbox($ensembles['small_ens'], '', set_checkbox('ensembles[]', 'small_ens')); ?> Small Ensembles
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

<!-- @todo - This should only show up if radio button 'Incoming Freshman' is selected -->
<?php echo form_fieldset('Incoming Freshmen Only', $freshmen_field); ?>

    <!-- input - Current High School -->
    <h5>High School:</h5>
        <?php echo form_input($high_school, set_value('high_school')); ?>
    <br /><br />

    <!-- drop down(2) - Graduation Date -->
    <h5>When will you graduate?</h5>
        <?php echo form_dropdown('grad_month', $grad_month, $this->input->post('grad_month')); ?> /
        <?php echo form_dropdown('grad_year', $grad_year, $this->input->post('grad_year')); ?>
    <br /><br />

    <!-- drop down - Applied to TAMU -->
    <h5>Have you applied to TAMU?</h5>
        <?php echo form_dropdown('app_tamu', $app_tamu, $this->input->post('app_tamu')); ?>
    <br /><br />

    <!-- input - Test Scores -->
    <h5>ACT or SAT scores:</h5>
        <?php echo form_input($sat_act, set_value('sat_act')); ?>

<?php echo form_fieldset_close(); ?>

<!-- @todo - This should only show up if radio button 'Transfer Student' is selected -->
<?php echo form_fieldset('Transfer Students Only', $transfer_field); ?>

    <!-- input - Current institution -->
    <h5>Current Institution:</h5>
        <?php echo form_input($curr_inst, set_value('curr_inst')); ?>
    <br /><br />
    <!-- input - Current major -->
    <h5>Current Major:</h5>
        <?php echo form_input($curr_maj, set_value('curr_maj')); ?>

<?php echo form_fieldset_close(); ?>




<div class="span-10"><?php echo form_submit('submit_app', 'Submit!'); ?></div>
