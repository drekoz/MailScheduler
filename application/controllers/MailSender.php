<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailSender extends CI_Controller {

    
	public function index()
	{
            
            $this->load->helper('url');
            $this->load->helper('file');
            $this->load->helper('form');
            $this->load->model('User_model');
            
            $data['userList'] = $this->User_model->getUserList();
            
            $this->load->view('stocklist',$data);
	}
        
        
        public function addStockList()
        {
            $this->load->helper('url');
            $this->load->helper('file');
            $this->load->model('stock_model');
            $this->load->helper('form');
            
            $stockName = $this->input->post('stockname');
            $this->stock_model->newStock($stockName);
            
            echo $stockName." was completely added !";
            
            $data['stocklist'] = $this->stock_model->getStockList();
            
            $this->load->view('stocklist',$data);
        }
        
        public function addStockPrice(){
            
            $this->load->helper('url');
            $this->load->helper('file');
            $this->load->model('stock_model');
            $this->load->helper('form');
            
            $stockId = $this->input->post('stockId');
            $stockPrice = $this->input->post('stockPrice');
            $stockVolume = $this->input->post('stockVolume');
            $stockDate = $this->input->post('stockDate');
            
            if($stockDate == ''){
                $stockDate = $this->input->post('stockDateTxt');
            }
            
            $instObj['Id'] = $stockId;
            $instObj['Price'] = $stockPrice;
            $instObj['Volume'] = $stockVolume;
            $instObj['Date'] = $stockDate;
            
            $this->stock_model->addStockPrice($instObj);   
                    
            echo "insert ".$stockId." - ".$stockPrice." - ".$stockVolume." - ".$stockDate." succeced !";
            
            $data['stocklist'] = $this->stock_model->getStockList();
            
            $this->load->view('stocklist',$data);
            
            
        }
}
