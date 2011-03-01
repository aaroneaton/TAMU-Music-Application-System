<?php

if (!$this->ion_auth->logged_in())
{
    redirect('auth/login');
}
else
{
    if ($this->ion_auth->is_admin())
    {
        echo 'You are the admin';
    }
    else
    {
        echo 'You are not an admin';
    }
}