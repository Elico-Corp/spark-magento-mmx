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
        $wishlist = array(
            'store_id' => (int) $res[0]['store_id'],
            'wishlist_id' => (int) $res[0]['wishlist_id'],
            'id' => (int) $res[0]['wishlist_id'],
            'wishlist' => (int) $res[0]['multiwishlist_is_main'],
            'customer_id' => (int) $res[0]['customer_id'],
            'date_order' => $res[0]['date_order'],
            'items' => array());
        if(isset($res[0]['product_id'])) {
            $wishlist['items'] = $res;
        }
        return $wishlist;
    }

    public function search($filters=null,$store_view=null) {
         $reservation = False;
         if(is_array($filters) && isset($filters['reservation'])) {
            $reservation = $filters['reservation'];
         }
         $customers = Mage::getModel('customer/customer')->getCollection();
         $wishlists = array();
         $wishlist_obj = Mage::getModel('itoris_mwishlist/wishlist');
         return $wishlist_obj->getAllIds($reservation);
    }
}
?>
