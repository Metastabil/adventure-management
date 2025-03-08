<?php
namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController {
    private UserModel $user_model;

    public function __construct() {
        parent::__construct();

        if (empty($_SESSION['user'])) {
            redirect(base_url('admin/login'));
        }

        $this->user_model = new UserModel();
    }

    public function index() :void {
        $data = [
            'title' => 'Übersicht der Benutzer',
            'elements' => $this->user_model->get()
        ];

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/users/index', $data)
                   ->render('admin/templates/footer');
    }

    public function create() :void {
        $data = [
            'title' => 'Neuen Benutzer anlegen'
        ];

        $required_fields = [
            'email',
            'password'
        ];

        if (is_post() && check_required_fields($required_fields)) {
            if (empty($this->user_model->get(0, esc(get_input('email'))))) {
                $input = [
                    'email' => esc(get_input('email')),
                    'password' => password_hash(get_input('password'), PASSWORD_DEFAULT)
                ];

                if ($this->user_model->insert($input) > 0) {
                    $_SESSION['message'] = [
                        'type' => 'success',
                        'message' => 'Der Benutzer wurde erfolgreich gespeichert.'
                    ];
                }
                else {
                    $_SESSION['message'] = [
                        'type' => 'error',
                        'message' => 'Beim Speichern ist ein Fehler aufgetreten.'
                    ];
                }
            }
            else {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'message' => 'Die E-Mail-Adresse ist bereits in Benutzung.'
                ];
            }

            redirect(base_url('admin/users'));
        }

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/users/create', $data)
                   ->render('admin/templates/footer');
    }

    public function show(int $id) :void {
        $data = [
            'title' => 'Details eines Benutzers',
            'element' => $this->user_model->get($id)
        ];

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/users/show', $data)
                   ->render('admin/templates/footer');
    }

    public function update(int $id) :void {
        $data = [
            'title' => 'Benutzer bearbeiten',
            'element' => $this->user_model->get($id)
        ];

        $required_fields = [
            'email'
        ];

        if (is_post() && check_required_fields($required_fields)) {
            $user = $data['element'];
            $input = [
                'id' => $id,
                'email' => esc(get_input('email')),
                'password' => empty(get_input('password')) ? $user['password'] : password_hash(get_input('password'), PASSWORD_DEFAULT),
                'deleted' => 0
            ];

            if (empty($this->user_model->get(0, $input['email']))) {
                if ($this->user_model->update($input)) {
                    $_SESSION['message'] = [
                        'type' => 'success',
                        'message' => 'Der Benutzer wurde erfolgreich aktualisiert.'
                    ];
                }
                else {
                    $_SESSION['message'] = [
                        'type' => 'error',
                        'message' => 'Beim Speichern ist ein Fehler aufgetreten.'
                    ];
                }
            }
            else {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'message' => 'Die E-Mail-Adresse ist bereits in Benutzung.'
                ];
            }

            redirect(base_url('admin/users'));
        }

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/users/update', $data)
                   ->render('admin/templates/footer');
    }

    public function delete(int $id) :void {
        $user = $this->user_model->get($id);
        $input = [
            'id' => $id,
            'email' => $user['email'],
            'password' => $user['password'],
            'deleted' => 1
        ];

        if ($this->user_model->update($input)) {
            $_SESSION['message'] = [
                'type' => 'success',
                'message' => 'Der Benutzer wurde erfolgreich gelöscht'
            ];
        }
        else {
            $_SESSION['message'] = [
                'type' => 'error',
                'message' => 'Beim Löschen ist ein Fehler aufgetreten.'
            ];
        }

        redirect(base_url('admin/users'));
    }
}