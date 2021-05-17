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
                'FIO' => 'required',
                'id_team'  => 'required',
                'Amplua'  => 'required',
                'picture'  => 'is_image[picture]|max_size[picture,1024]',
            ]))
        {
            $insert = null;
            //получение загруженного файла из HTTP-запроса
            $file = $this->request->getFile('picture');
            if ($file->getSize() != 0) {
                //подключение хранилища
                $s3 = new S3Client([
                    'version' => 'latest',
                    'region' => 'us-east-1',
                    'endpoint' => getenv('S3_ENDPOINT'),
                    'use_path_style_endpoint' => true,
                    'credentials' => [
                        'key' => getenv('S3_KEY'), //чтение настроек окружения из файла .env
                        'secret' => getenv('S3_SECRET'), //чтение настроек окружения из файла .env
                    ],
                ]);
                //получение расширения имени загруженного файла
                $ext = explode('.', $file->getName());
                $ext = $ext[count($ext) - 1];
                //загрузка файла в хранилище
                $insert = $s3->putObject([
                    'Bucket' => getenv('S3_BUCKET'), //чтение настроек окружения из файла .env
                    //генерация случайного имени файла
                    'Key' => getenv('S3_KEY') . '/file' . rand(100000, 999999) . '.' . $ext,
                    'Body' => fopen($file->getRealPath(), 'r+')
                ]);

            }
            $model = new RatingModel();
            //подготовка данных для модели
            $data = [
                'FIO' => $this->request->getPost('FIO'),
                'id_team' => $this->request->getPost('id_team'),
                'Amplua' => $this->request->getPost('Amplua'),
            ];
            //если изображение было загружено и была получена ссылка на него то даобавить ссылку в данные модели
            if (!is_null($insert))
                $data['picture_url'] = $insert['ObjectURL'];
            $model->save($data);
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
            $insert = null;
            //получение загруженного файла из HTTP-запроса
            $file = $this->request->getFile('picture');
            if ($file->getSize() != 0) {
                //подключение хранилища
                $s3 = new S3Client([
                    'version' => 'latest',
                    'region' => 'us-east-1',
                    'endpoint' => getenv('S3_ENDPOINT'),
                    'use_path_style_endpoint' => true,
                    'credentials' => [
                        'key' => getenv('S3_KEY'), //чтение настроек окружения из файла .env
                        'secret' => getenv('S3_SECRET'), //чтение настроек окружения из файла .env
                    ],
                ]);
                //получение расширения имени загруженного файла
                $ext = explode('.', $file->getName());
                $ext = $ext[count($ext) - 1];
                //загрузка файла в хранилище
                $insert = $s3->putObject([
                    'Bucket' => getenv('S3_BUCKET'), //чтение настроек окружения из файла .env
                    //генерация случайного имени файла
                    'Key' => getenv('S3_KEY') . '/file' . rand(100000, 999999) . '.' . $ext,
                    'Body' => fopen($file->getRealPath(), 'r+')
                ]);

            }
            $model = new RatingModel();
            //подготовка данных для модели
            $data = [
                'id'=> $this->request->getPost('id'),
                'FIO' => $this->request->getPost('FIO'),
                'id_team' => $this->request->getPost('id_team'),
                'Amplua' => $this->request->getPost('Amplua'),
            ];
            //если изображение было загружено и была получена ссылка на него то даобавить ссылку в данные модели
            if (!is_null($insert))
                $data['picture_url'] = $insert['ObjectURL'];
            $model->save($data);
            session()->setFlashdata('message', lang('Curating.rating_create_success'));
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
