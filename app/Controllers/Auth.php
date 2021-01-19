<?php
namespace App\Controllers;

use IonAuth\Libraries\IonAuth;

class Auth extends \IonAuth\Controllers\Auth
{
    /**
     * If you want to customize the views,
     *  - copy the ion-auth/Views/auth folder to your Views folder,
     *  - remove comment
     */
    protected $viewsFolder = 'auth';

    protected function renderPage(string $view, $data = null, bool $returnHtml = true): string
    {
        $data['ionAuth'] = new IonAuth(); //Добавление в массив $data объекта IonAuth()

        $viewdata = $data ?: $this->data;
        $viewHtml = view($view, $viewdata);

        if ($returnHtml)
        {
            return $viewHtml;
        }
        else
        {
            echo $viewHtml;
        }
    }

    public function register_user()
    {
        $this->data['title'] = lang('Auth.create_user_heading');
        /*  Закомментировать
                if (! $this->ionAuth->loggedIn() || ! $this->ionAuth->isAdmin())
                {
                    return redirect()->to('/auth');
                }
        */
        $tables                        = $this->configIonAuth->tables;
        $identityColumn                = $this->configIonAuth->identity;
        $this->data['identity_column'] = $identityColumn;

        // validate form input
        $this->validation->setRule('first_name', lang('Auth.create_user_validation_fname_label'), 'trim|required');
        $this->validation->setRule('last_name', lang('Auth.create_user_validation_lname_label'), 'trim|required');
        if ($identityColumn !== 'email')
        {
            $this->validation->setRule('identity', lang('Auth.create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identityColumn . ']');
            $this->validation->setRule('email', lang('Auth.create_user_validation_email_label'), 'trim|required|valid_email');
        }
        else
        {
            $this->validation->setRule('email', lang('Auth.create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->validation->setRule('phone', lang('Auth.create_user_validation_phone_label'), 'trim');
        $this->validation->setRule('company', lang('Auth.create_user_validation_company_label'), 'trim');
        $this->validation->setRule('password', lang('Auth.create_user_validation_password_label'), 'required|min_length[' . $this->configIonAuth->minPasswordLength . ']|matches[password_confirm]');
        $this->validation->setRule('password_confirm', lang('Auth.create_user_validation_password_confirm_label'), 'required');

        if ($this->request->getPost() && $this->validation->withRequest($this->request)->run())
        {
            $email    = strtolower($this->request->getPost('email'));
            $identity = ($identityColumn === 'email') ? $email : $this->request->getPost('identity');
            $password = $this->request->getPost('password');

            $additionalData = [
                'first_name' => $this->request->getPost('first_name'),
                'last_name'  => $this->request->getPost('last_name'),
                'company'    => $this->request->getPost('company'),
                'phone'      => $this->request->getPost('phone'),
            ];
        }
        if ($this->request->getPost() && $this->validation->withRequest($this->request)->run() && $this->ionAuth->register($identity, $password, $email, $additionalData))
        {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->setFlashdata('message', $this->ionAuth->messages());
            return redirect()->to('/auth');
        }
        else
        {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = $this->validation->getErrors() ? $this->validation->listErrors($this->validationListTemplate) : ($this->ionAuth->errors($this->validationListTemplate) ? $this->ionAuth->errors($this->validationListTemplate) : $this->session->getFlashdata('message'));

            $this->data['first_name'] = [
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => set_value('first_name'),
            ];
            $this->data['last_name'] = [
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                'value' => set_value('last_name'),
            ];
            $this->data['identity'] = [
                'name'  => 'identity',
                'id'    => 'identity',
                'type'  => 'text',
                'value' => set_value('identity'),
            ];
            $this->data['email'] = [
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'email',
                'value' => set_value('email'),
            ];
            $this->data['company'] = [
                'name'  => 'company',
                'id'    => 'company',
                'type'  => 'text',
                'value' => set_value('company'),
            ];
            $this->data['phone'] = [
                'name'  => 'phone',
                'id'    => 'phone',
                'type'  => 'text',
                'value' => set_value('phone'),
            ];
            $this->data['password'] = [
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                'value' => set_value('password'),
            ];
            $this->data['password_confirm'] = [
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => set_value('password_confirm'),
            ];
            ///$data['ionAuth'] = new IonAuth(); //Добавление в массив $data объекта IonAuth()
            return $this->renderPage($this->viewsFolder . DIRECTORY_SEPARATOR . 'register_user', $this->data);
        }
    }
}
