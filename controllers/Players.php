<?php
namespace App\Controllers;

use App\Models\InventoryModel;
use App\Models\PlayerModel;

class Players extends BaseController {
    private InventoryModel $inventory_model;
    private PlayerModel $player_model;

    public function __construct() {
        parent::__construct();

        $this->inventory_model = new InventoryModel();
        $this->player_model = new PlayerModel();
    }

    public function index() :void {
        $data = [
            'title' => 'Übersicht der Spieler',
            'elements' => $this->player_model->get()
        ];

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/players/index', $data)
                   ->render('admin/templates/footer');
    }

    public function create() :void {
        $data = [
            'title' => 'Neuen Spieler anlegen'
        ];

        $required_fields = [
            'username',
            'password'
        ];

        if (is_post() && check_required_fields($required_fields)) {
            $input = [
                'username' => esc(get_input('username')),
                'password' => password_hash(get_input('password'), PASSWORD_DEFAULT),
                'level' => (int)get_input('level') > 0 ? (int)get_input('level') : 1,
                'active' => (int)(bool)get_input('active')
            ];

            if (!empty($this->player_model->get(0, $input['username']))) {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'message' => 'Der Benutzername ist bereits vergeben.'
                ];

                redirect(base_url('admin/create-player'));
            }

            $response = $this->player_model->insert($input);

            if (!is_bool($response) && $response > 0) {
                $this->inventory_model->insert([ 'player_id' => $response ]);

                $_SESSION['message'] = [
                    'type' => 'success',
                    'message' => 'Der Spieler wurde erfolgreich angelegt.'
                ];
            }
            else {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'message' => 'Es ist ein unerwarteter Fehler aufgetreten.'
                ];
            }

            redirect(base_url('admin/players'));
        }

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/players/create', $data)
                   ->render('admin/templates/footer');
    }

    public function show(int $id) :void {
        $data = [
            'title' => 'Details eines Spielers',
            'element' => $this->player_model->get($id)
        ];

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/players/show', $data)
                   ->render('admin/templates/footer');
    }

    public function update(int $id) :void {
        $data = [
            'title' => 'Spieler bearbeiten',
            'element' => $this->player_model->get($id)
        ];

        $required_fields = [
            'username'
        ];

        if (is_post() && check_required_fields($required_fields)) {
            if (!empty($this->player_model->get(0, esc(get_input('username'))))) {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'message' => 'Der Benutzername ist bereits vergeben.'
                ];

                redirect(base_url('admin/players'));
            }

            $input = [
                'id' => $id,
                'username' => esc(get_input('username')),
                'password' => empty(get_input('password')) ? $data['element']['password'] : password_hash(get_input('password'), PASSWORD_DEFAULT),
                'level' => (int)get_input('level'),
                'active' => (int)(bool)get_input('active'),
                'deleted' => 0
            ];

            if ($this->player_model->update($input)) {
                $_SESSION['message'] = [
                    'type' => 'success',
                    'message' => 'Der Spieler wurde erfolgreich aktualisiert.'
                ];
            }
            else {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'message' => 'Beim Speichern ist ein unerwarteter Fehler aufgetreten.'
                ];
            }

            redirect(base_url('admin/players'));
        }

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/players/update', $data)
                   ->render('admin/templates/footer');
    }

    public function delete(int $id) :void {
        $player = $this->player_model->get($id);
        $input = [
            'id' => $id,
            'username' => $player['username'],
            'password' => $player['password'],
            'level' => $player['level'],
            'active' => 0,
            'deleted' => 1
        ];

        if ($this->player_model->update($input)) {
            $_SESSION['message'] = [
                'type' => 'success',
                'message' => 'Der Spieler wurde erfolgreich gelöscht.'
            ];
        }
        else {
            $_SESSION['message'] = [
                'type' => 'error',
                'message' => 'Beim Löschen ist ein unerwarteter Fehler aufgetreten.'
            ];
        }

        redirect(base_url('admin/players'));
    }
}