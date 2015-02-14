<?php

namespace Masterclass\Model;

use \PDO;

class User
{
    /**
     * @var PDO
     */
    protected $db;

    /**
     * @param array $config
     */
    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    /**
     * @return array
     */
    public function getByUsername($username)
    {
        $story_sql = 'SELECT * FROM user WHERE username = ?';
        $story_stmt = $this->db->prepare($story_sql);
        $story_stmt->execute(array($username));
        $data = $story_stmt->fetch(PDO::FETCH_ASSOC); 
        return $data;
    }

    /**
     * @return array
     */
    public function login($username, $password)
    {
        $story_sql = 'SELECT * FROM user WHERE username = ? AND password = ? LIMIT 1';
        $story_stmt = $this->db->prepare($story_sql);
        $story_stmt->execute(array($username, $password));
        $data = $story_stmt->fetch(PDO::FETCH_ASSOC); 
        return $data;
    }

    /**
     * @param integer $id
     * @return array|bool
     */
    public function create($username, $email, $password)
    {
        $sql = 'INSERT INTO user (username, email, password) VALUES (?, ?, ?)';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(
            $username,
            $email,
            $password
        ));

        return $this->db->lastInsertId();
    }

}