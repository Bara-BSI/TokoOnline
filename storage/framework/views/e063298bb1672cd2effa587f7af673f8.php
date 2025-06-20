<?php $__env->startSection('content'); ?>

<!-- contentAwal -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body border-top">
                <h5 class="card-title"><?php echo e($judul); ?></h5>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">
                        Selamat Datang, <?php echo e(Auth::user()->nama); ?>

                    </h4>
                    Aplikasi Toko Online dengan hak akses yang anda miliki sebagai
                    <b>
                        <?php if(Auth::user()->role == 1): ?>
                            Super Admin
                        <?php elseif(Auth::user()->role == 0): ?>
                            Admin
                        <?php else: ?>
                            Customer
                            
                        <?php endif; ?>
                    </b>
                    ini adalah halaman utama dari aplikasi Web Programming. Studi Kasus Toko Online
                    <hr>
                    <p class="mb-0">Kuliah..? BSI Aja !!!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contentAkhir -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel10/TokoOnline/resources/views/backend/v_beranda/index.blade.php ENDPATH**/ ?>