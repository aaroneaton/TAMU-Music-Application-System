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
  echo $rec['app_first'];
}
