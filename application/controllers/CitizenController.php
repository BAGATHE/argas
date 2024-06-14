<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/CitizenParentController.php');
Class CitizenController extends CitizenParentController{
    public function __construct(){
        parent::__construct();
        $this->load->model('Citizen');
    }
    public function index(){
        echo "ato am citizen";
      }

    public function findCitizens($string){     
    if(empty($string)){
        echo json_encode([]);exit;
    }
    $citizens = $this->Citizen->findCitizens($string);
    echo json_encode($citizens); exit;
}


public function importDataCitizen(){
    if(isset($_FILES["fichier"])){
        //maka anarany nle fichier
        $fichier = basename($_FILES['fichier']['name']);
        $taille_maxi = 10000000;
        //maka taille nle fichier
        $taille = filesize($_FILES['fichier']['tmp_name']);
        $extensions = array('.csv');
        //maka extension nle fichier
        $extension = strrchr($_FILES['fichier']['name'],'.');        
        $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        
        if(!in_array($extension,$extensions)){
            echo  'le fichier doit etre de type csv';
        }if($taille > $taille_maxi){
            echo  'le fichier est trop volumineux';
        }
        $this->Citizen->readFileAndSaveinDb($_FILES['fichier']['tmp_name'],"citizen_temp");
            $datas = $this->Citizen->verifCitizensTable();
            if(count($datas)>0){
                    foreach ($datas as $row) {
                      if(!$this->Citizen->add_citizen($row)) {
                          echo "Erreur lors de l'insertion de la ligne : " . $row['id_citizen'];
                        }
                    }
            }
            $this->Citizen->delete_all_citizensInTemp();
            $data['title'] = 'home Page';
            $data['description'] = 'home page';
            $data['contents'] = 'home';
            $data['citizens'] = $this->Citizen->findAllCitizen();
            $this->load->view('templates/template2', $data);
}
}

} ?>