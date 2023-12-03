<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $session;
    
    public function __construct(){
        $this->session = \Config\Services::session();
    }

    public function index(): string
    {
        $data = [
            'title'     => 'บริการจัดการร้าน DESSLAND POS',
            'layouts'   => 'layouts/pos'
        ];
        return view('main', $data);
    }

    public function customer(){
    
        $data = [
            'title'     => 'จัดการสมาชิก - บริการจัดการร้าน DESSLAND POS',
            'layouts'   => 'layouts/customer'
        ];
        return view('main', $data);
    }

    public function product(){
    
        $data = [
            'title'     => 'จัดการสินค้า - บริการจัดการร้าน DESSLAND POS',
            'layouts'   => 'layouts/product'
        ];
        return view('main', $data);
    }

    public function pos(){
        
        $data = [
            'title'     => 'บริการจัดการร้าน DESSLAND POS',
            'layouts'   => 'layouts/pos'
        ];
        return view('main', $data);
    }

    public function signin(){
        $data = [
            'title'     => 'เข้าสู่ระบบ - บริการจัดการร้าน DESSLAND POS',
            'layouts'   => 'layouts/signin'
        ];
        return view('main', $data);
    }

    public function billing($document = null){
        if($document == null){
            return redirect()->to(base_url());
        }else{
            $data = [
                'title'     => 'Billing - บริการจัดการร้าน DESSLAND POS',
                'layouts'   => 'layouts/billing'
            ];
            return view('main', $data);
        }
        
    }
    
    public function signout(){
        $this->session->destroy();
        return redirect()->to(base_url('home/signin'));
    }

    public function hello(): string
    {
        return 'Hello World!';
    }
}
