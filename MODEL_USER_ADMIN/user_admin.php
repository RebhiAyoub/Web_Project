<?php
class User {
    private ?string $id_user;
    private ?string $first_name;
    private ?string $last_name;
    private ?string $email;
    private ?string $date_of_birth;
    private ?string $password;
    private ?string $role;
    private ?string $status;

    public function __construct($id_user = null, $first_name, $last_name, $email, $date_of_birth, $password, $role,$status) {
        $this->id_user = $id_user;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->date_of_birth = $date_of_birth;
        $this->password = $password;
        $this->role = $role;
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id_user;
    }
    public function setId($id_user)
    {
        return $this->id_user=$id_user;
    }
    public function getFirstname()
    {
        return $this->first_name;
    }
    public function setFirstname($firstname)
    {
        return $this->first_name=$firstname;
    }
    public function getLastname()
    {
        return $this->last_name;
    }
    public function setLastname($lastname)
    {
        return $this->last_name=$lastname;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        return $this->email=$email;
    }
    public function getDate_of_Birth()
    {
        return $this->date_of_birth;
    }
    public function setDate_of_Birth($DOB)
    {
        return $this->date_of_birth=$DOB;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($pwd)
    {
        return $this->password=$pwd;
    }
    public function getrole()
    {
        return $this->role;
    }
    public function setrole($role)
    {
        return $this->role=$role;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        return $this->status=$status;
    }
   
}
?>
