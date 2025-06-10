<?php $__env->startSection('content'); ?>
    
    <!-- STORE -->
    <div id="store">
        <!-- row -->
        <div class="row">
            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Product Single -->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span>Kategori</span>
                                <span class="sale"> <?php echo e($row->kategori->nama_kategori); ?> </span>
                            </div>
                            <a href="<?php echo e(route('produk.detail', $row->id)); ?>">
                                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Detail Produk</button>
                            </a>
                            <img src="<?php echo e(asset('storage/img-produk/thumb_md_' . $row->foto)); ?>" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">
                                Rp. <?php echo e(number_format($row->harga, 0, ',', '.')); ?>

                                <span class="product-old-price"> <?php echo e($row->kategori->nama_kategori); ?> </span>
                            </h3>
                            <h2 class="product-name"><a href="#"> <?php echo e($row->nama_produk); ?> </a></h2>
                            <div class="product-btns">
                                <a href="<?php echo e(route('produk.detail', $row->id)); ?>" title="Detail Produk">
                                    <button class="main-btn icon-btn"><i class="fa fa-search-plus"></i></button>
                                </a>
                                <form action="<?php echo e(route('order.addToCart', $row->id)); ?>" method="post" style="display: inline-block;" title="Pesan ke Aplikasi">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="primary-btn add-to-cart">
                                        <i class="fa fa-shopping-cart"></i> Pesan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <div class="clearfix visible-md visible-lg visible-sm visible-xs"></div>
        </div>
        <!-- /row -->
    </div>
    <!-- /STORE -->
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel10/TokoOnline/resources/views/v_beranda/index.blade.php ENDPATH**/ ?>