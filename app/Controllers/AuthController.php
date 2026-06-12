<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PelangganModel;

class AuthController extends BaseController
{
    protected $UserModel;
    protected $PelangganModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->PelangganModel = new PelangganModel();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

   public function prosesLogin()
{
$username = $this->request->getPost('username');
$password = $this->request->getPost('password');

$user = $this->UserModel
    ->where('username', $username)
    ->first();

if (!$user)
{
    return redirect()
        ->back()
        ->with(
            'error',
            'Username tidak ditemukan'
        );
}

if (!password_verify($password, $user['password']))
{
    return redirect()
        ->back()
        ->with(
            'error',
            'Password salah'
        );
}

// Login pelanggan
if ($user['role'] == 'pelanggan')
{
    $pelanggan = $this->PelangganModel
        ->where(
            'id_user',
            $user['id_user']
        )
        ->first();

    session()->set([

        'id_user' =>
            $user['id_user'],

        'id_pelanggan' =>
            $pelanggan['id_pelanggan'],

        'username' =>
            $user['username'],

        'role' =>
            $user['role'],

        'logged_in' =>
            true

    ]);

    return redirect()->to(
        base_url(
            'index.php/pelanggan/dashboard'
        )
    );
}

// Login admin dan owner
session()->set([

    'id_user' =>
        $user['id_user'],

    'username' =>
        $user['username'],

    'role' =>
        $user['role'],

    'logged_in' =>
        true

]);

if ($user['role'] == 'admin')
{
    return redirect()->to(
        base_url(
            'index.php/admin/dashboard'
        )
    );
}

if ($user['role'] == 'owner')
{
    return redirect()->to(
        base_url(
            'index.php/owner/dashboard'
        )
    );
}

return redirect()->back();

}


    public function prosesRegister()
    {
        $rules = [

    'nama' =>
        'required|min_length[3]',

    'no_hp' =>
        'required|numeric|min_length[10]',

    'alamat' =>
        'required|min_length[5]',

    'username' =>
        'required|min_length[4]|is_unique[user.username]',

    'password' =>
        'required|min_length[8]|regex_match[/^(?=.*[A-Z])(?=.*[0-9]).+$/]',

    'konfirmasi_password' =>
        'required|matches[password]'

];

        if (!$this->validate($rules))
        {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    implode(
                        '<br>',
                        $this->validator->getErrors()
                    )
                );
        }

        $idUser = $this->UserModel->insert([

            'username' =>
                $this->request->getPost('username'),

            'password' =>
                password_hash(
                    $this->request->getPost('password'),
                    PASSWORD_DEFAULT
                ),

            'role' =>
                'pelanggan'

        ]);

        $this->PelangganModel->insert([

            'id_user' =>
                $idUser,

            'nama' =>
                $this->request->getPost('nama'),

            'no_hp' =>
                $this->request->getPost('no_hp'),

            'alamat' =>
                $this->request->getPost('alamat')

        ]);

        return redirect()
            ->to(
                base_url('index.php/login')
            )
            ->with(
                'success',
                'Registrasi berhasil, silakan login'
            );
    }

    public function logout()
{
    session()->destroy();

    return redirect()
        ->to(
            base_url('index.php/login')
        )
        ->with(
            'success',
            'Berhasil logout'
        );
}


}