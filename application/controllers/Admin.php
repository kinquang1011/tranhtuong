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





	public function QuanLyBaiViet($codeCatalogy, $codeSubCatalogy)
	{
		if ($this->is_logged_in()) {
			$data->title = "Trang quản lý bài viết";
			$data->menu = $this->MDanhmuc->getAllDanhmuc();
			$data->listDanhMucCon = $this->MDanhmuccon->getDanhMucConByCodeC($codeCatalogy);
			$data->listBaiViet = $this->MBaiviet->getBaiVietBySubC($codeSubCatalogy);
			$data->codeCatalogy = $codeCatalogy;
			$data->codeSubCatalogy = $codeSubCatalogy;
			$this->load->view("vAdmin", $data);
		} else {
			$data->title = "Trang Đăng Nhập";
			$this->load->view("vLoginAdmin", $data);
		}
	}
	public function addBaiviet()
	{
		$this->MBaiviet->insertBaiViet();
		/*$a = now();
		 print_r($a);*/
		/*	$html = file_get_html('http://login.me.zing.vn/');
		 $code = $html->find('.zmlogin_heading', 0);
		 $a->hello = $code->plaintext;
		 $this->load->view("test",$a);*/
	}

	public function loadSubCatalogy($id)
	{
		$data = $this->MDanhmuccon->getDanhMucConByCodeC($id);
		?>
<div class="form-group"><label for="pwd">Sub Catalogy: </label> <select
	id="optCodeSubCatalogy" name="subCatalogy"
	class="optional overall classes" onchange="loadDatatable(this.value)"
	onfocus="this.selectedIndex = -1;">
	<?php
	foreach ($data as $c) {
		?>
	<option value="<?php echo $c['CodeSubCatalogy'] ?>"><?php echo $c['Name'] ?></option>
	<?php }
	?>
</select></div>
	<?php
	}

	public function loadDataTableBaiViet($codeSubC)
	{
		$data = $this->MBaiviet->getBaiVietBySubC($codeSubC);
		$listBaiViet = $this->MBaiviet->getBaiVietBySubC($codeSubC);
		for ($i = 0; $i < count($listBaiViet); $i++) {
			?>
<tr height="20px">
	<td><?php echo $i + 1 ?></td>
	<td><?php echo $listBaiViet[$i]['DateTime']; ?></td>
	<td><?php echo $listBaiViet[$i]['Title']; ?></td>
	<td><?php $str = strip_tags($listBaiViet[$i]['Content']);
	echo word_limiter($str, 28);
	?></td>
	<td>
	<div class="radio"><label><input name="radio" type='radio'></label></div>
	</td>
	<td>
	<form
		action="<?php echo base_url() . "admin/EditArticle/" . $listBaiViet[$i]['ID'] ?>"
		method="post">
	<button class="btn btn-link" type="submit" onclick="submitButton()"><img
		src='http://giayphepthucpham.vn/public/images/pencil-icon.png'
		alt='image' /></button>
	<a
		onclick="callDialogDelete(<?php echo $listBaiViet[$i]['ID'] ?>,'<?php echo $listBaiViet[$i]['CodeSubCatalogy'] ?>')"><img
		src='http://giayphepthucpham.vn/public/images/green-cross-icon.png'
		alt='image' /></a></form>
	</td>
</tr>
	<?php
		}
		?>
</tbody>
		<?php
	}

	public function input()
	{
		if ($this->is_logged_in()) {
			$data->Title = $_POST["title"];
			$data->DateTime = date("Y-m-d H:i:s");
			$data->Content = $_POST['content'];
			$data->Catalogy = $_POST['Catalogy'];
			$data->subCatalogy = $_POST['subCatalogy'];
			if (isset($_POST['ckbPriority'])) {
				$data->Priority = 1;
				$recordPriority = $this->MBaiviet->checkPriority($data->subCatalogy);
				if (!$recordPriority) {
				} else {
					$this->MBaiviet->updatePriority($recordPriority[0]['ID']);
				}
			} else {
				$data->Priority = 0;
			}
			$flag = $this->MBaiviet->insertBaiViet($data);
			if ($flag) {
				redirect("/admin/quanLyBaiViet/$data->Catalogy/$data->subCatalogy", "refresh");

			} else {
			}

		} else {
			$data->title = "Trang Đăng Nhập";
			$this->load->view("vLoginAdmin", $data);
		}

	}

	public function AddArticle()
	{
		$data->title = "Thêm Bài Viết";
		$data->menu = $this->MDanhmuc->getAllDanhmuc();
		$data->listDanhMucCon = $this->MDanhmuccon->getDanhMucConByCodeC($data->menu[1]['CodeCatalogy']);
		$this->load->view("vAddArticle", $data);
	}

	//parameter Id Baiviet
	public function EditArticle($id)
	{
		$data->title = "Sửa Bài Viết";
		$baiViet = $this->MBaiviet->getBaiVietById($id);
		$data->baiViet = $baiViet;
		$subCatalogy = $this->MDanhmuccon->getDanhMucConByID($baiViet->CodeSubCatalogy);
		$data->subCatalogy = $subCatalogy;
		$data->catalogy = $this->MDanhmuc->getDanhMucByID($subCatalogy['CodeCatalogy']);
		$this->load->view("vEditArticle", $data);
	}

	public function editsuccess()
	{
		$data->catalogy = $_POST['lblCatalogy'];
		$data->subCatalogy = $_POST['lblSubCatology'];
		$data->title = $_POST['title'];
		if (isset($_POST['chkPriority'])) {
			$data->Priority = 1;
			$recordPriority = $this->MBaiviet->checkPriority($data->subCatalogy);
			if (!$recordPriority) {
			} else {
				$this->MBaiviet->updatePriority($recordPriority[0]['ID']);
			}
		} else {
			$data->Priority = 0;
		}
		$data->dateTime = $_POST['dateTime'];
		$data->content = $_POST['content'];
		$data->idBaiViet = $_POST['idBaiViet'];
		$this->MBaiviet->updateBaiViet($data);
		redirect("admin/QuanLyBaiViet/$data->catalogy/$data->subCatalogy");
	}

	public function deleteBaiViet($id, $codeSubC)
	{
		$this->MBaiviet->deleteBaiViet($id);
		$listBaiViet = $this->MBaiviet->getBaiVietBySubC($codeSubC);
		for ($i = 0; $i < count($listBaiViet); $i++) {
			?>
<tr height="20px">
	<td><?php echo $i + 1 ?></td>
	<td><?php echo $listBaiViet[$i]['DateTime']; ?></td>
	<td><?php echo $listBaiViet[$i]['Title']; ?></td>
	<td><?php $str = strip_tags($listBaiViet[$i]['Content']);
	echo word_limiter($str, 28);
	?></td>
	<td>
	<div class="radio"><label><input name="radio" type='radio'></label></div>
	</td>
	<td>
	<form
		action="<?php echo base_url() . "admin/EditArticle/" . $listBaiViet[$i]['ID'] ?>"
		method="post">
	<button class="btn btn-link" type="submit" onclick="submitButton()"><img
		src='http://giayphepthucpham.vn/public/images/pencil-icon.png'
		alt='image' /></button>
	<a
		onclick="callDialogDelete(<?php echo $listBaiViet[$i]['ID'] ?>,'<?php echo $listBaiViet[$i]['CodeSubCatalogy'] ?>')"><img
		src='http://giayphepthucpham.vn/public/images/green-cross-icon.png'
		alt='image' /></a></form>
	</td>
</tr>
	<?php
		}
		?>
</tbody>
		<?php
	}


}