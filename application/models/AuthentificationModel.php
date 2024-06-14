<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AuthentificationModel extends CI_Model {
    protected $email;
    protected $phone;
    protected $password;

    public function __construct($data = []) {
        parent::__construct();
        if (!empty($data)) {
            $this->setEmail($data['email'] ?? null);
            $this->setPhone($data['phone'] ?? null);
            $this->setPassword($data['password'] ?? null);
        }
    }

    // Getter for email
    public function getEmail() {
        return $this->email;
    }

    // Setter for email
    public function setEmail($email) {
        $this->email = $email;
    }

    // Getter for phone
    public function getPhone() {
        return $this->phone;
    }

    // Setter for phone
    public function setPhone($phone) {
        $this->phone = $phone;
    }

    // Getter for password
    public function getPassword() {
        return $this->password;
    }

    // Setter for password
    public function setPassword($password) {
        $this->password = $password;
    }
    public function findEmail(){
        $query = $this->db->get_where('user',['email' => $this->getEmail()]);
        if ($query->num_rows() > 0) {
            return true; // Email trouvé
        } else {
            return false; // Email non trouvé
        }
    }
    
    public function findPhoneNumber(){
    $query = $this->db->get_where('user',['phone' => $this->getPhone()]);
    if ($query->num_rows() > 0) {
        return true; // phone trouvé
    } else {
        return false; // phone non trouvé
    }

    }

    public function findPassword(){
        $hashed_password = sha1($this->getPassword());
        $query = $this->db->get_where('user',['password' => $hashed_password]);
        if ($query->num_rows() > 0) {
            return true; // password trouvé
        } else {
            return false; // password non trouvé
        }
    }

    public function getUser() {
        // Hacher le mot de passe en utilisant SHA1
        $hashed_password = sha1($this->getPassword());
        $sql = "SELECT * FROM user WHERE email = ? AND phone = ? AND password=?";
        $query = $this->db->query($sql, [$this->getEmail(), $this->getPhone(), $hashed_password]);
        $row = $query->row_array();
        return $row;
    }

    public function checkUser(){
        //creation de tableau de taille 3 et initiliser les valeur a zero
        $tab = array(
            "email" =>false,
            "phone" =>false,
            "password" =>false,
            "profil" =>null
        );
        $tab["email"] = $this->findEmail($this->getEmail());
        $tab["phone"] = $this->findPhoneNumber($this->getPhone());
        $tab["password"] = $this->findPassword($this->getPassword());
        if($tab["email"] == true && $tab["phone"] == true && $tab["password"] == true ){
            return  $this->getUser();
        }else{
            return $tab;
        }
         
    }

}
