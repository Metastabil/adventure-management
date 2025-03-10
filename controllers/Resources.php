<?php
namespace App\Controllers;

use App\Models\ResourceModel;

class Resources extends BaseController {
    private ResourceModel $resource_model;

    public function __construct() {
        parent::__construct();

        $this->resource_model = new ResourceModel();
    }

    public function index() :void {
        $data = [
            'title' => 'Übersicht der Ressourcen',
            'elements' => $this->resource_model->get()
        ];

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/resources/index', $data)
                   ->render('admin/templates/footer');
    }

    public function create() :void {
        $data = [
            'title' => 'Neue Ressource anlegen'
        ];

        $required_fields = [
            'name'
        ];

        if (is_post() && check_required_fields($required_fields)) {
            $input = [
                'name' => esc(get_input('name')),
                'description' => esc(get_input('description'))
            ];

            if ($this->resource_model->insert($input)) {
                $_SESSION['message'] = [
                    'type' => 'success',
                    'message' => 'Die Ressource wurde erfolgreich gespeichert.'
                ];
            }
            else {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'message' => 'Beim Speichern ist ein unerwarteter Fehler aufgetreten'
                ];
            }

            redirect(base_url('admin/resources'));
        }

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/resources/create', $data)
                   ->render('admin/templates/footer');
    }

    public function show(int $id) :void {
        $data = [
            'title' => 'Details einer Ressource',
            'element' => $this->resource_model->get($id)
        ];

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/resources/show', $data)
                   ->render('admin/templates/footer');
    }

    public function update(int $id) :void {
        $data = [
            'title' => 'Resource bearbeiten',
            'element' => $this->resource_model->get($id)
        ];

        $required_fields = [
            'name'
        ];

        if (is_post() && check_required_fields($required_fields)) {
            $input = [
                'id' => $id,
                'name' => esc(get_input('name')),
                'description' => esc(get_input('description')),
                'deleted' => 0
            ];

            if ($this->resource_model->update($input)) {
                $_SESSION['message'] = [
                    'type' => 'success',
                    'message' => 'Die Ressource wurde erfolgreich gespeichert.'
                ];
            }
            else {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'message' => 'Beim Speichern ist ein unerwarteter Fehler aufgetreten'
                ];
            }

            redirect(base_url('admin/resources'));
        }

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/resources/update', $data)
                   ->render('admin/templates/footer');
    }

    public function delete(int $id) :void {
        $resource = $this->resource_model->get($id);
        $input = [
            'id' => $id,
            'name' => $resource['name'],
            'description' => $resource['description'],
            'deleted' => 1
        ];

        if ($this->resource_model->update($input)) {
            $_SESSION['message'] = [
                'type' => 'success',
                'message' => 'Die Ressource wurde erfolgreich gelöscht.'
            ];
        }
        else {
            $_SESSION['message'] = [
                'type' => 'error',
                'message' => 'Beim Löschen ist ein Fehler aufgetreten'
            ];
        }

        redirect(base_url('admin/resources'));
    }
}