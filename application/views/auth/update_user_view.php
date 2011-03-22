<div class='mainInfo'>

	<h1>Update User</h1>
	<p>Please enter the users information below.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
    <?php echo form_open("auth/update_user");?>
      <p>First Name:<br />
      <?php echo form_input($first_name);?>
      </p>
      
      <p>Last Name:<br />
      <?php echo form_input($last_name);?>
      </p>
      
      <p>Company/Institutional Affiliation:<br />
      <?php echo form_input($company);?>
      </p>

      <p>Position/Title:<br />
      <?php echo form_input($position); ?>
      
      <p>Email:<br />
      <?php echo form_input($email);?>
      </p>
      
      <p>Phone:<br />
      <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
      </p>
      
      <p><?php echo form_submit('submit', 'Update');?></p>

      
    <?php echo form_close();?>

</div>
