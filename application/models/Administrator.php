<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Administrator extends CI_Model{

public function find_email($email){
       $query = $this->db->get_where('administrator', array('email' => $email));
       if ($query->num_rows() > 0) {
           return true; // Email trouvé
       } else {
           return false; // Email non trouvé
       }
}
public function find_phoneNumber($phone){
    $query = $this->db->get_where('administrator', array('phone' => $phone));
    if ($query->num_rows() > 0) {
        return true; // phone trouvé
    } else {
        return false; // phone non trouvé
    }
}
public function find_password($password){
    $hashed_password = sha1($password);
    $query = $this->db->get_where('administrator', array('password' => $hashed_password));
    if ($query->num_rows() > 0) {
        return true; // password trouvé
    } else {
        return false; // password non trouvé
    }
}

public function get_administrator($email, $phone, $password) {
    // Hacher le mot de passe en utilisant SHA1
    $hashed_password = sha1($password);
    $sql = "SELECT * FROM administrator WHERE email = ? AND phone = ? AND password=?";
    $query = $this->db->query($sql, array($email, $phone, $hashed_password));
    $row = $query->row_array();

    return $row;
}
/*
public function get_administrator($email, $phone, $password) {
    $hashed_password = sha1($password);
    $this->db->where('email', $email);
    $this->db->where('phone', $phone);
    $this->db->where('password', $hashed_password);
    $query = $this->db->get('administrator');
    return $query->row_array();
}
*/



public function check_login($email,$phone,$password){
    //creation de tableau de taille 3 et initiliser les valeur a zero
    $tab = array(
        "email" =>false,
        "phone" =>false,
        "password" =>false
    );
    $tab["email"] = $this->find_email($email);
    $tab["phone"] = $this->find_phoneNumber($phone);
    $tab["password"] = $this->find_password($password);
    if($tab["email"] == true && $tab["phone"] == true && $tab["password"] == true ){
        return $this->get_administrator($email,$phone,$password);
    }else{
        return $tab;
    }
     
}



}
?>