<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<h3>Your application was submitted!</h3>

<?php print_r($this->input->post('music_goals')); ?>

<p><?php echo anchor('apply/create_form', 'Do it again!'); ?></p>
