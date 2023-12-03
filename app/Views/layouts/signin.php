<div class="container mt-5">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item th-400"><a href="#">DESSLAND-POS</a></li>
            <li class="breadcrumb-item active th-400" aria-current="page">authorization</li>
        </ol>
    </nav>
    <div class="card mt-3 w-50 mx-auto mb-5">
        <div class="card-body">
            <h5 class="card-title th-600">เข้าสู่ระบบ DESSLAND-POS</h5>
            <form id="loginForm">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" >
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <button type="button" class="btn btn-success btn-lg btn-block th-400" id="signin">เข้าสู่ระบบ</button>
            </form>
        </div>
    </div>
</div>
<script>
        

function handleSubmit() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (!username) {
        Swal.fire({
            icon: 'error',
            text: 'กรุณาระบุ Username',
        });
        return; // Stop further execution if productName is empty
    }
    if (!password) {
        Swal.fire({
            icon: 'error',
            text: 'กรุณาระบุ Password',
        });
        return; // Stop further execution if productName is empty
    }
    axios.post('<?=base_url('api/signin')?>', {
        username: username,
        password: password
    })
    .then(function (response) {
        var res = response.data;
        if(res.status == 'success'){
            Swal.fire({
                icon: res.status,
                text: res.msg,
            }).then((result) => {
                window.location.href = '<?=base_url('home')?>';
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
}
document.getElementById('signin').addEventListener('click', handleSubmit);
document.getElementById('loginForm').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault(); // Prevent default Enter behavior (like submitting the form)
        handleSubmit(); // Call the same function as the click event
    }
});
</script>
