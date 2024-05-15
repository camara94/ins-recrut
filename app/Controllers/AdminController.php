<?php

namespace App\Controllers;
use \Mpdf\Mpdf;
use Dompdf\Dompdf;
use App\Models\DepartementModel;
use App\Models\SPrefectureModel;
use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\UserPrefectureModel;
use App\Models\ProjetModel;
use App\Models\DepouillementModel;
use App\Models\PersoRecrutModel;
use Dompdf\Options;
// use App\Models\AdminModel;
//se App\Models\CategoryModel;
use App\Models\PersonneRecrut;
//use App\Models\RecrutExperience;
use App\Models\RecrutEthnie;
 \Config\Services::validation();
 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminController extends BaseController
{
    public function index()
    {
        helper(['form']);
        // return view('admin/login');
        return redirect()->to('/signin');
    }

    public function signin()
    {
        helper(['form']);
        $session = session();
        $userModel = new AdminModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if(!$authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['last_name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                // return redirect()->to('admin/dashboard');
                return redirect()->to('/tableau');
            
            }
            else{
                $session->setFlashdata('msg', 'Password is incorrect.');
               // return redirect()->to('admin');
               return redirect()->to('/tableau');
            }

        }
        else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('admin');
        }
    }

    public function dashboardNew(){
        helper(['form']);
        $personnerecru_model = new PersonneRecrut();
       // $experience_model = new RecrutExperience();
        $recrutEthnie_model = new RecrutEthnie();
        $data = [];
        $data['count']  = $personnerecru_model->countAllResults();
        $data['homme']  = $personnerecru_model->countHommes();
        $data['femme']  = $personnerecru_model->countFemmes();
       // $data['person'] = $personnerecru_model->findAll();
        // $this->UpdateNoteAgent();

        $sql = 'SELECT DISTINCT recrut_personne_recrut.contact1,recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "homme"
            ELSE "femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3
       
        FROM recrut_personne_recrut,recrut_departement
        WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep
        ORDER BY recrut_personne_recrut.note DESC;';
     
        $data['person'] = $personnerecru_model->db->query($sql)->getResult();
        $result = $recrutEthnie_model->getValueByParameter($param);
        //var_dump($data);

        $data['admin_content'] = 'admin/dashboard';    
        
        
        

        return view('tpl/index', $data);
        // return view('admin/includes/template', $data);
    }

    public function dashboard(){
        helper(['form']);
        $personnerecru_model = new PersonneRecrut();
       // $experience_model = new RecrutExperience();
        $recrutEthnie_model = new RecrutEthnie();
        $data = [];
        $data['count']  = $personnerecru_model->countAllResults();
        $data['homme']  = $personnerecru_model->countHommes();
        $data['femme']  = $personnerecru_model->countFemmes();
       // $data['person'] = $personnerecru_model->findAll();
        // $this->UpdateNoteAgent();

        $sql = 'SELECT DISTINCT recrut_personne_recrut.contact1,recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "homme"
            ELSE "femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3
       
        FROM recrut_personne_recrut,recrut_departement
        WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep
        ORDER BY recrut_personne_recrut.note DESC;';
     
        $data['person'] = $personnerecru_model->db->query($sql)->getResult();
        $result = $recrutEthnie_model->getValueByParameter($param);
        //var_dump($data);

        $data['admin_content'] = 'admin/dashboard';
        return view('admin/includes/template', $data);
    }

    public function logout()
    {
        session()->session_destroy();      
        redirect()->to(base_url('/admin'));
    }

    public function UpdateNoteAgent()
    {
        $personnerecru_model = new PersonneRecrut();
        $sql ='SELECT recrut_personne_recrut.matricule, recrut_personne_recrut.id,
        recrut_personne_recrut.exp_intitule_poste,
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude
                
        FROM recrut_personne_recrut,recrut_departement
        WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep';
        $data = $personnerecru_model->db->query($sql)->getResult();
    
        foreach ($data as $datas) {
            $pointsLangueLocale = $this->calculatePointsByLangues($datas->langue1, $datas->langue2, $datas->langue3);    
            $pointsTotal = $this->calculatePointsByNiveauEtude($datas->niveau_etude) + $this->calculatePointsByExperience($datas->exp_intitule_poste) + $pointsLangueLocale;
    
            $d = ['note' => $pointsTotal ,];
            
            // Corrected the variable name here, it should be `$personnerecru_model`
            $result = $personnerecru_model->update($datas->id, $d);    
        }
    }  

    public function category()
    {
        $data = [];
        $model = new CategoryModel();
        if($this->request->getMethod() == 'post'){
            $tableData = [
                'cat_name' => $this->request->getVar('category'),
            ];
            
            if($model->save($tableData)){
                $data['cat_data'] = true;
            }
        }
       
        $data['admin_content'] = 'admin/category';
        return view('admin/includes/template', $data);
    }

    public function export()
    {
        //$this->UpdateNoteAgent();
        $personnerecru_model = new PersonneRecrut(); 
        // $experience_model = new RecrutExperience();

        $session = \Config\Services::session();

        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];
        
        $ids = "0"; 
        if(count($userprefectures) > 0){
            $ids = join(',', $userprefectures);
        }

        $req = "  AND recrut_personne_recrut.departement3 IN ($ids) ";

        $sql = 'SELECT recrut_personne_recrut.matricule,
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.last_name,
        recrut_personne_recrut.departement3,recrut_departement.NomDep,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.exp_intitule_projet,
        recrut_personne_recrut.exp_structure,
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "homme"
            ELSE "femme"
        END AS sexe,
        recrut_personne_recrut.NomProjet,
        recrut_personne_recrut.contact1,
        recrut_departement.NomDep
        FROM recrut_personne_recrut,recrut_departement
        WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep '.$req.'
        ORDER BY recrut_personne_recrut.note DESC';
        
        $data = $personnerecru_model->db->query($sql)->getResult();
        $fileName = 'postulants'.uniqid().'.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // En-têtes des colonnes
        $sheet->setCellValue('A1', 'Matricule');
        $sheet->setCellValue('B1', 'NOM');
        $sheet->setCellValue('C1', 'PRENOMS');
        $sheet->setCellValue('D1', 'FONCTION');
        $sheet->setCellValue('E1', 'CONTACT');
        $sheet->setCellValue('F1', 'ZONE ACTIVITE');
        $sheet->setCellValue('G1', 'LANGUES');
        $sheet->setCellValue('H1', 'NIVEAU');
        $sheet->setCellValue('I1', 'EXPERIENCE');
        $sheet->setCellValue('J1', 'NOTE');

        $rows = 2;
        foreach ($data as $datas) {        
            $sheet->setCellValue('A' . $rows, $datas->matricule);
            $sheet->setCellValue('B' . $rows, $datas->name);
            $sheet->setCellValue('C' . $rows, $datas->last_name);
            $sheet->setCellValue('D' . $rows, $datas->NomProjet);
            $sheet->setCellValue('E' . $rows, $datas->contact1 );
            $sheet->setCellValue('F' . $rows, $datas->NomDep);
            //$sheet->setCellValue('G' . $rows, $datas->NomDep);
            $sheet->setCellValue('G' . $rows, $datas->langue1.'/'.$datas->langue2.'/'.$datas->langue3);
            $sheet->setCellValue('H' . $rows, $datas->niveau_etude);    
            $sheet->setCellValue('I' . $rows,  $datas->exp_intitule_poste);
            $sheet->setCellValue('j' . $rows,  $datas->note);
            $rows++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName);
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    } 

    public function calculatePointsByNiveauEtude($niveauEtude) {
        switch ($niveauEtude) {
            case "DEUG/BAC +2/LICENCE 2/BTS":
                return 20;
            case "LICENCE 3 / BAC+3":
                return 25;
            case "MAITRISE / MASTER 1 / BAC+4":
            case "MASTER 2 / DEA / BAC+5":
            case "DOCTORAT":
                return 30;               
            default:
                return 0; // Retourne 0 si le niveau d'étude n'est pas reconnu
        }
    }

    function calculatePointsByExperience($experience) {
        $experiences = preg_replace('/\s+/', '', $experience);
        if (isset($experiences) && !empty($experiences)) {
            return 50; // Retourne 50 points si la variable d'expérience contient au moins un élément
        } else {
            return 40; // Retourne 40 points si la variable d'expérience ne contient rien
        }
    }
    public function calculatePointsByExperiences($experience) {
        if (empty($experience)) {
            return 40; // Retourne 40 si l'expérience est vide
        } else {
            return 50; // Retourne 50 si le critère est  reconnu
        }
    
    }

    public function calculatePointsByLangueLocale($langueLocale1, $langueLocale2, $langueLocale3) {
        $languesDifferentes = $this->verifierLanguesDifferentes($langueLocale1, $langueLocale2, $langueLocale3);
    
        if (!$languesDifferentes) {
            return 0; // Retourne 0 si les langues ne sont pas différentes
        }
    
        switch ($langueLocale1) {
            case "Trois langues différentes":
                return 20;
            case "Deux langues":
                return 15;
            case "Une langue":
                return 10;
            default:
                return 0; // Retourne 0 si le critère n'est pas reconnu
        }
    }
    
    private function verifierLanguesDifferentes($langueLocale1, $langueLocale2, $langueLocale3) {
        $langues = array($langueLocale1, $langueLocale2, $langueLocale3);
        $languesDifferentes = count(array_unique($langues)) === count($langues);
        return $languesDifferentes;
    }

    function calculatePointsByLangues($langue1, $langue2, $langue3) {
        // Compter le nombre de langues différentes non vides
        $countLangues = count(array_unique(array_filter([$langue1, $langue2, $langue3])));    
        // Attribuer les points en fonction du nombre de langues différentes
        switch ($countLangues) {
            case 3:
                return 20;
            case 2:
                return 15;
            case 1:
                return 10;
            default:
                return 0; // Retourne 0 si aucune langue ou moins de 3 langues différentes
        }
    } 

    public function tableau(){
        helper(['form']);
        $request = service('request');
        $session = \Config\Services::session();

        $prefecture_id = $request->getGet('prefecture_id');
        $sp_id = $request->getGet('sp_id');
        $project_id = $request->getGet('project_id');
        $search=$request->getGet('search');

        $personnerecru_model = new PersonneRecrut();
       // $experience_model = new RecrutExperience();
        $recrutEthnie_model = new RecrutEthnie();
        $data = [];

        $recrutModel = new PersoRecrutModel();
        if($session->get('user_type') == 1){    
            // admin
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id >", 0)->countAllResults();
            // $data['affecteAgents']  = $recrutModel->where("user_id", $session->get('id'))->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }else{
            // users
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            // $data['affecteAgents']  = $recrutModel->where("user_id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id", $session->get('id'))->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("user_id", $session->get('id'))->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }

        $data['admin'] = $session->get('user_type');

        // $this->UpdateNoteAgent();

        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];
        $ids = "0"; 
        if(count($userprefectures) > 0){
            $ids = join(',', $userprefectures);
        }

        $req = " AND recrut_personne_recrut.departement3 IN ($ids) ";

        if($prefecture_id > 0){
            $req .= " AND recrut_personne_recrut.departement3=$prefecture_id";
        }

        if($sp_id > 0){
            $req .= " AND recrut_personne_recrut.sousprefecture3=$sp_id";
        }

        if($project_id > 0){
            $req .= " AND recrut_personne_recrut.id_projet=$project_id";
        }

        if(!empty($search)){
            $req .= " AND (recrut_personne_recrut.matricule LIKE '$search' OR recrut_personne_recrut.email LIKE '$search' OR recrut_personne_recrut.contact1 LIKE '$search')";
            // $req .= "recrut_personne_recrut.matricule LIKE '".$search."'";
            // $req .= " AND (recrut_personne_recrut.matricule=$search OR recrut_personne_recrut.contact1=$search OR recrut_personne_recrut.email=$search)";
        }

        $sql = 'SELECT DISTINCT recrut_personne_recrut.contact1,recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        recrut_personne_recrut.departement3,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.id_projet,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "homme"
            ELSE "femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3
       
        FROM recrut_personne_recrut,recrut_departement
        WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep '.$req.'
        ORDER BY recrut_personne_recrut.note DESC, recrut_personne_recrut.id ASC';
     
        $data['person'] = $personnerecru_model->db->query($sql)->getResult();
        $sPrefecture = new SPrefectureModel();
	    $departements = new DepartementModel();
        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];

        $data['listDep'] = [];
        $data['listSP'] = [];
        if($userprefectures){
            $data['listDep'] = $departements->whereIn('CodDep', $userprefectures)->findAll();
            $data['listSP'] = $sPrefecture->whereIn('CodDep', $userprefectures)->findAll();
        }
        $projets= new ProjetModel();
        $data['listProjet']= $projets->where('active', 1)->findAll();
        
        // $result = $recrutEthnie_model->getValueByParameter($param);
        //var_dump($data);

        return view('admin/includes/postulants', $data);
        // return view('admin/includes/base', $data);
    }

    public function trombinoscope(){
        helper(['form']);
        $request = service('request');
        $session = \Config\Services::session();

        $prefecture_id = $request->getGet('prefecture_id');
        $sp_id = $request->getGet('sp_id');
        $project_id = $request->getGet('project_id');
        $checkDepouille = $request->getGet('checkDepouille');
        $search=$request->getGet('search');
        
        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];

        $personnerecru_model = new PersonneRecrut();
       // $experience_model = new RecrutExperience();
        $recrutEthnie_model = new RecrutEthnie();
        $data = [];

        $recrutModel = new PersoRecrutModel();
        if($session->get('user_type') == 1){    
            // admin
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id >", 0)->countAllResults();
            // $data['affecteAgents']  = $recrutModel->where("user_id", $session->get('id'))->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }else{
            // users
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            // $data['affecteAgents']  = $recrutModel->where("user_id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id", $session->get('id'))->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("user_id", $session->get('id'))->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }

        $data['admin'] = $session->get('user_type');

        // $data['person'] = $personnerecru_model->findAll();
        // $this->UpdateNoteAgent();
        // $logger = service('logger');
        // $logger->error($prefecture_id);

        $ids = "0"; 
        if(count($userprefectures) > 0){
            $ids = join(',', $userprefectures);
        }

        $req = "  AND recrut_personne_recrut.departement3 IN ($ids) ";

        if($prefecture_id > 0){
            $req .= " AND recrut_personne_recrut.departement3=$prefecture_id";
        }

        if($sp_id > 0){
            $req .= " AND recrut_personne_recrut.sousprefecture3=$sp_id";
        }

        if($project_id > 0){
            $req .= " AND recrut_personne_recrut.id_projet=$project_id";
        }

        if($checkDepouille > 0){
            switch ($checkDepouille) {
                case 1: {$req .= " AND recrut_personne_recrut.depouille=$checkDepouille";} break;
                case 2: {$req .= " AND recrut_personne_recrut.depouille=0";} break;
                // default: break;
            }            
        }

        if(!empty($search)){
            $req .= " AND (recrut_personne_recrut.matricule LIKE '$search' OR recrut_personne_recrut.email LIKE '$search' OR recrut_personne_recrut.contact1 LIKE '$search')";
            // $req .= "recrut_personne_recrut.matricule LIKE '".$search."'";
            // $req .= " AND (recrut_personne_recrut.matricule=$search OR recrut_personne_recrut.contact1=$search OR recrut_personne_recrut.email=$search)";
        }

        $sql = '
        SELECT DISTINCT recrut_personne_recrut.id, recrut_personne_recrut.contact1, recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "homme"
            ELSE "femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,
        recrut_personne_recrut.email,
        recrut_personne_recrut.photo,
        recrut_personne_recrut.date_naiss,
        recrut_personne_recrut.lieu_naiss,
        recrut_personne_recrut.last_diplome,
        recrut_personne_recrut.doc_last_diplome,
        recrut_personne_recrut.nomtuteurlegal,
        recrut_personne_recrut.contact2,
        recrut_personne_recrut.nomtuteurlegal2,
        recrut_personne_recrut.contact3,
        recrut_personne_recrut.cv,
        recrut_personne_recrut.cni,
        recrut_personne_recrut.codeProjet,
        recrut_personne_recrut.status,
        recrut_personne_recrut.dateheureinscrip,
        recrut_personne_recrut.region,
        recrut_personne_recrut.sousprefecture,
        recrut_personne_recrut.departement2,
        recrut_personne_recrut.sousprefecture2,
        recrut_personne_recrut.departement4,
        recrut_personne_recrut.sousprefecture4,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.possedenumtel,
        recrut_personne_recrut.isDisponible,
        recrut_personne_recrut.hasAcceptDisponible,
        recrut_personne_recrut.cnituteurlegal,
        recrut_personne_recrut.declarahonneur,
        recrut_personne_recrut.codebonneconduite,
        recrut_personne_recrut.contrat,
        recrut_personne_recrut.type_piece,
        recrut_personne_recrut.numero_cni,
        recrut_personne_recrut.namepere,
        recrut_personne_recrut.namemere,
        recrut_personne_recrut.hasexpcollecte,
        recrut_personne_recrut.exp_structure,
        recrut_personne_recrut.exp_annee,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.exp_intitule_projet,
        recrut_personne_recrut.date_jour_decla,
        recrut_personne_recrut.confirmlieuaffectation,
        recrut_personne_recrut.certifresidence,
        recrut_personne_recrut.cand_retenu,
        recrut_personne_recrut.is_confirm,
        recrut_personne_recrut.NomProjet,
        recrut_personne_recrut.titre_poste,
        recrut_personne_recrut.choix_projet,
        recrut_personne_recrut.casier,
        recrut_personne_recrut.certifmedical,
        recrut_personne_recrut.attestcollecte,
        recrut_personne_recrut.note2,
        recrut_personne_recrut.rank,
        recrut_personne_recrut.fonction_id,
        recrut_personne_recrut.is_admited,
        recrut_personne_recrut.admited_at,
        recrut_personne_recrut.nbrinsert,
        recrut_personne_recrut.departement3,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.id_projet,
        recrut_personne_recrut.depouille,

        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3
       
        FROM recrut_personne_recrut, recrut_departement
        WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep '.$req.'
        ORDER BY recrut_personne_recrut.note DESC, recrut_personne_recrut.id ASC LIMIT 10';    
        $person = $personnerecru_model->db->query($sql)->getResult();

        $data['person'] = $person;
        // prefecture_id
        $sPrefecture = new SPrefectureModel();
	    $departements = new DepartementModel();

        $data['listDep'] = [];
        $data['listSP'] = [];
        if($userprefectures){
            $data['listDep'] = $departements->whereIn('CodDep', $userprefectures)->findAll();
            $data['listSP'] = $sPrefecture->whereIn('CodDep', $userprefectures)->findAll();
        }
        $projets= new ProjetModel();
        $data['listProjet']= $projets->where('active', 1)->findAll();

        // userPrefectures
        // $logger = service('logger');
        // $logger->error("----------------------- userPrefectures ------------------------");
        // $logger->error(var_dump($userprefectures));
        // $result = $recrutEthnie_model->getValueByParameter($param);
        // var_dump($data);

        return view('admin/includes/trombinoscope', $data);
    }

    public function generatePdf1() {
        $autoload['helper'] = array('url');
        $helper = service('html');

        $mpdf = new Mpdf();

        $data = array(
            'title' => 'Mon Document PDF',
            'content' => 'Contenu de votre document PDF ici.'
        );

        // Chargez la vue HTML en tant que contenu du PDF
        // $html = $this->load->view('pdf_template', $data, true);
        $html =  view('pdf_template', $data);

        // Générez le PDF
        $mpdf->WriteHTML($html);
        $mpdf->Output('nom_du_fichier.pdf', 'D'); // Téléchargez le PDF directement
    }

    public function generatePdf()
    {
        $dompdf = new Dompdf();
        $data = [
            'imageSrc'    => $this->imageToBase64(ROOTPATH.'/public/assets/images/logo-rgph4.jpg'),
            'name'         => 'John Doe',
            'address'      => 'USA',
            'mobileNumber' => '000000000',
            'email'        => 'john.doe@email.com'
        ];

        $html = view('resume', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); 
        $dompdf->render();
        $dompdf->stream('resume.pdf', [ 'Attachment' => false ]);
    }

    private function imageToBase64($path) {

        $logger = service('logger');


        $path = $path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $logger->error($path);
        // $logger->error($type);
        // $logger->error($data);
        $logger->error($base64);

        return $base64;
    }

    public function trombinoscopeDownload1(){        
        $personnerecru_model = new PersonneRecrut();
        $recrutEthnie_model = new RecrutEthnie();
        $data = [];
        // $this->UpdateNoteAgent();
        $session = \Config\Services::session();
        // $userprefectures = array_column($session->get('userprefectures'), 'prefecture_id');
        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];
        
        $ids = "0"; 
        if(count($userprefectures) > 0){
            $ids = join(',', $userprefectures);
        }

        $req = "  AND recrut_personne_recrut.departement3 IN ($ids) ";
        $sql = '
        SELECT DISTINCT recrut_personne_recrut.contact1,recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "homme"
            ELSE "femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,
        recrut_personne_recrut.email,
        recrut_personne_recrut.photo,
        recrut_personne_recrut.date_naiss,
        recrut_personne_recrut.lieu_naiss,
        recrut_personne_recrut.last_diplome,
        recrut_personne_recrut.doc_last_diplome,
        recrut_personne_recrut.nomtuteurlegal,
        recrut_personne_recrut.contact2,
        recrut_personne_recrut.nomtuteurlegal2,
        recrut_personne_recrut.contact3,
        recrut_personne_recrut.cv,
        recrut_personne_recrut.cni,
        recrut_personne_recrut.codeProjet,
        recrut_personne_recrut.status,
        recrut_personne_recrut.dateheureinscrip,
        recrut_personne_recrut.region,
        recrut_personne_recrut.sousprefecture,
        recrut_personne_recrut.departement2,
        recrut_personne_recrut.sousprefecture2,
        recrut_personne_recrut.departement4,
        recrut_personne_recrut.sousprefecture4,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.possedenumtel,
        recrut_personne_recrut.isDisponible,
        recrut_personne_recrut.hasAcceptDisponible,
        recrut_personne_recrut.cnituteurlegal,
        recrut_personne_recrut.declarahonneur,
        recrut_personne_recrut.codebonneconduite,
        recrut_personne_recrut.contrat,
        recrut_personne_recrut.type_piece,
        recrut_personne_recrut.numero_cni,
        recrut_personne_recrut.namepere,
        recrut_personne_recrut.namemere,
        recrut_personne_recrut.hasexpcollecte,
        recrut_personne_recrut.exp_structure,
        recrut_personne_recrut.exp_annee,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.exp_intitule_projet,
        recrut_personne_recrut.date_jour_decla,
        recrut_personne_recrut.confirmlieuaffectation,
        recrut_personne_recrut.certifresidence,
        recrut_personne_recrut.cand_retenu,
        recrut_personne_recrut.is_confirm,
        recrut_personne_recrut.NomProjet,
        recrut_personne_recrut.titre_poste,
        recrut_personne_recrut.choix_projet,
        recrut_personne_recrut.casier,
        recrut_personne_recrut.certifmedical,
        recrut_personne_recrut.note2,
        recrut_personne_recrut.rank,
        recrut_personne_recrut.fonction_id,
        recrut_personne_recrut.is_admited,
        recrut_personne_recrut.admited_at,
        recrut_personne_recrut.nbrinsert,

        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3
       
        FROM recrut_personne_recrut,recrut_departement
        WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep '.$req.'
        ORDER BY recrut_personne_recrut.note DESC LIMIT 2';
     
        $data['person'] = $personnerecru_model->db->query($sql)->getResult();
        // $result = $recrutEthnie_model->getValueByParameter($param);       

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'L',  // 'P' pour Portrait, 'L' pour Paysage
        ]);

        $logger = service('logger');
        $logger->error($data);

        $fileName = 'trombinoscope'.uniqid().'.pdf';

        $html = view('admin/includes/trombinoscope-download', $data);
        // $html = view('pdf_template', $data);
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'D');  
    }



    public function trombinoscopeDownload()
    {
        helper(['form']);
        $session = \Config\Services::session();
        $request = service('request');
        $prefecture_id = $request->getGet('prefecture_id');
        $sp_id = $request->getGet('sp_id');
        $project_id = $request->getGet('project_id');
        $search=$request->getGet('search');
        $personnerecru_model = new PersonneRecrut();
       // $experience_model = new RecrutExperience();
        $recrutEthnie_model = new RecrutEthnie();
        $data = [];
        $data['count']  = $personnerecru_model->countAllResults();
        $data['homme']  = $personnerecru_model->countHommes();
        $data['femme']  = $personnerecru_model->countFemmes();
       // $data['person'] = $personnerecru_model->findAll();
        // $this->UpdateNoteAgent(); 

        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];

        $ids = "0"; 
        if($userprefectures ){
            $ids = join(',', $userprefectures);
        }

        $req = "  AND recrut_personne_recrut.departement3 IN ($ids) ";
        if($userprefectures ){
            $ids = join(',', $userprefectures);
        }

        $req = "  AND recrut_personne_recrut.departement3 IN ($ids) ";
        $req = "  AND recrut_personne_recrut.departement3 IN ($ids) ";

        if($prefecture_id > 0){
            $req .= " AND recrut_personne_recrut.departement3=$prefecture_id";
        }

        if($sp_id > 0){
            $req .= " AND recrut_personne_recrut.sousprefecture3=$sp_id";
        }

        if($project_id > 0){
            $req .= " AND recrut_personne_recrut.id_projet=$project_id";
        }

        if(!empty($search)){
            $req .= " AND (recrut_personne_recrut.matricule LIKE '$search' OR recrut_personne_recrut.email LIKE '$search' OR recrut_personne_recrut.contact1 LIKE '$search')";
            // $req .= "recrut_personne_recrut.matricule LIKE '".$search."'";
            // $req .= " AND (recrut_personne_recrut.matricule=$search OR recrut_personne_recrut.contact1=$search OR recrut_personne_recrut.email=$search)";
        }
        $sql = '
        SELECT DISTINCT recrut_personne_recrut.contact1,recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "homme"
            ELSE "femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,
        recrut_personne_recrut.email,
        recrut_personne_recrut.photo,
        recrut_personne_recrut.date_naiss,
        recrut_personne_recrut.lieu_naiss,
        recrut_personne_recrut.last_diplome,
        recrut_personne_recrut.doc_last_diplome,
        recrut_personne_recrut.nomtuteurlegal,
        recrut_personne_recrut.contact2,
        recrut_personne_recrut.nomtuteurlegal2,
        recrut_personne_recrut.contact3,
        recrut_personne_recrut.cv,
        recrut_personne_recrut.cni,
        recrut_personne_recrut.codeProjet,
        recrut_personne_recrut.status,
        recrut_personne_recrut.dateheureinscrip,
        recrut_personne_recrut.region,
        recrut_personne_recrut.sousprefecture,
        recrut_personne_recrut.departement2,
        recrut_personne_recrut.sousprefecture2,
        recrut_personne_recrut.departement4,
        recrut_personne_recrut.sousprefecture4,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.possedenumtel,
        recrut_personne_recrut.isDisponible,
        recrut_personne_recrut.hasAcceptDisponible,
        recrut_personne_recrut.cnituteurlegal,
        recrut_personne_recrut.declarahonneur,
        recrut_personne_recrut.codebonneconduite,
        recrut_personne_recrut.contrat,
        recrut_personne_recrut.type_piece,
        recrut_personne_recrut.numero_cni,
        recrut_personne_recrut.namepere,
        recrut_personne_recrut.namemere,
        recrut_personne_recrut.hasexpcollecte,
        recrut_personne_recrut.exp_structure,
        recrut_personne_recrut.exp_annee,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.exp_intitule_projet,
        recrut_personne_recrut.date_jour_decla,
        recrut_personne_recrut.confirmlieuaffectation,
        recrut_personne_recrut.certifresidence,
        recrut_personne_recrut.cand_retenu,
        recrut_personne_recrut.is_confirm,
        recrut_personne_recrut.NomProjet,
        recrut_personne_recrut.titre_poste,
        recrut_personne_recrut.choix_projet,
        recrut_personne_recrut.casier,
        recrut_personne_recrut.certifmedical,
        recrut_personne_recrut.attestcollecte,
        recrut_personne_recrut.note2,
        recrut_personne_recrut.rank,
        recrut_personne_recrut.fonction_id,
        recrut_personne_recrut.is_admited,
        recrut_personne_recrut.admited_at,
        recrut_personne_recrut.nbrinsert,
        recrut_personne_recrut.departement3,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.id_projet,

        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3
       
        FROM recrut_personne_recrut,recrut_departement
        WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep '.$req.'
        ORDER BY recrut_personne_recrut.note DESC';
     
        $data['person'] = $personnerecru_model->db->query($sql)->getResult();
        // $result = $recrutEthnie_model->getValueByParameter($param); 
         // prefecture_id
         $sPrefecture = new SPrefectureModel();
         $departements = new DepartementModel();
 
         $data['listDep'] = [];
         $data['listSP'] = [];
         if($userprefectures){
             $data['listDep'] = $departements->whereIn('CodDep', $userprefectures)->findAll();
             $data['listSP'] = $sPrefecture->whereIn('CodDep', $userprefectures)->findAll();
         }
         $projets= new ProjetModel();
         $data['listProjet']= $projets->where('active', 1)->findAll();      
          

        return view('admin/includes/trombinoscope-download1', $data);
    }
    
    public function trombinoscopeDownload2()
    {
        $personnerecru_model = new PersonneRecrut();
        $recrutEthnie_model = new RecrutEthnie();
        $data = [];
        // $this->UpdateNoteAgent();

        $sql = '
        SELECT DISTINCT recrut_personne_recrut.contact1,recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "homme"
            ELSE "femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,
        recrut_personne_recrut.email,
        recrut_personne_recrut.photo,
        recrut_personne_recrut.date_naiss,
        recrut_personne_recrut.lieu_naiss,
        recrut_personne_recrut.last_diplome,
        recrut_personne_recrut.doc_last_diplome,
        recrut_personne_recrut.nomtuteurlegal,
        recrut_personne_recrut.contact2,
        recrut_personne_recrut.nomtuteurlegal2,
        recrut_personne_recrut.contact3,
        recrut_personne_recrut.cv,
        recrut_personne_recrut.cni,
        recrut_personne_recrut.codeProjet,
        recrut_personne_recrut.status,
        recrut_personne_recrut.dateheureinscrip,
        recrut_personne_recrut.region,
        recrut_personne_recrut.sousprefecture,
        recrut_personne_recrut.departement2,
        recrut_personne_recrut.sousprefecture2,
        recrut_personne_recrut.departement4,
        recrut_personne_recrut.sousprefecture4,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.possedenumtel,
        recrut_personne_recrut.isDisponible,
        recrut_personne_recrut.hasAcceptDisponible,
        recrut_personne_recrut.cnituteurlegal,
        recrut_personne_recrut.declarahonneur,
        recrut_personne_recrut.codebonneconduite,
        recrut_personne_recrut.contrat,
        recrut_personne_recrut.type_piece,
        recrut_personne_recrut.numero_cni,
        recrut_personne_recrut.namepere,
        recrut_personne_recrut.namemere,
        recrut_personne_recrut.hasexpcollecte,
        recrut_personne_recrut.exp_structure,
        recrut_personne_recrut.exp_annee,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.exp_intitule_projet,
        recrut_personne_recrut.date_jour_decla,
        recrut_personne_recrut.confirmlieuaffectation,
        recrut_personne_recrut.certifresidence,
        recrut_personne_recrut.cand_retenu,
        recrut_personne_recrut.is_confirm,
        recrut_personne_recrut.NomProjet,
        recrut_personne_recrut.titre_poste,
        recrut_personne_recrut.choix_projet,
        recrut_personne_recrut.casier,
        recrut_personne_recrut.certifmedical,
        recrut_personne_recrut.note2,
        recrut_personne_recrut.rank,
        recrut_personne_recrut.fonction_id,
        recrut_personne_recrut.is_admited,
        recrut_personne_recrut.admited_at,
        recrut_personne_recrut.nbrinsert,

        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3
       
        FROM recrut_personne_recrut,recrut_departement
        WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep
        ORDER BY recrut_personne_recrut.note DESC LIMIT 2';
     
        $data['person'] = $personnerecru_model->db->query($sql)->getResult();
        // $result = $recrutEthnie_model->getValueByParameter($param);       

        $fileName = 'trombinoscope'.uniqid().'.pdf';

        $dompdf = new Dompdf();
        // $html = view('resume', $data);
        $html = view('admin/includes/trombinoscope', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); 
        $dompdf->render();
        $dompdf->stream($fileName, [ 'Attachment' => false ]);
    }


    public function users(){
        helper(['form']);

        $users = new UserModel();
        $data['users'] = $users->where('etat', 1)->findAll(); 
        
        // $logger = service('logger');
        // $logger->error($data);

        return view('admin/includes/users', $data);
    }

    public function useradd(){
        helper(['form']);
        $session = \Config\Services::session();
	    $prefectures = new DepartementModel();
        $data['prefectures'] = $prefectures->findAll();
        $data['admin'] = $session->get('user_type');        
        return view('admin/includes/useradd', $data);
    }

    public function usersStore()
    {
        helper(['form']);
        $rules = [
            'last_name'     => 'required|min_length[2]|max_length[50]',
            'name'          => 'required|min_length[2]|max_length[50]',
            'phone'          => 'required|min_length[9]|max_length[15]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'user_type'      => 'required',
            'confirmpassword'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();
            $data = [
                'last_name' => $this->request->getVar('last_name'),
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'phone'    => $this->request->getVar('phone'),
                'user_type'    => $this->request->getVar('user_type'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $userModel->save($data);
            $user_id = $userModel->getInsertID();
            $chPref = $this->request->getVar('chPref');

            if(isset($chPref)){
                $userPrefect = new UserPrefectureModel();
                foreach($chPref as $ch){
                    if(intval($ch) > 0 && $user_id > 0){
                        $userPrefect->save(['prefecture_id' => intval($ch), 'user_id' => $user_id, 'etat' => 1]);
                    }
                }
            }

            session()->setFlashdata("success", "enregistré");
            // session()->setFlashdata("info", "This is information message");
            // session()->setFlashdata("error", "This is error message");
            return redirect()->to('/users');
        }else{
            $data['validation'] = $this->validator;
            echo view('admin/includes/useradd', $data);
            session()->setFlashdata("warning", "Renseigner tous les champs obligatoires");
        }
          
    }

    public function userEdit($user_id){
        helper(['form']);
        $session = \Config\Services::session();
        $prefectures = new DepartementModel();
        $userprefectures= new UserPrefectureModel();
        $user = new UserModel();
        $data['user'] = $user->find($user_id);
        $data['prefectures'] = $prefectures->findAll();
        $userprefectures = $userprefectures->where('etat', 1)->where('user_id', $user_id)->findAll();
        $userprefectures = array_column($userprefectures, 'prefecture_id');
        $data['userprefectures'] = $userprefectures;
        $data['admin'] = $session->get('user_type');        
        return view('admin/includes/userEdit', $data);
    }

    public function update(){
        helper(['form']);
        $rules = [
            'last_name'     => 'required|min_length[2]|max_length[50]',
            'name'          => 'required|min_length[2]|max_length[50]',
            'phone'          => 'required|min_length[9]|max_length[15]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email',
            'user_type'      => 'required',
        ];
          
        // $logger = service('logger');
        // $logger->error("BARRY");
    
        if($this->validate($rules)){
            $userModel = new UserModel();
            $userPrefect = new UserPrefectureModel();
            $user_id = $this->request->getVar('user_id');
            $data = [
                'last_name'=> $this->request->getVar('last_name'),
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'phone'    => $this->request->getVar('phone'),
                'user_type'=> $this->request->getVar('user_type'),
            ];

            $chPref = $this->request->getVar('chPref');            
            $userPrefect->where('user_id', $user_id)->where('etat', 1)
                         ->set('etat', 2)
                         ->update();

            if(isset($chPref)){ 
                foreach($chPref as $ch){
                    if(intval($ch) > 0 && $user_id > 0){
                        $userPrefect->save(['prefecture_id' => intval($ch), 'user_id' => $user_id, 'etat' => 1]);
                    }
                }
            }

            $result = $userModel->update($user_id, $data);    
            session()->setFlashdata("success", "Modifié");

            // $userModel->update($data);
            return redirect()->to('/users');
        }
    }

    public function userDelete($user_id){
        helper(['form']);
        if($user_id > 0){
            $userModel = new UserModel();        
            // $user = $userModel->where('id', $user_id)->where('etat', 1)->first();
            $user = $userModel->update($user_id, ["etat" => 2]); 
            // $user = $userModel->where('id', $user_id)->where('etat', 1)->set('etat', 2)->update();
            // $userModel = new UserModel();        
            // $userModel->where('id', $user_id)->where('etat', 1)
            //                 ->set('etat', 2)
            //                 ->update();
            session()->setFlashdata("success", "Supprimé");
            // session()->setFlashdata("info", "This is information message");            
        }else{
            session()->setFlashdata("error", "non Supprimé");
        }
        return redirect()->to('/users');
    }


    public function postulantDepouille($postulant_id){
        helper(['form']);
        set_time_limit(300);
        $request = service('request');
        $session = \Config\Services::session();

        // ---------------------- start conversion en un seul fichier pdf
        $logger = service('logger');

        $prefecture_id = $request->getGet('prefecture_id');
        $sp_id = $request->getGet('sp_id');
        $project_id = $request->getGet('project_id');
        $search=$request->getGet('search');
        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];
        $user_id = $session->get('id');
        $personnerecru_model = new PersonneRecrut();
        $recrutEthnie_model = new RecrutEthnie();

        $data = [];
        $ids = "0"; 
        if(count($userprefectures) > 0){ $ids = join(',', $userprefectures); }

        $req = " AND recrut_personne_recrut.departement3 IN ($ids) ";
        if($postulant_id > 0){ 
            if($session->get('user_type') != 1){
                $req .= " AND recrut_personne_recrut.user_id=$user_id";
            }
            
            $req .= " AND recrut_personne_recrut.id=$postulant_id";
            $sql = '
            SELECT DISTINCT recrut_personne_recrut.id, recrut_personne_recrut.contact1, recrut_personne_recrut.matricule, 
            recrut_personne_recrut.name,
            recrut_personne_recrut.note,
            recrut_personne_recrut.exp_intitule_poste,
            recrut_personne_recrut.last_name,
            CASE recrut_personne_recrut.niveau_etude
                WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
                WHEN "12" THEN "LICENCE 3 / BAC+3"
                WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
                WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
                WHEN "15" THEN "DOCTORAT"
                ELSE "Autre"
            END AS niveau_etude,
            CASE recrut_personne_recrut.sexe
                WHEN "1" THEN "Homme"
                ELSE "Femme"
            END AS sexe,
            recrut_personne_recrut.statut_recrut,
            recrut_personne_recrut.email,
            recrut_personne_recrut.photo,
            recrut_personne_recrut.date_naiss,
            recrut_personne_recrut.lieu_naiss,
            recrut_personne_recrut.last_diplome,
            recrut_personne_recrut.doc_last_diplome,
            recrut_personne_recrut.nomtuteurlegal,
            recrut_personne_recrut.contact2,
            recrut_personne_recrut.nomtuteurlegal2,
            recrut_personne_recrut.contact3,
            recrut_personne_recrut.cv,
            recrut_personne_recrut.cni,
            recrut_personne_recrut.codeProjet,
            recrut_personne_recrut.status,
            recrut_personne_recrut.dateheureinscrip,
            recrut_personne_recrut.region,
            recrut_personne_recrut.sousprefecture,
            recrut_personne_recrut.departement2,
            recrut_personne_recrut.sousprefecture2,
            recrut_personne_recrut.departement4,
            recrut_personne_recrut.sousprefecture4,
            recrut_personne_recrut.sousprefecture3,
            recrut_personne_recrut.possedenumtel,
            recrut_personne_recrut.isDisponible,
            recrut_personne_recrut.hasAcceptDisponible,
            recrut_personne_recrut.cnituteurlegal,
            recrut_personne_recrut.declarahonneur,
            recrut_personne_recrut.codebonneconduite,
            recrut_personne_recrut.contrat,
            recrut_personne_recrut.type_piece,
            recrut_personne_recrut.numero_cni,
            recrut_personne_recrut.namepere,
            recrut_personne_recrut.namemere,
            recrut_personne_recrut.hasexpcollecte,
            recrut_personne_recrut.exp_structure,
            recrut_personne_recrut.exp_annee,
            recrut_personne_recrut.exp_intitule_poste,
            recrut_personne_recrut.exp_intitule_projet,
            recrut_personne_recrut.date_jour_decla,
            recrut_personne_recrut.confirmlieuaffectation,
            recrut_personne_recrut.certifresidence,
            recrut_personne_recrut.cand_retenu,
            recrut_personne_recrut.is_confirm,
            recrut_personne_recrut.NomProjet,
            recrut_personne_recrut.titre_poste,
            recrut_personne_recrut.choix_projet,
            recrut_personne_recrut.casier,
            recrut_personne_recrut.certifmedical,
            recrut_personne_recrut.attestcollecte,
            recrut_personne_recrut.note2,
            recrut_personne_recrut.rank,
            recrut_personne_recrut.fonction_id,
            recrut_personne_recrut.is_admited,
            recrut_personne_recrut.admited_at,
            recrut_personne_recrut.nbrinsert,
            recrut_personne_recrut.departement3,
            recrut_personne_recrut.sousprefecture3,
            recrut_personne_recrut.id_projet,
            recrut_personne_recrut.NomProjet AS project_name,
            recrut_personne_recrut.mobile,
            recrut_personne_recrut.depouille,

            (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
            (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
            (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3
        
            FROM recrut_personne_recrut,recrut_departement
            WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep '.$req.'
            ORDER BY recrut_personne_recrut.note DESC, recrut_personne_recrut.id ASC LIMIT 1';    
            $person = $personnerecru_model->db->query($sql)->getResult();
               
            if($person){
                $data['depouillement'] = $depouillement = (new DepouillementModel())->where('postulant_id', $postulant_id)->where('etat', 1)->first();    
                $data['person'] = $person;

                if($depouillement){
                    $data['user'] = $user = (new UserModel())->where('id', $depouillement->user_id)->first();    
                }

                // $logger->error($depouillement);

                $postulant = $person[0];

                $cv = $postulant->cv;
                $cni = $postulant->cni;                
                $certifresidence = $postulant->certifresidence;                
                $certifmedical = $postulant->certifmedical;           
                $attestcollecte = $postulant->attestcollecte;
                $doc_last_diplome = $postulant->doc_last_diplome;

                // $docs =array(
                //     "cv" => $postulant->cv,
                //     "cni" => $postulant->cni,              
                //     "certifresidence" => $postulant->certifresidence,                
                //     // "certifmedical" => $postulant->certifmedical,           
                //     "attestcollecte" => $postulant->attestcollecte,
                //     "doc_last_diplome" => $postulant->doc_last_diplome   
                // );

                $docs =array(
                    "cv" =>  base_url("uploads/files/".$postulant->cv),
                    "cni" =>  base_url("uploads/files/".$postulant->cni),
                    "certifresidence" =>  base_url("uploads/files/".$postulant->certifresidence),
                    "attestcollecte" =>  base_url("uploads/files/".$postulant->attestcollecte),
                    "doc_last_diplome" =>  base_url("uploads/files/".$postulant->doc_last_diplome)
                );

                // Fusionner les fichiers PDF
                // foreach ($docs as $file) {
                //     $html = file_get_contents($file);
                //     $dompdf->addHTML($html);
                // }

                // Imprimer le fichier PDF fusionné
                // $dompdf->output(base_url("uploads/files/docs/".$postulant->matricule."_".uniqid().".pdf"));

                // $dompdf = new Dompdf();

                // // // Charger les fichiers PDF à fusionner
                // // $files = [
                // //     'file1.pdf',
                // //     'file2.pdf',
                // //     'file3.pdf',
                // // ];
        
                // // Fusionner les fichiers PDF
                // $dompdf->merge($docs);
        
                // // Imprimer le fichier PDF fusionné
                // $dompdf->stream();


                // Liste des fichiers PDF à fusionner
                // $docs = [
                //     'path/to/document1.pdf',
                //     'path/to/document2.pdf',
                //     'path/to/document3.pdf',
                // ];
        
                // Nom du fichier PDF de sortie
                // $outputFile = 'path/to/merged.pdf';
                // $outputFile = base_url("uploads/files/docs/".$postulant->matricule."_".uniqid().".pdf");
        
                // // Initialisation de Dompdf
                // $options = new Options();
                // $options->set('isHtml5ParserEnabled', true);
                // $options->set('isPhpEnabled', true);
                // $dompdf = new Dompdf($options);
        
                // // Fusion des fichiers PDF
                // foreach ($docs as $doc) {
                //     if(strlen($doc) > 2){
                //         if(strtolower(strrchr($doc, '.')) == ".pdf"){
                //             $content = file_get_contents(base_url("uploads/files/".$doc));
                //             $dompdf->loadHtml($content);
                //             $dompdf->setPaper('A4', 'portrait');
                //             $dompdf->render();
                //         }
                //     }
                // }
        
                // // Sauvegarde du fichier fusionné
                // $output = $dompdf->output();
                // file_put_contents($outputFile, $output);

                // foreach($docs as $doc){
                //     if(strlen($doc) > 2){
                //         if(strtolower(strrchr($doc, '.')) == ".pdf"){
                //             // base_url("uploads/files/".$value->cv)                            
                //             $logger->error(base_url("uploads/files/".$doc));


                //         }
                //     }
                // }

                // $logger->error($docs);
                // ---------------------- end conversion en un seul fichier pdf
                return view('admin/includes/depouille', $data);                    
            }
        }

        // return view('admin/includes/depouille', $data);           
        return redirect()->to('/postulant/depouillement/');        
    }

    // public function postulantDepouille($postulant_id){
    //     helper(['form']);
    //     $request = service('request');
    //     $session = \Config\Services::session();

    //     $prefecture_id = $request->getGet('prefecture_id');
    //     $sp_id = $request->getGet('sp_id');
    //     $project_id = $request->getGet('project_id');
    //     $search=$request->getGet('search');
    //     $userprefectures = array_column($session->get('userprefectures'), 'prefecture_id');
    //     $user_id = $session->get('id');
    //     $personnerecru_model = new PersonneRecrut();
    //     $recrutEthnie_model = new RecrutEthnie();

    //     $data = [];
    //     $ids = "0"; 
    //     if(count($userprefectures) > 0){ $ids = join(',', $userprefectures); }

    //     $req = " AND recrut_personne_recrut.departement3 IN ($ids) ";
    //     if($postulant_id > 0){ 
    //         if($session->get('user_type') != 1){
    //             $req .= " AND recrut_personne_recrut.user_id=$user_id";
    //         }
            
    //         $req .= " AND recrut_personne_recrut.id=$postulant_id";
    //         $sql = '
    //         SELECT DISTINCT recrut_personne_recrut.id, recrut_personne_recrut.contact1, recrut_personne_recrut.matricule, 
    //         recrut_personne_recrut.name,
    //         recrut_personne_recrut.note,
    //         recrut_personne_recrut.exp_intitule_poste,
    //         recrut_personne_recrut.last_name,
    //         CASE recrut_personne_recrut.niveau_etude
    //             WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
    //             WHEN "12" THEN "LICENCE 3 / BAC+3"
    //             WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
    //             WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
    //             WHEN "15" THEN "DOCTORAT"
    //             ELSE "Autre"
    //         END AS niveau_etude,
    //         CASE recrut_personne_recrut.sexe
    //             WHEN "1" THEN "Homme"
    //             ELSE "Femme"
    //         END AS sexe,
    //         recrut_personne_recrut.statut_recrut,
    //         recrut_personne_recrut.email,
    //         recrut_personne_recrut.photo,
    //         recrut_personne_recrut.date_naiss,
    //         recrut_personne_recrut.lieu_naiss,
    //         recrut_personne_recrut.last_diplome,
    //         recrut_personne_recrut.doc_last_diplome,
    //         recrut_personne_recrut.nomtuteurlegal,
    //         recrut_personne_recrut.contact2,
    //         recrut_personne_recrut.nomtuteurlegal2,
    //         recrut_personne_recrut.contact3,
    //         recrut_personne_recrut.cv,
    //         recrut_personne_recrut.cni,
    //         recrut_personne_recrut.codeProjet,
    //         recrut_personne_recrut.status,
    //         recrut_personne_recrut.dateheureinscrip,
    //         recrut_personne_recrut.region,
    //         recrut_personne_recrut.sousprefecture,
    //         recrut_personne_recrut.departement2,
    //         recrut_personne_recrut.sousprefecture2,
    //         recrut_personne_recrut.departement4,
    //         recrut_personne_recrut.sousprefecture4,
    //         recrut_personne_recrut.sousprefecture3,
    //         recrut_personne_recrut.possedenumtel,
    //         recrut_personne_recrut.isDisponible,
    //         recrut_personne_recrut.hasAcceptDisponible,
    //         recrut_personne_recrut.cnituteurlegal,
    //         recrut_personne_recrut.declarahonneur,
    //         recrut_personne_recrut.codebonneconduite,
    //         recrut_personne_recrut.contrat,
    //         recrut_personne_recrut.type_piece,
    //         recrut_personne_recrut.numero_cni,
    //         recrut_personne_recrut.namepere,
    //         recrut_personne_recrut.namemere,
    //         recrut_personne_recrut.hasexpcollecte,
    //         recrut_personne_recrut.exp_structure,
    //         recrut_personne_recrut.exp_annee,
    //         recrut_personne_recrut.exp_intitule_poste,
    //         recrut_personne_recrut.exp_intitule_projet,
    //         recrut_personne_recrut.date_jour_decla,
    //         recrut_personne_recrut.confirmlieuaffectation,
    //         recrut_personne_recrut.certifresidence,
    //         recrut_personne_recrut.cand_retenu,
    //         recrut_personne_recrut.is_confirm,
    //         recrut_personne_recrut.NomProjet,
    //         recrut_personne_recrut.titre_poste,
    //         recrut_personne_recrut.choix_projet,
    //         recrut_personne_recrut.casier,
    //         recrut_personne_recrut.certifmedical,
    //         recrut_personne_recrut.attestcollecte,
    //         recrut_personne_recrut.note2,
    //         recrut_personne_recrut.rank,
    //         recrut_personne_recrut.fonction_id,
    //         recrut_personne_recrut.is_admited,
    //         recrut_personne_recrut.admited_at,
    //         recrut_personne_recrut.nbrinsert,
    //         recrut_personne_recrut.departement3,
    //         recrut_personne_recrut.sousprefecture3,
    //         recrut_personne_recrut.id_projet,
    //         recrut_personne_recrut.NomProjet AS project_name,
    //         recrut_personne_recrut.mobile,

    //         (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
    //         (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
    //         (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3
        
    //         FROM recrut_personne_recrut,recrut_departement
    //         WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep '.$req.'
    //         ORDER BY recrut_personne_recrut.note DESC, recrut_personne_recrut.id ASC LIMIT 1';    
    //         $person = $personnerecru_model->db->query($sql)->getResult();
               
    //         if($person){
    //             $data['depouillements'] = (new DepouillementModel())->where('postulant_id', $postulant_id)->where('etat', 1)->first();    
    //             $data['person'] = $person;
    //             return view('admin/includes/depouille', $data);                    
    //         }
    //     }

    //     // return view('admin/includes/depouille', $data);           
    //     return redirect()->to('/postulant/depouillement/');        
    // }

    // public function valDepouille()
    // {
    //     helper(['form']);
    //     $rules = [
    //         'postulant_id'     => 'required',
    //     ];

    //     $session = \Config\Services::session();
        
    //     if($this->validate($rules)){
    //         $depouillementModel = new DepouillementModel();            
    //         $depouillementModel->where('postulant_id', $this->request->getVar('postulant_id'))->where('etat', 1)->set('etat', 2)->update();

    //         $cv = $this->request->getVar('checkCV');
    //         $pi = $this->request->getVar('checkPI');
    //         $cm = $this->request->getVar('checkCM');
    //         $ae = $this->request->getVar('checkAE');
    //         $de = $this->request->getVar('checkDE');
    //         $cr = $this->request->getVar('checkCR');
    //         $cj = $this->request->getVar('checkCJ');


    //         $age17 = $this->request->getVar('age17');
    //         $age18 = $this->request->getVar('age18');
    //         $age12 = $this->request->getVar('age12');
    //         $dp_collect17 = $this->request->getVar('dp_collect17');
    //         $dp_chauffeur18 = $this->request->getVar('dp_chauffeur18');
    //         $exp_collect17 = $this->request->getVar('exp_collect17');
    //         $exp_chauffeur18= $this->request->getVar('exp_chauffeur18');
    //         $utilis_tablette = $this->request->getVar('utilis_tablette');
    //         $cons_informatique = $this->request->getVar('cons_informatique');
    //         $nb_langue17 = $this->request->getVar('nb_langue17');
    //         $nb_langue18 = $this->request->getVar('nb_langue18');
    //         $niv_etu = $this->request->getVar('niv_etu');
    //         $sp = $this->request->getVar('sp');

    //         $co_lg_carto_trait_img = $this->request->getVar('co_lg_carto_trait_img');
    //         $trav_carto_realise = $this->request->getVar('trav_carto_realise');
    //         $occ_ant = $this->request->getVar('occ_ant');
    //         $residence = $this->request->getVar('residence');
    //         $note = $this->request->getVar('note');
        
    //         // $user_id = $session->get('id');
    //         // $postulant_id = $this->request->getVar('postulant_id');

    //         $data = [
    //             'cv' => $cv,
    //             'pi' => intval($pi),
    //             'cm' => intval($cm),
    //             'ae' => intval($ae),
    //             'de' => intval($de),
    //             'cr' => intval($cr),
    //             'cj' => intval($cj),

    //             'age17' => intval($age17),
    //             'age18' => intval($age18),
    //             'age12' => intval($age12),
    //             'dp_collect17' => intval($dp_collect17),
    //             'dp_chauffeur18' => intval($dp_chauffeur18),
    //             'exp_collect17' => intval($exp_collect17),
    //             'exp_chauffeur18' =>intval($exp_chauffeur18),
    //             'utilis_tablette' => intval($utilis_tablette),
    //             'cons_informatique' => intval($cons_informatique) ,
    //             'nb_langue17' =>  intval($nb_langue17),
    //             'nb_langue18' => intval($nb_langue18),
    //             'niv_etu' =>  intval($niv_etu) ,
    //             'sp' => intval($sp),
    //             'co_lg_carto_trait_img' => intval($co_lg_carto_trait_img),
    //             'trav_carto_realise' => intval($trav_carto_realise),
    //             'occ_ant' => intval($occ_ant),
    //             'residence' => intval($residence),
    //             'note' => ($age17 + $age12+$age18 + $dp_collect17
    //                     +$dp_chauffeur18 + $exp_collect17 + $exp_chauffeur18 +$utilis_tablette +$cons_informatique +
    //                     $nb_langue17 + $nb_langue18+$niv_etu + $sp+  $co_lg_carto_trait_img +$trav_carto_realise + $occ_ant +$residence),
    //             'user_id' => $session->get('id'),
    //             'postulant_id' => $this->request->getVar('postulant_id'),
    //             'etat' => 1,
    //         ];

    //         $depouillementModel->save($data);

    //         (new PersoRecrutModel())->update($this->request->getVar('postulant_id'), ["depouille" => 1]);  
    
    //         return redirect()->to('/postulant/depouillement/');
    //     }else{
    //         return redirect()->to('/postulant/depouillement/');
    //     }
          
    // }

    public function valDepouille()
    {
        helper(['form']);
        $rules = [
            'postulant_id'     => 'required',
        ];

        $session = \Config\Services::session();
        
        if($this->validate($rules)){
            $depouillementModel = new DepouillementModel();            
            $depouillementModel->where('postulant_id', $this->request->getVar('postulant_id'))->where('etat', 1)->set('etat', 2)->update();

            $cv = intval($this->request->getVar('checkCV'));
            $pi = intval($this->request->getVar('checkPI'));
            $cm = intval($this->request->getVar('checkCM'));
            $ae = intval($this->request->getVar('checkAE'));
            $de = intval($this->request->getVar('checkDE'));
            $cr = intval($this->request->getVar('checkCR'));
            $cj = intval($this->request->getVar('checkCJ'));

            $age17 = intval($this->request->getVar('age17')); 
            $age17 = $age17 * 2;

            $dp_collect17 = intval($this->request->getVar('dp_collect17'));
            $dp_collect17  =  $dp_collect17 * 3;

            $exp_collect17 = intval($this->request->getVar('exp_collect17'));
            $exp_collect17 = $exp_collect17 * 5;

            $utilis_tablette =intval( $this->request->getVar('utilis_tablette'));
            $utilis_tablette=$utilis_tablette *3;

            $cons_informatique =intval( $this->request->getVar('cons_informatique'));
            $cons_informatique=$cons_informatique * 5;

            $nb_langue17 = intval($this->request->getVar('nb_langue17'));
            $nb_langue17 =  $nb_langue17  * 6;

            $residence = intval($this->request->getVar('residence'));
            // $residence =$residence * (5/59);

            $dispo =intval($this->request->getVar('dispo'));
            $dispo = $dispo * 3;

            $age18 = intval($this->request->getVar('age18'));
            $age18 = $age18 * 3;

            $age12 = intval($this->request->getVar('age12'));
            $age12 = $age12 * 3;

            $dp_chauffeur18 = intval($this->request->getVar('dp_chauffeur18'));
            $dp_chauffeur18= $dp_chauffeur18 * 5;

            $exp_chauffeur18= intval($this->request->getVar('exp_chauffeur18'));
            $exp_chauffeur18 = $exp_chauffeur18 * 5;

            $nb_langue18 = intval($this->request->getVar('nb_langue18'));
            $nb_langue18 = $nb_langue18 *  3;

            $niv_etu = intval($this->request->getVar('niv_etu'));
            $niv_etu = $niv_etu * 5;

            $sp = intval($this->request->getVar('sp'));
            $sp = $sp * 10;
            $co_lg_carto_trait_img =intval( $this->request->getVar('co_lg_carto_trait_img'));
            $co_lg_carto_trait_img= $co_lg_carto_trait_img * 10;

            $trav_carto_realise = intval($this->request->getVar('trav_carto_realise'));
            $trav_carto_realise = $trav_carto_realise * 10;

            $occ_ant = intval($this->request->getVar('occ_ant'));
            $occ_ant =  $occ_ant * 5;
        
            // $user_id = $session->get('id');
            // $dispo = $this->request->getVar('dispo');

            $data = [
                'cv' => $cv,
                'pi' => $pi,
                'cm' => $cm,
                'ae' => $ae,
                'de' => $de,
                'cr' =>$cr,
                'cj' => $cj,

                'age17' => $age17,
                'age18' => $age18,
                'age12' => $age12,
                'dp_collect17' => $dp_collect17,
                'dp_chauffeur18' => $dp_chauffeur18,
                'exp_collect17' => $exp_collect17,
                'exp_chauffeur18' => $exp_chauffeur18,
                'utilis_tablette' => $utilis_tablette,
                'cons_informatique' =>$cons_informatique,
                'nb_langue17' => $nb_langue17,
                'nb_langue18' => $nb_langue18,
                'niv_etu' => $niv_etu,
                'sp' => $sp,
                'co_lg_carto_trait_img' => $co_lg_carto_trait_img,
                'trav_carto_realise' =>$trav_carto_realise,
                'occ_ant' =>$occ_ant,
                'residence' => $residence,
                'dispo'=> $dispo,
                'note' => ($age17 + $age12 + $age18 + $dp_collect17 + $dispo + $dp_chauffeur18 + $exp_collect17 + $exp_chauffeur18 + $utilis_tablette 
                + $cons_informatique + $nb_langue17 + $nb_langue18 + $niv_etu + $sp + $co_lg_carto_trait_img + $trav_carto_realise + $occ_ant + $residence),
                'user_id' => $session->get('id'),
                'postulant_id' => $this->request->getVar('postulant_id'),
                'etat' => 1,
            ];

            $depouillementModel->save($data);
            (new PersoRecrutModel())->update($this->request->getVar('postulant_id'), ["depouille" => 1]);  
    
            return redirect()->to('/postulant/depouillement/');
        }else{
            return redirect()->to('/postulant/depouillement/');
        }
          
    }    

    // public function valDepouille()
    // {
    //     helper(['form']);
    //     $rules = [
    //         'postulant_id'     => 'required',
    //     ];

    //     $session = \Config\Services::session();
        
    //     if($this->validate($rules)){
    //         $depouillementModel = new DepouillementModel();            
    //         $depouillementModel->where('postulant_id', $this->request->getVar('postulant_id'))->where('etat', 1)->set('etat', 2)->update();

    //         $data = [
    //             'cv' => $this->request->getVar('checkCV'),
    //             'pi' => $this->request->getVar('checkPI'),
    //             'cm' => $this->request->getVar('checkCM'),
    //             'ae' => $this->request->getVar('checkAE'),
    //             'de' => $this->request->getVar('checkDE'),
    //             'cr' => $this->request->getVar('checkCR'),
    //             'cj' => $this->request->getVar('checkCJ'),

    //             'age17' => $this->request->getVar('age17'),
    //             'age18' => $this->request->getVar('age18'),
    //             'age12' => $this->request->getVar('age12'),
    //             'dp_collect17' => $this->request->getVar('dp_collect17'),
    //             'dp_chauffeur18' => $this->request->getVar('dp_chauffeur18'),
    //             'exp_collect17' => $this->request->getVar('exp_collect17'),
    //             'exp_chauffeur18' => $this->request->getVar('exp_chauffeur18'),
    //             'utilis_tablette' => $this->request->getVar('utilis_tablette'),
    //             'cons_informatique' => $this->request->getVar('cons_informatique'),
    //             'nb_langue17' => $this->request->getVar('nb_langue17'),
    //             'nb_langue18' => $this->request->getVar('nb_langue18'),
    //             'niv_etu' => $this->request->getVar('niv_etu'),
    //             'sp' => $this->request->getVar('sp'),
    //             'co_lg_carto_trait_img' => $this->request->getVar('co_lg_carto_trait_img'),
    //             'trav_carto_realise' => $this->request->getVar('trav_carto_realise'),
    //             'occ_ant' => $this->request->getVar('occ_ant'),
    //             'residence' => $this->request->getVar('residence'),
    //             'note' => $this->request->getVar('note'),
    //             'user_id' => $session->get('id'),
    //             'postulant_id' => $this->request->getVar('postulant_id'),
    //             'etat' => 1,
    //         ];

    //         $depouillementModel->save($data);

    //         (new PersoRecrutModel())->update($this->request->getVar('postulant_id'), ["depouille" => 1]);  
    
    //         return redirect()->to('/postulant/depouillement/');
    //     }else{
    //         return redirect()->to('/postulant/depouillement/');
    //     }
          
    // }

    public function affectatPostulantByAgent()
    {
        helper(['form']);
        $rules = [
            'postulant_id'     => 'required',
        ];

        $session = \Config\Services::session();
        $logger = service('logger');
    
        $prefectures = (new DepartementModel())->findAll(); 
        // $logger->error($prefectures);

        foreach ($prefectures as $key => $value) {
            // $userprefectures = (new UserPrefectureModel())->where("etat", 1)->where("prefecture_id", $value['id'])->findAll();
            $userprefectures = new UserPrefectureModel();

            $userprefectures = $userprefectures
                ->select('userprefectures.user_id, userprefectures.prefecture_id, users.name')
                ->join('users', 'userprefectures.user_id = users.id')
                ->where("users.etat", 1)->where("users.id > ", 1)->where("userprefectures.etat", 1)->where("userprefectures.prefecture_id", $value['id'])
                ->findAll();

            // $logger->error($userprefectures);

            // // Vous pouvez maintenant accéder aux articles avec leurs catégories associées
            // foreach ($articles as $article) {
            //     echo "Article : {$article->title}<br>";
            //     echo "Catégorie : {$article->category_name}<br>";
            // }

            // $userprefectures = (new UserPrefectureModel())->where("etat", 1)->where("prefecture_id", $value['id'])->findAll();
            $userprefectures = array_column($userprefectures, "user_id");
            $nup = (count($userprefectures) != 0)? count($userprefectures):1;

            $postulants = (new PersoRecrutModel())->where("user_id", 0)->where("depouille", 0)->where("departement3", $value['id'])->findAll();
            $postulants = array_column($postulants, "id");
            $npp = count($postulants);
            $npa = (intval($npp / $nup) != 0)? intval($npp / $nup) : 1;
            $postulants = array_chunk($postulants, ceil($npa));

            if(count($postulants) > 0){
                for($i = 0; $i < count($userprefectures); $i++) {
                    $user_id = $userprefectures[$i];
                    $postulantsByUser = ($postulants[$i])? $postulants[$i] : [];
                    // $logger->error($user_id." -> ".join(',', $postulantsByUser));
                    if(count($postulantsByUser) > 0 && intval($user_id)> 0){
                        (new PersoRecrutModel())->whereIn('id', $postulantsByUser)->where('user_id', 0)->set('user_id', $user_id)->update();
                    }
                }
            }
            // $logger->error($value['NomDep']." $npp / $nup = $npa");
        }
        return redirect()->to('/postulant/depouillement/');
    }

    public function depouillement(){
        helper(['form']);
        $request = service('request');
        $session = \Config\Services::session();

        $prefecture_id = $request->getGet('prefecture_id');
        $sp_id = $request->getGet('sp_id');
        $project_id = $request->getGet('project_id');
        $checkDepouille = $request->getGet('checkDepouille');
        $search=$request->getGet('search');

        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];
        $personnerecru_model = new PersonneRecrut();
       // $experience_model = new RecrutExperience();
        $recrutEthnie_model = new RecrutEthnie();
        $data = [];
        $data['affectation'] = 0;
        // $this->UpdateNoteAgent();

        $recrutModel = new PersoRecrutModel();

        if($session->get('user_type') == 1){    
            // admin
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id >", 0)->countAllResults();
            // $data['affecteAgents']  = $recrutModel->where("user_id", $session->get('id'))->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }else{
            // users
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            // $data['affecteAgents']  = $recrutModel->where("user_id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id", $session->get('id'))->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("user_id", $session->get('id'))->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }

        $data['admin'] = $session->get('user_type');
        

        $ids = "0"; 
        if(count($userprefectures) > 0){
            $data['affectation'] = count((new PersoRecrutModel())->whereIn("departement3", $userprefectures)->where('depouille', 0)->where('user_id', 0)->findAll());
            $ids = join(',', $userprefectures);
        }

        $req = " AND recrut_personne_recrut.departement3 IN ($ids) AND recrut_personne_recrut.user_id = ".intval($session->get('id'));

        // Pour masquer les agents sans CV hors mi des chauffeurs
        // $req .= " AND ((recrut_personne_recrut.id_projet = 18 AND recrut_personne_recrut.cv = '0') OR recrut_personne_recrut.cv != '0')";

        if($prefecture_id > 0){
            $req .= " AND recrut_personne_recrut.departement3=$prefecture_id";
        }

        if($sp_id > 0){
            $req .= " AND recrut_personne_recrut.sousprefecture3=$sp_id";
        }

        if($project_id > 0){
            $req .= " AND recrut_personne_recrut.id_projet=$project_id";
        }

        if($checkDepouille > 0){
            switch ($checkDepouille) {
                case 1: {$req .= " AND recrut_personne_recrut.depouille=$checkDepouille";} break;
                case 2: {$req .= " AND recrut_personne_recrut.depouille=0";} break;
                // default: break;
            }            
        }

        if(!empty($search)){
            $req .= " AND (recrut_personne_recrut.matricule LIKE '$search' OR recrut_personne_recrut.email LIKE '$search' OR recrut_personne_recrut.contact1 LIKE '$search')";
            // $req .= "recrut_personne_recrut.matricule LIKE '".$search."'";
            // $req .= " AND (recrut_personne_recrut.matricule=$search OR recrut_personne_recrut.contact1=$search OR recrut_personne_recrut.email=$search)";
        }

        $sql = '
        SELECT DISTINCT recrut_personne_recrut.id, recrut_personne_recrut.contact1, recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "homme"
            ELSE "femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,
        recrut_personne_recrut.email,
        recrut_personne_recrut.photo,
        recrut_personne_recrut.date_naiss,
        recrut_personne_recrut.lieu_naiss,
        recrut_personne_recrut.last_diplome,
        recrut_personne_recrut.doc_last_diplome,
        recrut_personne_recrut.nomtuteurlegal,
        recrut_personne_recrut.contact2,
        recrut_personne_recrut.nomtuteurlegal2,
        recrut_personne_recrut.contact3,
        recrut_personne_recrut.cv,
        recrut_personne_recrut.cni,
        recrut_personne_recrut.codeProjet,
        recrut_personne_recrut.status,
        recrut_personne_recrut.dateheureinscrip,
        recrut_personne_recrut.region,
        recrut_personne_recrut.sousprefecture,
        recrut_personne_recrut.departement2,
        recrut_personne_recrut.sousprefecture2,
        recrut_personne_recrut.departement4,
        recrut_personne_recrut.sousprefecture4,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.possedenumtel,
        recrut_personne_recrut.isDisponible,
        recrut_personne_recrut.hasAcceptDisponible,
        recrut_personne_recrut.cnituteurlegal,
        recrut_personne_recrut.declarahonneur,
        recrut_personne_recrut.codebonneconduite,
        recrut_personne_recrut.contrat,
        recrut_personne_recrut.type_piece,
        recrut_personne_recrut.numero_cni,
        recrut_personne_recrut.namepere,
        recrut_personne_recrut.namemere,
        recrut_personne_recrut.hasexpcollecte,
        recrut_personne_recrut.exp_structure,
        recrut_personne_recrut.exp_annee,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.exp_intitule_projet,
        recrut_personne_recrut.date_jour_decla,
        recrut_personne_recrut.confirmlieuaffectation,
        recrut_personne_recrut.certifresidence,
        recrut_personne_recrut.cand_retenu,
        recrut_personne_recrut.is_confirm,
        recrut_personne_recrut.NomProjet,
        recrut_personne_recrut.titre_poste,
        recrut_personne_recrut.choix_projet,
        recrut_personne_recrut.casier,
        recrut_personne_recrut.certifmedical,
        recrut_personne_recrut.attestcollecte,
        recrut_personne_recrut.note2,
        recrut_personne_recrut.rank,
        recrut_personne_recrut.fonction_id,
        recrut_personne_recrut.is_admited,
        recrut_personne_recrut.admited_at,
        recrut_personne_recrut.nbrinsert,
        recrut_personne_recrut.departement3,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.id_projet,
        recrut_personne_recrut.depouille,

        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3
       
        FROM recrut_personne_recrut,recrut_departement
        WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep '.$req.'
        ORDER BY recrut_personne_recrut.depouille ASC, recrut_personne_recrut.note DESC, recrut_personne_recrut.id ASC LIMIT 100';    
        $person = $personnerecru_model->db->query($sql)->getResult();
        $data['person'] = $person;
        $sPrefecture = new SPrefectureModel();
	    $departements = new DepartementModel();

        $data['listDep'] = [];
        $data['listSP'] = [];
        if($userprefectures){
            $data['listDep'] = $departements->whereIn('CodDep', $userprefectures)->findAll();
            $data['listSP'] = $sPrefecture->whereIn('CodDep', $userprefectures)->findAll();
        }
        $projets= new ProjetModel();
        $data['listProjet']= $projets->where('active', 1)->findAll();

        return view('admin/includes/depouillement', $data);
    }

    public function depouilles(){
        helper(['form']);
        $request = service('request');
        $session = \Config\Services::session();

        $prefecture_id = $request->getGet('prefecture_id');
        $sp_id = $request->getGet('sp_id');
        $project_id = $request->getGet('project_id');
        $search=$request->getGet('search');

        $personnerecru_model = new PersonneRecrut();
        $recrutEthnie_model = new RecrutEthnie();
        $data = [];

        $recrutModel = new PersoRecrutModel();

        if($session->get('user_type') == 1){    
            // admin
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id >", 0)->countAllResults();
            // $data['affecteAgents']  = $recrutModel->where("user_id", $session->get('id'))->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }else{
            // users
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            // $data['affecteAgents']  = $recrutModel->where("user_id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id", $session->get('id'))->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("user_id", $session->get('id'))->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }

        $data['admin'] = $session->get('user_type');

        // $this->UpdateNoteAgent();
        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];

        $ids = "0"; 
        if(count($userprefectures) > 0){
            $ids = join(',', $userprefectures);
        }

        $req = "  AND recrut_personne_recrut.departement3 IN ($ids) ";

        if($prefecture_id > 0){
            $req .= " AND recrut_personne_recrut.departement3=$prefecture_id";
        }

        if($sp_id > 0){
            $req .= " AND recrut_personne_recrut.sousprefecture3=$sp_id";
        }

        if($project_id > 0){
            $req .= " AND recrut_personne_recrut.id_projet=$project_id";
        }

        if(!empty($search)){
            $req .= " AND (recrut_personne_recrut.matricule LIKE '$search' OR recrut_personne_recrut.email LIKE '$search' OR recrut_personne_recrut.contact1 LIKE '$search')";
            // $req .= "recrut_personne_recrut.matricule LIKE '".$search."'";
            // $req .= " AND (recrut_personne_recrut.matricule=$search OR recrut_personne_recrut.contact1=$search OR recrut_personne_recrut.email=$search)";
        }

        $sql = 'SELECT DISTINCT recrut_personne_recrut.contact1,recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        recrut_personne_recrut.departement3,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.id_projet,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "Homme"
            ELSE "Femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3,
        depouillements.cv, depouillements.pi, depouillements.cm, depouillements.ae, depouillements.de, depouillements.cr, 
        depouillements.cj, depouillements.note AS note_depoullement
       
        FROM depouillements, recrut_personne_recrut, recrut_departement
        WHERE depouillements.postulant_id = recrut_personne_recrut.id AND recrut_personne_recrut.departement3 = recrut_departement.CodDep AND depouillements.etat = 1 '.$req.'
        ORDER BY recrut_personne_recrut.note DESC, recrut_personne_recrut.id ASC';
     
        $data['person'] = $personnerecru_model->db->query($sql)->getResult();
        $sPrefecture = new SPrefectureModel();
	    $departements = new DepartementModel();
        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];
        $data['listDep'] = [];
        $data['listSP'] = [];
        if($userprefectures){
            $data['listDep'] = $departements->whereIn('CodDep', $userprefectures)->findAll();
            $data['listSP'] = $sPrefecture->whereIn('CodDep', $userprefectures)->findAll();
        }
        $projets= new ProjetModel();
        $data['listProjet']= $projets->where('active', 1)->findAll();
        
        return view('admin/includes/depouilles', $data);
        // return view('admin/includes/base', $data);
    }

    /*
    public function exportDepouille(){
        $request = service('request');
        $prefecture_id = $request->getGet('prefecture_id');
        $sp_id = $request->getGet('sp_id');
        $project_id = $request->getGet('project_id');
        $personnerecru_model = new PersonneRecrut();

        $session = \Config\Services::session();
        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];
        $ids = "0"; 
        if(count($userprefectures) > 0){
            $ids = join(',', $userprefectures);
        }

        $req = "  AND recrut_personne_recrut.departement3 IN ($ids)";

        if($prefecture_id > 0){
            $req = " AND recrut_personne_recrut.departement3=$prefecture_id";
        }

        if($sp_id > 0){
            $req .= " AND recrut_personne_recrut.sousprefecture3=$sp_id";
        }

        if($project_id > 0){
            $req .= " AND recrut_personne_recrut.id_projet=$project_id";
        }

        if(!empty($search)){
            $req .= " AND (recrut_personne_recrut.matricule LIKE '$search' OR recrut_personne_recrut.email LIKE '$search' OR recrut_personne_recrut.contact1 LIKE '$search')";
            // $req .= "recrut_personne_recrut.matricule LIKE '".$search."'";
            // $req .= " AND (recrut_personne_recrut.matricule=$search OR recrut_personne_recrut.contact1=$search OR recrut_personne_recrut.email=$search)";
        }

        $sql = 'SELECT DISTINCT recrut_personne_recrut.contact1,recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        recrut_personne_recrut.last_diplome,
        recrut_personne_recrut.doc_last_diplome,
        recrut_personne_recrut.cv,
        recrut_personne_recrut.cni,
        recrut_personne_recrut.departement3,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.id_projet,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "Homme"
            ELSE "Femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3,
        depouillements.cv, depouillements.pi, depouillements.cm, depouillements.ae, depouillements.de, depouillements.cr, depouillements.cj
       
        FROM depouillements, recrut_personne_recrut, recrut_departement
        WHERE depouillements.postulant_id = recrut_personne_recrut.id AND recrut_personne_recrut.departement3 = recrut_departement.CodDep AND depouillements.etat = 1 '.$req.'
        ORDER BY recrut_personne_recrut.note DESC, recrut_personne_recrut.id ASC';
     
        // $data['person'] = $personnerecru_model->db->query($sql)->getResult();
         
        $data = $personnerecru_model->db->query($sql)->getResult();
        $fileName = 'resultats'.uniqid().'.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // En-têtes des colonnes
        $sheet->setCellValue('A1', 'Matricule');
        $sheet->setCellValue('B1', 'NOMS');
        $sheet->setCellValue('C1', 'PRENOMS');
        $sheet->setCellValue('D1', 'Curriculum Vitae');
        $sheet->setCellValue('E1', 'Pièce d\'Identité');
        $sheet->setCellValue('F1', 'Certificat Médical');
        $sheet->setCellValue('G1', 'Attestation d\'Expérience');
        $sheet->setCellValue('H1', 'Diplome d\'Etude');
        $sheet->setCellValue('I1', 'Certificat de Residence');
        $sheet->setCellValue('J1', 'Casier Judiciaire');
        $sheet->setCellValue('K1', 'NOTE');
        $rows = 2;
        foreach ($data as $datas) {        
            $sheet->setCellValue('A' . $rows, $datas->matricule);
            $sheet->setCellValue('B' . $rows, $datas->name);
            $sheet->setCellValue('C' . $rows, $datas->last_name);
            $sheet->setCellValue('D' . $rows, $datas->cv);
            $sheet->setCellValue('E' . $rows, $datas->pi);
            $sheet->setCellValue('F' . $rows, $datas->cm);
            $sheet->setCellValue('G' . $rows, $datas->ae);
            $sheet->setCellValue('H' . $rows, $datas->de);    
            $sheet->setCellValue('I' . $rows,  $datas->cr);
            $sheet->setCellValue('j' . $rows,  $datas->cj);
            $sheet->setCellValue('K' . $rows,  $datas->note);
            $rows++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName);
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
    */

    public function exportDepouille(){
        set_time_limit(3600);
        $request = service('request');
        $prefecture_id = $request->getGet('prefecture_id');
        $sp_id = $request->getGet('sp_id');
        $project_id = $request->getGet('project_id');
        $personnerecru_model = new PersonneRecrut();

        $session = \Config\Services::session();
        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];
        $ids = "0"; 
        if(count($userprefectures) > 0){
            $ids = join(',', $userprefectures);
        }

        $req = "  AND recrut_personne_recrut.departement3 IN ($ids)";

        if($prefecture_id > 0){
            $req = " AND recrut_personne_recrut.departement3=$prefecture_id";
        }

        if($sp_id > 0){
            $req .= " AND recrut_personne_recrut.sousprefecture3=$sp_id";
        }

        if($project_id > 0){
            $req .= " AND recrut_personne_recrut.id_projet=$project_id";
        }

        if(!empty($search)){
            $req .= " AND (recrut_personne_recrut.matricule LIKE '$search' OR recrut_personne_recrut.email LIKE '$search' OR recrut_personne_recrut.contact1 LIKE '$search')";
            // $req .= "recrut_personne_recrut.matricule LIKE '".$search."'";
            // $req .= " AND (recrut_personne_recrut.matricule=$search OR recrut_personne_recrut.contact1=$search OR recrut_personne_recrut.email=$search)";
        }

        $sql = 'SELECT DISTINCT recrut_personne_recrut.contact1,recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        recrut_personne_recrut.last_diplome,
        recrut_personne_recrut.doc_last_diplome,
        recrut_personne_recrut.cv,
        recrut_personne_recrut.cni,
        recrut_personne_recrut.departement3,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.id_projet,
        recrut_personne_recrut.NomProjet,
        recrut_departement.NomDep,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "Homme"
            ELSE "Femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,

        recrut_personne_recrut.type_piece, recrut_personne_recrut.numero_cni,
        recrut_personne_recrut.exp_intitule_projet, recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.exp_annee, recrut_personne_recrut.exp_structure,
        recrut_personne_recrut.namemere, recrut_personne_recrut.namepere,
        recrut_personne_recrut.nomtuteurlegal2, recrut_personne_recrut.nomtuteurlegal,
        recrut_personne_recrut.date_naiss, recrut_personne_recrut.lieu_naiss,
        recrut_personne_recrut.nomtuteurlegal, recrut_personne_recrut.status,
        recrut_personne_recrut.email, recrut_personne_recrut.contact2, recrut_personne_recrut.contact3,

        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3,
        depouillements.cv, depouillements.pi, depouillements.cm, depouillements.ae, depouillements.de, depouillements.cr, 
        depouillements.cj , depouillements.age17,depouillements.age18,depouillements.age12,depouillements.dp_collect17,
        depouillements.dp_chauffeur18, depouillements.exp_collect17, depouillements.exp_chauffeur18,
        depouillements.utilis_tablette,depouillements.cons_informatique,depouillements.nb_langue17,depouillements.nb_langue18,
        depouillements.niv_etu, depouillements.note, depouillements.sp,depouillements.co_lg_carto_trait_img,
        depouillements.trav_carto_realise,depouillements.occ_ant, depouillements.residence, depouillements.dispo,


        recrut_personne_recrut.last_diplome, 
        recrut_personne_recrut.statut_recrut, 
        recrut_personne_recrut.status, 
        recrut_personne_recrut.departement3, 
        recrut_personne_recrut.possedenumtel,  
        recrut_personne_recrut.hasAcceptDisponible, 
        recrut_personne_recrut.declarahonneur, 
        recrut_personne_recrut.codebonneconduite, 
        recrut_personne_recrut.hasexpcollecte, 
        recrut_personne_recrut.date_jour_decla, 
        recrut_personne_recrut.dat 


       
        FROM depouillements, recrut_personne_recrut, recrut_departement
        WHERE depouillements.postulant_id = recrut_personne_recrut.id AND recrut_personne_recrut.departement3 = recrut_departement.CodDep AND depouillements.etat = 1 '.$req.'
        ORDER BY recrut_personne_recrut.NomProjet ASC, recrut_departement.NomDep ASC, depouillements.note DESC';     
        // $data['person'] = $personnerecru_model->db->query($sql)->getResult(); 

        $data = $personnerecru_model->db->query($sql)->getResult();
        $fileName = 'resultats'.uniqid().'.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // En-têtes des colonnes
        $sheet->setCellValue('A1', 'Matricule');
        $sheet->setCellValue('B1', 'Noms');
        $sheet->setCellValue('C1', 'Prenoms');
        $sheet->setCellValue('D1', 'Curriculum Vitae');
        $sheet->setCellValue('E1', 'Pièce d\'Identité');
        $sheet->setCellValue('F1', 'Certificat Médical');
        $sheet->setCellValue('G1', 'Attestation d\'Expérience');
        $sheet->setCellValue('H1', 'Diplome d\'Etude');
        $sheet->setCellValue('I1', 'Certificat de Residence');
        $sheet->setCellValue('J1', 'Casier Judiciaire');
        $sheet->setCellValue('K1', 'Age Agent Colletcte');
        $sheet->setCellValue('L1', 'Age Agent Technicien');
        $sheet->setCellValue('M1', 'Age Agent Chauffeur');
        $sheet->setCellValue('N1', 'Diplôme Agent Colletcte');

        $sheet->setCellValue('O1', 'Diplôme Agent Technicien');

        $sheet->setCellValue('P1', 'Diplôme Agent Chauffeur');
        $sheet->setCellValue('Q1', 'Experience Agent Colletcte');
        $sheet->setCellValue('R1', 'Expériences Agent Chauffeur');
        $sheet->setCellValue('S1', 'Utilisation de la Tablette CAPI');
        $sheet->setCellValue('T1', 'Connaissance Informatqiue');
        $sheet->setCellValue('U1', 'Nombre Langue parlée Agent Collecte');
        $sheet->setCellValue('V1', 'Spécialisation');
        $sheet->setCellValue('W1', 'Nombre Langue Parlée Agent Chauffeur');
        $sheet->setCellValue('X1', 'Connaissance en Logiciel de Cartographie et Traitement d\'images');
        $sheet->setCellValue('Y1', 'Occupation Antérieure');
        $sheet->setCellValue('Z1', 'Travaux Cartographiques Réalisés');
        $sheet->setCellValue('AA1', 'Residences');
        $sheet->setCellValue('AB1', 'Disponibilités');
        $sheet->setCellValue('AC1', 'Notes');
        $sheet->setCellValue('AD1', 'Postes');
        $sheet->setCellValue('AE1', 'Prefectures');

        // ---------------------- start infos supplementaire -----------------
        $sheet->setCellValue('AF1', 'Phones');
        $sheet->setCellValue('AG1', 'Emails');
        $sheet->setCellValue('AH1', 'Statuts');

        $sheet->setCellValue('AI1', 'Type Piece');
        $sheet->setCellValue('AJ1', 'Numero Pieces'); 

        $sheet->setCellValue('AK1', 'Dates Naissances');
        $sheet->setCellValue('AL1', 'Lieux Naissances');

        $sheet->setCellValue('AM1', 'Intitules Experiences');
        $sheet->setCellValue('AN1', 'Intitules Postes');
        $sheet->setCellValue('AO1', 'Structures Experiences');
        $sheet->setCellValue('AP1', 'Annees Experiences');

        $sheet->setCellValue('AQ1', 'Peres');
        $sheet->setCellValue('AR1', 'Meres');

        $sheet->setCellValue('AS1', 'Tuteurs 1');
        $sheet->setCellValue('AT1', 'Contacts Tuteurs 1 ');

        $sheet->setCellValue('AU1', 'Tuteurs 2');
        $sheet->setCellValue('AV1', 'Contacts Tuteurs 2 ');

        $sheet->setCellValue('AW1', 'Langues 1 ');
        $sheet->setCellValue('AX1', 'Langues 2 ');
        $sheet->setCellValue('AY1', 'Langues 3 ');
        $sheet->setCellValue('AZ1', 'Sexes ');

        $sheet->setCellValue('BA1', 'Niveaux Etudes ');
        $sheet->setCellValue('BB1', 'Derniers Diplomes ');
        $sheet->setCellValue('BC1', 'Disponibles ');
        $sheet->setCellValue('BD1', 'Experiences ');
        $sheet->setCellValue('BE1', 'Dates Declarations ');
        $sheet->setCellValue('BF1', 'Dates Inscription ');
        // ---------------------- end infos supplementaire -------------------

        $rows = 2;
        foreach ($data as $datas) {        
            $sheet->setCellValue('A' . $rows, $datas->matricule);
            $sheet->setCellValue('B' . $rows, $datas->name);
            $sheet->setCellValue('C' . $rows, $datas->last_name);
            $sheet->setCellValue('D' . $rows, $datas->cv);
            $sheet->setCellValue('E' . $rows, $datas->pi);
            $sheet->setCellValue('F' . $rows, $datas->cm);
            $sheet->setCellValue('G' . $rows, $datas->ae);
            $sheet->setCellValue('H' . $rows, $datas->de);    
            $sheet->setCellValue('I' . $rows,  $datas->cr);
            $sheet->setCellValue('j' . $rows,  $datas->cj);
            $sheet->setCellValue('K' . $rows,  $datas->age17);
            $sheet->setCellValue('L' . $rows,  $datas->age12);
            $sheet->setCellValue('M' . $rows,  $datas->age18);
            $sheet->setCellValue('N' . $rows,  $datas->dp_collect17);
            $sheet->setCellValue('O' . $rows,  $datas->niv_etu);
            $sheet->setCellValue('P' . $rows,  $datas->dp_chauffeur18);
            $sheet->setCellValue('Q' . $rows,  $datas->exp_collect17);
            $sheet->setCellValue('R' . $rows,  $datas->exp_chauffeur18);
            $sheet->setCellValue('S' . $rows,  $datas->utilis_tablette);
            $sheet->setCellValue('T' . $rows,  $datas->cons_informatique);
            $sheet->setCellValue('U' . $rows,  $datas->nb_langue17);
            $sheet->setCellValue('V' . $rows,  $datas->sp);
            $sheet->setCellValue('W' . $rows,  $datas->nb_langue18);
            $sheet->setCellValue('X' . $rows,  $datas->co_lg_carto_trait_img);
            $sheet->setCellValue('Y' . $rows,  $datas->occ_ant);
            $sheet->setCellValue('Z' . $rows,  $datas->trav_carto_realise);
            $sheet->setCellValue('AA' . $rows,  $datas->residence);
            $sheet->setCellValue('AB' . $rows,  $datas->dispo);
            $sheet->setCellValue('AC' . $rows,  $datas->note);
            $sheet->setCellValue('AD' . $rows,  $datas->NomProjet);
            $sheet->setCellValue('AE' . $rows,  $datas->NomDep);

            // ---------------------- starts infos supplementaire -------------------
            $sheet->setCellValue('AF' . $rows,  strtolower($datas->contact1));
            $sheet->setCellValue('AG' . $rows,  strtolower($datas->email));
            $sheet->setCellValue('AH' . $rows,  strtoupper($datas->status));
            $sheet->setCellValue('AI' . $rows,  strtoupper($datas->type_piece));
            $sheet->setCellValue('AJ' . $rows,  strtoupper($datas->numero_cni));
            $sheet->setCellValue('AK' . $rows,  strtoupper($datas->date_naiss));
            $sheet->setCellValue('AL' . $rows,  strtoupper($datas->lieu_naiss));
            $sheet->setCellValue('AM' . $rows,  strtoupper($datas->exp_intitule_projet));
            $sheet->setCellValue('AN' . $rows,  strtoupper($datas->exp_intitule_poste));
            $sheet->setCellValue('AO' . $rows,  strtoupper($datas->exp_structure));
            $sheet->setCellValue('AP' . $rows,  strtoupper($datas->exp_annee));
            $sheet->setCellValue('AQ' . $rows,  strtoupper($datas->namemere));
            $sheet->setCellValue('AR' . $rows,  strtoupper($datas->namepere));
            $sheet->setCellValue('AS' . $rows,  strtoupper($datas->nomtuteurlegal));
            $sheet->setCellValue('AT' . $rows,  $datas->contact2);
            $sheet->setCellValue('AU' . $rows,  strtoupper($datas->nomtuteurlegal2));
            $sheet->setCellValue('AV' . $rows,  $datas->contact3);

            $sheet->setCellValue('AW' . $rows,  strtoupper($datas->langue1));
            $sheet->setCellValue('AX' . $rows,  strtoupper($datas->langue2));
            $sheet->setCellValue('AY' . $rows,  strtoupper($datas->langue3));
            $sheet->setCellValue('AZ' . $rows,  $datas->sexe);

            $sheet->setCellValue('BA' . $rows,  strtoupper($datas->niveau_etude));
            $sheet->setCellValue('BB' . $rows,  strtoupper($datas->last_diplome));
            $sheet->setCellValue('BC' . $rows,  $datas->hasAcceptDisponible);
            $sheet->setCellValue('BD' . $rows,  $datas->hasexpcollecte);
            $sheet->setCellValue('BE' . $rows,  $datas->date_jour_decla);
            $sheet->setCellValue('BF' . $rows,  $datas->dat);
            // ---------------------- end infos supplementaire -------------------            
            $rows++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName);
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function affectations(){
        helper(['form']);
        $request = service('request');
        $session = \Config\Services::session();

        $prefecture_id = $request->getGet('prefecture_id');
        $sp_id = $request->getGet('sp_id');
        $project_id = $request->getGet('project_id');
        $checkDepouille = $request->getGet('checkDepouille');
        $search=$request->getGet('search');

        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];
        
        $personnerecru_model = new PersonneRecrut();
        $data = [];
        
        $recrutModel = new PersoRecrutModel();
        if($session->get('user_type') == 1){    
            // admin
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id >", 0)->countAllResults();
            // $data['affecteAgents']  = $recrutModel->where("user_id", $session->get('id'))->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }else{
            // users
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            // $data['affecteAgents']  = $recrutModel->where("user_id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id", $session->get('id'))->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("user_id", $session->get('id'))->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }       

        $data['admin'] = $session->get('user_type');

        // $postulants_nb = count((new PersoRecrutModel())->where("user_id", 0)->where("depouille", 0)->get()->getResult());
        // $this->where('sexe', '1')->whereIn('departement3', $userprefectures)->countAllResults();

        // $data['person'] = $personnerecru_model->findAll();
        // $this->UpdateNoteAgent();
        // $logger = service('logger');
        // $logger->error($prefecture_id);

        $ids = "0"; 
        if(count($userprefectures) > 0){
            $ids = join(',', $userprefectures);
        }

        $req = "  AND recrut_personne_recrut.departement3 IN ($ids) ";

        if($prefecture_id > 0){
            $req .= " AND recrut_personne_recrut.departement3=$prefecture_id";
        }

        if($sp_id > 0){
            $req .= " AND recrut_personne_recrut.sousprefecture3=$sp_id";
        }

        if($project_id > 0){
            $req .= " AND recrut_personne_recrut.id_projet=$project_id";
        }

        if($checkDepouille > 0){
            switch ($checkDepouille) {
                case 1: {$req .= " AND recrut_personne_recrut.depouille=$checkDepouille";} break;
                case 2: {$req .= " AND recrut_personne_recrut.depouille=0";} break;
                // default: break;
            }            
        }

        if(!empty($search)){
            $req .= " AND (recrut_personne_recrut.matricule LIKE '$search' OR recrut_personne_recrut.email LIKE '$search' OR recrut_personne_recrut.contact1 LIKE '$search')";
            // $req .= "recrut_personne_recrut.matricule LIKE '".$search."'";
            // $req .= " AND (recrut_personne_recrut.matricule=$search OR recrut_personne_recrut.contact1=$search OR recrut_personne_recrut.email=$search)";
        }

        $sql = '
        SELECT DISTINCT recrut_personne_recrut.id, recrut_personne_recrut.contact1, recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "homme"
            ELSE "femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,
        recrut_personne_recrut.email,
        recrut_personne_recrut.photo,
        recrut_personne_recrut.date_naiss,
        recrut_personne_recrut.lieu_naiss,
        recrut_personne_recrut.last_diplome,
        recrut_personne_recrut.doc_last_diplome,
        recrut_personne_recrut.nomtuteurlegal,
        recrut_personne_recrut.contact2,
        recrut_personne_recrut.nomtuteurlegal2,
        recrut_personne_recrut.contact3,
        recrut_personne_recrut.cv,
        recrut_personne_recrut.cni,
        recrut_personne_recrut.codeProjet,
        recrut_personne_recrut.status,
        recrut_personne_recrut.dateheureinscrip,
        recrut_personne_recrut.region,
        recrut_personne_recrut.sousprefecture,
        recrut_personne_recrut.departement2,
        recrut_personne_recrut.sousprefecture2,
        recrut_personne_recrut.departement4,
        recrut_personne_recrut.sousprefecture4,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.possedenumtel,
        recrut_personne_recrut.isDisponible,
        recrut_personne_recrut.hasAcceptDisponible,
        recrut_personne_recrut.cnituteurlegal,
        recrut_personne_recrut.declarahonneur,
        recrut_personne_recrut.codebonneconduite,
        recrut_personne_recrut.contrat,
        recrut_personne_recrut.type_piece,
        recrut_personne_recrut.numero_cni,
        recrut_personne_recrut.namepere,
        recrut_personne_recrut.namemere,
        recrut_personne_recrut.hasexpcollecte,
        recrut_personne_recrut.exp_structure,
        recrut_personne_recrut.exp_annee,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.exp_intitule_projet,
        recrut_personne_recrut.date_jour_decla,
        recrut_personne_recrut.confirmlieuaffectation,
        recrut_personne_recrut.certifresidence,
        recrut_personne_recrut.cand_retenu,
        recrut_personne_recrut.is_confirm,
        recrut_personne_recrut.NomProjet,
        recrut_personne_recrut.titre_poste,
        recrut_personne_recrut.choix_projet,
        recrut_personne_recrut.casier,
        recrut_personne_recrut.certifmedical,
        recrut_personne_recrut.attestcollecte,
        recrut_personne_recrut.note2,
        recrut_personne_recrut.rank,
        recrut_personne_recrut.fonction_id,
        recrut_personne_recrut.is_admited,
        recrut_personne_recrut.admited_at,
        recrut_personne_recrut.nbrinsert,
        recrut_personne_recrut.departement3,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.id_projet,
        recrut_personne_recrut.depouille,

        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3
       
        FROM recrut_personne_recrut, recrut_departement
        WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep AND recrut_personne_recrut.depouille = 0 AND recrut_personne_recrut.user_id = 0 '.$req.'
        ORDER BY recrut_personne_recrut.note DESC, recrut_personne_recrut.id ASC LIMIT 10';    
        $person = $personnerecru_model->db->query($sql)->getResult();

        $data['person'] = $person;
        // prefecture_id
        $sPrefecture = new SPrefectureModel();
	    $departements = new DepartementModel();

        $data['listDep'] = [];
        $data['listSP'] = [];
        if($userprefectures){
            $data['listDep'] = $departements->whereIn('CodDep', $userprefectures)->findAll();
            $data['listSP'] = $sPrefecture->whereIn('CodDep', $userprefectures)->findAll();
        }
        $projets= new ProjetModel();
        $data['listProjet']= $projets->where('active', 1)->findAll();

        $users= new UserModel();
        $data['users']= $users->where('etat', 1)->findAll();

        $postulants_nb = (new PersoRecrutModel())->where("user_id", 0)->where("depouille", 0)->get()->getResult();
        // $postulants_nb = 0; if($postulants_nb) 
        
        $postulants_nb = count($postulants_nb);
        $data['postulants_nb']= $postulants_nb;

        return view('admin/includes/affectations', $data);
    }


    public function affectationsUsers()
    {
        helper(['form']);
        $session = \Config\Services::session();
        $logger = service('logger');
        // $rules = [
        //     'postulant_id'     => 'required',
        // ];

        $number = intval($this->request->getVar('number'));
        $user_id = $this->request->getVar('user_id');

        if(($number == 0)) $number = 1;

        $postulants = (new PersoRecrutModel())->where("user_id", 0)->where("depouille", 0)->limit($number)->get()->getResult();
        if($postulants){
            $postulants = array_column($postulants, "id");            
            $repart_nb = count($postulants);

            if($number > 0 && $user_id > 0){
                if($repart_nb > 0 && intval($user_id)> 0){
                    (new PersoRecrutModel())->whereIn('id', $postulants)->where('user_id', 0)->set('user_id', $user_id)->update();
                }            
            }else{
                // $users = (new UserModel())->where('id >', 1)->where('etat', 1)->findAll();
                $users = (new UserModel())->where('user_type <>', $session->get('user_type'))->where('etat', 1)->get()->getResultArray();
                $users_nb = 0; if($users) $users_nb = count($users);
                if($users_nb > 0){
                    $users = array_column($users, "id");
                    $npa = (intval($repart_nb / $users_nb) != 0)? intval($repart_nb / $users_nb) : 1;
                    $postulants = array_chunk($postulants, ceil($npa));              
                    
                    for($i = 0; $i < count($users); $i++) {
                        $user_id = $users[$i];
                        $postulantsByUser = ($postulants[$i])? $postulants[$i] : [];
                        // $logger->error("user_id : ".$user_id);
                        // $logger->error("POSTULANTS : ");
                        // $logger->error($postulantsByUser);                      
                        // $logger->error("--------------------session---------------------------------------------------------");
                        if(count($postulantsByUser) > 0 && intval($user_id)> 0){
                            (new PersoRecrutModel())->whereIn('id', $postulantsByUser)->where('user_id', 0)->set('user_id', $user_id)->update();
                        }
                    }
                }
            }
        }

        // $postulants_nb = (new PersoRecrutModel())->where("user_id", 0)->where("depouille", 0)->get()->getResult();
        // if($postulants_nb) $postulants_nb = count($postulants_nb);

        // $logger = service('logger');
        // $logger->error("postulants_nb : ".$postulants_nb);


        // $prefectures = (new DepartementModel())->findAll(); 
        // foreach ($prefectures as $key => $value) {
        //     // $userprefectures = (new UserPrefectureModel())->where("etat", 1)->where("prefecture_id", $value['id'])->findAll();
        //     $userprefectures = new UserPrefectureModel();

        //     $userprefectures = $userprefectures
        //         ->select('userprefectures.user_id, userprefectures.prefecture_id, users.name')
        //         ->join('users', 'userprefectures.user_id = users.id')
        //         ->where("users.etat", 1)->where("users.id > ", 1)->where("userprefectures.etat", 1)->where("userprefectures.prefecture_id", $value['id'])
        //         ->findAll();

        //     $userprefectures = array_column($userprefectures, "user_id");
        //     $nup = (count($userprefectures) != 0)? count($userprefectures):1;

        //     $postulants = (new PersoRecrutModel())->where("user_id", 0)->where("depouille", 0)->where("departement3", $value['id'])->findAll();
        //     $postulants = array_column($postulants, "id");
        //     $npp = count($postulants);
        //     $npa = (intval($npp / $nup) != 0)? intval($npp / $nup) : 1;
        //     $postulants = array_chunk($postulants, ceil($npa));

        //     if(count($postulants) > 0){
        //         for($i = 0; $i < count($userprefectures); $i++) {
        //             $user_id = $userprefectures[$i];
        //             $postulantsByUser = ($postulants[$i])? $postulants[$i] : [];

        //             if(count($postulantsByUser) > 0 && intval($user_id)> 0){
        //                 (new PersoRecrutModel())->whereIn('id', $postulantsByUser)->where('user_id', 0)->set('user_id', $user_id)->update();
        //             }
        //         }
        //     }
        // }
        
        return redirect()->to('/affectations');
    }

    public function deAffectationsUsers()
    {
        helper(['form']);
        $session = \Config\Services::session();
        $logger = service('logger');
        // $rules = [
        //     'postulant_id'     => 'required',
        // ];

        $number = intval($this->request->getVar('number'));
        $user_id = $this->request->getVar('user_id');

        if(($number == 0)) $number = 1;

        $postulants = (new PersoRecrutModel())->where("user_id", $user_id)->where("depouille", 0)->limit($number)->get()->getResult();
        if($postulants){
            $postulants = array_column($postulants, "id");            
            $repart_nb = count($postulants);

            if($number > 0 && $user_id > 0){
                if($repart_nb > 0 && intval($user_id)> 0){
                    (new PersoRecrutModel())->whereIn('id', $postulants)->where('user_id', $user_id)->where("depouille", 0)->set('user_id', 0)->update();
                }            
            }else{
                // // $users = (new UserModel())->where('id >', 1)->where('etat', 1)->findAll();
                // $users = (new UserModel())->where('user_type <>', $session->get('user_type'))->where('etat', 1)->get()->getResultArray();
                // $users_nb = 0; if($users) $users_nb = count($users);
                // if($users_nb > 0){
                //     $users = array_column($users, "id");
                //     $npa = (intval($repart_nb / $users_nb) != 0)? intval($repart_nb / $users_nb) : 1;
                //     $postulants = array_chunk($postulants, ceil($npa));              
                    
                //     for($i = 0; $i < count($users); $i++) {
                //         $user_id = $users[$i];
                //         $postulantsByUser = ($postulants[$i])? $postulants[$i] : [];
                //         // $logger->error("user_id : ".$user_id);
                //         // $logger->error("POSTULANTS : ");
                //         // $logger->error($postulantsByUser);                      
                //         // $logger->error("--------------------session---------------------------------------------------------");
                //         if(count($postulantsByUser) > 0 && intval($user_id)> 0){
                //             (new PersoRecrutModel())->whereIn('id', $postulantsByUser)->where('user_id', 0)->set('user_id', $user_id)->update();
                //         }
                //     }
                // }
            }
        }

        // $postulants_nb = (new PersoRecrutModel())->where("user_id", 0)->where("depouille", 0)->get()->getResult();
        // if($postulants_nb) $postulants_nb = count($postulants_nb);

        // $logger = service('logger');
        // $logger->error("postulants_nb : ".$postulants_nb);


        // $prefectures = (new DepartementModel())->findAll(); 
        // foreach ($prefectures as $key => $value) {
        //     // $userprefectures = (new UserPrefectureModel())->where("etat", 1)->where("prefecture_id", $value['id'])->findAll();
        //     $userprefectures = new UserPrefectureModel();

        //     $userprefectures = $userprefectures
        //         ->select('userprefectures.user_id, userprefectures.prefecture_id, users.name')
        //         ->join('users', 'userprefectures.user_id = users.id')
        //         ->where("users.etat", 1)->where("users.id > ", 1)->where("userprefectures.etat", 1)->where("userprefectures.prefecture_id", $value['id'])
        //         ->findAll();

        //     $userprefectures = array_column($userprefectures, "user_id");
        //     $nup = (count($userprefectures) != 0)? count($userprefectures):1;

        //     $postulants = (new PersoRecrutModel())->where("user_id", 0)->where("depouille", 0)->where("departement3", $value['id'])->findAll();
        //     $postulants = array_column($postulants, "id");
        //     $npp = count($postulants);
        //     $npa = (intval($npp / $nup) != 0)? intval($npp / $nup) : 1;
        //     $postulants = array_chunk($postulants, ceil($npa));

        //     if(count($postulants) > 0){
        //         for($i = 0; $i < count($userprefectures); $i++) {
        //             $user_id = $userprefectures[$i];
        //             $postulantsByUser = ($postulants[$i])? $postulants[$i] : [];

        //             if(count($postulantsByUser) > 0 && intval($user_id)> 0){
        //                 (new PersoRecrutModel())->whereIn('id', $postulantsByUser)->where('user_id', 0)->set('user_id', $user_id)->update();
        //             }
        //         }
        //     }
        // }
        
        return redirect()->to('/affectations');
    }

    public function rapports(){
        helper(['form']);

        $users = new UserModel();
        // $data['users'] = $users = $users->where('etat', 1)->findAll(); 
        $users = $users->where('etat', 1)->get()->getResultArray(); 
        $logger = service('logger');
        $totalDepouilleUsers = 0;

        for($i = 0; $i < count($users); $i++){
            $user_id = $users[$i]['id'];
            $nbUserAffect = (new PersoRecrutModel()) -> nbUserAffect($user_id); 
            $nbUserDepouille = (new PersoRecrutModel()) -> nbUserDepouille($user_id); 
            $totalDepouilleUsers += $nbUserDepouille;
            $users[$i]['nbUserAffect'] = $nbUserAffect;
            $users[$i]['nbUserDepouille'] = $nbUserDepouille;
            // $logger->error("nbUserAffect : $nbUserAffect ; nbUserDepouille : $nbUserDepouille ");
        }       

        $data['totalDepouilleUsers'] = $totalDepouilleUsers;
        $data['users'] = $users;

        // $logger->error($users);

        /*
        $recrutModel = new PersoRecrutModel();

        if($session->get('user_type') == 1){    
            // admin
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id >", 0)->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }else{
            // users
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id", $session->get('id'))->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("user_id", $session->get('id'))->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }
        */
        return view('admin/includes/rapports', $data);
    }

    public function agentsaffecte(){
        helper(['form']);
        $request = service('request');
        $session = \Config\Services::session();

        $prefecture_id = $request->getGet('prefecture_id');
        $sp_id = $request->getGet('sp_id');
        $project_id = $request->getGet('project_id');
        $user_id = $request->getGet('user_id');
        $checkDepouille = $request->getGet('checkDepouille');
        $search=$request->getGet('search');

        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];
        
        $personnerecru_model = new PersonneRecrut();
        $data = [];
        
        $recrutModel = new PersoRecrutModel();
        if($session->get('user_type') == 1){    
            // admin
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id >", 0)->countAllResults();
            // $data['affecteAgents']  = $recrutModel->where("user_id", $session->get('id'))->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }else{
            // users
            $data['inscrit']  = $recrutModel->where("id >", 0)->countAllResults();
            // $data['affecteAgents']  = $recrutModel->where("user_id >", 0)->countAllResults();
            $data['affecteAgents']  = $recrutModel->where("user_id", $session->get('id'))->countAllResults();
            $data['traiteAgents']  = $recrutModel->where("user_id", $session->get('id'))->where("depouille", 1)->countAllResults();
            $data['nonTraite']  = $recrutModel->where("user_id", 0)->where("depouille", 0)->countAllResults();
        }       

        $data['admin'] = $session->get('user_type');

        // $postulants_nb = count((new PersoRecrutModel())->where("user_id", 0)->where("depouille", 0)->get()->getResult());
        // $this->where('sexe', '1')->whereIn('departement3', $userprefectures)->countAllResults();

        // $data['person'] = $personnerecru_model->findAll();
        // $this->UpdateNoteAgent();
        // $logger = service('logger');
        // $logger->error($prefecture_id);

        $ids = "0"; 
        if(count($userprefectures) > 0){
            $ids = join(',', $userprefectures);
        }

        $req = "  AND recrut_personne_recrut.departement3 IN ($ids) ";

        if($prefecture_id > 0){
            $req .= " AND recrut_personne_recrut.departement3=$prefecture_id";
        }

        if($sp_id > 0){
            $req .= " AND recrut_personne_recrut.sousprefecture3=$sp_id";
        }

        if($project_id > 0){
            $req .= " AND recrut_personne_recrut.id_projet=$project_id";
        }

        if($user_id > 0){
            $req .= " AND recrut_personne_recrut.user_id=$user_id";
        }

        if($checkDepouille > 0){
            switch ($checkDepouille) {
                case 1: {$req .= " AND recrut_personne_recrut.depouille=$checkDepouille";} break;
                case 2: {$req .= " AND recrut_personne_recrut.depouille=0";} break;
                // default: break;
            }            
        }

        if(!empty($search)){
            $req .= " AND (recrut_personne_recrut.matricule LIKE '$search' OR recrut_personne_recrut.email LIKE '$search' OR recrut_personne_recrut.contact1 LIKE '$search')";
            // $req .= "recrut_personne_recrut.matricule LIKE '".$search."'";
            // $req .= " AND (recrut_personne_recrut.matricule=$search OR recrut_personne_recrut.contact1=$search OR recrut_personne_recrut.email=$search)";
        }

        $sql = 'SELECT DISTINCT 
        recrut_personne_recrut.id,
        recrut_personne_recrut.contact1,
        recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        recrut_personne_recrut.departement3,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.id_projet,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "Homme"
            ELSE "Femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3,
            users.last_name AS user_last_name,
            users.name AS user_name,
            depouillements.note AS note_depoullement
       
        FROM users, depouillements, recrut_personne_recrut, recrut_departement
        WHERE  users.id = recrut_personne_recrut.user_id AND depouillements.postulant_id = recrut_personne_recrut.id AND recrut_personne_recrut.departement3 = recrut_departement.CodDep AND depouillements.etat = 1 '.$req.'
        ORDER BY recrut_personne_recrut.note DESC, recrut_personne_recrut.id ASC'; 
        
        $person = $personnerecru_model->db->query($sql)->getResult();

        $data['person'] = $person;

        $logger = service('logger');
        $logger->error($person);

        // prefecture_id
        $sPrefecture = new SPrefectureModel();
	    $departements = new DepartementModel();

        $data['listDep'] = [];
        $data['listSP'] = [];
        if($userprefectures){
            $data['listDep'] = $departements->whereIn('CodDep', $userprefectures)->findAll();
            $data['listSP'] = $sPrefecture->whereIn('CodDep', $userprefectures)->findAll();
        }
        $projets= new ProjetModel();
        $data['listProjet']= $projets->where('active', 1)->findAll();

        $users= new UserModel();
        $data['users']= $users->where('etat', 1)->findAll();

        $postulants_nb = (new PersoRecrutModel())->where("user_id", 0)->where("depouille", 0)->get()->getResult();
        // $postulants_nb = 0; if($postulants_nb) 
        
        $postulants_nb = count($postulants_nb);
        $data['postulants_nb']= $postulants_nb;

        return view('admin/includes/affectAgent', $data);
    }

    public function changePWD()
    {
        helper(['form']);
        $rules = [
            'user_id'      => 'required',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();
            $user_id = $this->request->getVar('user_id');
            $data = [
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $result = $userModel->update($user_id, $data);    
            session()->setFlashdata("success", "Mot de Passe Modifié");

            return redirect()->to('/users');
        }
        
    }

    public function sendWhatsapp()
    {        
        $logger = service('logger');
        $logger->error("WS"); 
        $data = [

        ];

        return view('admin/includes/sendWhatsapp', $data);
    }



    public function trombinoscopeBySalleDownload($salle)
    {
        helper(['form']);
        $session = \Config\Services::session();
        $request = service('request');
        $prefecture_id = $request->getGet('prefecture_id');
        $sp_id = $request->getGet('sp_id');
        $project_id = $request->getGet('project_id');
        $search=$request->getGet('search');
        $personnerecru_model = new PersonneRecrut();
        $recrutEthnie_model = new RecrutEthnie();
        $data = [];

        $logger = service('logger');
        // $logger->error($salle); 

        $userprefectures = ($session->get('userprefectures'))? array_column($session->get('userprefectures'), 'prefecture_id'):[];

        $ids = "0"; 
        if($userprefectures ){
            $ids = join(',', $userprefectures);
        }

        $req = "  AND recrut_personne_recrut.departement3 IN ($ids) ";        

        if($prefecture_id > 0){
            $req .= " AND recrut_personne_recrut.departement3=$prefecture_id";
        }

        if($sp_id > 0){
            $req .= " AND recrut_personne_recrut.sousprefecture3=$sp_id";
        }

        if($project_id > 0){
            $req .= " AND recrut_personne_recrut.id_projet=$project_id";
        }

        if(!empty($search)){
            $req .= " AND (recrut_personne_recrut.matricule LIKE '$search' OR recrut_personne_recrut.email LIKE '$search' OR recrut_personne_recrut.contact1 LIKE '$search')";
        }
        
        if(!empty($salle)){
            $req .= " AND recrut_personne_recrut.salle LIKE '".$salle."'";
        }

        $sql = '
        SELECT DISTINCT recrut_personne_recrut.contact1,recrut_personne_recrut.matricule, 
        recrut_personne_recrut.name,
        recrut_personne_recrut.note,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.last_name,
        CASE recrut_personne_recrut.niveau_etude
            WHEN "11" THEN "DEUG/BAC +2/LICENCE 2/BTS"
            WHEN "12" THEN "LICENCE 3 / BAC+3"
            WHEN "13" THEN "MAITRISE / MASTER 1 / BAC+4"
            WHEN "14" THEN "MASTER 2 / DEA / BAC+5"
            WHEN "15" THEN "DOCTORAT"
            ELSE "Autre"
        END AS niveau_etude,
        CASE recrut_personne_recrut.sexe
            WHEN "1" THEN "homme"
            ELSE "femme"
        END AS sexe,
        recrut_personne_recrut.statut_recrut,
        recrut_personne_recrut.email,
        recrut_personne_recrut.photo,
        recrut_personne_recrut.date_naiss,
        recrut_personne_recrut.lieu_naiss,
        recrut_personne_recrut.last_diplome,
        recrut_personne_recrut.doc_last_diplome,
        recrut_personne_recrut.nomtuteurlegal,
        recrut_personne_recrut.contact2,
        recrut_personne_recrut.nomtuteurlegal2,
        recrut_personne_recrut.contact3,
        recrut_personne_recrut.cv,
        recrut_personne_recrut.cni,
        recrut_personne_recrut.codeProjet,
        recrut_personne_recrut.status,
        recrut_personne_recrut.dateheureinscrip,
        recrut_personne_recrut.region,
        recrut_personne_recrut.sousprefecture,
        recrut_personne_recrut.departement2,
        recrut_personne_recrut.sousprefecture2,
        recrut_personne_recrut.departement4,
        recrut_personne_recrut.sousprefecture4,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.possedenumtel,
        recrut_personne_recrut.isDisponible,
        recrut_personne_recrut.hasAcceptDisponible,
        recrut_personne_recrut.cnituteurlegal,
        recrut_personne_recrut.declarahonneur,
        recrut_personne_recrut.codebonneconduite,
        recrut_personne_recrut.contrat,
        recrut_personne_recrut.type_piece,
        recrut_personne_recrut.numero_cni,
        recrut_personne_recrut.namepere,
        recrut_personne_recrut.namemere,
        recrut_personne_recrut.hasexpcollecte,
        recrut_personne_recrut.exp_structure,
        recrut_personne_recrut.exp_annee,
        recrut_personne_recrut.exp_intitule_poste,
        recrut_personne_recrut.exp_intitule_projet,
        recrut_personne_recrut.date_jour_decla,
        recrut_personne_recrut.confirmlieuaffectation,
        recrut_personne_recrut.certifresidence,
        recrut_personne_recrut.cand_retenu,
        recrut_personne_recrut.is_confirm,
        recrut_personne_recrut.NomProjet,
        recrut_personne_recrut.titre_poste,
        recrut_personne_recrut.choix_projet,
        recrut_personne_recrut.casier,
        recrut_personne_recrut.certifmedical,
        recrut_personne_recrut.attestcollecte,
        recrut_personne_recrut.note2,
        recrut_personne_recrut.rank,
        recrut_personne_recrut.fonction_id,
        recrut_personne_recrut.is_admited,
        recrut_personne_recrut.admited_at,
        recrut_personne_recrut.nbrinsert,
        recrut_personne_recrut.departement3,
        recrut_personne_recrut.sousprefecture3,
        recrut_personne_recrut.id_projet,

        recrut_personne_recrut.comSalle,
        recrut_personne_recrut.quartSalle,
        recrut_personne_recrut.adresSalle,
        recrut_personne_recrut.siteSalle,
        recrut_personne_recrut.salle,

        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.first_langue_nat) AS langue1, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.second_langue_nat) AS langue2, 
        (SELECT libelle FROM recrut_ethnie WHERE id = recrut_personne_recrut.third_langue_nat) AS langue3
       
        FROM recrut_personne_recrut,recrut_departement
        WHERE recrut_personne_recrut.departement3 = recrut_departement.CodDep '.$req.'
        ORDER BY recrut_personne_recrut.note DESC
        
        LIMIT 200';
     
        $data['person'] = $personnerecru_model->db->query($sql)->getResult();

        return view('admin/includes/trombinoscope-by-salle-download', $data);
    }
    


    
}
