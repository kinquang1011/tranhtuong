<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('text');
		$this->load->helper('url');
		$this->load->model("Menu");
		$this->load->model("Submenu");
		$this->load->model("Catalogy");
		
	}

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
	/*	Structure menu
	 * Trang Chu
	 * Ve tranh Tuong
	 * 			+
	 * 			+
	 * 			+
	 * 			+
	 * Lien He
	 * Noi That
	 * */ 
	public function index()
	{
		$menus = $this->Menu->getAllMenu();
		foreach ($menus as $menu){	 
			$subByMenuIds = $this->Submenu->getSubMenu($menu['menu_id']);
			$data['menus'] [$menu['menu_id']] ['Name']= $menu['menu_name'];
			$data['menus'] [$menu['menu_id']] ['SpanClass']= $menu['url_img'];
			$data['menus'] [$menu['menu_id']] ['link']= $menu['menu_id'];
			if(count($subByMenuIds)!=0){
				foreach ($subByMenuIds as $eachSub) {
				$data['menus'] [$menu['menu_id']]['sub_menus'] [$eachSub['sub_id']]= $eachSub;
				$group = $this->Catalogy->getAllCatalogy($eachSub['sub_id']);
				$data['groups'][$eachSub['sub_id']]['name'] = $eachSub['sub_name'];
				$data['groups'][$eachSub['sub_id']]['link'] = $eachSub['sub_id'];
				$data['groups'][$eachSub['sub_id']]['catalogy'] = $group; 
				}
			}
		}
		
		$this->load->view('online/homepage.php',$data);
	}
	public function test()
	{
		echo "abc";
		/*$this->load->database();
		$this->load->dbutil();

		// check connection details
		if( !$this->dbutil->database_exists('nhukom'))
		echo 'Not connected to a database, or database not exists';*/	
	}
}
