<?php

if (!defined('SECURE_ACCESS')) {
    die('DIRECT IS NOT PERMITTED');
}

include('templates/header.php') ?>

<div class="main-content login-panel">
    <div class="login-body">
        <div class="top d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="assets/images/logo-black.png" alt="Logo">
            </div>
            <a href="index.html"><i class="fa-duotone fa-house-chimney"></i></a>
        </div>
        <div class="bottom">
            <h3 class="panel-title">Registration</h3>
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger text-center">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif ?>
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success text-center">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif ?>
            <form method="POST" action="/register">
                <div class="input-group mb-25">
                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Full Name"
                        name="name"
                        value="<?= isset($_SESSION['name']) ? $_SESSION['name'] : "" ?>"
                        required>
                </div>
                <div class="input-group mb-25">
                    <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Username"
                        name="username"
                        value="<?= isset($_SESSION['username']) ? $_SESSION['username'] : "" ?>"
                        required>
                </div>
                <div class="input-group mb-20">
                    <span class="input-group-text"><i class="fa-regular fa-lock"></i></span>
                    <input
                        type="password"
                        class="form-control rounded-end"
                        placeholder="Password"
                        name="password"
                        required>
                        <a role="button" class="password-show"><i class="fa-duotone fa-eye"></i></a>
                </div>
                <button class="btn btn-primary w-100 login-btn" type="submit">Sign up</button>
            </form>
            <div class="other-option">
                <p>Already Have an Account? <a href="/login">login</a></p>
            </div>
        </div>
    </div>
</div>

<?php include('templates/footer.php') ?>