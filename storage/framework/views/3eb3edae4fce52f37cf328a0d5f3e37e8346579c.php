<?php if (isset($component)) { $__componentOriginal9bc712d664cfba3d75183eb23b84f04f8e4dc24a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AccountPanel::class, []); ?>
<?php $component->withName('account-panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div style='text-align:center; color:#15c; font-weight:bold; font-size:20px;'>QUẢN LÝ SÁCH</div>
    <a href="<?php echo e(route('bookcreate')); ?>" class='btn btn-sm btn-success mb-1'>Thêm</a>
    <?php if(session('status')): ?>
<div class="alert alert-success">
<?php echo e(session('status')); ?>

</div>
<?php endif; ?>
    <table id = "book-table" class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Nhà xuất bản</th>
                <th>Nhà cung cấp</th>
                <th>Tác giả</th>
                <th>Hình thức bìa</th>
                <th>Giá bán</th>
                <th>Hình ảnh</th>
                <th width="120px">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td ><?php echo e($row->tieu_de); ?></td>
                <td><?php echo e($row->nha_xuat_ban); ?></td>
                <td><?php echo e($row->nha_cung_cap); ?></td>
                <td><?php echo e($row->tac_gia); ?></td>
                <td><?php echo e($row->hinh_thuc_bia); ?></td>
                <td><?php echo e($row->gia_ban); ?></td>
                <td><img src="<?php echo e(asset('storage/book_image/'. $row->file_anh_bia)); ?>" width="50px"></td>
                <td>
                    <div class="btn-group">
                        <a href="<?php echo e(route('bookedit', ['id' => $row->id])); ?>" class='btn btn-sm btn-primary'>Sửa</a>
                        &nbsp;
                        <form method='post' action = "<?php echo e(route('bookdelete')); ?>" onsubmit="return confirm('Bạn có chắc chắn muốn xóa cuốn sách này không?');">
                            <input type='hidden' value='<?php echo e($row->id); ?>' name='id'>
                            <input type='submit' class='btn btn-sm btn-danger' value='Xóa'>
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bc712d664cfba3d75183eb23b84f04f8e4dc24a)): ?>
<?php $component = $__componentOriginal9bc712d664cfba3d75183eb23b84f04f8e4dc24a; ?>
<?php unset($__componentOriginal9bc712d664cfba3d75183eb23b84f04f8e4dc24a); ?>
<?php endif; ?>
<script>
    $(document).ready(function(){
        new DataTable('#book-table', {
            responsive: true,
            "bStateSave":true
            });
    });
</script>

<?php /**PATH C:\laravel\webtmdt\resources\views/vidusach/book_list.blade.php ENDPATH**/ ?>