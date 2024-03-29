<?php 
$product_images = get_sub_field('product_images');
$title = get_sub_field('title');
$paragraphs = get_sub_field('paragraphs');
$product_links = get_sub_field('product_links');
?>

<div class="bg-white my-10 sm:my-14 md:my-16 w-full">
    <div
        class="w-full ctr xsm:max-w-screen-xsm sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl  ">
        <div
            class="w-full flex flex-col md:flex-row justify-between items-center ">
            <div style=""
                class="w-full md:w-[35%] bg-secondary shadow-secondary rounded-sm p-10 border border-opacity-25 border-link_water">

                <div style="" class="w-full ">
                    <img class="w-full h-full object-contain"
                        src="<?php echo $product_images['url'] ?>"
                        alt="">
                </div>

            </div>
            <div class="w-full md:w-[65%] md:px-6 lg:px-14 mt-4 md:mt-0 jd-layout-y-spacing">
                <h2 class="text-5xl font-bold text-primary"><?php echo $title ?>
                </h2>
                <div class="mt-4">
                    <?php foreach($paragraphs as $paragraph) {?>
                    <p class="my-3">
                        <?php echo $paragraph['paragraph'] ?>
                    </p>
                    <?php }?>
                </div>
                <div class="mt-8 flex text-white">
                    <?php foreach($product_links as $link) {?>
                    <a href="<?php echo $link['product_link']['url'] ?>"
                        class="my-3 uppercase mr-1 py-2 px-2 border border-secondary bg-white text-secondary hover:bg-secondary  hover:text-white ">
                        <?php echo $link['product_link']['title'] ?>
                    </a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var productSlider = new Swiper('.product-slider', {
    allowTouchMove: true,
    autoHeight: true,
    watchOverflow: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    // loop: true,
});

</script>