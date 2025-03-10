<?php
namespace App\Models;

class ResourceModel extends BaseModel {
    public function get(int $id = 0, bool $deleted = false) :array {
        $params[':deleted'] = $deleted;

        if ($id > 0) {
            $query = $this->get_query('resources', 'get-by-id');
            $params[':id'] = $id;
        }
        else {
            $query = $this->get_query('resources', 'get');
        }

        $statement = $this->db->prepare($query);
        $statement->execute($params);

        $result = $statement->fetchAll();

        return !empty($result) && $id > 0 ? $result[0] : $result;
    }

    public function insert(array $data) :int|bool {
        $query = $this->get_query('resources', 'insert');

        if ($this->db->prepare($query)->execute($data)) {
            return $this->db->lastInsertId();
        }

        return false;
    }

    public function update(array $data) :bool {
        $query = $this->get_query('resources', 'update');

        return $this->db->prepare($query)->execute($data);
    }
}