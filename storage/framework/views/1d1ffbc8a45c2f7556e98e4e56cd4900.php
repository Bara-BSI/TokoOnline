<style>
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ccc;
    }
    
    table tr td{
        padding: 6px;
        font-weight: normal;
        border: 1px solid #ccc;
    }

    table th{
       border: 1px solid #ccc;
    }
</style>

<table>
    <tr>
        <td align="left">
            <img src="<?php echo e(asset('image/icon_univ_bsi.png')); ?>" alt="" width="8%">
        </td>
    </tr>
    <tr>
        <td align="left">
            <h2>Detail Pesanan #<?php echo e($order->id); ?> </h2>
            <strong>Tanggal:</strong> <?php echo e($order->created_at->format('d M Y H:i')); ?>

        </td>
    </tr>
</table>
<p></p>

<table>
    <tr>
        <td align="left" style="border:hidden;">
            <h5>Ongkos Kirim</h5>
            <address>
                <?php if($order->noresi): ?>
                    No. Resi: <?php echo e($order->noresi); ?> <br>
                <?php else: ?>
                    No. Resi &lt;&lt;dalam proses&gt;&gt; <br>
                <?php endif; ?>
                Status: <?php echo e($order->status); ?> <br>
                Kurir: <?php echo e($order->kurir); ?> <br>
                Layanan: <?php echo e($order->layanan_ongkir); ?> <br>
                Estimasi: <?php echo e($order->estimasi_ongkir); ?> Hari<br>
                Berat: <?php echo e($order->total_berat); ?> Gram<br>
            </address>
        </td>
    </tr>
</table>
<p></p>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Quality</th>
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
                <td> <?php echo e($loop->iteration); ?> </td>
                <td class="details">
                    <a> <?php echo e($item->produk->nama_produk); ?> #<?php echo e($item->produk->kategori->nama_kategori); ?> </a>
                    <ul>
                        <li><span>Berat: <?php echo e($item->produk->berat); ?> Gram</span></li>
                        <li><span>Stok: <?php echo e($item->produk->stok); ?> Gram</span></li>
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
            <td colspan="2">
                Rp. <?php echo e(number_format($totalHarga, 0, ',', '.')); ?>

            </td>
        </tr>
        <tr>
            <th class="empty" colspan="3"></th>
            <td>Ongkos Kirim</td>
            <td colspan="2">
                Rp. <?php echo e(number_format($order->biaya_ongkir, 0, ',', '.')); ?>

            </td>
        </tr>
        <tr>
            <th class="empty" colspan="3"></th>
            <td><b>Total Bayar</b></td>
            <td colspan="2" class="total"><b>
                Rp. <?php echo e(number_format($totalHarga + $order->biaya_ongkir, 0, ',', '.')); ?>

            </b></td>
        </tr>
    </tfoot>
</table>

<script>
    window.onload = function () {
        printStruk();
    }

    function printStruk() {
        window.print();
    }
</script><?php /**PATH /var/www/html/laravel10/TokoOnline/resources/views/backend/v_pesanan/invoice.blade.php ENDPATH**/ ?>