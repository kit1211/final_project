<?php

    function number_nocomma($data) {
        return number_format($data, 2, '.', '');
    }

    function genCode(){
        return 'A' . rand(10000, 99999);
    }

    function genInvoice(){
        return 'D' . rand(1000, 9999). chr(rand(97,122));
    }

    function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }