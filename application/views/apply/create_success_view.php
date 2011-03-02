<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<h3>Your application was submitted!</h3>

<?php print_r($_POST); ?>

<p><?php echo anchor('apply/create_form', 'Do it again!'); ?></p>
