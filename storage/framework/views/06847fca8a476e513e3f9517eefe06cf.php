<?php $__env->startSection('content'); ?>
    

    
    <div class="row">
        <div class="col-md-12">
            <div class="billing-details">
                <div class="section-title">
                    <h3 class="title">
                        <?php echo e($judul); ?>

                    </h3>
                </div>
            </div>
        </div>
        
        <div class="product product-details clearfix">
            <div class="col-md-6">
                <div id="product-main-view">
                    <div class="product-view">
                        <img src="<?php echo e(asset('storage/img-produk/thumb_lg_' . $row->foto)); ?>" alt="">
                    </div>
                    <?php $__currentLoopData = $fotoProdukTambahan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="produk-view">
                            <?php if($item->produk_od == $row->id): ?>
                                <img src="<?php echo e(asset('storage/img-produk/' . $item->foto)); ?>" alt="">
                            <?php else: ?>
                                
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div id="product-view">
                    <div class="product-view">
                        <img src="<?php echo e(asset('storage/img-produk/thumb_sm_' . $row->foto)); ?>" alt="">
                    </div>
                    <?php $__currentLoopData = $fotoProdukTambahan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-view">
                            <?php if($item->produk_id == $row->id): ?>
                                <img src="<?php echo e(asset('storage/img-produk/' . $item->foto)); ?>" alt="">
                            <?php else: ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-body">
                    <div class="product-label">
                        <span>Kategori</span>
                        <span class="sale">
                            <?php echo e($row->kategori->nama_kategori); ?>

                        </span>
                    </div>
                    <h2 class="product-name"> <?php echo e($row->nama_produk); ?> </h2>
                    <h3 class="product-price"> Rp. <?php echo e(number_format($row->harga, 0, ',', '.')); ?> </h3>
                    <p> <?php echo $row->detail; ?> </p>
                    <div class="product-options">
                        <ul class="size-option">
                            <li><span class="text-uppercase">Berat:</span></li>
                            <?php echo e($row->berat); ?> Gram
                        </ul>
                        <ul class="size-option">
                            <li><span class="text-uppercase">Stok:</span></li>
                            <?php echo e($row->stok); ?>

                        </ul>
                    </div>

                    <div class="product-btns">
                        <form action="#" method="post" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="primary-btn add-to-cart">
                                <i class="fa fa-shopping-cart"></i> Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /srv/www/htdocs/laravel10/TokoOnline/resources/views/v_produk/detail.blade.php ENDPATH**/ ?>