<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-center align-items-start flex-column gap-4 table-responsive">
        <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="<?php echo e(route('add_toy')); ?>">
            + Add Toy
        </a>

        <div class="d-flex justify-content-center align-items-center gap-4">
            <a class="btn btn-outline-dark" href="<?php echo e(route('admin_table')); ?>">All Categories</a>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="btn btn-outline-dark" href="<?php echo e(route('category_toy', $category)); ?>"> <?php echo e($category->name); ?> </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <h3>Toy List</h3>
        <table class="table table-hover table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $num = 1;
                ?>
                <?php $__currentLoopData = $toys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="vertical-align: middle">
                        <th scope="row"><?php echo e($num++); ?></th>
                        <td class="text-center">
                            <img src="<?php echo e($toy->image ? asset('img/' . $toy->image) : 'https://placehold.co/400/orange/white?text=Toy'); ?>" alt="food-image">
                        </td>
                        <td>
                            <?php echo e($toy->name); ?>

                        </td>
                        <td><?php echo e($toy->category->name); ?></td>
                        <td><?php echo e("$" . number_format($toy->price, 0, ',', '.')); ?></td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-4">
                                <a class="btn btn-outline-primary" href="<?php echo e(route('edit_toy', $toy)); ?>">
                                    <i class="bi bi-pen"></i>
                                </a>

                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#Modal<?php echo e($num); ?>">
                                    <i class="bi bi-trash"></i>
                                </button>

                                <div class="modal fade" id="Modal<?php echo e($num); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 justify-content-center" id="exampleModalLabel">Apakah <?php echo e($toy->name); ?> ingin dihapus?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-footer justify-content-center">
                                          <form action="<?php echo e(route('delete_toy', $toy)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger">
                                                    Iya
                                                </button>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\BNCC\LNT\ToyStore\resources\views/admin/menu/table.blade.php ENDPATH**/ ?>