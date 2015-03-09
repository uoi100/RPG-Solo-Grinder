<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function index()
	{
                $this->select();
	}
        
        /*
         * Description: When a category button is pressed on the admin page is 
         * pressed, display the appropriate blogs under that category.
         */
        function select($selection = null){
            if($selection == 'news' ||
                    $selection == 'anime' ||
                    $selection == 'projects' ||
                    $selection == 'streams')
            {
                $this->data['categoryblog'] = $this->genBlogs($selection);
            }
            else
            {
                $this->data['categoryblog'] = '';
                $this->data['blogs'] = '';
                $this->data['/blogs'] = '';
                $this->data['ID'] = '';
                $this->data['Date'] = '';
                $this->data['Title'] = '';
                $this->data['Subtitle'] = '';
                $this->data['Description'] = '';
                $this->data['btnAdd'] = '';
            }
            
            $this->data['pagebody'] = 'admin';
            
            $this->render();
        }
        
        /*
         * Generates a list of all the available blogs and displays it to the
         * admin. These blogs can be edited and modified from here.
         */
        function genBlogs($category){
            $blog = '';
            
            if($category == 'news' ||
                $category == 'anime' ||
                $category == 'projects' ||
                $category == 'streams'){
                $blog = '<tr>'
                        . '<th>ID</th>'
                        . '<th>Date</th>'
                        . '<th>Title</th>'
                        . '<th>Subtitle</th>'
                        . '<th>Description</th>'
                        . '</tr>';
                $this->data['blogs'] = $this->blogbase->groupCategory($category);
                $this->data['btnAdd'] = '<a href="/a/create/' . $category .
                        '">Create Blog</a>';
            }    
            
            return $blog;
        }
        
        // Add a new blog
        function create($category){
            $blog = $this->blogbase->create();
            $this->formBlog($blog, $category);
        }
        
        // Displays the form for the admin to enter to create a new blog
        function formBlog($blog, $category){
            $date = date("Y-m-d G:i:s", time());
            $this->data['category'] = $category;
            //Format any errors
            $message = '';
            if(count($this->errors) > 0){
                foreach($this->errors as $booboo)
                    $message .= $booboo . BR;
            }
            $this->data['message'] = $message;
            
            // Create form inputs
            $this->data['fid'] = makeTextField('ID#',
                    'id',
                    $blog->ID,
                    "Unique blog identifier, system-assigned",
                    10,
                    10,
                    true);
            $this->data['fcategory'] = makeTextField('Category',
                    'category',
                    $category,
                    "The category that this blog will be created on.",
                    10,
                    10,
                    true);
            $this->data['fdate'] = makeTextField('Date',
                    'date',
                    $date,
                    "Current date that this blog was created.",
                    20,
                    20,
                    true);
            $this->data['ftitle'] = makeTextField('Title',
                    'title',
                    $blog->Title);
            $this->data['fsubtitle'] = makeTextField('Subtitle',
                    'subtitle',
                    $blog->Subtitle);
            $this->data['fdesc'] = makeTextArea('Description',
                    'desc',
                    $blog->Description);
            $this->data['fsubmit'] = makeSubmitButton('Create Blog',
                    'Click here to validate the blog data', 'btn-success');
            
            $this->data['pagebody'] = 'blog_edit';
            $this->render();
        }
        
        function confirm($category){
            $blog = $this->blogbase->create();
            // Extract submitted fields
            $blog->Category = $category;
            $blog->Date = $this->input->post('date');
            $blog->Title = $this->input->post('title');
            $blog->Subtitle = $this->input->post('subtitle');
            $blog->Description = $this->input->post('desc');
            
            //Validation
            if(empty($blog->Title))
                $this->errors[] = 'Title field cannot be empty.';
            if(empty($blog->Subtitle))
                $this->errors[] = 'Subtitle field cannot be empty.';
            if(empty($blog->Description))
                $this->errors[] = 'Description field cannot be empty.';
            
            if(count($this->errors) > 0){
                $this->formBlog($blog, $category);
                return;
            }
            
            // Save stuff
            if(empty($blog->id))
            {
                $blog->ID = $this->blogbase->highest() + 1;
                $this->blogbase->add($blog);
            }
            else $this->blogbase->update($blog);
            redirect('/admin');
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */