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

class Login extends Application {

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
    public function index()
    {
        $user = $this->projectrpgsologrinder->create();
        $this->formLogin($user);
    }
    
    // Present a Login Form for the user to login the site
    function formLogin($data){
        // format any errors
        $message = '';
        if(count($this->errors) > 0){
            foreach($this->errors as $booboo)
                $message .= $booboo . BR;
        }
        
        $this->data['message'] = $message;
        
        $this->data['fusername'] = makeTextField('Username', 'username',
                $data->Username);
        $this->data['fpassword'] = makeTextField('Password', 'password',
                $data->Password);
        $this->data['fsubmit'] = makeSubmitButton('Process Login',
                'Click here to validate the user data', 'btn-success');
                
        $this->data['pagebody'] = 'form_login';
        $this->render();
    }
    
    //Process user login
    function confirm(){
        $user = $this->projectrpgsologrinder->create();
        // Extract submitted fields
        $user->Username = $this->input->post('username');
        $user->Password = $this->input->post('password');
        
        // validation
        if(empty($user->Username))
            $this->errors[] = 'Username field cannot be empty.';
        else if(!$this->projectrpgsologrinder->exists($user->Username))
            $this->errors[] = 'Username does not exist.';
        else
        {
            if(!empty($user->Password)){
                if(!$this->projectrpgsologrinder->exists($user->Password))
                    $this->errors[] = 'Incorrect Password.';
            }
        }
        
        if(empty($user->Password))
            $this->errors[] = 'Password field cannot be empty.';
        
        if(count($this->errors) > 0){
            $this->formLogin($user);
            return;
        }
        
        // Login
        redirect('/admin');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */