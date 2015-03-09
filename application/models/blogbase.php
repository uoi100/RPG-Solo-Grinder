<?php

/* 
 * This is a "CMS" model for projectrpgsologrinder
 */
class Blogbase extends MY_Model2{
    
    // Constructor
    public function __construct(){
        parent::__construct('blogbase', 'ID', 'Category');
    }
    
    // retrieve the most recently added quote
    function last(){
        $key = $this->highest();
        return $this->get($key);
    }
    
    // Return all records associated with a member
    function groupCategory($key) {
        $this->db->where($this->_keyField2, $key);
        $this->db->order_by($this->_keyField, 'asc');
        $this->db->order_by($this->_keyField2, 'asc');
        $query = $this->db->get($this->_tableName);
        return $query->result();
    }
    
    // Return all records as an array of objects
    function allDesc() {
        $this->db->order_by($this->_keyField, 'desc');
        $query = $this->db->get($this->_tableName);
        return $query->result();
    }
}

