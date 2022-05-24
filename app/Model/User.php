<?php

namespace App\Model;

class User extends Model
{

    public string $email;
    public string $name;
    public bool $isActive;


    public function create(string $email, string $name, bool $isActive = true): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO users (email, full_name, is_active, created_at)
            VALUES (?,?,?, NOW())'
        );

        $stmt->execute([$email, $name, $isActive]);

        return (int) $this->db->lastInsertId();
    }
}