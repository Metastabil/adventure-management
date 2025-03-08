<?php
namespace App\Controllers;

use App\Models\PlayerModel;
use App\Models\UserModel;

class Pages extends BaseController {
    private PlayerModel $player_model;
    private UserModel $user_model;

    public function __construct() {
        parent::__construct();

        $this->player_model = new PlayerModel();
        $this->user_model = new UserModel();
    }

    public function login() :void {
        $data = [
            'title' => 'Anmelden'
        ];

        $required_fields = [
            'username',
            'password'
        ];

        if (is_post() && check_required_fields($required_fields)) {
            $username = esc(get_input('username'));
            $password = get_input('password');

            if (!empty($player = $this->player_model->get(0, $username)) && password_verify($password, $player['password'])) {
                $_SESSION['player'] = [
                    'id' => (int)$player['id'],
                    'username' => esc($player['username'])
                ];

                redirect(base_url('game'));
            }

            $_SESSION['message'] = [
                'type' => 'error',
                'message' => 'Unbekannte Benutzerdaten'
            ];

            redirect(base_url('login'));
        }

        $this->view->render('pages/login', $data);
    }

    public function register() :void {
        $data = [
            'title' => 'Registrieren'
        ];

        $required_fields = [
            'username',
            'password'
        ];

        if (is_post() && check_required_fields($required_fields)) {
            $username = esc(get_input('username'));
            $password = password_hash(get_input('password'), PASSWORD_DEFAULT);

            if (!empty($this->player_model->get(0, $username))) {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'message' => 'Der Benutzername ist bereits vergeben'
                ];

                redirect(base_url('login'));
            }

            if ($this->player_model->insert(['username' => $username, 'password' => $password, 'active' => false])) {
                redirect(base_url('login'));
            }

            $_SESSION['message'] = [
                'type' => 'error',
                'message' => 'Ein Fehler ist aufgetreten'
            ];

            redirect(base_url('register'));
        }

        $this->view->render('pages/register', $data);
    }

    public function logout() :void {
        unset($_SESSION['player']);
        unset($_SESSION['user']);

        redirect(base_url('login'));
    }

    public function admin_login() :void {
        $data = [
            'title' => 'Anmelden'
        ];

        $required_fields = [
            'email',
            'password'
        ];

        if (is_post() && check_required_fields($required_fields)) {
            $email = esc(get_input('email'));
            $password = get_input('password');

            if (!empty($user = $this->user_model->get(0, $email)) && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => (int)$user['id']
                ];

                redirect(base_url('admin/users'));
            }

            $_SESSION['message'] = [
                'type' => 'error',
                'message' => 'Unbekannte Benutzerdaten'
            ];

            redirect(base_url('admin/login'));
        }

        $this->view->render('pages/admin-login', $data);
    }

    public function game() :void {

    }
}