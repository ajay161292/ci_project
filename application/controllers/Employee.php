<?php
/**
* 
*/
class Employee extends CI_Controller
{
	
	public function __construct($arg = "")
	{
		parent::__construct();
		$this->load->model('TblEmployee');
	}

	public function index(){
		$this->load->view('employee/employee_list');
	}
	public function getallEmployee(){
		$employeedata =  $this->TblEmployee->getallemployee();
		// printr($employeedata,1);
		echo json_encode($employeedata);
	}

	public function addEmployee(){
		// $this->load->model('TblEmployee');
		$result = $this->TblEmployee->addNewEmployee();
		$message['success'] = false;
		$message['type'] = 'add';
		if($result){
			$message['success'] = true;
		}
		echo json_encode($message);
	}
	public function editEmployee(){
		$result = $this->TblEmployee->editEmployee();
		// printr($result,1);
		if($result){
			echo json_encode($result);
		}
	}
	public function updateEmployee(){
		$result = $this->TblEmployee->updateEmployee();
		$message['success'] = false;
		$message['type'] = 'update';
		if($result){
			$message['success'] = true;
		}
		echo json_encode($message);
	}
	public function deleteEmployee(){
		$result = $this->TblEmployee->deleteEmployee();
		$message['success'] = false;
		if($result){
			$message['success'] = true;
		}
		echo json_encode($message);
	}

	public function generatepdf(){
		$data = [];
		$data['name'] = "Ajay Parmar";
		// echo __FILE__.'/tcpdf/tcpdf.php';exit;
		$this->load->library('Pdf');

		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('My Title');
		$pdf->SetHeaderMargin(30);
		$pdf->SetTopMargin(20);
		$pdf->setFooterMargin(20);
		$pdf->SetAutoPageBreak(true);
		$pdf->SetAuthor('Author');
		$pdf->SetDisplayMode('real', 'default');

		$pdf->AddPage();
		$html = "Hi There, My Name is Ajay Parmar. This is testing of TCPDF!";
		$pdf->Write(5, $html);
		$pdf->Output('My-File-Name.pdf', 'I');
		// $this->load->view('employee/getpdf',$data);
	}
}

