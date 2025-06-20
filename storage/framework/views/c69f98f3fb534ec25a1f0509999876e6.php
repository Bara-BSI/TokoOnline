<?php $__env->startSection('content'); ?>
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3> <?php echo e($subJudul); ?> </h3>
            </div>
            <div class="card-body">
                <div class="invoice-title text-center mb-3">
                    <h2>Detail Pesanan #<?php echo e($order->id); ?> </h2>
                    <strong>Tanggal:</strong> <?php echo e($order->created_at->format('d M Y H:i')); ?>

                </div>

                <form action="<?php echo e(route('pesanan.update', $order->id)); ?>" method="post">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>

                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <h5>Pelanggan</h5>
                            <address>
                                Nama: <?php echo e($order->customer->user->nama); ?> <br>
                                Email: <?php echo e($order->customer->user->email); ?> <br>
                                Hp: <?php echo e($order->customer->user->hp); ?> <br>
                            </address>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 text-right">
                            <h5>Ongkos Kirim</h5>
                            <address>
                                Kurir: <?php echo e($order->kurir); ?> <br>
                                Layanan: <?php echo e($order->layanan_ongkir); ?> <br>
                                Estimasi: <?php echo e($order->estimasi_ongkir); ?> Hari<br>
                                Berat: <?php echo e($order->total_berat); ?> Gram<br>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h5>Produk</h5>
                            <table class="table table-bordered table-hover display">
                                <thead>
                                    <tr>
                                        <th colspan="2">Produk</th>
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
                                            <td align="center">
                                                <img src="<?php echo e(asset('storage/img-produk/thumb_sm_' . $item->produk->foto)); ?>" alt="" width="60%">
                                            </td>
                                            <td class="details">
                                                <a> <?php echo e($item->produk->nama_produk); ?> #<?php echo e($item->produk->kategori->nama_kategori); ?> </a>
                                                <ul>
                                                    <li><span>Berat: <?php echo e($item->produk->berat); ?> Gram</span></li>
                                                    <li><span>Stok: <?php echo e($item->produk->stok); ?> Pcs</span></li>
                                                </ul>
                                            </td>
                                            <td class="price text-center">
                                                Rp. <?php echo e(number_format($item->harga, 0, ',', '.')); ?>

                                            </td>
                                            <td class="qty text-center">
                                                <a> <?php echo e($item->quantity); ?> </a>
                                            </td>
                                            <td class="total text-center">
                                                Rp. <?php echo e(number_format($item->harga * $item->quantity, 0, ',', '.')); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <td>Subtotal</td>
                                        <td colspan="2">Rp. <?php echo e(number_format($totalHarga, 0, ',', '.')); ?></td>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <td>Ongkos Kirim</td>
                                        <td colspan="2">Rp. <?php echo e(number_format($order->biaya_ongkir, 0, ',', '.')); ?></td>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <td>TOTAL BAYAR</td>
                                        <td colspan="2" class="total">Rp. <?php echo e(number_format($totalHarga + $order->biaya_ongkir, 0, ',', '.')); ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="noresi">No. Resi</label>
                                <input type="text" name="noresi" id="noresi" value="<?php echo e(old('noresi', $order->noresi)); ?>" class="form-control <?php $__errorArgs = ['noresi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Nomor Resi">
                                <?php $__errorArgs = ['noresi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="" <?php echo e(old('status',$order->status) == ''?'selected':''); ?>>
                                        - Pilih Status Pesanan -
                                    </option>
                                    <option value="Paid" <?php echo e(old('status',$order->status) == 'Paid'?'selected':''); ?>>
                                        Proses
                                    </option>
                                    <option value="Kirim" <?php echo e(old('status',$order->status) == 'Kirim'?'selected':''); ?>>
                                        Kirim
                                    </option>
                                    <option value="Selesai" <?php echo e(old('status',$order->status) == 'Selesai'?'selected':''); ?>>
                                        Selesai
                                    </option>
                                </select>
                                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">

                            <div class="form-group">
                                <label for="alamat">Alamat</label><br>
                                <textarea name="alamat" id="alamat" class="form-control <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ckeditor">
                                    <?php echo e(old('alamat', $order->alamat)); ?>

                                </textarea>
                                <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="pos">Kode Pos</label>
                                <input type="text" name="pos" id="pos" value="<?php echo e(old('pos', $order->pos)); ?>" class="form-control <?php $__errorArgs = ['pos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Nomor Resi">
                                <?php $__errorArgs = ['pos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo e(route('pesanan.proses')); ?>">
                        <button type="button" class="btn btn-secondary">Kembali</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel10/TokoOnline/resources/views/backend/v_pesanan/detail.blade.php ENDPATH**/ ?>