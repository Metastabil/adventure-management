<?php
namespace App\Models;

class UserModel extends BaseModel {
    public function get(int $id = 0, string $email = '', bool $deleted = false) :array {
        $params[':deleted'] = $deleted;

        if ($id > 0) {
            $query = $this->get_query('users', 'get');
            $params[':id'] = $id;
        }
        elseif (!empty($email)) {
            $query = $this->get_query('users', 'get-by-email');
            $params[':email'] = $email;
        }
        else {
            $query = $this->get_query('users', 'get');
        }

        $statement = $this->db->prepare($query);
        $statement->execute($params);

        $result = $statement->fetchAll();

        return !empty($result) && ($id > 0 || !empty($email)) ? $result[0] : $result;
    }

    public function insert(array $data) :int|bool {
        $query = $this->get_query('users', 'insert');

        if ($this->db->prepare($query)->execute($data)) {
            return $this->db->lastInsertId();
        }

        return false;
    }

    public function update(array $data) :bool {
        $query = $this->get_query('users', 'update');

        return $this->db->prepare($query)->execute($data);
    }
}