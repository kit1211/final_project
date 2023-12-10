<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
    /* 
        class Api extends BaseController  คือการสืบทอดคุณสมบัติของ BaseController ไปยังคลาส Api โดยคลาส Api จะสามารถเรียกใช้คุณสมบัติของ BaseController ได้ทั้งหมด
        ตัวอย่าง คลาส Api สามารถเรียกใช้คุณสมบัติของ BaseController ได้ดังนี้
        $this->request
        $this->db
        $this->session
        เป็นต้น
    */
class Api extends BaseController {

    protected $request;
    protected $db;
    protected $session;
    
    public function __construct()
    {
        $this->request  = \Config\Services::request();
        $this->db       = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function signin()
    {
        $json = $this->request->getJSON();
    
        $query = $this->db->table('users')->getWhere(['uUsername' => $json->username])->getRow();
        if ($query) {
            if (password_verify($json->password, $query->uPassword)) {
                $newdata = [
                    'username'      => $json->username,
                    'isLoggedIn'    => true,
                ];
                $this->session->set($newdata);
                return json_encode(['status' => 'success', 'msg' => 'เข้าสู่ระบบสำเร็จ']);
            } else {
                return json_encode(['status' => 'error', 'msg' => 'รหัสผ่านไม่ถูกต้อง']);
            }
        } else {
            return json_encode(['status' => 'error', 'msg' => 'ไม่พบชื่อผู้ใช้งาน']);
        }
    }

    public function addCustomer(){
        $json = $this->request->getJSON();

    
        $builder = $this->db->table('customers')->where('cPhone', $json->phone)->get()->getResultArray();
        if (count($builder) > 0) {
            return json_encode(['status' => 'error', 'msg' => 'เบอร์โทรศัพท์นี้มีได้ถูกใช้งานแล้ว']);
        }else{
            $builder = $this->db->table('customers')->where('cEmail', $json->email)->get()->getResultArray();
            if (count($builder) > 0) {
                return json_encode(['status' => 'error', 'msg' => 'อีเมล์นี้มีได้ถูกใช้งานแล้ว']);
            }else{
                $this->db->table('customers')->insert([
                    'cCode'         =>  genCode(),
                    'cFname'        =>  $json->fname,
                    'cLname'        =>  $json->lname,
                    'cEmail'        =>  $json->email,
                    'cPhone'        =>  $json->phone,
                    'cAddress'      =>  $json->adress,
                    'cNote'         =>  $json->note,
                    'cCreateBy'     =>  $this->session->get('username'),
                    'cCreateAt'     =>  time(),
                ]);
                return json_encode(['status' => 'success', 'msg' => 'การเพิ่มลูกค้าเสร็จสิ้น']);
            }
        }
    }

    public function getCustomer(){
        $query = $this->db->table('customers')->get()->getResultArray();
        return json_encode([$query]);
    }

    public function getCustomerDetail(){
        $json = $this->request->getJSON();
        $query = $this->db->table('`customers`')->getWhere(array('`cId`' => $json->id))->getResultArray();
        if (count($query) > 0) {
            return json_encode(['status' => 'success', 'data' => $query]);
        }else{
            return json_encode(['status' => 'error', 'msg' => 'ไม่พบข้อมูลลูกค้า']);
        }
    }

    public function editCustomer(){
        $json = $this->request->getJSON();
        $id         = $json->id; 
        $fname      = $json->fname; 
        $lname      = $json->lname; 
        $email      = $json->email; 
        $phone      = $json->phone; 
        $adress     = $json->adress; 
        $note       = $json->note; 

        $this->db->table('customers')->where('cId ', $id)->update([
            'cFname'    =>  $fname,
            'cLname'    =>  $lname,
            'cAddress'  =>  $adress,
            'cPhone'    =>  $phone,
            'cEmail'    =>  $email,
            'cNote'     =>  $note,
        ]);
        return json_encode(['status' => 'success', 'msg' => 'แก้ไขข้อมูลลูกค้าเสร็จสิ้น']);      
    }

    public function deleteCustomer(){
        $json = $this->request->getJSON();
        $this->db->table('customers')
            ->delete(array('`customers`.`cId`' => $json->id));
        return json_encode(['status' => 'success', 'msg' => 'ลบสมาชิกเสร็จสิ้น']);
    }


    // ----------------------------------------------

    public function addProduct()
    {
        $productName = $this->request->getPost('productName');
        $productType = $this->request->getPost('productType');
        $productPrice = $this->request->getPost('productPrice');
        $productImage = $this->request->getFile('productImage');
    
        if ($productImage->isValid() && !$productImage->hasMoved()) {
            $newName = $productImage->getRandomName();
            $productImage->move(ROOTPATH . 'public/uploads', $newName);

            $this->db->table('product')->insert([
                'pName'         =>  $productName,
                'pPrice'        =>  number_nocomma($productPrice),
                'pImage'        =>  $newName,
                'pTag'          =>  $productType,
                'pToken'        =>  uniqid(),
                'pCreateBy'     =>  $this->session->get('username'),
                'pCreateAt'     =>  time(),
            ]);
            return json_encode(['status' => 'success', 'msg' => 'การเพิ่มสินค้าเสร็จสิ้น']);
        } else {
            return json_encode(['status' => 'error', 'msg' => 'ไม่สามารถอัพโหลดรูปภาพได้']);
        }
    }

    public function getProduct(){
        $query = $this->db->table('product')->get()->getResultArray();
        return json_encode([$query]);
    }

    public function deleteProduct(){
        $json = $this->request->getJSON();
        $this->db->table('product')
            ->delete(array('`product`.`pId`' => $json->id));
        return json_encode(['status' => 'success', 'msg' => 'ลบสินค้าเสร็จสิ้น']);
    }

    public function getProductById(){
        $json = $this->request->getJSON();
        $query = $this->db->table('`product`')->getWhere(array('`pId`' => $json->id))->getResultArray();
        return json_encode([$query]);
    }

    public function editProduct()
    {
        $productId      = $this->request->getPost('productId');
        $productName    = $this->request->getPost('productName');
        $productType    = $this->request->getPost('productType');
        $productPrice   = $this->request->getPost('productPrice');
        $productImage   = $this->request->getFile('productImage');
    
        if (!empty($productImage)) {
            if ($productImage->isValid() && !$productImage->hasMoved()) {
                $newName = $productImage->getRandomName();
                $productImage->move(ROOTPATH . 'public/uploads', $newName);
                $this->db->table('product')->where('pId', $productId)->update([
                    'pName'         =>  $productName,
                    'pPrice'        =>  number_nocomma($productPrice),
                    'pImage'        =>  $newName,
                    'pTag'          =>  $productType,
                ]);
                return json_encode(['status' => 'success', 'msg' => 'การเพิ่มสินค้าเสร็จสิ้น']);
            } else {
                return json_encode(['status' => 'error', 'msg' => 'ไม่สามารถอัพโหลดรูปภาพได้']);
            }
        } else {
            $this->db->table('product')->where('pId', $productId)->update([
                'pName'         =>  $productName,
                'pPrice'        =>  number_nocomma($productPrice),
                'pTag'          =>  $productType,
            ]);
            return json_encode(['status' => 'success', 'msg' => 'แก้ไขสินค้าเสร็จสิ้น']);            
        }
    }


    // ----------------------------------------------
    public function getProductPos($type){
        if($type == 'all'){
            $query = $this->db->table('product')->get()->getResultArray();
            return json_encode([$query]);
        }else{
            $builder = $this->db->table('product')->where('pTag', $type)->get()->getResultArray();
            return json_encode([$builder]);
        }
    }
    
    public function checkOut(){
        $json           = $this->request->getJSON();
        $json           = json_decode(json_encode($json), true);
        $token          = gen_uuid();
        $billCode       = strtoupper(genInvoice());
        try {
            foreach ($json['data'] as $key => $value) {
                $this->db->table('billing')->insert([
                   'bProductName'       => $value['pName'],
                   'bInvoiceNumber'     => $billCode,
                   'bQuantity'          => $value['pQty'],
                   'bItemPrice'         => $value['pPrice'],
                   'bSubTotalRow'       => $value['pPrice'] * $value['pQty'],
                   'bVat'               => $value['pPrice'] * 0.07,
                   'bTotal'             => $value['pPrice'] * $value['pQty'] * (1 + 0.07),
                   'bCustomerCode'      => $json['customer'] ?? null,
                   'bDateInvoice'       => $json['dateInoive'],
                   'bCreateBy'          => $this->session->get('username'),
                   'bCreateAt'          => time(),
                   'bTokenBill'         => $token,
                ]);
            }
            return json_encode(['status' => 'success', 'msg' => 'การเพิ่มสินค้าเสร็จสิ้น', 'billUrl' => $token]);
        } catch (\Throwable $th) {
            return json_encode(['status' => 'error', 'msg' => $th->getMessage()]);
        }
    }


    public function getBill(){
        $json = $this->request->getJSON();
        $builder = $this->db->table('billing')->where('bTokenBill', $json->token)->get()->getResultArray();
        return json_encode($builder);
    }

    public function checkCustomerCode(){
        $json = $this->request->getJSON();
        $json = json_decode(json_encode($json), true);

        $builder = $this->db->table('customers')->where('cCode', $json['customer'])->get()->getResultArray();
        if (count($builder) > 0) {
            return json_encode(['status' => 'success', 'msg' => 'success']);
        }else{
            return json_encode(['status' => 'error', 'msg' => 'ไม่พบรหัสลูกค้าในระบบ']);
        }
    }

    public function getCustomerBillDetail(){
        $json = $this->request->getJSON();
        $json = json_decode(json_encode($json), true);
        $builder = $this->db->table('customers')->where('cCode', $json['customer'])->get()->getResultArray();
        return json_encode(['status' => 'success', 'data' => $builder]);
    }

    public function dateToUnix($value){
        $date = Time::createFromFormat('d/m/Y', $value, 'GMT');
        return $date->getTimestamp();
    }
}
