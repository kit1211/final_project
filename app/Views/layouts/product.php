<section class="section-content padding-y-sm bg-default mt-5">
    <div class="container">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item th-400"><a href="#">DESSLAND</a></li>
                <li class="breadcrumb-item active th-400" aria-current="page">Product Manage</li>
            </ol>
        </nav>
        <div class="card mt-3" >
            <div class="card-body">
                <h5 class="card-title th-400">จัดการสินค้าในระบบ</h5>
                <p class="card-text th-400">พนักงานสามารถจัดการ <b>"เพิ่ม/ลบ/แก้ไข"</b> สินค้าได้ที่นี่</p>
                <button type="button" class="btn btn-outline-success pl-2 pr-2 mb-3 mt-3" data-toggle="modal" data-target="#staticBackdrop"><i class="bi bi-plus-circle"></i> เพิ่มสินค้า</button>
                
                <!-- Add product modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">เพิ่มสินค้า</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form  id="addProductForm" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="productName">ชื่อสินค้า</label>
                                        <input type="text" class="form-control" id="productName" name="productName" placeholder="ระบุชื่อสินค้า">
                                    </div>
                                    <div class="form-group">
                                        <label for="productPrice">ราคา</label>
                                        <input type="text" class="form-control" id="productPrice" name="productPrice" placeholder="ระบุราคา เช่น 200">
                                    </div>
                                    <div class="form-group">
                                        <label for="productType">ประเภทเมนู</label>
                                        <select class="form-control" id="productType">
                                            <option value="0">กรุณาเลือกประเภทเมนู</option>
                                            <option value="1">Dessert</option>
                                            <option value="2">Fruits</option>
                                            <option value="3">Drink</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="productImage">เลือกไฟล์รูปภาพ</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="productImage" name="productImage">
                                            <label class="custom-file-label" for="productImage">เลือกไฟล์</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                <button type="button" class="btn btn-success" id="saveProduct"><i class="bi bi-plus-circle"></i> ดำเนินการ</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- edit  -->
                <div class="modal fade" id="edit_product" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">แก้ไขสินค้า</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form  id="editProductForm" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="productName_edit">ชื่อสินค้า</label>
                                        <input type="text" class="form-control" id="productName_edit" name="productName_edit" placeholder="ระบุชื่อสินค้า">
                                    </div>
                                    <div class="form-group">
                                        <label for="productPrice_edit">ราคา</label>
                                        <input type="text" class="form-control" id="productPrice_edit" name="productPrice_edit" placeholder="ระบุราคา เช่น 200">
                                    </div>
                                    <div class="form-group">
                                        <label for="productType_edit">ประเภทเมนู</label>
                                        <select class="form-control" id="productType_edit">
                                            <option value="0">กรุณาเลือกประเภทเมนู</option>
                                            <option value="1">Dessert</option>
                                            <option value="2">Fruits</option>
                                            <option value="3">Drink</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="productImage_edit">เลือกไฟล์รูปภาพ</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="productImage_edit" name="productImage_edit">
                                            <label class="custom-file-label" for="productImage_edit">เลือกไฟล์</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                <button type="button" class="btn btn-success" id="saveProduct_edit"><i class="bi bi-pencil-square"></i> อัพเดท</button>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="th-400">#</th>
                            <th scope="col" class="th-400">ชื่อสินค้า</th>
                            <th scope="col" class="th-400">ประเภท</th>
                            <th scope="col" class="th-400">ราคา</th>
                            <th scope="col" class="th-400">ตัวเลือก</th>
                        </tr>
                    </thead>
                    <tbody id="productTableBody">
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>

