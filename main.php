<?php 

/**
 * Plugin name: Woocommerce bulk discount Helper with CSV  importing
 * Author: Mahibul Hasan Sohag
 * Description: It works with WooCommerce Bulk Discount plugin. It helps to upload csv a to allow bulk discount for many products. A sample csv is available inside the plugin folder 
 * Author URI: http://sohag07hasan.elance.com
 * plugin uri: http://assessment-exercises.co.uk/
 * */

define("WOOBULKDISCOUNTUPLOADER_DIR", dirname(__FILE__) . '/');
define("WOOBULKDISCOUNTUPLOADER_URL", plugins_url('/', __FILE__));

include WOOBULKDISCOUNTUPLOADER_DIR . 'classes/class.bulkdiscount.php';
BulkDiscountUploader::init();


?>