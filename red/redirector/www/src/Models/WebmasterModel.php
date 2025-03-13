<?

namespace App\Models;

use App\Core\DataBase;

class WebmasterModel
{
    protected DataBase $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function offers() : array
    {
        return $this->db->selectAll('offers', condition:('status'), values:(['active']));
    }

    public function subscriptions($user_id) : array
    {
        return $this->db->selectAll('subscriptions', condition:('webmaster_id'), values:([$user_id]));
    }

    public function categoryName($id) : string
    {
        $category = $this->db->select('categories', fields:('name'), condition:('id'), values:($id));

        return $category['name'];
    }
    
    public function getSubscription ($webmaster_id, $offer_id)
    {
        $this->db->insert('subscriptions', [$webmaster_id, $offer_id]);
    }

}   

