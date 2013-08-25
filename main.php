<?php 

/**
 * Plugin name: Woocommerce bulk discount Helper with CSV  importing
 * Author: Mahibul Hasan Sohag
 * 
 * */

define("WOOBULKDISCOUNTUPLOADER_DIR", dirname(__FILE__) . '/');
define("WOOBULKDISCOUNTUPLOADER_URL", plugins_url('/', __FILE__));

include WOOBULKDISCOUNTUPLOADER_DIR . 'classes/class.bulkdiscount.php';
BulkDiscountUploader::init();


?>