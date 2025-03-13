<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\CustomerModel;

class CustomerController extends Controller 
{   
    public $data = [];

    public function __construct()
    {
        $this->model = new CustomerModel();
    }
	
    public function index() 
    {         
        // if (isset($_GET['id'])) {   
            
        //     print_r($_GET);
        //     exit();

        //     $this->edit($_POST);
        // } 

        // if (isset($_GET['id'])) {
        //     $this->edit($_GET['id']);
        // }

        if (isset($_POST['status'])) {
            $this->changeStatus($_POST['id']);
        }

        if (isset($_POST['customerStatistic'])) {
            $this->getStatistic($_POST);
        }

        //$data = $this->model->get_data();  

        $this->data['categories'] = $this->model->categories();

        //$this->data['offers'] = $this->model->allOffers();

        $this->data['offers']['active'] = $this->model->activeOffers();

        $this->data['offers']['archived'] = $this->model->archivedOffers();

        
        // print_r($this->data['offers']['archived']);
        // exit();

        $this->view('customer.php', 'template.php', $this->data, 'ЛК рекламодателя');     
    
    }
    
    public function add() 
    {
        $this->data['categories'] = $this->model->categories();

        if (isset($_POST['create'])) {            

            $this->model->createOffer($_POST);

            $offer = $this->model->offer($_SESSION['user_id']);           

            
            // print_r($offer);
            // exit();

            $this->redirect('/customer');

        //echo json_encode($this->model->createOffer($data), JSON_UNESCAPED_UNICODE);  
        }   
        
        $this->view('components/offer/add.php', 
                    'template.php', 
                    $this->data, 
                    'Добавление оффера'
                );     
    }

    public function edit($payload) 
    {     
        

        //if (isset($_GET['id'])) {   
            
           //print_r($_GET);
            //exit();

            //$this->edit($_POST);
        //} 

        $id = $payload[0];

        $this->data['offer'] = $this->model->offer(offer_id: $id);
        
        $this->data['categories'] = $this->model->categories();

        
           //print_r($this->data['offer']);
           // exit();

        // $this->update($id);

        $this->view('components/offer/edit.php', 
                    'template.php', 
                    //$payload[0],
                    $this->data, 
                    'Редактирование оффера'
                );    

        //echo json_encode($this->model->editOffer($data), JSON_UNESCAPED_UNICODE);              
    }

    public function update()
    {
        if (isset($_POST['update'])) {
            
            $this->model->update($_POST);

            $this->redirect('/customer');

        }; 
    }

    public function changeStatus($id) : void
    {
        echo json_encode($this->model->getStatus($id));          
    }
    
    public function getStatistic(array $data) : void
    {
        echo json_encode($this->model->getStatistic($data));          
    }
}
