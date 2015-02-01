<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application extends CI_Controller
{
    protected $data = array();      // parameters for view components
    protected $id;                  // identify for our content
    protected $navbarChoices = array(
        'Home' => '/', 'News' => '/news', 'Anime' => '/anime',
        'Projects' => '/projects', 'Stream' => '/stream');
    
    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct()
    {
        parent::__construct();
        $this->data = array();
        $this->data['pagetitle'] = 'RPG-Solo-Grinder';
    }
    
    /**
     * Render this page
     */
    function render()
    {
	$this->data['menubar'] = build_menu_bar($this->navbarChoices);
	$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
	$this->data['data'] = &$this->data;
	$this->parser->parse('_template', $this->data);
    }
    
}