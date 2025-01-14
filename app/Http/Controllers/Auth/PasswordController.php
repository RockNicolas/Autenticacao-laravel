<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Define o assunto do e-mail de recuperação de senha.
     *
     * @var string
     */
    protected $subject;

    /**
     * Cria uma nova instância do controlador de senha.
     *
     * @return void
     */
    public function __construct()
    {
        $this->subject = "Recuperação de Senha";
        $this->middleware('guest');
    }
}


