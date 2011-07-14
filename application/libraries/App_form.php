<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class App_form {
  
  public function initiate($formelements)
  {
    // Construct validation array
    foreach ($formelements as $element) {
      
      // Set validation rule
      $rules[$element['attributes']['name']] = $element['validation'];
    
    }

    // Set the rules, using the array we constructed earlier
    $this->form_validation->set_rules($rules);

    // Now construct an array of user-friendly names
    foreach ($formelements as $element) {
      
      // Set a user-friendly name
      $fields[$element['attributes']['name']] = $element['friendly_name'];

      // Use this user-friendly name as a label while we're at it
      $this->formelements[$element['attributes']['name']]['label'] = $element['friendly_name'];
    
    }

    // Set user-friendly names, using the array we constructed
    $this->form_validation->set_fields($fields);

    // Now run the validation
    if ($this->form_validation->run() == TRUE)
    {
      $this->metadata['validated'] = TRUE;

      // Construct an array of key value pairs (fields that need to be processed and their value)
      foreach ($form_elements as $element) {
        
        // Only process data that needs to be processed
        if (!isset($element['process']) && $element['process'] == TRUE) {
          $this->form_results[$element['attributes']['name']] = $this->form_validation->$element['attributes']['name'];
        }
      }
    }
    else { //Validation failed
      
      $this->metadata['validated'] = FALSE;
      $this->validation_error = $this->form_validation->error_string;
    }
  }
}
