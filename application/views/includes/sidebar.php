<h2>Sidebar</h2>

<ul id="links">

    <li><?php echo anchor('home', 'Home'); ?></li>

<?php // If user is logged in and an administrator, show Admin stuff ?>
<?php if($this->ion_auth->is_admin()) : ?>

    <li><?php echo anchor('auth/create_user', 'Create New User'); ?></li>
    <li><?php echo anchor('auth', 'User List'); ?></li>

<?php // If user is logged in and an applicant, show Applicant stuff ?>
<?php elseif($this->ion_auth->is_group('applicants')) : ?>

    <?php // @todo - Should only show if application does not exist ?>
    <li><?php echo anchor('apply/new', 'Start Application'); ?></li>

    <?php // @todo - Should only show if application exists ?>
    <li><?php echo anchor('apply/view', 'View Application'); ?></li>

    <?php // @todo - Should only show if application exists ?>
    <li><?php echo anchor('apply/edit', 'Edit Application'); ?></li>

    <?php // @todo - Should only show if application exists ?>
    <li><?php echo anchor('apply/cancel', 'Cancel Application'); ?></li>

<?php // If user is logged in and a recommender, show Recommendation stuff ?>
<?php elseif($this->ion_auth->is_group('recommenders')) : ?>

    <p>You are a recommender.</p>

<?php // If user is logged in and a reviewer, show Review stuff ?>
<?php elseif($this->ion_auth->is_group('reviewers')) : ?>

    <p>You are a reviewer.</p>

<?php endif; ?>

    <li><?php echo anchor('auth/change_password', 'Change Password'); ?></li>

<?php if($this->ion_auth->logged_in()) : ?>

    <li><?php echo anchor('auth/logout', 'Logout'); ?></li>

<?php endif; ?>

</ul>