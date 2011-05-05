<?php
/*
 * This view shows a single recommendation based on the recommendation id in the URI
 */
?>

<?php
if ($id != $rec['id'])
{
  echo 'You do not have permission to view this recommendation';
  echo '<br />';
  echo anchor('auth/login', 'Log In');
}
else
{
?>

  <h2>Recommendation for: <?php echo $rec['app_first'] . ' ' . $rec['app_last']; ?></h2>
  
  <h3>Ratings Matrix:</h3>

<?php  
  print_r($rec);
}
