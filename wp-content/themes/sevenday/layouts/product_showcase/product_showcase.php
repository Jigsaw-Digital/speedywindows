<?php 
$product_showcase = get_sub_field('product_showcase');
?>

<div class="bg-white my-10 sm:my-14 md:my-16 w-full jd-layout-y-spacing">
    <div
        class="w-full ctr xsm:max-w-screen-xsm sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl">
        <?php foreach($product_showcase as $product) {?>
        <div
            class="w-full flex lg:items-center flex-col lg:flex-<?php echo $product['direction'] ?> mb-10">
            <div class="w-full lg:w-[51%]">
                <img src="<?php echo $product['image']['url'] ?>" alt="">
            </div>
            <div class="w-full lg:w-[49%] lg:px-10 my-4 lg:my-0 ">
                
                <div>
                    <p
                        class=" lg:px-4 py-2 <?php echo $product['direction'] =='row' ? 'lg:text-left' : 'lg:text-right'  ?> clear-both">
                        <?php echo $product['description'] ?>
                    </p>
                </div>
                <div class="lg:px-4 py-2">
                    <a class="bg-white px-4 py-2 rounded-2xl text-primary hover:bg-primary hover:text-white border border-primary font-bold <?php echo $product['direction'] =='row' ? '' : 'lg:float-right'  ?>"
                        href="<?php echo $product['link']['url'] ?>"><?php echo $product['link']['title'] ?></a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>