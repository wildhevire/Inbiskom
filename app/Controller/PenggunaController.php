<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\Session;
use app\Core\View;
use app\DTO\AddPenggunaRequest;
use app\DTO\LoginPenggunaRequest;
use app\Exception\ValidationException;
use app\Repository\PenggunaRepository;
use app\Service\PenggunaService;
use SebastianBergmann\CodeUnit\InvalidCodeUnitException;

class PenggunaController
{
    private PenggunaService $service;
    private Session $session;
    public function __construct()
    {
        $repo = new PenggunaRepository(Database::getConnection());
        $this->service = new PenggunaService($repo);
        $this->session = new Session();
    }

    public function index()
    {
        View::RenderHtml('Login/index', []);
    }

    //TODO: Lengkapin Handle request


    public function Authenticate()
    {
        $request = new LoginPenggunaRequest();
        $request->username = $_POST['username'];
        $request->password = $_POST['password'];

        try
        {
            $pengguna = $this->service->Login($request);
            $this->session->Set('id_pengguna', $pengguna->id_pengguna);
            $this->session->Set('username', $pengguna->username);
            $this->session->Set('hak_akses', $pengguna->hak_akses);
            View::Redirect('/dashboard-home');
        }
        catch(ValidationException $exception)
        {
            View::renderHtml('Login/index', [
                'title' => 'Login',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function Logout()
    {
        session_destroy();
        View::Redirect('/dashboard-login');
    }

    //Test Purpose Only
    public function RenderAddPengguna()
    {
        View::RenderHtml('Login/AddPengguna', []);
    }

    public function AddPengguna()
    {
        $request = new AddPenggunaRequest();
        $request->nama_pengguna = $_POST['nama_pengguna'];
        $request->username      = $_POST['username'];
        $request->password      = $_POST['password'];
        $request->hak_akses     = $_POST['hak_akses'];
        $request->status        = 1;
        $request->tahun_aktif   = $_POST['tahun_aktif'];
        try
        {
            $this->service->AddPengguna($request);
            View::Redirect('/dashboard-login');
        }
        catch (ValidationException $exception)
        {
            View::RenderHtml('Login/AddPengguna', [
                'error'=> $exception->getMessage()
            ]);
        }

    }


}