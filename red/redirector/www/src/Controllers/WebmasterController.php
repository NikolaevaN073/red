<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\WebmasterModel;
use App\Services\Offer;

class WebmasterController extends Controller 
{
    public $data = [];

    public function __construct()
    {
        $this->model = new WebmasterModel();
    }



    public function index() 
    {             
        $offers = [];

        $items = $this->model->offers();        
        
        foreach ($items as $item) {
            
            $offers[] = new Offer(
                $item['id'],
                $item['name'],
                $item['description'],
                $item['price'],
                $item['url'],
                $item['status'],
                [
                    'category_id' => $item['category_id'],
                    'categoryName' => $this->model->categoryName($item['category_id'])
                ]
                
            );        
        }
        
        $this->data['offers'] = $offers;     
        
        $this->data['subscriptions'] = $this->model->subscriptions($this->session()->get('user_id'));
        
        

        $this->view('webmaster.php', 'template.php', $this->data, 'ЛК веб-мастера');     
        
    }

    public function list ()
    {
        $offers = [];

        $items = $this->model->offers();        
        
        foreach ($items as $item) {
            
            $offers[] = new Offer(
                $item['id'],
                $item['name'],
                $item['description'],
                $item['price'],
                $item['url'],
                $item['status'],
                [
                    'category_id' => $item['category_id'],
                    'categoryName' => $this->model->categoryName($item['category_id'])
                ]
                
            );        
        }
        
        $this->data['offers'] = $offers;            

        $this->view('components/subscriptions/list.php', 'template.php', $this->data, 'Доступные офферы');     
    }

    public function getSubscription()
    {
        if (isset($_POST['create'])) {

            $this->model->getSubscription($this->session()->get('user_id'), $_POST['offer_id']);

            $this->redirect('/webmaster');

        }
    }

    //public function offerList()
    //{
    //    return $this->model->offers();
    //}

    // public function create($id)
    // {     
    //     echo json_encode($this->model->get_subscription($id), JSON_UNESCAPED_UNICODE);              
    // }

    // public function delete($id)
    // {     
    //     echo json_encode($this->model->delete_subscription($id), JSON_UNESCAPED_UNICODE);              
    // }
   
    // public function get_refer_url($offer_id, $user_id)
    // {
    //     echo json_encode($this->model->get_url($offer_id, $user_id));          
    // }

    // public function get_statistic_data(array $data)
    // {
    //     echo json_encode($this->model->get_statistic($data));          
    // }
}
