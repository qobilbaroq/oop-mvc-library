<?php 

if(!defined('SECURE_ACCESS')){
    die('DIRECT IS NOT PERMITTED');
}

include('templates/header.php') ?>

<div class="main-content login-panel login-panel-2">
    <h3 class="panel-title">LIBRARAY</h3>
    <div class="login-body login-body-1">
        <div class="d-flex justify-content-center align-items-center">
            <a href="/book" class="text-center">
                <i class="fa-duotone fa-book"></i>
                <h6>Book Collection</h6>
            </a>
        </div>
    </div>
    <div class="login-body login-body-1 my-2">
        <div class="d-flex justify-content-center align-items-center">
            <a href="/peminjaman" class="text-center">
                <i class="fa-duotone fa-user"></i>
                <h6>Peminjaman</h6>
            </a>
        </div>
    </div>
    <div class="login-body login-body-1 my-2">
        <div class="d-flex justify-content-center align-items-center">
            <a href="/pengembalian" class="text-center">
                <i class="fa-duotone fa-user"></i>
                <h6>Pengembalian</h6>
            </a>
        </div>
    </div>
    <div class="login-body login-body-1 my-2">
        <div class="d-flex justify-content-center align-items-center">
            <a href="/membership" class="text-center">
                <i class="fa-duotone fa-users"></i>
                <h6>Membership</h6>
            </a>
        </div>
    </div>

    <div class="footer">
        <p>Copyright© <script>
                document.write(new Date().getFullYear())
            </script> All Rights Reserved By <span class="text-primary">baroq</span></p>
    </div>
</div>

<?php include('templates/footer.php') ?>