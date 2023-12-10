<section class="section-content padding-y-sm bg-default mt-5">
    <div class="container-fluid">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item th-400"><a href="#">DESSLAND</a></li>
                <li class="breadcrumb-item active th-400" aria-current="page">POS</li>
            </ol>
        </nav>
        <div class="row mt-3">
            <div class="col-md-8 card padding-y-sm card ">
                <ul class="nav bg radius nav-pills nav-fill mb-3 bg" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" data-toggle="pill" href="#nav-tab-card" onclick="getProductPos('all');">
                            <i class="fa fa-tags"></i> All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#nav-tab-paypal" onclick="getProductPos('1');">
                            <i class="fa fa-tags "></i> DESSERT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#nav-tab-bank" onclick="getProductPos('2');">
                            <i class="fa fa-tags "></i> FRUITS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#nav-tab-bank" onclick="getProductPos('3');">
                            <i class="fa fa-tags "></i> DRINKS</a>
                    </li>
                </ul>

                <!-- products -->
                <span>
                    <div class="row" id="items">
                        <!-- <div class="col-md-3">
                                <figure class="card card-product">
                                    <div class="img-wrap">
                                        <img src="public/assets/dessert/dess_1.png">
                                    </div>
                                    <figcaption class="info-wrap">
                                        <h5 class="card-title th-300">Good item name</h5>
                                        <div class="action-wrap">
                                            <div class="price-wrap h5">
                                                <span class="price-new">$1280</span>
                                            </div> 
                                            <a href="#" class="btn btn-success btn-lg btn-block float-right" onclick="addCart(id)"> <i class="fa fa-cart-plus"></i> Add </a>
                                        </div> 
                                    </figcaption>
                                </figure> 
                            </div>  -->
                    </div>
                </span>

            </div>
            <div class="col-md-4">
                <div class="card">
                    <span id="cart">
                        <table class="table table-hover shopping-cart-wrap">
                            <thead class="text-muted">
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col" width="120">Qty</th>
                                    <th scope="col" width="120">Price/item</th>
                                    <th scope="col" class="text-right" width="200">Delete</th>
                                </tr>
                            </thead>
                            <tbody id="product_lists">

                            </tbody>
                        </table>
                    </span>
                </div>
                <!-- result price -->
                <div class="box th-400">
                    <dl class="dlist-align items-center">
                        <dt >วันที่:</dt>
                        <dd class="text-right">
                            <input type="text" class="form-control"  id="dateInput"  placeholder="กรุณาเลือกวันที่" >
                        </dd>
                    </dl>
                    <hr>
                    <dl class="dlist-align">
                        <dt>Sub Total:</dt>
                        <dd class="text-right" id="sub_total">0 THB</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Vat(7%):</dt>
                        <dd class="text-right" id="vat_total">0 THB</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Total: </dt>
                        <dd class="text-right h4 b" id="total_all">0 THB</dd>
                    </dl>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn  btn-default btn-error btn-lg btn-block" onclick="removeAll()"><i class="fa fa-times-circle "></i> ยกเลิก </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn  btn-primary btn-lg btn-block" onclick="checkout()"><i class="fa fa-shopping-bag"></i> คิดเงิน </a>
                        </div>
                    </div>
                </div>
                <!-- result price -->
            </div>
        </div>
    </div>
</section>

