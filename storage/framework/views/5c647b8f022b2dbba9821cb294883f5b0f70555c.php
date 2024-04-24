<?php if($errors->any()): ?>
<div style='color:red;width:30%; margin:0 auto'>
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
<?php if(session('status')): ?>
<div class="alert alert-success">
<?php echo e(session('status')); ?>

</div>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginal9bc712d664cfba3d75183eb23b84f04f8e4dc24a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AccountPanel::class, []); ?>
<?php $component->withName('account-panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<form method = 'post' action="<?php echo e(route('saveinfo')); ?>" style='width:30%; margin:0 auto'>
<div style='text-align:center;font-weight:bold;color:#15c;'>CẬP NHẬT THÔNG TIN CÁ NHÂN</div>
<label>Tên</label>
<input type='text' class='form-control form-control-sm' name='name' value="<?php echo e($user->name); ?>">
<label>Email</label>
<input type='text' class='form-control form-control-sm' name='email' value="<?php echo e($user->email); ?>">
<label>Số điện thoại</label>
<input type='text' class='form-control form-control-sm' name='phone' value="<?php echo e($user->phone); ?>">
<input type ='hidden' value='<?php echo e($user->id); ?>' name='id'>
<?php echo e(csrf_field()); ?>

<div style='text-align:center;'><input type='submit' class='btn btn-primary mt-1' value='Lưu'></div>
</form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bc712d664cfba3d75183eb23b84f04f8e4dc24a)): ?>
<?php $component = $__componentOriginal9bc712d664cfba3d75183eb23b84f04f8e4dc24a; ?>
<?php unset($__componentOriginal9bc712d664cfba3d75183eb23b84f04f8e4dc24a); ?>
<?php endif; ?>

<?php /**PATH C:\laravel\webtmdt\resources\views/vidusach/account.blade.php ENDPATH**/ ?>