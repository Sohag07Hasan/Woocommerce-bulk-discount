<?php 
	class BulkDiscountUploader{
		
		static $discounts = array(
					 1 => array('minimum_number' => 6, 'discount_percentage' => 20),
					 2 => array('minimum_number' => 16, 'discount_percentage' => 30),
					 3 => array('minimum_number' => 25, 'discount_percentage' => 40)
				);
		
		const discount_msg_key = "_bulkdiscount_text_info";
		
		static function init(){
			add_action('admin_menu', array(get_class(), 'admin_menu'), 100);
		}
		
		static function admin_menu(){
			add_submenu_page('edit.php?post_type=product', ucwords('dicount manager'), 'Bulk Discount', 'manage_woocommerce', 'bulk_discount', array(get_class(), 'add_bulk_discount'));
		}
		
		static function add_bulk_discount(){
			include WOOBULKDISCOUNTUPLOADER_DIR . 'includes/add_bulk_discount.php';
		}
		
		//get csv class instance
		static function get_csv_parser(){
			if(!class_exists('parseCSV')){
				include  WOOBULKDISCOUNTUPLOADER_DIR . 'classes/parsecsv.lib.php';
			}
		
			return new parseCSV();
		}
		
		//main function to attach discount
		static function attach_discount($info){
			$sku = $info[0];
			$message = $info[1];
			
			$post_id = self::get_post_id_from_sku($sku);
			
			update_post_meta($post_id, self::discount_msg_key, $info[1]);
			
			foreach(self::$discounts as $key => $discount){
				update_post_meta($post_id, "_bulkdiscount_quantity_$key", $discount['minimum_number']);
				update_post_meta($post_id, "_bulkdiscount_discount_$key", $discount['discount_percentage']);
			}
			
			return true;
		}
		
		
		//get post_id
		static function get_post_id_from_sku($sku = null){
			global $wpdb;
			return $wpdb->get_var("select post_id from $wpdb->postmeta where meta_key = '_sku' and meta_value = '$sku'");
		} 
		
	}
?>