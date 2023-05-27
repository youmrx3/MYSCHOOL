<?php

class User
{
    public   string $email;
    public string $name;

    public int $id;

    public int $roleId;


    public function __construct(int $id, string $email, string $name, int $roleId)
    {
        $this->email = $email;
        $this->name = $name;
        $this->id = $id;
        $this->roleId = $roleId;
    }
}


class UserRole
{
    public  const Admin = 1;
    public const User = 2;
}




?>