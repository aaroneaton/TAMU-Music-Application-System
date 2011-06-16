<?php 

// Checks to see if the user is logged in

if(!$this->ion_auth->logged_in()) {
  redirect('/auth/login');
}


// If user is logged in and an administrator, show Admin stuff 
elseif($this->ion_auth->is_admin()){

  redirect('/admin');
}

// If user is logged in and an applicant, show Applicant stuff
elseif($this->ion_auth->is_group('applicants')){ 

  redirect('/apply');
}

// If user is logged in and a recommender, show Recommendation stuff
elseif($this->ion_auth->is_group('recommenders')){ 

  redirect('/rec');
}

// If user is logged in and a reviewer, show Review stuff
elseif($this->ion_auth->is_group('reviewers')){ 

  redirect('/review');
}
