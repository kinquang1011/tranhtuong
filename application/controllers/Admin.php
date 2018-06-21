<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('text');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model("Menu");
		$this->load->model("Submenu");
		$this->load->model("Catalogy");
	}

	public function index()
	{
		if ($this->is_logged_in()) {
			$menus = $this->Menu->getMenuExclude();
			/* vetranhtuong + noithat */
			for ($i = 0; $i < count($menus); $i++) {
			$data['mainItem'][$i]['link'] = $menus[$i]['menu_id'];
			$data['mainItem'][$i]['name'] = $menus[$i]['menu_name'];	
			}
			
			$this->load->view("admin/managePage",$data);
		} else {
			$data['title'] = "Trang Đăng Nhập";
			$this->load->view("admin/vLoginAdmin", $data);
		}
	}
	public function getDataDropdown2($menuId){
		$data =  $this->Submenu->getSubMenu($menuId);
		echo json_encode($data);
	}
	public function getDataTable($subId){
		$data =  $this->Catalogy->getAllCatalogy($subId);
		echo json_encode($data);
	}
	public function reload($idImage,$subId){
		$this->Catalogy->deleteImage($idImage);
		$data =  $this->Catalogy->getAllCatalogy($subId);
		echo json_encode($data);
	}



	public function login()
	{
		if ($this->is_logged_in()) {
			$this->load->view("vAdmin", $data);
		} else {
			$userName = $this->input->post('userName', TRUE);
			$password = $this->input->post('password', TRUE);
			if (strcmp($userName, "kinquang") == 0 && strcmp($password, "nhukom") == 0) {
				$this->session->set_userdata($userName, $password);
			}
			redirect("admin/index", "refresh");
		}

	}

	public function is_logged_in()
	{
		//get session to check session is kinquang??
		$user = $this->session->userdata('kinquang');
		if ($user) {
			return true;
		} else {
			return false;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('kinquang');
	}

	public function AddImage(){
		if ($this->is_logged_in()) {

			$menus = $this->Menu->getMenuExclude();
			/* vetranhtuong + noithat */
			for ($i = 0; $i < count($menus); $i++) {
				$data['mainItem'][$i]['link'] = $menus[$i]['menu_id'];
				$data['mainItem'][$i]['name'] = $menus[$i]['menu_name'];
			}
			/*Handle upload Start*/
			// If file upload form submitted
			
			if( isset($_POST['fileSubmit']) )
			{
				if($this->input->post('fileSubmit') && !empty($_FILES['files']['name'])){
					$filesCount = count($_FILES['files']['name']);
					for($i = 0; $i < $filesCount; $i++){
						$_FILES['file']['name']     = $_FILES['files']['name'][$i];
						$_FILES['file']['type']     = $_FILES['files']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$_FILES['file']['error']     = $_FILES['files']['error'][$i];
						$_FILES['file']['size']     = $_FILES['files']['size'][$i];
						
						// File upload configuration
						$uploadPath = 'uploads/files/';
						$config['upload_path'] = $uploadPath;
						$config['allowed_types'] = 'jpg|jpeg|png|gif';

						// Load and initialize upload library
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						// Upload file to server
						if($this->upload->do_upload('file')){

							// Uploaded file data
							$fileData = $this->upload->data();
							
							
							$uploadData[$i]['url_img'] = $fileData['file_name'];
							$uploadData[$i]['sub_id'] = $_POST['subIdxx'];
							$uploadData[$i]['place'] = $_POST['place'];
							$uploadData[$i]['datime'] = date("Y-m-d H:i:s");
						}
					}

					if(!empty($uploadData)){
						// Insert files data into the database
						$insert = $this->Catalogy->addImage($uploadData);

						// Upload status message
						$statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
						//$this->session->set_flashdata('statusMsg',$statusMsg);
					}
				}
				$this->load->view("admin/managePage",$data);
			}else{
				$this->load->view("admin/addimage",$data);
			}
		} else {
			$data['title'] = "Trang Đăng Nhập";
			$this->load->view("admin/vLoginAdmin", $data);
		}
	}
	
	


}