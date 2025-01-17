
<!DOCTYPE html>
<html>
  <head>
    <title>ToyNest</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" type="text/css" href=" <?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href=" <?php echo e(asset('css/vendor.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600&family=Nunito:wght@700;800;900;1000&display=swap" rel="stylesheet">

    <script src="<?php echo e(asset('js/modernizr.js')); ?>"></script>
  </head>

  <body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol xmlns="http://www.w3.org/2000/svg" id="navbar-icon" viewBox="0 0 16 16">
        <path d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="chevron-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="chevron-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/symbol" id="cart" viewBox="0 0 21 21">
        <g fill="none" fill-rule="evenodd">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M5 6.5h12.5l-1.586 5.55a2 2 0 0 1-1.923 1.45h-6.7a2 2 0 0 1-1.989-1.78L4.5 4.5h-2" />
          <g fill="currentColor" transform="translate(2 4)">
            <circle cx="5" cy="12" r="1" />
            <circle cx="13" cy="12" r="1" />
          </g>
        </g>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="quote" viewBox="0 0 167 130" fill="none">
        <g clip-path="url(#clip0_95_7)">
          <path d="M27 7.79997C31 2.59996 35 -0.200036 39 -0.60003C43.4 -1.40002 47 -0.600019 49.8 1.79997C53 3.79997 54.8 6.99997 55.2 11.4C55.6 15.8 53.8 20.6 49.8 25.8C43.4 34.2 38.8 42.8 36 51.6C33.6 60 32.4 67.8 32.4 75L30.6 63C41 63 49.4 66 55.8 72C62.2 77.6 65.4 85.4 65.4 95.4C65.4 105 62.4 113 56.4 119.4C50.4 125.4 42.6 128.4 33 128.4C22.6 128.4 14.4 125 8.4 118.2C2.8 111 0 100.8 0 87.6C0 79.2 0.6 70.6 1.8 61.8C3.4 52.6 6.2 43.4 10.2 34.2C14.6 25 20.2 16.2 27 7.79997ZM126.6 7.79997C130.6 2.59996 134.6 -0.200036 138.6 -0.60003C143 -1.40002 146.6 -0.600019 149.4 1.79997C152.6 3.79997 154.4 6.99997 154.8 11.4C155.2 15.8 153.4 20.6 149.4 25.8C143 34.2 138.4 42.8 135.6 51.6C133.2 60 132 67.8 132 75L130.2 63C140.6 63 149 66 155.4 72C161.8 77.6 165 85.4 165 95.4C165 105 162 113 156 119.4C150 125.4 142.2 128.4 132.6 128.4C122.2 128.4 114 125 108 118.2C102.4 111 99.6 100.8 99.6 87.6C99.6 79.2 100.2 70.6 101.4 61.8C103 52.6 105.8 43.4 109.8 34.2C114.2 25 119.8 16.2 126.6 7.79997Z" fill="#F7E4E4" />
        </g>
        <defs>
          <clipPath id="clip0_95_7">
            <rect width="167" height="130" fill="white" />
          </clipPath>
        </defs>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
        <g fill="none" stroke="currentColor" stroke-width="1.5">
          <circle cx="12" cy="6" r="4" />
          <path d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5Z" />
        </g>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="wishlist" viewBox="0 0 24 24">
        <path fill="currentColor" d="m8.962 18.91l.464-.588l-.464.589ZM12 5.5l-.54.52a.75.75 0 0 0 1.08 0L12 5.5Zm3.038 13.41l.465.59l-.465-.59Zm-5.612-.588C7.91 17.127 6.253 15.96 4.938 14.48C3.65 13.028 2.75 11.334 2.75 9.137h-1.5c0 2.666 1.11 4.7 2.567 6.339c1.43 1.61 3.254 2.9 4.68 4.024l.93-1.178ZM2.75 9.137c0-2.15 1.215-3.954 2.874-4.713c1.612-.737 3.778-.541 5.836 1.597l1.08-1.04C10.1 2.444 7.264 2.025 5 3.06C2.786 4.073 1.25 6.425 1.25 9.137h1.5ZM8.497 19.5c.513.404 1.063.834 1.62 1.16c.557.325 1.193.59 1.883.59v-1.5c-.31 0-.674-.12-1.126-.385c-.453-.264-.922-.628-1.448-1.043L8.497 19.5Zm7.006 0c1.426-1.125 3.25-2.413 4.68-4.024c1.457-1.64 2.567-3.673 2.567-6.339h-1.5c0 2.197-.9 3.891-2.188 5.343c-1.315 1.48-2.972 2.647-4.488 3.842l.929 1.178ZM22.75 9.137c0-2.712-1.535-5.064-3.75-6.077c-2.264-1.035-5.098-.616-7.54 1.92l1.08 1.04c2.058-2.137 4.224-2.333 5.836-1.596c1.659.759 2.874 2.562 2.874 4.713h1.5Zm-8.176 9.185c-.526.415-.995.779-1.448 1.043c-.452.264-.816.385-1.126.385v1.5c.69 0 1.326-.265 1.883-.59c.558-.326 1.107-.756 1.62-1.16l-.929-1.178Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="teddybear" viewBox="0 0 24 24">
        <path fill="currentColor" d="M15.75 19.13c-.83 0-1.5-.84-1.5-1.88c0-1.03.67-1.87 1.5-1.87s1.5.84 1.5 1.87c0 1.04-.67 1.88-1.5 1.88M12 11.25c-1.24 0-2.25-.84-2.25-1.87c0-1.04 1.01-1.88 2.25-1.88s2.25.84 2.25 1.88c0 1.03-1.01 1.87-2.25 1.87m-3.75 7.88c-.83 0-1.5-.84-1.5-1.88c0-1.03.67-1.87 1.5-1.87s1.5.84 1.5 1.87c0 1.04-.67 1.88-1.5 1.88M12 8.25c.41 0 .75.34.75.75s-.34.75-.75.75s-.75-.34-.75-.75s.34-.75.75-.75M18.75 12c-.32 0-.63.07-.91.2c-.48-.61-1.13-1.13-1.91-1.53c.57-.8.91-1.77.91-2.82v-.06c1.09-.23 1.91-1.2 1.91-2.37c0-1.33-1.09-2.42-2.42-2.42c-.69 0-1.33.29-1.75.75a4.813 4.813 0 0 0-5.16 0C9 3.29 8.36 3 7.67 3C6.34 3 5.25 4.09 5.25 5.42c0 1.16.82 2.13 1.9 2.37v.06c0 1.05.35 2.03.91 2.82c-.77.4-1.42.92-1.9 1.53A2.24 2.24 0 0 0 3 14.25c0 1.25 1 2.25 2.25 2.25h.06c-.04.24-.06.5-.06.75c0 2.07 1.34 3.75 3 3.75c1.01 0 1.9-.63 2.45-1.59c.42.06.85.09 1.3.09c.45 0 .88-.03 1.3-.09c.55.96 1.44 1.59 2.45 1.59c1.66 0 3-1.68 3-3.75c0-.25-.02-.51-.06-.75h.06c1.25 0 2.25-1 2.25-2.25S20 12 18.75 12"/>
      </symbol>
    </svg>

    <div class="preloader">
      <div class="loader">
        <div class="dot">
          <svg class="teddybear svg-white" width="40" height="40">
            <use xlink:href="#teddybear"></use>
          </svg>
        </div>
        <div class="dot">
          <svg class="teddybear svg-white" width="40" height="40">
            <use xlink:href="#teddybear"></use>
          </svg>
        </div>
        <div class="dot">
          <svg class="teddybear svg-white" width="40" height="40">
            <use xlink:href="#teddybear"></use>
          </svg>
        </div>
      </div>
    </div>

    <?php echo $__env->make('partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('toys.intro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('toys.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="scroll-top-btn" class="bg-light rounded-pill text-primary position-fixed">
      <svg class="teddybear" width="50" height="50">
        <use xlink:href="#teddybear"></use>
      </svg>
    </div>

    <?php echo $__env->make('toys.new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('toys.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partial/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('js/jquery-1.11.0.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/plugins.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/script.js')); ?>"></script>

  </body>
</html>
<?php /**PATH D:\Kuliah\BNCC\LNT\ToyStore\resources\views/index.blade.php ENDPATH**/ ?>