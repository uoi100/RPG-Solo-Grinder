<?php

/* 
 * This is a "CMS" model for projectrpgsologrinder
 */
class Blogbase extends MY_Model{
    
    // Constructor
    public function __construct(){
        parent::__construct('blogbase', 'ID');
    }
    
    // retrieve the most recently added quote
    function last(){
        $key = $this->highest();
        return $this->get($key);
    }
}

