<?php $__env->startSection('content'); ?>
    

    <div class="col-md-12">
        <div class="order-summary clearfix">
            <div class="section-title">
                <p>KERANJANG</p>
                <h3 class="title">Keranjang Belanja</h3>
            </div>

            
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        <?php echo e(session('success')); ?>

                    </strong>
                </div>
            <?php endif; ?>
            

            
            <?php if(session()->has('error')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        <?php echo e(session('error')); ?>

                    </strong>
                </div>
            <?php endif; ?>
            

            <?php if($order && $order->orderItems->count() > 0): ?>
                <table class="shopping-cart-table table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th></th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $totalHarga = 0;
                            $totalBerat = 0;
                        ?>

                        <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $totalHarga += $item->harga * $item->quantity;
                                $totalBerat += $item->produk->berat * $item->quantity;
                            ?>
                            <tr>
                                <td class="thumb">
                                    <img src="<?php echo e(asset('storage/img-produk/thumb_sm_') . $item->produk->foto); ?>" alt="">
                                </td>

                                <td class="details">
                                    <a><?php echo e($item->produk->nama_produk); ?></a>
                                    <ul>
                                        <li>
                                            <span>
                                                Berat: <?php echo e($item->produk->berat); ?> Gram
                                            </span>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span>
                                                Stok: <?php echo e($item->produk->stok); ?>

                                            </span>
                                        </li>
                                    </ul>
                                </td>

                                <td class="price text-center">
                                    <strong>
                                        Rp. <?php echo e(number_format($item->harga, 0, ',', '.')); ?>

                                    </strong>
                                </td>

                                <td class="qty text-center">
                                    <form action="<?php echo e(route('order.updateCart', $item->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="number" name="quantity" id="quantity" value="<?php echo e($item->quantity); ?>" min="1" style="width: 60px">
                                        <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                    </form>
                                </td>

                                <td class="total text-center">
                                    <strong class="primary-color">
                                        Rp. <?php echo e(number_format($item->harga * $item->quantity, 0, ',', '.')); ?>

                                    </strong>
                                </td>

                                <td class="text-right">
                                    <form action="<?php echo e(route('order.remove', $item->produk->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <button class="main-btn icon-btn">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <form action="<?php echo e(route('order.select-shipping')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="total_price" value="<?php echo e($totalHarga); ?>">
                    <input type="hidden" name="total_weight" value="<?php echo e($totalBerat); ?>">
                    <div class="pull-right">
                        <button class="primary-btn">
                            Pilih Pengiriman
                        </button>
                    </div>
                </form>
            <?php else: ?>
                <p>Keranjang belanja kosong.</p>
            <?php endif; ?>
        </div>
    </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel10/TokoOnline/resources/views/v_order/cart.blade.php ENDPATH**/ ?>