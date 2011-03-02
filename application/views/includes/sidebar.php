<h2>Sidebar</h2>

<?php // If user is logged in and an administrator, show Admin stuff ?>
<?php if($this->ion_auth->is_admin()) : ?>

    <p>You are the admin.</p>

<?php // If user is logged in and an applicant, show Applicant stuff ?>
<?php elseif($this->ion_auth->is_group('applicants')) : ?>

    <p>You are an applicant</p>

<?php // If user is logged in and a recommender, show Recommendation stuff ?>
<?php elseif($this->ion_auth->is_group('recommenders')) : ?>

    <p>You are a recommender.</p>

<?php // If user is logged in and a reviewer, show Review stuff ?>
<?php elseif($this->ion_auth->is_group('reviewers')) : ?>

    <p>You are a reviewer.</p>

<?php endif; ?>

<?php if($this->ion_auth->logged_in()) : ?>

    <p><?php echo anchor('auth/logout', 'Logout'); ?></p>

<?php endif; ?>