<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once( FCPATH.'plugins/phpqrcode/phpqrcode.php' );

class Ci_Qrcode {

	function __construct() {
    }

    function png($str){
        return QRcode::png($str, false, QR_ECLEVEL_L, 15, 1);
    }

}
