<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<h3>Your application was submitted!</h3>

<?php $post = serialize($_POST); ?>

<?php echo $post; ?>

<br /><br />

<?php $un_post = unserialize($post); ?>

<?php print_r($un_post); ?>

<br /><br />

<?php print_r($un_post['ensembles']); ?>

<p><?php echo anchor('apply/create_form', 'Do it again!'); ?></p>
