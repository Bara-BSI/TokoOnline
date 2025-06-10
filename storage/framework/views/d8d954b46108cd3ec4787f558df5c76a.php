<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <div class="order-summary clearfix">
            <div class="section-title">
                <p>KERANJANG</p>
                <h3 class="title">Keranjang Belanja</h3>
            </div>
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        <?php echo e(session('success')); ?>

                    </strong>
                </div>
            <?php endif; ?>
            <?php if(session()->has('error')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                                    <img src="<?php echo e(asset('storage/img-produk/thumb_sm_' . $item->produk->foto)); ?>" alt="">
                                </td>
                                <td class="details">
                                    <a href=""> <?php echo e($item->produk->nama_produk); ?> </a>
                                    <ul><li><span>
                                        Berat: <?php echo e($item->produk->berat); ?> Gram
                                    </span></li></ul>
                                    <ul><li><span>
                                        Stok: <?php echo e($item->produk->stok); ?>

                                    </span></li></ul>
                                </td>
                                <td class="price text-center"><strong>
                                    Rp. <?php echo e(number_format($item->harga, 0, ',', '.')); ?>

                                </strong></td>
                                <td class="qty text-center">
                                    <a href=""> <?php echo e($item->quantity); ?> </a>
                                </td>
                                <td class="total text-center"><strong class="primary-color">
                                    Rp. <?php echo e(number_format($item->harga * $item->quantity, 0, ',', '.')); ?>

                                </strong></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="empty" colspan="3"></th>
                            <th>SUBTOTAL</th>
                            <th class="sub-total" colspan="2">
                                Rp. <?php echo e(number_format($totalHarga, 0, ',', '.')); ?>

                            </th>
                        </tr>
                        <tr>
                            <th class="empty" colspan="3"></th>
                            <th>Ongkos Kirim</th>
                            <td colspan="2">
                                Rp. <?php echo e(number_format($order->biaya_ongkir, 0, ',', '.')); ?> <br>
                                <?php echo e($order->kurir.'.'.$order->layanan_ongkir.' *estimasi '. $order->estimasi_ongkir.' Hari'); ?>

                                <?php if(session('origin')): ?>
                                    <p>Kota asal: <?php echo e($originName); ?> </p>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="empty" colspan="3"></th>
                            <th>TOTAL BAYAR</th>
                            <th class="total" colspan="2">
                                Rp. <?php echo e(number_format($totalHarga + $order->biaya_ongkir, 0, ',', '.')); ?>

                            </th>
                        </tr>
                    </tfoot>
                </table>

                <input type="hidden" name="total_price" value="<?php echo e($totalHarga); ?>">
                <input type="hidden" name="total_weight" value="<?php echo e($totalBerat); ?>">
                <div class="pull-right">
                    <button class="primary-btn" id="pay-button">Bayar Sekarang</button>
                </div>
            <?php else: ?>
                <p>Keranjang belanja kosong.</p>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel10/TokoOnline/resources/views/v_order/select_payment.blade.php ENDPATH**/ ?>