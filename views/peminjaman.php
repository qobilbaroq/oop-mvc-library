<?php
$number1 = 1;
$number = 1;

if (!defined('SECURE_ACCESS')) {
    die('DIRECT IS NOT PERMITTED');
}
include('templates/header.php') ?>

<div class="main-content bg-light py-5">
    <div class="container">
        <h1 class="text-center text-primary mb-4">PEMINJAMAN</h1>

        <!-- Form Card -->
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="/peminjaman" method="POST" class="row g-3">
                    <div class="col-md-6">
                        <label for="book_id" class="form-label"><i class="bi bi-book"></i> Pilih Buku</label>
                        <select name="book_id" id="book_id" class="form-select" aria-label="Pilih Buku">
                            <option value="">Pilih Buku</option>
                            <?php foreach ($data as $book) : ?>
                                <option value="<?= $book->getId() ?>"><?= $book->getTitle() ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="user_id" class="form-label"><i class="bi bi-person"></i> Pilih Member</label>
                        <select name="user_id" id="user_id" class="form-select" aria-label="Pilih Member">
                            <option value="">Pilih Member</option>
                            <?php foreach ($data2 as $member) : ?>
                                <option value="<?= $member->getId() ?>"><?= $member->getName() ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="borrow_date" class="form-label"><i class="bi bi-calendar"></i> Tanggal Peminjaman</label>
                        <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="<?= date('Y-m-d') ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="return_date" class="form-label"><i class="bi bi-calendar-check"></i> Tanggal Pengembalian</label>
                        <input type="date" name="return_date" id="return_date" class="form-control">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-check-lg"></i> Pinjam</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Notifications -->
        <div class="my-4">
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger text-center">
                    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif ?>
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success text-center">
                    <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>
            <?php endif ?>
        </div>

        <!-- Table -->
        <h5 class="mt-5 text-center">BUKU YANG SEDANG DIPINJAM</h5>
        <div class="table-responsive">
            <table class="table table-hover table-bordered shadow-sm">
                <thead class="table-primary text-center">
                    <tr>
                        <th>NO</th>
                        <th>TITLE</th>
                        <th>AUTHOR</th>
                        <th>BORROW AT</th>
                        <th>RETURN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data3 as $list) : ?>
                        <tr>
                            <td class="text-center"><?= $number++ ?></td>
                            <td><?= $list->getTitle() ?></td>
                            <td><?= $list->getAuthor() ?></td>
                            <td><?= $list->getBorrow() ?></td>
                            <td><?= $list->getReturn() ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <!-- Back Home -->
        <div class="text-center my-4">
            <a href="/" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Back to Home</a>
        </div>

        <!-- Footer -->
        <footer class="text-center mt-5">
            <p>Copyright© <script>
                    document.write(new Date().getFullYear())
                </script> All Rights Reserved By <span class="text-primary fw-bold">EARTH LIBRARY</span></p>
        </footer>
    </div>
</div>

<?php include('templates/footer.php') ?>