<script>
    
    getProduct();
    function getProduct(){
        document.getElementById("productTableBody").innerHTML = "";
        axios.get("<?= base_url('api/getProduct') ?>")
        .then(function(response) {
            var productData = response.data[0]; // ข้อมูลสินค้าจาก API

            // เลือกตารางของคุณ
            var tableBody = document.getElementById("productTableBody");

            // เพิ่มข้อมูลสินค้าลงในตาราง
            productData.forEach(function(product, index) {
                var newRow = document.createElement("tr");

                if (product.pTag == 1) {
                    product.pTag = "Dessert";
                } else if (product.pTag == 2) {
                    product.pTag = "Fruits";
                } else if (product.pTag == 3) {
                    product.pTag = "Drink";
                }

                newRow.innerHTML = `
                    <th class="w-10">
                        <div class="d-flex align-items-center">
                            <img class="rounded" src="<?=base_url('public/uploads/')?>${product.pImage}" width="75">
                        </div>
                    </th>
                    <td>
                        <div class="d-flex align-items-center pt-4">
                            ${product.pName}
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center pt-4">
                            <span class="badge badge-pill badge-secondary">${product.pTag}</span>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center pt-4">
                            ${product.pPrice} บาท
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center pt-3">
                            <button type="button" class="btn btn-info mr-2" onclick="edit_product(${product.pId})"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-danger" onclick="deleteProduct(${product.pId})"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                `;
                tableBody.appendChild(newRow);
            });
        })
        .catch(function(error) {
            // ดำเนินการเมื่อเกิดข้อผิดพลาด
            console.error(error);
        });
    }

    // add product
    document.getElementById("saveProduct").addEventListener("click", function() {
        var productName = document.getElementById("productName").value;
        var productPrice = document.getElementById("productPrice").value;
        var productType = document.getElementById("productType").value;
        var productImage = document.getElementById("productImage").files[0]; // รับรูปภาพ

        // ตรวจสอบว่า productName มีค่าหรือไม่
        if (!productName) {
            Swal.fire({
                icon: 'error',
                text: 'กรุณาระบุชื่อสินค้า',
            });
            return; // Stop further execution if productName is empty
        }

        // ตรวจสอบว่า productType มีค่าหรือไม่
        if (!productType || productType == 0) {
            Swal.fire({
                icon: 'error',
                text: 'กรุณาเลือกประเภทสินค้า',
            });
            return; // Stop further execution if productType is empty
        }

        // ตรวจสอบว่า productPrice มีค่าหรือไม่ และเป็นตัวเลขหรือไม่
        if (!productPrice || isNaN(Number(productPrice))) {
            Swal.fire({
                icon: 'error',
                text: 'ราคาจะต้องเป็นตัวเลขเท่านั้น',
            });
            return; // Stop further execution if productPrice is not a valid number
        }

        // ตรวจสอบว่ามีรูปภาพที่ถูกเลือกหรือไม่
        if (!productImage) {
            Swal.fire({
                icon: 'error',
                text: 'กรุณาเลือกรูปภาพ',
            });
            return; // หยุดการดำเนินการหากไม่มีรูปภาพ
        }


        Swal.fire({
            icon: 'info',
            html: "<h5>คุณต้องการบันทึกข้อมูลหรือไม่ ?</h5>",
            showDenyButton: true,
            confirmButtonText: "บันทึก",
            denyButtonText: `ยกเลิก`
        }).then((result) => {
            if (result.isConfirmed) {
                // สร้าง FormData เพื่อรวบรวมข้อมูลจากฟอร์ม
                var formData = new FormData();
                formData.append('productName', productName);
                formData.append('productType', productType);
                formData.append('productPrice', productPrice);
                formData.append('productImage', productImage);
                // ทำการส่งข้อมูลไปยังเซิร์ฟเวอร์โดยใช้ Axios
                axios.post("<?= base_url('api/addProduct') ?>", formData)
                .then(function(response) {
                    Swal.fire({
                        icon: response.data.status,
                        text: response.data.msg,
                    });
                    document.getElementById("addProductForm").reset();
                    getProduct();
                    $('#staticBackdrop').modal('hide')
                })
                .catch(function(error) {
                    // console.error(error);
                });
            } else if (result.isDenied) {
                document.getElementById("addProductForm").reset();
                $('#staticBackdrop').modal('hide')
            }
        });
        
    });

    // delete product
    function deleteProduct(id){
        Swal.fire({
            icon: 'info',
            html: "<h5>คุณต้องการลบสินค้านี้ใช่ไหม ?</h5>",
            showDenyButton: true,
            confirmButtonText: "ยืนยัน",
            denyButtonText: `ยกเลิก`
        }).then((result) => {
            if (result.isConfirmed) {
                var data = {
                    id: id
                }
                axios.post("<?= base_url('api/deleteProduct') ?>", data)
                .then(function(response) {
                    // console.log(response.data);
                    Swal.fire({
                        icon: response.data.status,
                        text: response.data.msg,
                    });
                    getProduct();
                })
                .catch(function(error) {
                });
            } else if (result.isDenied) {
            }
        });
    }

    // edit product
    function edit_product(id){
        getProductById(id)
        $('#edit_product').modal('show')
        document.getElementById("saveProduct_edit").addEventListener("click", function() {
            var productName = document.getElementById("productName_edit").value;
            var productPrice = document.getElementById("productPrice_edit").value;
            var productType = document.getElementById("productType_edit").value;
            var productImage = document.getElementById("productImage_edit").files[0]; // รับรูปภาพ

            // ตรวจสอบว่า productName มีค่าหรือไม่
            if (!productName) {
                Swal.fire({
                    icon: 'error',
                    text: 'กรุณาระบุชื่อสินค้า',
                });
                return; // Stop further execution if productName is empty
            }

            // ตรวจสอบว่า productType มีค่าหรือไม่
            if (!productType || productType == 0) {
                Swal.fire({
                    icon: 'error',
                    text: 'กรุณาเลือกประเภทสินค้า',
                });
                return; // Stop further execution if productName is empty
            }

            // ตรวจสอบว่า productPrice มีค่าหรือไม่ และเป็นตัวเลขหรือไม่
            if (!productPrice || isNaN(Number(productPrice))) {
                Swal.fire({
                    icon: 'error',
                    text: 'ราคาจะต้องเป็นตัวเลขเท่านั้น',
                });
                return; // Stop further execution if productPrice is not a valid number
            }
            Swal.fire({
                icon: 'info',
                html: "<h5>คุณต้องการบันทึกข้อมูลหรือไม่ ?</h5>",
                showDenyButton: true,
                confirmButtonText: "บันทึก",
                denyButtonText: `ยกเลิก`
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    // สร้าง FormData เพื่อรวบรวมข้อมูลจากฟอร์ม
                    var formData = new FormData();
                    formData.append('productId', id);
                    formData.append('productName', productName);
                    formData.append('productType', productType);
                    formData.append('productPrice', productPrice);
                    formData.append('productImage', productImage);
                    
                    // ทำการส่งข้อมูลไปยังเซิร์ฟเวอร์โดยใช้ Axios
                    axios.post("<?= base_url('api/editProduct') ?>", formData)
                    .then(function(response) {
                        // console.log(response.data);
                        Swal.fire({
                            icon: response.data.status,
                            text: response.data.msg,
                        });
                        document.getElementById("editProductForm").reset();
                        getProduct();
                        $('#edit_product').modal('hide')
                    })
                    .catch(function(error) {
                        // console.error(error);
                    });
                } else if (result.isDenied) {
                    document.getElementById("editProductForm").reset();
                    $('#edit_product').modal('hide')
                }
            });
            
        });
    }

    function getProductById(id){
        axios.post("<?= base_url('api/getProductById') ?>", {  id: id})
        .then(function(response) {
            var productData = response.data[0][0]; // ข้อมูลสินค้าจาก API
            document.getElementById("productName_edit").value = productData.pName;
            document.getElementById("productPrice_edit").value = productData.pPrice;
            document.getElementById("productType_edit").value = productData.pTag;
            $('#edit_product').modal('show')
        })
        .catch(function(error) {
            // ดำเนินการเมื่อเกิดข้อผิดพลาด
            console.error(error);
        });
    }
</script>