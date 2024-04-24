<?php if (isset($component)) { $__componentOriginal9bc712d664cfba3d75183eb23b84f04f8e4dc24a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AccountPanel::class, []); ?>
<?php $component->withName('account-panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div class="panel panel-default" style="width:50%; margin:0 auto;">
        <div class="panel-body">
            <form action="<?php echo e(route('booksave', ['action' => $action])); ?>" method = "post" enctype="multipart/form-data">
            <?php if($action == "add"): ?>
            <div style='text-align:center;font-weight:bold;color:#15c;'>THÊM THÔNG TIN SÁCH</div>
            <?php else: ?>
            <div style='text-align:center;font-weight:bold;color:#15c;'>SỬA THÔNG TIN SÁCH</div>
            <?php endif; ?>
                <label>Tiêu đề</label>
                <input type='text' class='form-control form-control-sm' name='tieu_de' value="">
                <label>Nhà xuất bản</label>
                <input type='text' class='form-control form-control-sm' name='nha_xuat_ban' value="">
                <label>Nhà cung cấp</label>
                <input type='text' class='form-control form-control-sm' name='nha_cung_cap' value="">
                <label>Tác giả</label>
                <input type='text' class='form-control form-control-sm' name='tac_gia' value="">
                <label>Hình thức bìa</label>
                <input type='text' class='form-control form-control-sm' name='hinh_thuc_bia' value="">
                <label>Giá bán</label>
                <input type='text' class='form-control form-control-sm' name='gia_ban' value="">
                <label>Thể loại</label>
                <select name='the_loai' class='form-control form-control-sm'>
                <?php
                $selected = isset($sach->the_loai)?$sach->the_loai:"";
                ?>
                <?php $__currentLoopData = $the_loai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value='<?php echo e($row->id); ?>' <?php echo e($selected==$row->id?'selected':''); ?>>
                <?php echo e($row->ten_the_loai); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <label>Ảnh đại diện</label><br>
                <?php if($action=="edit"): ?>
                <img src="<?php echo e(asset('storage/book_image/'.$sach->file_anh_bia)); ?>" width="50px" class='mb-1'/>
                <input type ='hidden' value='<?php echo e($sach->id); ?>' name='id'>
                <?php endif; ?>
                <input type="file" name="file_anh_bia" accept="image/*" class="form-control-file">
                <?php echo e(csrf_field()); ?>

                <div style='text-align:center;'><input type='submit' class='btn btn-primary mt-1' value='Lưu'></div>
                </form>
                <?php if($errors->any()): ?>
<div style='color:red; margin:0 auto'>
<div >
<?php echo e(__('Whoops! Something went wrong.')); ?>

</div>
<ul>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li><?php echo e($error); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<?php endif; ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bc712d664cfba3d75183eb23b84f04f8e4dc24a)): ?>
<?php $component = $__componentOriginal9bc712d664cfba3d75183eb23b84f04f8e4dc24a; ?>
<?php unset($__componentOriginal9bc712d664cfba3d75183eb23b84f04f8e4dc24a); ?>
<?php endif; ?><?php /**PATH C:\laravel\webtmdt\resources\views/vidusach/book_form.blade.php ENDPATH**/ ?>