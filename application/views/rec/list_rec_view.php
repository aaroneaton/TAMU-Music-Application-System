<?php
/*
 * This view presents the recommendations that the logged-in user
 * has submitted.
 */

?>

<table>
  <th>Last Name</th>
  <th>First Name</th>
  <th>Actions</th>
  <?php foreach($recs as $row) : ?>
  <tr>
    <td><?php echo $row['app_last']; ?></td>
    <td><?php echo $row['app_first']; ?></td>
    <td><?php echo anchor('rec/show_rec/' . $row['id'], 'View'); ?> | 
      <?php echo anchor('rec/edit_rec/' . $row['id'], 'Edit'); ?></td>
  </tr>
  <?php endforeach; ?>
</table>
