<?php $__env->startSection('content'); ?>
    

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Order</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Pelanggan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $index; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e($loop->iteration); ?> </td>
                                    <td> <?php echo e($row->id); ?> </td>
                                    <td> <?php echo e($row->created_at->format('d M Y H:i')); ?> </td>
                                    <td>
                                        Rp. <?php echo e(number_format($row->total_harga + $row->biaya_ongkir,0,',','.')); ?>

                                    </td>
                                    <td>
                                        <?php if($row->status == 'Paid'): ?>
                                            <span class="badge badge-primary">Proses</span>
                                        <?php else: ?>
                                            <span class="badge badge-warning" style="color:white">
                                                <?php echo e($row->status); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td> <?php echo e($row->customer->user->email); ?> </td>
                                    <td>
                                        <a href="<?php echo e(route('pesanan.detail', $row->id)); ?>" title="detail Order">
                                            <button class="badge badge-primary" type="button">
                                                <i class="far fa-eye"></i> Detail
                                            </button>
                                        </a>

                                        <a href="<?php echo e(route('pesanan.invoice', $row->id)); ?>" title="Cetak Invoice" target="_blank">
                                            <button class="badge badge-secondary" type="button">
                                                <i class="fas fa-print"></i> Cetak
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel10/TokoOnline/resources/views/backend/v_pesanan/proses.blade.php ENDPATH**/ ?>