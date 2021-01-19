<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message', $this->withIon());
    }
    public function view($page = 'main')
    {
        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        echo view('pages/'.$page, $this->withIon());
    }
}