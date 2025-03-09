<?php
namespace App\Controllers;

use App\Models\InventoryModel;

class Inventories extends BaseController {
    private InventoryModel $inventory_model;

    public function __construct() {
        parent::__construct();

        $this->inventory_model = new InventoryModel();
    }

    public function index() :void {
        $data = [
            'title' => 'Übersicht der Inventare',
            'elements' => $this->inventory_model->get()
        ];

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/inventories/index', $data)
                   ->render('admin/templates/footer');
    }

    public function show(int $id) :void {
        $data = [
            'title' => 'Details eines Inventars',
            'element' => $this->inventory_model->get($id)
        ];

        $this->view->render('admin/templates/header', $data)
                   ->render('admin/inventories/show', $data)
                   ->render('admin/templates/footer');
    }
}