<script>
    $(function () {
        $('#dateInput').datepicker({
            format: "dd/mm/yyyy",
            dateFormat: "dd/mm/yy"
        });
    });

    const datax = localStorage.getItem("myObject");
    const parsedData = JSON.parse(datax);
    // parsedData.forEach(function(itemx, index) {
    //     console.log(itemx);
    // });
    // console.log(localStorage.getItem("myObject"));
    getProductPos('all');
    const clientData = [];
    const clientCart = [];

    function addCart(productId) {
        // Check if the product ID already exists in clientCart
        var existingProduct = clientCart.find(p => p.pId === productId.toString());
        if (existingProduct) {
            // If the product exists, then increase the quantity
            Swal.fire({
                icon: 'warning',
                text: 'มีสินค้านี้อยู่ในตะกร้าแล้ว',
            });
        } else {
            // If the product does not exist, then add the product
            var product = clientData.find(p => p.pId === productId.toString());
            // product.pQty = 1;
            var productPush = {
                ...product,
                pQty: 1
            }
            console.log('productPush', productPush, 'clientData', clientData, 'productId', productId);
            clientCart.push(productPush);
            reloadTable();
        }
    }

    function reloadTable() {
        // product_lists
        var product_lists = document.getElementById("product_lists");
        product_lists.innerHTML = '';
        // summary
        var sub_total = document.getElementById("sub_total");
        var vat_total = document.getElementById("vat_total");
        var total_all = document.getElementById("total_all");

        if (clientCart.length == 0) {
            sub_total.innerHTML = '0 THB';
            vat_total.innerHTML = '0 THB';
            total_all.innerHTML = '0 THB';
            return;
        }

        var sub_total_price = 0;

        clientCart.forEach((i, x) => {
            sub_total_price += i.pPrice * i.pQty;
            const newRow = document.createElement("tr");
            newRow.innerHTML = `
                <tr>
                    <td>
                        <figure class="media">
                            <div class="img-wrap"><img src="public//uploads/${i.pImage}" class="img-thumbnail img-xs"></div>
                            <figcaption class="media-body">
                                <h6 class="title text-truncate">${i.pName}</h6>
                            </figcaption>
                        </figure>
                    </td>
                    <td class="text-center">
                        <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group" aria-label="...">
                            <button type="button" class="m-btn btn btn-default" onclick="minusItem(${i.pId})"><i class="fa fa-minus"></i></button>
                            <button type="button" class="m-btn btn btn-default">${i.pQty}</button>
                            <button type="button" class="m-btn btn btn-default" onclick="plusItem(${i.pId})"><i class="fa fa-plus"></i></button>
                        </div>
                    </td>
                    <td>
                        <div class="price-wrap">
                            <var class="price">${i.pPrice}</var>
                        </div> <!-- price-wrap .// -->
                    </td>
                    <td class="text-right">
                        <a href="javascript:;" class="btn btn-outline-danger" onclick="removeIndexs(${i.pId})"> <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                `;
            product_lists.appendChild(newRow);


            var vat_total_price = sub_total_price * 0.07;
            var total_all_price = sub_total_price + vat_total_price;

            sub_total.innerHTML = sub_total_price.toLocaleString('en-Us') + ' THB';
            vat_total.innerHTML = vat_total_price.toLocaleString('en-Us') + ' THB';
            total_all.innerHTML = total_all_price.toLocaleString('en-Us') + ' THB';

        })
    }

    function minusItem(pID) {
        var product = clientCart.find(p => p.pId === pID.toString());
        if (product.pQty > 1) {
            product.pQty = product.pQty - 1;
            reloadTable();
        } else {
            removeIndexs(pID);
        }
    }

    function plusItem(pID) {
        var product = clientCart.find(p => p.pId === pID.toString());
        product.pQty = product.pQty + 1;
        reloadTable();
    }

    function removeIndexs(pID) {
        var product = clientCart.find(p => p.pId === pID.toString());
        var index = clientCart.indexOf(product);
        if (index > -1) {
            clientCart.splice(index, 1);
        }
        reloadTable();
    }

    function removeAll() {
        clientCart.splice(0, clientCart.length);
        reloadTable();
        document.getElementById("dateInput").value = '';
    }

    function getProductPos($productType) {
        var rowItems = document.getElementById("items");
        rowItems.innerHTML = '';
        axios.get("<?= base_url('api/getProductPos/') ?>" + $productType)
            .then(function(response) {
                var items = response.data[0];
                items.forEach(function(item, index) {
                    // check if id is not exists in clientData will push
                    var existingProduct = clientData.find(p => p.pId === item.pId);
                    if (!existingProduct) {
                        clientData.push(item);
                    }

                    var newRow = document.createElement("div");
                    newRow.className = "col-12 col-md-6 col-lg-3";
                    newRow.innerHTML = `
                        <figure class="card card-product" data-product-id="${item.pId}" data-product-name="${item.pName}" data-product-price="${item.pPrice}">
                            <div class="img-wrap">
                                <img src="public/uploads/${item.pImage}">
                            </div>
                            <figcaption class="info-wrap">
                                <h5 class="card-title th-300">${item.pName}</h5>
                                <div class="action-wrap">
                                    <div class="price-wrap h5">
                                        <span class="price-new">${item.pPrice}</span>
                                    </div> 
                                    <a href="javascript:;" class="btn btn-success btn-lg btn-block float-right" onclick="addCart(${item.pId})"> <i class="fa fa-cart-plus"></i> Add </a>
                                </div> 
                            </figcaption>
                        </figure> 
                    `;
                    rowItems.appendChild(newRow);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    }

    async function checkout() {
        if (clientCart.length == 0) {
            Swal.fire({
                icon: 'error',
                text: 'กรุณาเลือกสินค้าก่อน',
            });
            return;
        }

        // dateInput
        if ($('#dateInput').val() == '') {
            Swal.fire({
                icon: 'error',
                text: 'กรุณาเลือกวันที่',
            });
            return;
        }

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        // console.log($('#dateInput').val());
        swalWithBootstrapButtons.fire({
            text: "คุณต้องการคิดเงินใช่ไหม?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "ใช่, มีรหัสลูกค้า",
            cancelButtonText: "ไม่มีรหัสลูกค้า",
            reverseButtons: true
        }).then(async (result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "กรอกรหัสลูกค้า",
                    input: "text",
                    inputAttributes: {
                        autocapitalize: "off"
                    },
                    showCancelButton: true,
                    confirmButtonText: "ดำเนินการ",
                    cancelButtonText: "ยกเลิก",
                    showLoaderOnConfirm: true,
                    allowOutsideClick: () => !Swal.isLoading()
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        const { data } =  await axios.post('<?= base_url('api/checkCustomerCode') ?>', { customer: result.value });
                        if(data.status == 'success'){
                            const { data } =  await axios.post('<?= base_url('api/checkOut') ?>', { data: clientCart, customer: result.value, dateInoive: $('#dateInput').val() });
                            window.location.href = '<?= base_url('home/billing') ?>/' + data.billUrl;
                        }else{
                            Swal.fire({
                                icon: data.status,
                                text: data.msg,
                            });
                            return;
                        }
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                const { data } =  await axios.post('<?= base_url('api/checkOut') ?>', { data: clientCart, dateInoive: $('#dateInput').val() });
                console.log(data);
                window.location.href = '<?= base_url('home/billing') ?>/' + data.billUrl;
            }
        });
    }
</script>