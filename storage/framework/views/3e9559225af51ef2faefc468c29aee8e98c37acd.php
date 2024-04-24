<?php if (isset($component)) { $__componentOriginalfd852271d608279d43b6725e3adf4e94dfb6ed83 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BookLayout::class, []); ?>
<?php $component->withName('book-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        Sách
     <?php $__env->endSlot(); ?>
<div class='list-book'>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class='book'>
            <a href="<?php echo e(url('sach/chitiet/'.$row->id)); ?>">
                <img src="<?php echo e(asset('book_image/' . $row->file_anh_bia)); ?>" width='200px'
                height='200px'><br>
            </a>
                <b><?php echo e($row->tieu_de); ?></b><br/>
                <i><?php echo e(number_format($row->gia_ban,0,",",".")); ?>đ</i>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfd852271d608279d43b6725e3adf4e94dfb6ed83)): ?>
<?php $component = $__componentOriginalfd852271d608279d43b6725e3adf4e94dfb6ed83; ?>
<?php unset($__componentOriginalfd852271d608279d43b6725e3adf4e94dfb6ed83); ?>
<?php endif; ?>

<?php /**PATH C:\laravel\webtmdt\resources\views/vidusach/index.blade.php ENDPATH**/ ?>