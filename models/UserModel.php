<?php

class UserModel extends Model {

    private $_table = 'users';

    public function getUsers()
    {
        $stmt = $this->db->query('SELECT * FROM ' . $this->_table);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($username, $password)
    {
        $stmt = $this->db->prepare(
            'INSERT INTO ' . $this->_table . ' (username, password) VALUES (:username, :password)'
        );
        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);

        return $stmt->rowCount();
    }

    public function updateUser()
    {
        $stmt = $this->db->prepare('UPDATE ' . $this->_table . ' SET password = ? WHERE id = ?');
        $stmt->execute(['1234', 1]);
        return $stmt->rowCount();
    }


    public function checkUsername($username)
    {
         $stmt = $this->db->prepare('SELECT id FROM ' . $this->_table . ' WHERE (username = :username)');
         $stmt->execute([':username' => $username]);
         return $stmt->rowCount();
    }


    public function checkLogin($username, $password)
    {
         $stmt = $this->db->prepare('SELECT username, password FROM ' . $this->_table . ' WHERE (username = :username AND password = :password)');
         $stmt->execute([':username'=> $username, ':password' => $password]);
         return $stmt->rowCount();
    }

}