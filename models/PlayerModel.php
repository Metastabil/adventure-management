<?php
namespace App\Models;

class PlayerModel extends BaseModel {
    public function get(int $id = 0, string $username = '', bool $deleted = false) :array {
        $params[':deleted'] = $deleted;

        if ($id > 0) {
            $query = $this->get_query('players', 'get-by-id');
            $params[':id'] = $id;
        }
        elseif (!empty($username)) {
            $query = $this->get_query('players', 'get-by-username');
            $params[':username'] = $username;
        }
        else {
            $query = $this->get_query('players', 'get');
        }

        $statement = $this->db->prepare($query);
        $statement->execute($params);

        $result = $statement->fetchAll();

        return !empty($result) && ($id > 0 || !empty($username)) ? $result[0] : $result;
    }

    public function insert(array $data) :int|bool {
        $query = $this->get_query('players', 'insert');

        if ($this->db->prepare($query)->execute($data)) {
            return $this->db->lastInsertId();
        }

        return false;
    }

    public function update(array $data) :bool {
        $query = $this->get_query('players', 'update');

        return $this->db->prepare($query)->execute($data);
    }
}