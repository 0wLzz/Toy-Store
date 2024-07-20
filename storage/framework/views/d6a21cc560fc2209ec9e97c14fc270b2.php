<?php $__env->startSection('content'); ?>
        <h1 class="mt-4 mb-4" style="margin-top: 200px; margin-left: 100px">Add Product</h1>
        <div class="card mb-4" style="margin: 0px 150px 100px 150px;">
            <form  action="<?php echo e(route('store_toy')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="card-header d-flex justify-content-end">
                    <Button class="btn btn-primary">Save</Button>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <img id="previewImage" src="" style="max-height: 400px; max-height: 400px;">
                    </div>

                    <div class="mb-4">
                        <h4>Gambar</h4>

                        <input id="imageInput" class="form-control <?php echo e($errors->has('name') ? ' border-danger' : ''); ?>" type="file" name="image">
                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($message); ?> </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>


                    <div class="mb-4">
                        <h4>Category</h4>
                        <select class="form-select" name="category_id">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"> <?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <h4 for="" class="form-h4">Product Name</h4>

                        <input type="text" class="form-control <?php echo e($errors->has('name') ? ' border-danger' : ''); ?>" name="name" value="<?php echo e(old('name')); ?> ">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($message); ?> </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <h4>Stock</h4>
                    <div class=" input-group">
                        <input type="text" class="form-control" name="stock" <?php echo e($errors->has('stock') ? ' border-danger' : ''); ?>>
                        <span class="input-group-text" value ="<?php echo e(old('stock')); ?>">pcs</span>
                    </div>


                    <h4>Price</h4>
                    <div class=" input-group">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control <?php echo e($errors->has('price') ? ' border-danger' : ''); ?>" name="price" value="<?php echo e(old('price')); ?>">
                    </div>

                    <div class="mb-4">
                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($message); ?> </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>


                    <div class="mb-2">
                        <h4>Deskripsi</h4>

                        <textarea id="description" name="description" style="width: 100%; padding: 10px"></textarea>
                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($message); ?> </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                </div>
            </form>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\BNCC\LNT\ToyStore\resources\views/admin/menu/add.blade.php ENDPATH**/ ?>