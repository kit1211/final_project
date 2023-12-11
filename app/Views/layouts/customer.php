<section class="section-content padding-y-sm bg-default mt-5">
    <div class="container">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item th-400"><a href="#">DESSLAND</a></li>
                <li class="breadcrumb-item active th-400" aria-current="page">Customer Manage</li>
            </ol>
        </nav>
        <div class="card mt-3" >
            <div class="card-body">
                <h5 class="card-title th-400">จัดการสมาชิกในระบบ</h5>
                <p class="card-text th-400">พนักงานสามารถจัดการ <b>"เพิ่ม/ลบ/แก้ไข"</b> สมาชิกได้ที่นี่</p>
                <button type="button" class="btn btn-outline-success pl-2 pr-2 mb-3 mt-3" data-toggle="modal" data-target="#staticBackdrop"><i class="bi bi-plus-circle"></i> เพิ่มสมาชิก</button>
                
                <!-- Add product modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title th-400" id="staticBackdropLabel">เพิ่มสมาชิก</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form  id="addCustomerForm" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <label for="cfName">ชื่อจริง</label>
                                            <input type="text" class="form-control" id="cfName" name="cfName" placeholder="โปรดกรอกชื่อจริง">
                                        </div>
                                        <div class="col">
                                            <label for="clName">นามสกุล</label>
                                            <input type="text" class="form-control" id="clName" name="clName" placeholder="โปรดกรอกนามสกุล">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <label for="cMail">อีเมล์</label>
                                            <input type="text" class="form-control" id="cMail" name="cMail" placeholder="ระบุอีเมล์">
                                        </div>
                                        <div class="col">
                                            <label for="cPhone">เบอร์โทร</label>
                                            <input type="text" class="form-control" id="cPhone" name="cPhone" placeholder="ระบุเบอร์โทร">
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="cAddress">ที่อยู่</label>
                                        <textarea class="form-control" id="cAddress" name="cAddress" rows="3" placeholder="ที่อยู่ปัจจุบัน"></textarea>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="cNote">หมายเหตุ</label>
                                        <textarea class="form-control" id="cNote" name="cNote" rows="2" placeholder="หมายเหตุ (ถ้ามี)"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                <button type="button" class="btn btn-success" id="saveCustomer"><i class="bi bi-plus-circle"></i> ดำเนินการ</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- edit  -->
                <div class="modal fade" id="edit_customer" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title th-400" id="staticBackdropLabel">แก้ไขข้อมูลลูกค้า</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form  id="editCustomerForm" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <label for="edit_cfName">ชื่อจริง</label>
                                            <input type="text" class="form-control" id="edit_cfName" name="edit_cfName" placeholder="โปรดกรอกชื่อจริง">
                                        </div>
                                        <div class="col">
                                            <label for="edit_clName">นามสกุล</label>
                                            <input type="text" class="form-control" id="edit_clName" name="edit_clName" placeholder="โปรดกรอกนามสกุล">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <label for="edit_cMail">อีเมล์</label>
                                            <input type="email" class="form-control" id="edit_cMail" name="edit_cMail" placeholder="ระบุอีเมล์">
                                        </div>
                                        <div class="col">
                                            <label for="edit_cPhone">เบอร์โทร</label>
                                            <input type="text" class="form-control" id="edit_cPhone" name="edit_cPhone" placeholder="ระบุเบอร์โทร">
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="edit_cAddress">ที่อยู่</label>
                                        <textarea class="form-control" id="edit_cAddress" name="edit_cAddress" rows="3" placeholder="ที่อยู่ปัจจุบัน"></textarea>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="edit_cNote">หมายเหตุ</label>
                                        <textarea class="form-control" id="edit_cNote" name="edit_cNote" rows="2" placeholder="หมายเหตุ (ถ้ามี)"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                <button type="button" class="btn btn-success" id="saveCustomer_edit"><i class="bi bi-pencil-square"></i> อัพเดท</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- view detail  -->
                <div class="modal fade" id="viewDetail" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title th-400" id="staticBackdropLabel">รายละเอียดข้อมูลลูกค้า</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form  id="viewCustomerForm" enctype="multipart/form-data">
                                    <div class="form-group mt-2">
                                        <label for="detail_cCode">รหัสลูกค้า</label>
                                        <input type="text" class="form-control" id="detail_cCode" name="detail_cCode"  readonly >
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="detail_cfName">ชื่อจริง</label>
                                            <input type="text" class="form-control" id="detail_cfName" name="detail_cfName" placeholder="โปรดกรอกชื่อจริง" readonly >
                                        </div>
                                        <div class="col">
                                            <label for="detail_clName">นามสกุล</label>
                                            <input type="text" class="form-control" id="detail_clName" name="detail_clName" placeholder="โปรดกรอกนามสกุล" readonly>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <label for="detail_cMail">อีเมล์</label>
                                            <input type="email" class="form-control" id="detail_cMail" name="detail_cMail" placeholder="ระบุอีเมล์" readonly>
                                        </div>
                                        <div class="col">
                                            <label for="detail_cPhone">เบอร์โทร</label>
                                            <input type="text" class="form-control" id="detail_cPhone" name="detail_cPhone" placeholder="ระบุเบอร์โทร" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="detail_cAddress">ที่อยู่</label>
                                        <textarea class="form-control" id="detail_cAddress" name="detail_cAddress" rows="3" placeholder="ที่อยู่ปัจจุบัน" readonly></textarea>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="detail_cNote">หมายเหตุ</label>
                                        <textarea class="form-control" id="detail_cNote" name="detail_cNote" rows="2" placeholder="หมายเหตุ (ถ้ามี)" readonly></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="th-400">รหัสลูกค้า</th>
                            <th scope="col" class="th-400">ชื่อลูกค้า</th>
                            <th scope="col" class="th-400">ตัวเลือก</th>
                        </tr>
                    </thead>
                    <tbody id="customerTableBody">
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>

