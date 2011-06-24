<?php
/* 
 * This view, as of now, contains the entire form for the application.
 *
 * It will be split up into a few steps in the future
 */
?>

<?php echo validation_errors(); ?>

<?php echo form_open('apply/new_app'); ?>

<?php echo form_hidden('id', $id); ?>

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
        <?php echo form_dropdown('perf_aud', $perf_aud, $perf_aud_select); ?>

<?php echo form_fieldset_close(); ?>

<!-- @todo - This should only show up if radio button 'Incoming Freshman' is selected -->
<?php echo form_fieldset('Incoming Freshmen Only', $freshmen_field); ?>

    <!-- input - Current High School -->
    <h5>High School:</h5>
        <?php echo form_input($high_school, set_value('high_school')); ?>
    <br /><br />

    <!-- drop down(2) - Graduation Date -->
    <h5>When will you graduate?</h5>
        <?php echo form_dropdown('grad_month', $grad_month, $grad_month_select); ?> /
        <?php echo form_dropdown('grad_year', $grad_year, $grad_year_select); ?>
    <br /><br />

    <!-- drop down - Applied to TAMU -->
    <h5>Have you applied to TAMU?</h5>
        <?php echo form_dropdown('app_tamu', $app_tamu, $app_tamu_select); ?>
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

    <!-- textarea - Musical background -->
    <div id="music_background" class="span-10 last">
        <h5>Give a brief description of your musical background:</h5>
        <span class="quiet">private study; membership in performing organizations;
            solo performance activities; compositions performed; courses of study in
            music theory, history, cultural studies, etc.
        </span>
        <?php echo form_textarea($music_background, set_value('music_background')); ?>
        <br /><br />
    </div><!-- End div id music_background -->

    <!-- textarea - Music major interest -->
    <div id="music_interest" class="span-10 last">
        <h5>Indicate why you are interested in becoming<br />
        a music major at Texas A&M University:</h5>
        <?php echo form_textarea($music_interest, set_value('music_interest')); ?>
        <br /><br />
    </div><!-- End div id music_interest -->

    <!-- textarea - Goals in music -->
    <div id="music_goals" class="span-10 last">
        <h5>Briefly discuss your educational and career goals in music:</h5>
        <?php echo form_textarea($music_goals, set_value('music_goals')); ?>
        <br /><br />
    </div><!-- End div id music_goals -->

    <!-- textarea - Awards and honors -->
    <div id="awards_honors" class="span-10 last">
        <h5>List the musical awards and other special honors you have received:</h5>
        <?php echo form_textarea($awards_honors, set_value('awards_honors')); ?>
        <br /><br />
    </div><!-- End div id awards_honors -->

    <div id="correct_info" class="span-18 last">
        <h5><?php echo form_checkbox($correct_info, set_value('correct_info', 'correct_info')); ?>
         I hereby attest that the information given is correct to the best of my knowledge.</h5>
    </div>

<div class="span-10"><?php echo form_submit('submit_app', 'Save Application'); ?></div>
