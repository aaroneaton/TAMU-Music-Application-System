<div id="sidebar">
<h2>Menu</h2>

<ul id="links">

    <li><?php echo anchor('home', 'Home'); ?></li>

<?php // If user is logged in and an administrator, show Admin stuff ?>
<?php if($this->ion_auth->is_admin()) : ?>

    <li><?php echo anchor('auth/create_user', 'Create New User'); ?></li>
    <li><?php echo anchor('auth', 'User List'); ?></li>

<?php // If user is logged in and an applicant, show Applicant stuff ?>
<?php elseif($this->ion_auth->is_group('applicants')) : ?>

    <?php // @todo - Should only show if application does not exist ?>
    <li><?php echo anchor('apply/create_app', 'Start Application'); ?></li>

    <?php // @todo - Should only show if application exists ?>
    <li><?php echo anchor('apply/view', 'View Application'); ?></li>

    <?php // @todo - Should only show if application exists ?>
    <li><?php echo anchor('apply/edit', 'Edit Application'); ?></li>

    <?php // @todo - Should only show if application exists ?>
    <li><?php echo anchor('apply/cancel', 'Cancel Application'); ?></li>

<?php // If user is logged in and a recommender, show Recommendation stuff ?>
<?php elseif($this->ion_auth->is_group('recommenders')) : ?>

    <li><?php echo anchor('rec/new_rec', 'Start New Recommendation'); ?> </li>

    <li><?php echo anchor('rec/view', 'View Recommendations'); ?></li>

<?php // If user is logged in and a reviewer, show Review stuff ?>
<?php elseif($this->ion_auth->is_group('reviewers')) : ?>

    <li><?php echo anchor('review', 'View Applications'); ?></li>

<?php endif; ?>

<?php if($this->ion_auth->logged_in()) : ?>

    <li><?php echo anchor('auth/change_password', 'Change Password'); ?></li>

    <li><?php echo anchor('auth/logout', 'Logout'); ?></li>

<?php endif; ?>

</ul>
</div>