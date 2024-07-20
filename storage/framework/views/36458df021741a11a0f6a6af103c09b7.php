
<section id="category" class="my-lg-12 py-lg-7 mb-lg-0 position-relative bg-light">
    <div class="cloud-overlay position-absolute overflow-x-hidden w-100">
      <img src="<?php echo e(asset('assets/cloud-pattern-overlay.png')); ?>" alt="icon overlay">
    </div>
    <div class="container-lg">
      <div class="row justify-content-center">
        <div class="display-header text-center position-relative">
          <h2 class="display-2">Category</h2>
          <div class="icon-overlay position-absolute">
            <img src="<?php echo e(asset('assets/star-icon-overlay.png')); ?>" alt="icon overlay">
          </div>
        </div>
      </div>

      <div class="row">
        <?php
            $num = 1;
        ?>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="image-holder position-relative">
                    <img src="<?php echo e(asset('assets/cate-item' . $num++ .'.jpg')); ?>" alt="dress" class="img-fluid rounded-4" style="aspect-ratio: 16 / 9; object-fit: cover;">
                    <div class="btn-wrap position-absolute d-flex align-items-center justify-content-center">
                        <a href="<?php echo e(route('category_toy_main', $category)); ?>" class="btn btn-md btn-light text-uppercase rounded-0"> <?php echo e($category->name); ?> </a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </section>
<?php /**PATH D:\Kuliah\BNCC\LNT\ToyStore\resources\views/toys/category.blade.php ENDPATH**/ ?>