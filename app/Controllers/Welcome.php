<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller
 {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
    {
        parent::__construct();        
        //Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
        //Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
        //Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
		//$this->output->set_header('X-XSS-Protection: 1; mode=block');
    }
	
	public function index()
	{
		$data = new stdClass();
		$data->main_content = 'welcome';
        $this->load->view('template/template', $data);
	}
	
	public function profils()
	{
		$this->load->model('projet_m');
		$data = new stdClass();
		$data->main_content = 'welcome_message';
		$data->lists = $this->projet_m->get_all_oderby();
        $this->load->view('template/template', $data);
	}

	//obtenir un recepisse
	public function recepisse(){
		$this->load->model('projet_m');
		$data = new stdClass();
		$data->main_content = 'vues/recepisse_view';
		$data->lists = $this->projet_m->get_all();
        $this->load->view('template/template', $data);
	}

	//methode permettant d'obtenir les recepisse
	public function getRecepisse(){
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="fg-color-red">', '</p>');

		$validation_rules = array(
            array(
                'field' => 'contact_1x',
                'label' => 'contact_1x',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'id_projet',
                'label' => 'id_projet',
                'rules' => 'trim|required'
            ),

        );

        $this->form_validation->set_rules($validation_rules);
        //$this->form_validation->CI =& $this;
        if ($this->form_validation->run()==TRUE) {
			$this->load->helper('security');

			$id_projet = $this->input->post('id_projet',TRUE);  
			$contact1 = $this->input->post('contact_1x',TRUE); 

			$this->load->model('perso_recrut_m');
			$this->load->model('projet_m');
			$this->load->model('departement_m');
			$this->load->model('sousprefecture_m');
			$info_persons = $this->perso_recrut_m->get_by(array('contact1'=>$contact1,'id_projet'=>$id_projet));
			$reps = $this->perso_recrut_m->get_by(array('id' => $id_projet));
			if(count($info_persons) > 0){
		 
						//$regs = $info_persons['region'];
						$depts = $info_persons->departement;
						$sps = $info_persons->sousprefecture;
		       	$data = array(
						'id_projet' => $id_projet,
						'projet' => $reps->NomProjet,
						//'nom_projet' => $reps['Nom_Projet'],
						'photo' => $info_persons->photo,
						'matricule' => $info_persons->matricule,
						'nom' => $info_persons->name,
						'prenoms' =>$info_persons->last_name,
						'date_naiss'=>$info_persons->date_naiss,
						'lieu_naiss'=>$info_persons->lieu_naiss,
						'sexe'=>$info_persons->sexe,
						'contact'=>$contact1,
						'nivo_etude'=>$info_persons->niveau_etude,
						'specialite'=> $info_persons->last_diplome,
						'statut'=> $info_persons->statut_recrut,
						'email'=> $info_persons->email,
						'lang_parlee'=>$info_persons->first_langue_nat,
						'lang_parlee_2'=>$info_persons->second_langue_nat,
						'experiences' => '',
						'formations' => '',
						'nom_projet' =>  '',
						'titre_poste' =>  '',
					// 'region' =>  get_by('recrut_region',"CodReg = '$regs'"),
						'departement' =>  $this->departement_m->get_by(array('CodDep' => $depts)),
						'sousprefecture' =>  $this->sousprefecture_m->get_by(array('CodDep' => $depts,'CodSp'=>$sps)),
					// 'localite1' =>  $info_persons['localite1'],
					// 'localite2' =>  $info_persons['localite2'],
					// 'localite3' =>  $info_persons['localite3'],
					);
					
					$_SESSION['data'] = $data;
					//echo "oke";
			
					//echo "<script type=\"text/javascript\" language=\"javascript\">
					//	window.location.replace(\"recap_view1.php\");
					//	</script>";
					   redirect('recap_view');
					}
			else{
			//echo $id_projet ;
			//header("Location: formulaire_view.php");
			   redirect('recepisse');
			// ob_end_flush();
			}
		}
		else{
			//echo validation_errors(); 
			redirect('recepisse');
		}
	}

	public function recap_view(){
		if(isset($_SESSION['data'])){
			$data = new stdClass();
			$data->main_content = 'recap_view';
			$this->load->view('template/template', $data);
		}
		else{
			redirect('welcome');
		}
	}


	//methode permettant la vue formulaire
	public function inscription(){
		$this->load->model('projet_m');
		$this->load->model('ethnie_m');
		$this->load->model('departement_m');
		$data = new stdClass();
		$data->main_content = 'formulaire_view';
		$projet = $this->input->post('projet');
		$data->ethnie = array(''=>'Selectionner une Ethnie');
		$data->ethnie += $this->ethnie_m->dropdown_orderby('id','libelle');

		$data->departementsAll  = array("0"=>"sélectionner une préfecture");
		$data->departementsAll += $this->departement_m->dropdown_orderby('CodDep','NomDep');

		$sousprefecturesAll = array();
		$data->sousprefecturesAll = $sousprefecturesAll;

		$data->projet = $this->projet_m->get_by(array('id'=>$projet));
        $this->load->view('template/template', $data);
	}


	//methode permettant d'obtenir la liste des sp par departement
	public function getListSspAll(){
		if(isset($_POST['id'])){
			$this->load->model('sousprefecture_m');
			$id_dep = $this->input->post('id');
			$data = new stdClass();

			$newdata = array(
				'id_departement'  => $id_dep ,
		    );
		
		   $this->session->set_userdata($newdata);

			$data->reps = $this->sousprefecture_m->dropdown_by_dept('CodSp','NomSp');
	
			if($data->reps){
				$data->status = "ok";
			}
			else{
				$data->status = "no";
			}
			echo json_encode($data);
		}
		else{
			redirect('welcome');
		}
	}


	//verifier quotas
	//fonction permettant de verifier sil existe de la place
	public function verifquotas(){
		if(isset($_POST['verificationplace'])){
			$this->load->model('sp_param_m');
			$this->load->model('dept_param_m');
			$verifcationplace = $this->input->post('verificationplace');

			$id_dept = $this->input->post('id_dep');
			$id_sp = $this->input->post('id_sp');
			
			$id_projet = $_SESSION['idProjet'];
			
			//$where = "id_dep = ".$id_dept." and id_projet= ".$id_projet." and nbrPlaceFinal > nbrPlaceActuel";
			//$datas = get_by($conn,$table,$where);
			$datas = $this->dept_param_m->get_by_depparam(array('id_dep'=>$id_dept,'id_projet'=>$id_projet));
			if(count($datas)){
				//$where2 = "id_dep = ".$id_dept." and id_sp = ".$id_sp." and id_projet= ".$id_projet." and nbrPlaceFinal > nbrPlaceActuel";
				$datas2 = $this->sp_param_m->get_by_spparam(array('id_dep'=>$id_dept,'id_sp'=>$id_sp,'id_projet'=>$id_projet));
				if(count($data2)){
					echo "ok";
				}
				else{
					echo "no";
				}
			}
			else{
				echo "no";
			}
		}
		else{
			redirect('welcome');
		}
	}


	//methode permettant d'enregistrer un candidat
    public function register(){
		if(isset($_POST['formSubmit'])){
			$this->load->model('perso_recrut_m');
				$this->load->library('form_validation');
				$this->form_validation->set_error_delimiters('<p class="fg-color-red">erreur dans le formualire</p>');

				$validation_rules = array(
					array(
						'field' => 'codeProjet',
						'label' => 'codeProjet',
						'rules' => 'trim'
					),
					array(
						'field' => 'NomProjet',
						'label' => 'NomProjet',
						'rules' => 'trim'
					),
					array(
						'field' => 'titre_poste',
						'label' => 'titre_poste',
						'rules' => 'trim'
					),
					array(
						'field' => 'departement',
						'label' => 'departement',
						'rules' => 'trim'
					),
					array(
						'field' => 'departement2',
						'label' => 'departement2',
						'rules' => 'trim'
					),
					array(
						'field' => 'departement3',
						'label' => 'departement3',
						'rules' => 'trim'
					),
					array(
						'field' => 'departement4',
						'label' => 'departement4',
						'rules' => 'trim'
					),
					array(
						'field' => 'sousprefecture',
						'label' => 'sousprefecture',
						'rules' => 'trim'
					),
					array(
						'field' => 'sousprefecture2',
						'label' => 'sousprefecture2',
						'rules' => 'trim'
					),
					array(
						'field' => 'sousprefecture3',
						'label' => 'sousprefecture3',
						'rules' => 'trim'
					),
					array(
						'field' => 'sousprefecture4',
						'label' => 'sousprefecture4',
						'rules' => 'trim'
					),
					array(
						'field' => 'sousprefecture4',
						'label' => 'sousprefecture4',
						'rules' => 'trim'
					),
					array(
						'field' => 'possedeNumTel',
						'label' => 'possedeNumTel',
						'rules' => 'trim'
					),
					array(
						'field' => 'nametuteurlegal',
						'label' => 'nametuteurlegal',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'nametuteurlegal2',
						'label' => 'nametuteurlegal2',
						'rules' => 'trim'
					),
					array(
						'field' => 'namepere',
						'label' => 'namepere',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'namemere',
						'label' => 'namemere',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'pdispo',
						'label' => 'pdispo',
						'rules' => 'trim'
					),
					array(
						'field' => 'confirmdispo',
						'label' => 'confirmdispo',
						'rules' => 'trim'
					),
					array(
						'field' => 'hasexpcollecte',
						'label' => 'hasexpcollecte',
						'rules' => 'trim'
					),
					array(
						'field' => 'employeur_1',
						'label' => 'employeur_1',
						'rules' => 'trim'
					),
					array(
						'field' => 'year_deb_1',
						'label' => 'year_deb_1',
						'rules' => 'trim'
					),
					array(
						'field' => 'fontion_1',
						'label' => 'fontion_1',
						'rules' => 'trim'
					),
					array(
						'field' => 'projet_name_1',
						'label' => 'projet_name_1',
						'rules' => 'trim'
					),
					array(
						'field' => 'date_jour_decla',
						'label' => 'date_jour_decla',
						'rules' => 'trim'
					),
					array(
						'field' => 'ludeclaration',
						'label' => 'ludeclaration',
						'rules' => 'trim'
					),
					array(
						'field' => 'confirmlieuaffect',
						'label' => 'confirmlieuaffect',
						'rules' => 'trim'
					),
					array(
						'field' => 'lubonneconduite',
						'label' => 'lubonneconduite',
						'rules' => 'trim'
					),
					array(
						'field' => 'lucontrat',
						'label' => 'lucontrat',
						'rules' => 'trim'
					),
					array(
						'field' => 'numero_cni',
						'label' => 'numero_cni',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'type_piece',
						'label' => 'type_piece',
						'rules' => 'trim'
					),
					array(
						'field' => 'name_postulant',
						'label' => 'name_postulant',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'surname_postulant',
						'label' => 'surname_postulant',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'date_naiss',
						'label' => 'date_naiss',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'lieu_naissance',
						'label' => 'lieu_naissance',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'status',
						'label' => 'status',
						'rules' => 'trim'
					),
					array(
						'field' => 'email',
						'label' => 'email',
						'rules' => 'trim|valid_email'
					),
					array(
						'field' => 'sex',
						'label' => 'sex',
						'rules' => 'trim'
					),
					array(
						'field' => 'niveau_etude',
						'label' => 'niveau_etude',
						'rules' => 'trim'
					),
					array(
						'field' => 'last_diplome',
						'label' => 'last_diplome',
						'rules' => 'trim'
					),
					array(
						'field' => 'contact_1',
						'label' => 'contact_1',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'contact_2',
						'label' => 'contact_2',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'contact_22',
						'label' => 'contact_22',
						'rules' => 'trim'
					),
					array(
						'field' => 'first_langue',
						'label' => 'first_langue',
						'rules' => 'trim'
					),
					array(
						'field' => 'second_langue',
						'label' => 'second_langue',
						'rules' => 'trim'
					),
					array(
						'field' => 'third_langue',
						'label' => 'third_langue',
						'rules' => 'trim'
					),
					array(
						'field' => 'choix_projet',
						'label' => 'choix_projet',
						'rules' => 'trim'
					),

				);

				$this->form_validation->set_rules($validation_rules);
				//$this->form_validation->CI =& $this;
				if ($this->form_validation->run()==TRUE) {
					$this->load->helper('security');
					$datainsert = array(
					   'codeProjet' => $this->input->post('codeProjet'),
					   'NomProjet' => $this->input->post('NomProjet'),
					   'titre_poste' => $this->input->post('titre_poste'),
					   'departement' => $this->input->post('departement'),
					   'departement2' => $this->input->post('departement2'),
					   'departement3' => $this->input->post('departement3'),
					   'departement4' => $this->input->post('departement4'),
					   'sousprefecture' => $this->input->post('sousprefecture'),
					   'sousprefecture2' => $this->input->post('sousprefecture2'),
					   'sousprefecture3' => $this->input->post('sousprefecture3'),
					   'sousprefecture4' => $this->input->post('sousprefecture4'),
					   'possedeNumTel' => $this->input->post('possedeNumTel'),
					   'nomtuteurlegal' => $this->input->post('nametuteurlegal'),
					   'nomtuteurlegal2' => $this->input->post('nametuteurlegal2'),
					   'namepere' => $this->input->post('namepere'),
					   'namemere' => $this->input->post('namemere'),
					   'isDisponible' => $this->input->post('pdispo'),
					   'hasAcceptDisponible' => $this->input->post('confirmdispo'),
					   'hasexpcollecte' => $this->input->post('hasexpcollecte'),
					   'exp_structure' => $this->input->post('employeur_1'),
					   'exp_annee' => $this->input->post('year_deb_1'),
					   'exp_intitule_poste' => $this->input->post('fontion_1'),
					   'exp_intitule_projet' => $this->input->post('projet_name_1'),
					   'date_jour_decla' => $this->input->post('date_jour_decla'),
					   'declarahonneur' => $this->input->post('ludeclaration'),
					   'confirmlieuaffectation' => $this->input->post('confirmlieuaffect'),
					   'codebonneconduite' => $this->input->post('lubonneconduite'),
					   'contrat' => $this->input->post('lucontrat'),
					   'numero_cni' => $this->input->post('numero_cni'),
					   'type_piece' => $this->input->post('type_piece'),
					   'name' => strtoupper($this->input->post('name_postulant')),
					   'last_name' => strtoupper($this->input->post('surname_postulant')),
					   'choix_projet' => $this->input->post('choix_projet'),
					   'date_naiss' => $this->input->post('date_naiss'),
					   'lieu_naiss' => strtoupper($this->input->post('lieu_naissance')),
					   'sexe' => $this->input->post('sex'),
					   'niveau_etude' => $this->input->post('niveau_etude'),
					   'last_diplome' => $this->input->post('last_diplome'),
					   'status' => $this->input->post('status'),
					   'email' => $this->input->post('email'),
					   'contact1' => $this->input->post('contact_1'),
					   'contact2' => $this->input->post('contact_2'),
					   'contact3' => $this->input->post('contact_22'),
					   'first_langue_nat' => $this->input->post('first_langue'),
					   'second_langue_nat' => $this->input->post('second_langue'),
					   'third_langue_nat' => $this->input->post('third_langue'),
					);

					$datainsert = $this->security->xss_clean($datainsert);

					$codeDept = $datainsert['departement'];
					$codeSp = $datainsert['sousprefecture'];

					$str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567891011121314151617181920212223242526';
					$shuffled = str_shuffle($str);
					$shuffled = substr($shuffled,1,5);
			
					$matricule = $codeDept.$codeSp.$shuffled;
					 //verification du matricule
					 //echo $matricule;
					$verifmatricule = $this->perso_recrut_m->get_many_by(array("matricule"=> $matricule));
					while(count($verifmatricule)>0){ 
						$shuffled = str_shuffle($str);

						$shuffled = substr($shuffled,1,5);
						$matricule = $codeDept.$codeSp.$shuffled;
						$verifmatricule = $this->perso_recrut_m->get_many_by(array("matricule"=> $matricule));
					}
					
					//creation folder upload
					$this->createFolderUpload($codeDept,$codeSp);

					$name = strtoupper($datainsert['name']);
					$sur_name  = strtoupper($datainsert['last_name']);
			
					$base_name_file = $this->concat_full_name($name,$sur_name);
					$date_jr = strtotime(date('Y-m-d H:i:s'));

					$photo = $this->uploadFile("userFiles1",$base_name_file."_photo_".$date_jr,$codeDept,$codeSp);
					$cv =  $this->uploadFile("userFiles2",$base_name_file."_cv_".$date_jr,$codeDept,$codeSp);
					$doc_last_diplome =  $this->uploadFile("userFiles3",$base_name_file."_dip_".$date_jr,$codeDept,$codeSp);
					$cni =  $this->uploadFile("userFiles4",$base_name_file."_cni_".$date_jr,$codeDept,$codeSp);
					$cnituteur =  $this->uploadFile("userFiles5",$base_name_file."_cnituteur_".$date_jr,$codeDept,$codeSp);
					//$certifresidence =  $this->uploadFile("userFiles6",$base_name_file."_certifresidence_".$date_jr,$codeDept,$codeSp);
					//$casier =  $this->uploadFile("userFiles7",$base_name_file."_casier_".$date_jr,$codeDept,$codeSp);
					//$certifmedical =  $this->uploadFile("userFiles7",$base_name_file."_certifmedical_".$date_jr,$codeDept,$codeSp);

					if($photo && $cv && $doc_last_diplome && $cni && $cnituteur){
						//insert in bd
						$id_projet = $datainsert['choix_projet'];
						$photo = $photo;
						$doc_last_diplome = $doc_last_diplome;
						$cv = $cv;
						$cni = $cni;
						//$cnituteur = $cnituteur;
						//$casier = $casier;
						//$certifmedical = $certifmedical;

						$datainsert['photo'] = $photo;
						$datainsert['cv'] = $cv;
						$datainsert['cni'] = $cni;
						$datainsert['doc_last_diplome'] = $doc_last_diplome;
						$datainsert['cnituteurlegal'] = $cnituteur;
						//$datainsert['certifresidence'] = $certifresidence;
						//$datainsert['casier'] = $casier;
						//$datainsert['certifmedical'] = $certifmedical;
						$datainsert['matricule'] = $matricule;
						$datainsert['dateheureinscrip'] = date("Y-m-d H:i:s");;
						$datainsert['id_projet'] = $id_projet;

					
						if($id_pers_recrut = $this->perso_recrut_m->insert($datainsert)){
							$this->load->model('projet_m');
							$this->load->model('departement_m');
			                $this->load->model('sousprefecture_m');
							$data = new stdClass();
							$reps = $this->projet_m->get_by(array("id"=>$id_projet));
	
							$data = array(
								'id_projet' => $id_projet,
								'projet' => $reps->NomProjet,
								'photo' => $photo,
								'matricule' => $matricule,
								'nom' => html_entity_decode($name),
								'prenoms' =>html_entity_decode($datainsert['last_name']),
								'date_naiss'=>$datainsert['date_naiss'],
								'lieu_naiss'=>html_entity_decode($datainsert['lieu_naiss']),
								'sexe'=>$datainsert['sexe'],
								'contact'=>$datainsert['contact1'],
								'nivo_etude'=>$datainsert['niveau_etude'],
								'specialite'=> $datainsert['last_diplome'],
								'statut'=>  $datainsert['status'],
								'email'=>  $datainsert['email'],
								'lang_parlee'=>$datainsert['first_langue_nat'],
								'lang_parlee_2'=>$datainsert['second_langue_nat'],
								'experiences' => array(),
								'formations' => array(),
								'nom_projet' =>  $datainsert['NomProjet'],
								'titre_poste' =>  $datainsert['titre_poste'],
								'departement' => $this->departement_m->get_by(array("CodDep"=>$departement)),
								'sousprefecture' => $this->sousprefecture_m->get_by(array("CodDep"=>$departement, "CodSp" => $sousprefecture)),
								
							);
							
							$_SESSION['data'] = $data;
							//echo "oke";
			 
							redirect('recap_view');
						}
						else{
							Header("Location: formulaire_view.php"); 
						}
					}
					else{
						if(!$photo){
							$_SESSION["statusMsg"] = "La Photo n'a pas pu êre téléchargée, veuillez respecter le format de fichier et la taille de fichier(1MO)";
						}
						 if(!$cv){
							 $_SESSION["statusMsg"] = "Le CV n'a pas pu êre téléchargé, veuillez respecter le format de fichier et la taille de fichier(1MO)";
						 }
						 if(!$last_diplome){
							 $_SESSION["statusMsg"] = "Le dernier diplôme n'a pas pu êre téléchargé, veuillez respecter le format de fichier et la taille de fichier(1MO)";
						 }
						if(!$cni){
							 $_SESSION["statusMsg"] = "La CNI n'a pas pu êre téléchargé, veuillez respecter le format de fichier et la taille de fichier(1MO)";
						 }
			 
						  Header("Location: formulaire_view.php");
					}
				}
				else{
					//redirect("welcome/ccdcdcdf");
					echo validation_errors(); 
				}	
        }
        else{
           
			//echo $codeProjet;
        }
		
		
	}
	



//function permettant de creer les dossiers d'upload si cela n'existe pas
function createFolderUpload($codeDept,$codeSp){
    if (!file_exists('uploads/files/'.$codeDept)) {
        mkdir('uploads/files/'.$codeDept, 0777, true);
    }

    if (!file_exists('uploads/files/'.$codeDept."/".$codeSp)) {
        mkdir('uploads/files/'.$codeDept."/".$codeSp, 0777, true);
    }
}

//fonction permettant d'upload un fichier
function uploadFile($elt,$file_name,$codeDept,$codeSp){
    $target_dir = "uploads/files/".$codeDept."/".$codeSp."/";
    $extentions = array('png','pdf','jpg','jpeg','JPG','JPEG','PDF','PNG');
    $ext = substr(strrchr($_FILES[$elt]['name'],'.'),1);

    if ($extentions !== FALSE AND !in_array($ext,$extentions)) return FALSE;

//    $target_dir = $target_dir . basename( $_FILES[$elt]["name"]);
    $target_dir = $target_dir . basename( $file_name.".".$ext);
//    $uploadOk=1;
    if (move_uploaded_file($_FILES[$elt]["tmp_name"], $target_dir)) {
//        return $_FILES[$elt]["name"];
        return $file_name.".".$ext;
    } else {
        return FALSE;
    }
}



//methode permettant de concatener le name et le second name
function concat_full_name($first_name,$last_name){
    //enlever les ' dans les differents string
    $first_name = str_replace("\'","",$first_name);
    $last_name = str_replace("\'","",$last_name);
	
	//enlever les " dans les differents string
    $first_name = str_replace("\"","",$first_name);
    $last_name = str_replace("\"","",$last_name);

    // enlever les espaces vides
    $first_name = str_replace(" ","",$first_name);
    $last_name = str_replace(" ","",$last_name);

    $full_name = $first_name."".$last_name;

    return $full_name;
}


//methode permettant de verifier la CNI
public function verify_cni(){
	//requete ajax verification cni
	//cela permettra de verifier les inscriptions double
	if(isset($_POST['numero_cni_ajax'])){
		$this->load->model('perso_recrut_m');
		
		$id_projet = $_SESSION['idProjet'];
		$this->load->helper('security');
		$datainsert = array(
			 'numero_cni' => $this->input->post('numero_cni_ajax'),
			 'id_projet' =>  $_SESSION['idProjet'],
		);

		$datainsert = $this->security->xss_clean($datainsert);
		
		//$where = "numero_cni = '".$numero_cni."' and id_projet= ".$id_projet;
		$datas = $this->perso_recrut_m->get_many_by($datainsert);
		if(count($datas)){
			echo "ok";
		}
		else{
			echo "no";
		}
	}
	else{
		redirect('welcome');
	}
}


//methode permettant de verifier la CNI
public function verify_contact(){
	if(isset($_POST['contact_1_ajax']) && isset($_POST['single_contact'])){
		$this->load->model('perso_recrut_m');
		$id_projet = $_SESSION['idProjet'];
		$this->load->helper('security');
		$datainsert = array(
			 'contact1' => $this->input->post('contact_1_ajax'),
			 'id_projet' =>  $_SESSION['idProjet'],
		);

		$datainsert = $this->security->xss_clean($datainsert);
				
		$datas = $this->perso_recrut_m->get_many_by($datainsert);
		if(count($datas)){
			echo "ok";
		}
		else{
			echo "no";
		}
	}
	else{
		redirect('welcome');
	}
}


public function verify_infoperso(){

	if(isset($_POST['contact_1_ajax']) && isset($_POST['name_postulant_ajax']) && isset($_POST['surname_postulant_ajax'])
	    && isset($_POST['datenaiss_ajax'])){
			$this->load->model('perso_recrut_m');
		$id_projet = $_SESSION['idProjet'];

		$this->load->helper('security');
		$datainsert = array(
			 'name' => $this->input->post('name_postulant_ajax'),
			 'contact1' => $this->input->post('contact_1_ajax'),
			 'last_name' => $this->input->post('surname_postulant_ajax'),
			 'date_naiss' => $this->input->post('datenaiss_ajax'),
			 'id_projet' =>  $_SESSION['idProjet'],
		);

		$datainsert = $this->security->xss_clean($datainsert);
		$datasContact = $this->perso_recrut_m->get_many_by(array('contact1'=>$datainsert['contact1'],'id_projet'=>$datainsert['id_projet']));
		if(count($datasContact)){
			echo "ok";
		}
		else{
			$datas = $this->perso_recrut_m->get_many_by($datainsert);
			if(count($datas)){
				echo "ok";
			}
			else{
				echo "no";
			} 
		}
	}
	else{
		redirect('welcome');
	}
}

    

}
