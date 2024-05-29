<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Citizen extends CI_Model{
    public function findAllCitizen(){
        $this->db->select('*');
        $this->db->from('citizen');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function verifCitizensTable() {
        $this->db->select('citizen_temp.id_citizen as id_citizen, citizen_temp.firstname as firstname, citizen_temp.lastname as lastname, citizen_temp.birthdate as birthdate, citizen_temp.id_gender as id_gender, citizen_temp.id_city as id_city');
        $this->db->from('citizen_temp');
        $this->db->join('citizen', 'citizen.id_citizen = citizen_temp.id_citizen', 'left');
        $this->db->where('citizen.id_citizen IS NULL');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function findCitizens($string){
        $resultat = array();
            $query = $this->db->query("Select * from citizen where firstname like '%$string%' OR lastname like '%$string%'");
            if ($query) {
                foreach($query->result_array() as $row){
                    $resultat[] = array("id_citizen"=> $row['id_citizen'],"firstname"=>$row['firstname'],"lastname"=>$row['lastname']);
                }
            } else {
                // Handle database error here
                log_message('error', 'Database error: ' . $this->db->error());
                return false;
            }
            return $resultat;
       }
    
    
    public function readFileAndSaveinDb($file, $tabName) {
        /*ouvre le fichier csv en mode lecture*/
        $fp = fopen($file, "r");
        if (!$fp) {
            return false;
        }
        
        /*recuperer le separateur dans la ligne*/
        $separator = find_separator($file);
        if (!$separator) {
            fclose($fp);
            return false;
        }

        $columns = fgetcsv($fp, 0, $separator);
        if (!$columns) {
            fclose($fp);
            return false;
        }

        $columns_str = implode(",", $columns);

        // Lire ligne par ligne et insérer dans la base de données
        while (($data = fgetcsv($fp, 0, $separator)) !== false) {
            if (count($columns) != count($data)) {
                fclose($fp);
                return false;
            }

            // Préparer les données pour l'insertion
            $insert_data = array_combine($columns, $data);

            // Utiliser la méthode d'insertion de CodeIgniter
            if (!$this->db->insert($tabName, $insert_data)) {
                fclose($fp);
                return false;
            }
        }
        fclose($fp);
        return true;
    }
    
    public function insert_citizenInTableTemp($data) {
        return $this->db->insert('citizen_temp', $data);
    }

    public function add_citizen($data) {
        return $this->db->insert('citizen', $data);
    }

    public function delete_all_citizensInTemp() {
        //return $this->db->empty_table('citizen_temp');
        $sql = "DELETE FROM citizen_temp";
        $this->db->query($sql);
    }
}