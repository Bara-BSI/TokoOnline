<?php $__env->startSection('content'); ?>
    
    <?php $__env->startSection('content'); ?>
        <div class="col-md-12">
            <div class="order-summary clearfix">
                <div class="section-title">
                    <p>HISTORY</p>
                    <h3 class="title">HISTORY PESANAN</h3>
                </div>
                
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span">
                        </button>
                        <strong><?php echo e(session('success')); ?></strong>
                    </div>
                <?php endif; ?>
                
                <?php if($orders->count() > 0): ?>
                    <table class="shopping-cart-table table">
                        <thead>
                            <tr>
                                <th>ID Pesanan</th>
                                <th>Tanggal</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($order->id); ?></td>
                                    <td><?php echo e($order->created_at->format('d M Y H:i')); ?></td>
                                    <td>Rp. <?php echo e(number_format($order->total_harga + $order->biaya_ongkir, 0, ',', '.')); ?> </td>
                                    <td>
                                        <?php if($order->status=='Paid'): ?>
                                            Proses
                                        <?php else: ?>
                                            <?php echo e($order->status); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="primary-btn" data-toggle="modal" data-target="#orderDetailModal<?php echo e($order->id); ?>">
                                            Lihat Detail
                                        </button>
                                        <a href="<?php echo e(route('order.invoice', $order->id)); ?>" target="_blank">
                                            <button type="button" class="primary-btn">Invoice</button>
                                        </a>
                                        
                                        <div class="modal fade" id="orderDetailModal<?php echo e($order->id); ?>" tabindex="-1" role="dialog" aria-labelledby="orderDetailModalLabel<?php echo e($order->id); ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="orderDetailModalLabel<?php echo e($order->id); ?>">
                                                            Detail Pesanan #<?php echo e($order->id); ?>

                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama Produk</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Harga</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td> <?php echo e($item->produk->nama_produk); ?> </td>
                                                                        <td> <?php echo e($item->quantity); ?> </td>
                                                                        <td>Rp. <?php echo e(number_format($item->harga, 0, ',', '.')); ?> </td>
                                                                        <td>Rp. <?php echo e(number_format($item->harga * $item->quantity, 0, ',', '.')); ?> </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                                            Tutup
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Anda belum memiliki riwayat pesanan.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
    
    <div class="col-md-12">
        <div class="order-summary clearfix">
            <div class="section-title">
                <h3 class="title">Order Review</h3>
            </div>
            <?php if($orders->count() > 0): ?>
                <table class="shopping-cart-table table">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Tanggal</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <?php echo e($item->produk->nama_produk); ?> </td>
                                <td> <?php echo e($item->quantity); ?> </td>
                                <td>Rp. <?php echo e(number_format($item->harga, 0, ',', '.')); ?> </td>
                                <td>Rp. <?php echo e(number_format($item->harga * $item->quantity, 0, ',', '.')); ?> </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <button class="primary-btn">
                        Place Order
                    </button>
                </div>
            <?php else: ?>
                <p>Anda belum memiliki riwayat pesanan.</p>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel10/TokoOnline/resources/views/v_order/history.blade.php ENDPATH**/ ?>