<script>
    getCustomer();
    function getCustomer(){
        document.getElementById("customerTableBody").innerHTML = "";
        axios.get("<?= base_url('api/getCustomer') ?>")
        .then(function(response) {
            var customerData = response.data[0]; // ข้อมูลสินค้าจาก API

            // เลือกตารางของคุณ
            var tableBody = document.getElementById("customerTableBody");

            // เพิ่มข้อมูลสินค้าลงในตาราง
            customerData.forEach(function(cus, index) {
                var newRow = document.createElement("tr");

                newRow.innerHTML = `
                    <tr>
                        <td>
                            <b>${cus.cCode}</b>
                        </td>
                        <td>
                            ${cus.cFname} ${cus.cLname} 
                        </td>
                        <td>
                            <button type="button" class="btn btn-secondary btn-sm" onclick="viewCustomerDetail(${cus.cId})"><i class="bi bi-eye"></i></button>
                            <button type="button" class="btn btn-info btn-sm" onclick="edit_Customer(${cus.cId})"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="delCustomer(${cus.cId})"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                `;

                tableBody.appendChild(newRow);
            });
        })
        .catch(function(error) {
            // ดำเนินการเมื่อเกิดข้อผิดพลาด
            console.error(error);
        });
    }

    // add customer
    document.getElementById('saveCustomer').addEventListener('click', function(e) {
        var cfName      = document.getElementById('cfName').value;
        var clName      = document.getElementById('clName').value;
        var cMail       = document.getElementById('cMail').value;
        var cPhone      = document.getElementById('cPhone').value;
        var cAddress    = document.getElementById('cAddress').value;
        var cNote       = document.getElementById('cNote').value;

        if (!cfName) {
            Swal.fire({
                icon: 'error',
                text: 'กรุณาระบุชื่อจริง',
            });
            return; // Stop further execution if productName is empty
        }

        if (!clName) {
            Swal.fire({
                icon: 'error',
                text: 'กรุณาระบุนามสกุล',
            });
            return; // Stop further execution if productName is empty
        }
        
        if (!cMail) {
            Swal.fire({
                icon: 'error',
                text: 'กรุณาระบุอีเมล์',
            });
            return; // Stop further execution if productName is empty
        }

        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!emailPattern.test(cMail)) {
            Swal.fire({
                icon: 'info',
                text: 'รูปแบบอีเมล์ไม่ถูกต้อง',
            });
            return; // Stop further execution if cMail is not a valid email
        }


        if (!cPhone) {
            Swal.fire({
                icon: 'error',
                text: 'กรุณาระบุเบอร์โทรศัพท์',
            });
            return; // Stop further execution if productName is empty
        }

        if (cPhone.length !== 10) {
            Swal.fire({
                icon: 'error',
                text: 'เบอร์โทรศัพท์ต้องประกอบด้วย 10 ตัว',
            });
            return; // Stop further execution if cPhone does not have 10 digits
        }


        if (!cAddress) {
            Swal.fire({
                icon: 'error',
                text: 'กรุณาระบุที่อยู่',
            });
            return; // Stop further execution if productName is empty
        }


        Swal.fire({
            icon: 'info',
            html: "<h5>คุณต้องการบันทึกข้อมูลหรือไม่ ?</h5>",
            showDenyButton: true,
            confirmButtonText: "บันทึก",
            denyButtonText: `ยกเลิก`
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('<?=base_url('api/addCustomer')?>', {
                    fname: cfName,
                    lname: clName,
                    email: cMail,
                    phone: cPhone,
                    adress: cAddress,
                    note: cNote,
                })
                .then(function (response) {
                    var res = response.data;
                    console.log(res);
                    if(res.status == 'success'){
                        Swal.fire({
                            icon: res.status,
                            text: res.msg,
                        }).then((result) => {
                            getCustomer()
                            document.getElementById("addCustomerForm").reset();
                            $('#staticBackdrop').modal('hide')
                        });
                    }else{
                        Swal.fire({
                            icon: res.status,
                            text: res.msg,
                        });
                    }
                })
                .catch(function (error) {
                    // console.log(error);
                    // แสดงข้อความเมื่อเกิดข้อผิดพลาด
                });
            } else if (result.isDenied) {
                document.getElementById("addCustomerForm").reset();
                $('#staticBackdrop').modal('hide')
            }
        });
    });

    // customer detail
    function viewCustomerDetail(id){
        axios.post('<?=base_url('api/getCustomerDetail/')?>', {
            id: id,
        })
        .then(function (response) {
            var res = response.data;
            if(res.status == 'success'){
                document.getElementById('detail_cCode').value       = res.data[0].cCode;
                document.getElementById('detail_cfName').value      = res.data[0].cFname;
                document.getElementById('detail_clName').value      = res.data[0].cLname;
                document.getElementById('detail_cMail').value       = res.data[0].cEmail;
                document.getElementById('detail_cPhone').value      = res.data[0].cPhone;
                document.getElementById('detail_cAddress').value    = res.data[0].cAddress;
                document.getElementById('detail_cNote').value       = res.data[0].cNote;
                $('#viewDetail').modal('show');
            }else{

            }
        })
        .catch(function (error) {
            // console.log(error);
            // แสดงข้อความเมื่อเกิดข้อผิดพลาด
        });
    }

    // get customer detail
    async function getCustomerDetail(id){
        await axios.post('<?=base_url('api/getCustomerDetail/')?>', {
            id: id,
        })
        .then(function (response) {
            var res = response.data.data[0];
            if(response.data.status == 'success'){
                document.getElementById('edit_cfName').value    = res.cFname
                document.getElementById('edit_clName').value    = res.cLname
                document.getElementById('edit_cMail').value     = res.cEmail
                document.getElementById('edit_cPhone').value    = res.cPhone
                document.getElementById('edit_cAddress').value  = res.cAddress
                document.getElementById('edit_cNote').value     = res.cNote
                $('#edit_customer').modal('show')
            }else{
                Swal.fire({
                    icon: response.data.status,
                    text: response.data.msg,
                });
            }
        }).catch(function (error) {
            
        });
    }

    // edit customer
    function edit_Customer(id){
        getCustomerDetail(id)
        document.getElementById('saveCustomer_edit').addEventListener('click', function(e) {
            var cfName      = document.getElementById('edit_cfName').value;
            var clName      = document.getElementById('edit_clName').value;
            var cMail       = document.getElementById('edit_cMail').value;
            var cPhone      = document.getElementById('edit_cPhone').value;
            var cAddress    = document.getElementById('edit_cAddress').value;
            var cNote       = document.getElementById('edit_cNote').value;

            if (!cfName) {
                Swal.fire({
                    icon: 'error',
                    text: 'กรุณาระบุชื่อจริง',
                });
                return; // Stop further execution if productName is empty
            }

            if (!clName) {
                Swal.fire({
                    icon: 'error',
                    text: 'กรุณาระบุนามสกุล',
                });
                return; // Stop further execution if productName is empty
            }
            
            if (!cMail) {
                Swal.fire({
                    icon: 'error',
                    text: 'กรุณาระบุอีเมล์',
                });
                return; // Stop further execution if productName is empty
            }

            if (!cPhone) {
                Swal.fire({
                    icon: 'error',
                    text: 'กรุณาระบุเบอร์โทรศัพท์',
                });
                return; // Stop further execution if productName is empty
            }

            if (!cAddress) {
                Swal.fire({
                    icon: 'error',
                    text: 'กรุณาระบุที่อยู่',
                });
                return; // Stop further execution if productName is empty
            }

            const data = {
                id: id,
                fname: cfName,
                lname: clName,
                email: cMail,
                phone: cPhone,
                adress: cAddress,
                note: cNote,
            }
            console.log(data)
            Swal.fire({
                icon: 'info',
                html: "<h5>คุณตรวจสอบข้อมูลหรือไม่ ?</h5>",
                showDenyButton: true,
                confirmButtonText: "บันทึก",
                denyButtonText: `ยกเลิก`
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('<?=base_url('api/editCustomer')?>', data)
                    .then(function (response) {
                        var res = response.data;
                        if(res.status == 'success'){
                            Swal.fire({
                                icon: res.status,
                                text: res.msg,
                            }).then((result) => {
                                getCustomer()
                                document.getElementById("editCustomerForm").reset();
                                $('#edit_customer').modal('hide')
                            });
                        }else{
                            Swal.fire({
                                icon: res.status,
                                text: res.msg,
                            });
                        }
                    }).catch(function (error) {
                        // console.log(error);
                        // แสดงข้อความเมื่อเกิดข้อผิดพลาด
                    });
                } else if (result.isDenied) {
                    document.getElementById("editCustomerForm").reset();
                    $('#edit_customer').modal('hide')
                }
            });
        });
    }

    // delete customer
    function delCustomer(id){
        Swal.fire({
            icon: 'info',
            html: "<h5>คุณต้องการลบสมาชิกนี้ใช่ไหม ?</h5>",
            showDenyButton: true,
            confirmButtonText: "ยืนยัน",
            denyButtonText: `ยกเลิก`
        }).then((result) => {
            if (result.isConfirmed) {
                var data = {
                    id: id
                }
                axios.post("<?= base_url('api/deleteCustomer') ?>", data)
                .then(function(response) {
                    // console.log(response.data);
                    Swal.fire({
                        icon: response.data.status,
                        text: response.data.msg,
                    });
                    getCustomer();
                })
                .catch(function(error) {
                });
            } else if (result.isDenied) {
            }
        });
    }
</script>