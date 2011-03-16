<?php
/*
 * This view currently contains the entire recommendation form.
 * It will be split into single steps in a later version.
 */
?>

<?php echo validation_errors(); ?>

<?php echo form_open('rec/new_rec'); ?>

<?php echo form_hidden('id', $id); ?>

<h5>Name of Applicant</h5>
<?php echo form_input($app_first, set_value('app_first')); ?> <?php echo form_input($app_last, set_value('app_last')); ?>

<h5>Please rate the applicant on the following criteria</h5>

<table>
  <tr>
    <th>Applicant's Achievements/Characteristics</th>
    <th>Outstanding</th>
    <th>Above Average</th>
    <th>Average</th>
    <th>Below Average</th>
    <th>Inadequate</th>
    <th>Not Observed</th>
  </tr>
  <tr>
    <td>Musical Talent</td>
    <td><?php echo form_radio($musc_tal['outstanding'], '', set_radio('musc_tal[]', 'outstanding')); ?></td>
    <td><?php echo form_radio($musc_tal['ab_avg'], '', set_radio('musc_tal[]', 'ab_avg')); ?></td>
    <td><?php echo form_radio($musc_tal['avg'], '', set_radio('musc_tal[]', 'avg')); ?></td>
    <td><?php echo form_radio($musc_tal['be_avg'], '', set_radio('musc_tal[]', 'be_avg')); ?></td>
    <td><?php echo form_radio($musc_tal['inadq'], '', set_radio('musc_tal[]', 'inadq')); ?></td>
    <td><?php echo form_radio($musc_tal['not_obs'], '', set_radio('musc_tal[]', 'not_obs')); ?></td>
  </tr>
  <tr>
    <td>Interpretive, creative skill</td>
    <td><?php echo form_radio($create_skill['outstanding'], '', set_radio('create_skill[]', 'outstanding')); ?></td>
    <td><?php echo form_radio($create_skill['ab_avg'], '', set_radio('create_skill[]', 'ab_avg')); ?></td>
    <td><?php echo form_radio($create_skill['avg'], '', set_radio('create_skill[]', 'avg')); ?></td>
    <td><?php echo form_radio($create_skill['be_avg'], '', set_radio('create_skill[]', 'be_avg')); ?></td>
    <td><?php echo form_radio($create_skill['inadq'], '', set_radio('create_skill[]', 'inadq')); ?></td>
    <td><?php echo form_radio($create_skill['not_obs'], '', set_radio('create_skill[]', 'not_obs')); ?></td>
  </tr>
  <tr>
    <td>Knowledge of music fundamentals</td>
    <td><?php echo form_radio($musc_fund['outstanding'], '', set_radio('musc_fund[]', 'outstanding')); ?></td>
    <td><?php echo form_radio($musc_fund['ab_avg'], '', set_radio('musc_fund[]', 'ab_avg')); ?></td>
    <td><?php echo form_radio($musc_fund['avg'], '', set_radio('musc_fund[]', 'avg')); ?></td>
    <td><?php echo form_radio($musc_fund['be_avg'], '', set_radio('musc_fund[]', 'be_avg')); ?></td>
    <td><?php echo form_radio($musc_fund['inadq'], '', set_radio('musc_fund[]', 'inadq')); ?></td>
    <td><?php echo form_radio($musc_fund['not_obs'], '', set_radio('musc_fund[]', 'not_obs')); ?></td>
  </tr>
  <tr>
    <td>Potential for a music career</td>
    <td><?php echo form_radio($musc_career['outstanding'], '', set_radio('musc_career[]', 'outstanding')); ?></td>
    <td><?php echo form_radio($musc_career['ab_avg'], '', set_radio('musc_career[]', 'ab_avg')); ?></td>
    <td><?php echo form_radio($musc_career['avg'], '', set_radio('musc_career[]', 'avg')); ?></td>
    <td><?php echo form_radio($musc_career['be_avg'], '', set_radio('musc_career[]', 'be_avg')); ?></td>
    <td><?php echo form_radio($musc_career['inadq'], '', set_radio('musc_career[]', 'inadq')); ?></td>
    <td><?php echo form_radio($musc_career['not_obs'], '', set_radio('musc_career[]', 'not_obs')); ?></td>
  </tr>
   <tr>
    <td>Potential for success at Texas A&M University</td>
    <td><?php echo form_radio($success_tamu['outstanding'], '', set_radio('success_tamu[]', 'outstanding')); ?></td>
    <td><?php echo form_radio($success_tamu['ab_avg'], '', set_radio('success_tamu[]', 'ab_avg')); ?></td>
    <td><?php echo form_radio($success_tamu['avg'], '', set_radio('success_tamu[]', 'avg')); ?></td>
    <td><?php echo form_radio($success_tamu['be_avg'], '', set_radio('success_tamu[]', 'be_avg')); ?></td>
    <td><?php echo form_radio($success_tamu['inadq'], '', set_radio('success_tamu[]', 'inadq')); ?></td>
    <td><?php echo form_radio($success_tamu['not_obs'], '', set_radio('success_tamu[]', 'not_obs')); ?></td>
  </tr>
  <tr>
     <td>Personality: maturity, poise, manners, courtesy</td>
    <td><?php echo form_radio($personality['outstanding'], '', set_radio('personality[]', 'outstanding')); ?></td>
    <td><?php echo form_radio($personality['ab_avg'], '', set_radio('personality[]', 'ab_avg')); ?></td>
    <td><?php echo form_radio($personality['avg'], '', set_radio('personality[]', 'avg')); ?></td>
    <td><?php echo form_radio($personality['be_avg'], '', set_radio('personality[]', 'be_avg')); ?></td>
    <td><?php echo form_radio($personality['inadq'], '', set_radio('personality[]', 'inadq')); ?></td>
    <td><?php echo form_radio($personality['not_obs'], '', set_radio('personality[]', 'not_obs')); ?></td>
   </tr>
  <tr>
     <td>Reliability: promptness, conscientiousness</td>
    <td><?php echo form_radio($reliability['outstanding'], '', set_radio('reliability[]', 'outstanding')); ?></td>
    <td><?php echo form_radio($reliability['ab_avg'], '', set_radio('reliability[]', 'ab_avg')); ?></td>
    <td><?php echo form_radio($reliability['avg'], '', set_radio('reliability[]', 'avg')); ?></td>
    <td><?php echo form_radio($reliability['be_avg'], '', set_radio('reliability[]', 'be_avg')); ?></td>
    <td><?php echo form_radio($reliability['inadq'], '', set_radio('reliability[]', 'inadq')); ?></td>
    <td><?php echo form_radio($reliability['not_obs'], '', set_radio('reliability[]', 'not_obs')); ?></td>
   </tr>
  <tr>
     <td>Motivation and general attitude</td>
    <td><?php echo form_radio($motivation['outstanding'], '', set_radio('motivation[]', 'outstanding')); ?></td>
    <td><?php echo form_radio($motivation['ab_avg'], '', set_radio('motivation[]', 'ab_avg')); ?></td>
    <td><?php echo form_radio($motivation['avg'], '', set_radio('motivation[]', 'avg')); ?></td>
    <td><?php echo form_radio($motivation['be_avg'], '', set_radio('motivation[]', 'be_avg')); ?></td>
    <td><?php echo form_radio($motivation['inadq'], '', set_radio('motivation[]', 'inadq')); ?></td>
    <td><?php echo form_radio($motivation['not_obs'], '', set_radio('motivation[]', 'not_obs')); ?></td>
   </tr>
  <tr>
     <td>Overall rating of applicant</td>
    <td><?php echo form_radio($overall_rating['outstanding'], '', set_radio('overall_rating[]', 'outstanding')); ?></td>
    <td><?php echo form_radio($overall_rating['ab_avg'], '', set_radio('overall_rating[]', 'ab_avg')); ?></td>
    <td><?php echo form_radio($overall_rating['avg'], '', set_radio('overall_rating[]', 'avg')); ?></td>
    <td><?php echo form_radio($overall_rating['be_avg'], '', set_radio('overall_rating[]', 'be_avg')); ?></td>
    <td><?php echo form_radio($overall_rating['inadq'], '', set_radio('overall_rating[]', 'inadq')); ?></td>
    <td><?php echo form_radio($overall_rating['not_obs'], '', set_radio('overall_rating[]', 'not_obs')); ?></td>
   </tr>
</table>
<h5>How long and in what capacity have you known the applicant?</h5>
<?php echo form_textarea($known_app, set_value('known_app')); ?>

<h5>Please feel free to provide additional comments.</h5>
<?php echo form_textarea($comments, set_value('comments')); ?>

<?php echo form_submit('submit_rec', 'Submit!'); ?>
