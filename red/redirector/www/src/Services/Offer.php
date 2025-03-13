<?php

namespace App\Services;

class Offer 
{
    public function __construct(
        public $id,    
        public $name,
        public $description,
        public $price,
        public $url,
        public $status,
        public $category = []
    ) { }

    public function id ()
    {
        return $this->id;
    }
    
    public function name ()
    {
        return $this->name;
    }

    public function price ()
    {
        return $this->price;
    }

    public function url ()
    {
        return $this->url;
    }

    public function status ()
    {
        return $this->status;
    }

    public function category()
    {
        return $this->category;
    }

    // public function create ()
    // {           
    //     $offer_data = [
    //         'category_id' => (int)$this->category_id,
    //         'offer_name'  => $this->offer_name,
    //         'price'       => (int)$this->price,
    //         'url'         => $this->url
    //     ];
    //     $this->db->insert('offers', $offer_data); 
    //     $this->create_user_offer(); 
    //     $offer_data['id'] = $this->id;
    //     return $offer_data;                    
    // }  

    // public function create_user_offer ()
    // {
    //     if (isset($_COOKIE['user_id'])) {
    //         $query = "SELECT id FROM offers WHERE offer_name = ? AND url = ?";
            
    //         $this->id = $this->db->get_field($query, [
    //             $this->offer_name,
    //             $this->url
    //         ]);
            
    //         $user_offer = [
    //             'user_id'  => $_COOKIE['user_id'],
    //             'offer_id' => $this->id
    //         ];
    //         $this->db->insert('user_offer', $user_offer);
    //     }
    // }
    
    // public function disable ($offer_id)
    // {        
    //     $query = "UPDATE offers SET status = 'N' WHERE id = ?";
    //     $this->db->update_field($query, [$offer_id]);        
    //     return 'N';
    // }

    // public function anable ($offer_id)
    // {        
    //     $query = "UPDATE offers SET status = 'A' WHERE id = ?";
    //     $this->db->update_field($query, [$offer_id]);        
    //     return 'A';
    // }

    // public function check_status ($offer_id)
    // {
    //     $query = "SELECT status FROM offers WHERE id = ?";
    //     $status = $this->db->get_field($query, [$offer_id]);
    //     return $status === 'A' ? true : false;
    // }

    // public function get_subscription ($offer_id, $user_id) 
    // {
    //     $query = "SELECT * FROM subscriptions 
    //         JOIN user_offer ON subscriptions.offer_id = user_offer.offer_id
    //         WHERE user_offer.offer_id = ? AND user_offer.user_id = ?";
    //     return $this->db->get_data_field($query, [$offer_id, $user_id]);        
    // }
}
