<?php namespace App\Controllers;

use App\Models\RatingModel;

class Player extends BaseController

{
    public function index() //Обображение всех записей
    {
        //если пользователь не аутентифицирован - перенаправление на страницу входа
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        $model = new RatingModel();
        $data ['player'] = $model->getRating();
        echo view('player/view_all', $this->withIon($data));
    }

    public function create()
    {
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        helper(['form']);
        $data ['validation'] = \Config\Services::validation();
        echo view('player/create', $this->withIon($data));
    }

    public function store()
    {
        helper(['form','url']);

        if ($this->request->getMethod() === 'post' && $this->validate([
                'FIO' => 'required|min_length[3]|max_length[255]',
                'Amplua'  => 'required',
                'id_team'  => 'required',
            ]))
        {
            $model = new RatingModel();
            $model->save([
                'id_team' => 1,
                'FIO' => $this->request->getPost('FIO'),
                'Amplua' => $this->request->getPost('Amplua'),
            ]);
            session()->setFlashdata('message', lang('Curating.rating_create_success'));
            return redirect()->to('/player');
        }
        else
        {
            return redirect()->to('/player/create')->withInput();
        }
    }

    public function delete($id)
    {
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        $model = new RatingModel();
        $model->delete($id);
        return redirect()->to('/player');
    }

    public function update()
    {
        helper(['form','url']);
        echo '/player/edit/'.$this->request->getPost('id');
        if ($this->request->getMethod() === 'post' && $this->validate([
                'id' =>'required',
                'id_team' =>'required',
                'FIO' => 'required',
                'Amplua'  => 'required',
            ]))
        {
            $model = new RatingModel();
            $model->save([
                'id'=> $this->request->getPost('id'),
                'id_team' => $this->request->getPost('id_team'),
                'FIO' => $this->request->getPost('FIO'),
                'Amplua' => $this->request->getPost('Amplua'),
            ]);
            //session()->setFlashdata('message', lang('Curating.rating_update_success'));

            return redirect()->to('/player');
        }
        else
        {
            return redirect()->to('/player/edit/'.$this->request->getPost('id'))->withInput();
        }
    }

    public function edit($id)
    {
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        $model = new RatingModel();

        helper(['form']);
        $data ['player'] = $model->getRating($id);
        $data ['validation'] = \Config\Services::validation();
        echo view('player/edit', $this->withIon($data));

    }

    public function view($id = null) //отображение одной записи
    {
        //если пользователь не аутентифицирован - перенаправление на страницу входа
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        $model = new RatingModel();
        $data ['player'] = $model->getRating($id);
        echo view('player/view', $this->withIon($data));
    }
}