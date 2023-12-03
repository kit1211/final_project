<?php
    // http://localhost:8080/home/billing/7cdc957b-00a7-4270-9b9e-d7acfcc70408
    // get 7cdc957b-00a7-4270-9b9e-d7acfcc70408
    // Undefined property: CodeIgniter\View\View::$request fix


    $request = \Config\Services::request();
    $uri = $request->uri->getSegment(3);
    // echo $uri;
?>
<section class="section-content padding-y-sm bg-default mt-5">
    <div class="container th-400">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-15">Invoice <span id="inVoice">.....</span></h4>
                            <div class="mb-4">
                                <h2 class="mb-1 font-weight-bold">DESSLAND</h2>
                            </div>
                            <div class="text-muted">
                                <p class="mb-1">อาคาร A8 ,9/1 หมู่ที่ 5 Phahon Yothin Rd, Khlong Nueng, <br> Khlong Luang District, Pathum Thani 12120</p>
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> dessland@bu.com</p>
                                <p><i class="uil uil-phone me-1"></i> 02-407-3888</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-muted">
                                    <h5 class="font-size-16 mb-3">Billed To:</h5>
                                    <h5 class="font-size-15 mb-2 font-weight-bold" id="cName">Preston Miller</h5>
                                    <p class="mb-1 text-muted" id="cAddress">4068 Post Avenue Newfolden, MN 56738</p>
                                    <p class="mb-1" id="cMail">PrestonMiller@armyspy.com</p>
                                    <p id="cPhone">001-234-5678</p>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">

                        <div class="py-2">
                            <h5 class="font-size-15">รายการสินค้าทั้งหมด</h5>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr >
                                            <th >#</th>
                                            <th>Item name</th>
                                            <th>Unit Price</th>
                                            <th>Qty</th>
                                            <th class="text-end" style="width: 120px;">Total/THB</th>
                                        </tr>
                                    </thead>
                                    <tbody id="billList">
                                    </tbody>
                                     <!-- <tbody>
                                       <tr>
                                            <th scope="row" colspan="4" class="text-end" >Sub Total</th>
                                            <td class="text-end" id="subTotal">...</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">ส่วนลด :</th>
                                            <td class="border-0 text-end">0.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">Vat 7% :</th>
                                            <td class="border-0 text-end" id="vat">...</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">Total/THB</th>
                                            <td class="border-0 text-end">
                                                <h4 class="m-0 font-weight-bold" id="total">...</h4>
                                            </td>
                                        </tr> 
                                    </tbody>-->
                                </table>
                                <div class="row">
                                    <div class="col-8">
                                        
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-6 text-right">
                                                <h4>Sub Total</h4>
                                            </div>
                                            <div class="col-6">
                                                <h5>
                                                    <span id="subTotal">0</span>
                                                </h5>
                                            </div>
                                            <div class="col-6 text-right">
                                                <h4>ส่วนลด</h4>
                                            </div>
                                            <div class="col-6">
                                                <h5>
                                                    <span>0 THB</span>
                                                </h5>
                                            </div>
                                            <div class="col-6 text-right">
                                                <h4>Vat 7%</h4>
                                            </div>
                                            <div class="col-6">
                                                <h5>
                                                    <span id="vat">0 </span>
                                                </h5>
                                            </div>
                                            <div class="col-6 text-right">
                                                <h4>Total/THB</h4>
                                            </div>
                                            <div class="col-6">
                                                <h5>
                                                    <span id="total">0</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-print-none mt-4">
                                <div class="float-end">
                                    <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>
</section>
<script>
        
        axios.post('<?= base_url('api/getBill') ?>', { token: '<?=$uri?>' })
        .then(response => {

            const products = response.data;
            const customerCode = products[0].bCustomerCode;

            axios.post('<?= base_url('api/getCustomerBillDetail') ?>', { customer: customerCode })
            .then(response => {
                const detail = response.data.data[0];
                console.log(detail);
                document.getElementById("cName").innerHTML = 'Dear Sir. ' + detail.cFname + ' ' + detail.cLname;
                document.getElementById("cAddress").innerHTML = detail.cAddress;
                document.getElementById("cMail").innerHTML = detail.cEmail;
                document.getElementById("cPhone").innerHTML = detail.cPhone;
                return;
                
            })
            .catch(error => {
                console.error('There was an error!', error);
            });

            var billList = document.getElementById("billList");
            billList.innerHTML = '';
            var subTotalSum = 0;
            var vat = 0;
            var total = 0;
            var inVoice = '';
            products.forEach(function(item, index) {
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <th scope="row " >${index + 1}</th>
                    <td>
                        <div>
                            <h5 class="text-truncate font-size-10 mb-1">${item.bProductName}</h5>
                        </div>
                    </td>
                    <td>${parseFloat(item.bItemPrice).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                    <td>${item.bQuantity}</td>
                    <td class="text-end">${parseFloat(item.bSubTotalRow).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                `;
                billList.appendChild(newRow);
                subTotalSum += parseFloat(item.bSubTotalRow);
                vat += parseFloat(item.bVat);
                total += parseFloat(item.bTotal);
                inVoice = item.bInvoiceNumber;
            });
            document.getElementById("subTotal").innerHTML = subTotalSum.toLocaleString('en-Us', {minimumFractionDigits: 2,maximumFractionDigits: 2}) + ' THB';
            document.getElementById("vat").innerHTML = vat.toLocaleString('en-Us', {minimumFractionDigits: 2,maximumFractionDigits: 2}) + ' THB';
            document.getElementById("total").innerHTML = total.toLocaleString('en-Us', {minimumFractionDigits: 2,maximumFractionDigits: 2}) + ' THB' ;
            document.getElementById("inVoice").innerHTML = '#'+inVoice;
        })
        .catch(error => {
            console.error('There was an error!', error);
        });
</script>

<style>
.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}
</style>