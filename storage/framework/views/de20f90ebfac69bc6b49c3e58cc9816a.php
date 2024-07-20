<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="">Admin Page</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
                <form class="d-flex" method="GET" action="<?php echo e(route('search_toy')); ?>">
                    <?php echo csrf_field(); ?>
                    <input class="form-control me-2" type="search" placeholder="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </li>
            <li class="nav-item">
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="nav-link active text-danger">Log Out</button>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" aria-current="page" href="#">Login: <?php echo e($user->firstName); ?></a>
            </li>
        </ul>
    </div>
    </div>
  </nav>
<?php /**PATH D:\Kuliah\BNCC\LNT\ToyStore\resources\views/admin/partial/header.blade.php ENDPATH**/ ?>