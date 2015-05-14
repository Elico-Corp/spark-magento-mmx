<?php
class ElicoCorp_OpenERPConnector_Model_Mwishlist_Api extends Mage_Checkout_Model_Api_Resource
{

    public function update($wishlistId, $data, $store = null) {
        return 'TODO';
    }
    
    public function info($id) {
        $res = Mage::getModel('itoris_mwishlist/wishlist')->getById($id);
        if(count($res) == 0) {
            return $res;
        }
        return array(
            'id' => $res[0]['id'],
            'wishlist' => $res[0]['multiwishlist_is_main'],
            'customer_id' => $res[0]['multiwishlist_customer_id'],
            'items' => $res);
    }

    public function search($filters = array(),$store_view=null) {
         $customers = Mage::getModel('customer/customer')->getCollection();
         $wishlists = array();
         $wishlist_obj = Mage::getModel('itoris_mwishlist/wishlist');
         return $wishlist_obj->getAllIds();
    }
}
?>
