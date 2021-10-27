<?php 
 $guides = get_sub_field('guides');
?>

<div class="bg-white my-10 sm:my-14 md:my-16 w-full ">
    <div
        class="w-full ctr xsm:max-w-screen-xsm sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl">
        <div class="w-full flex  flex-wrap">
            <?php foreach($guides as $guide) {?>
            <div class="w-full sm:w-[45%] lg:w-[30%] xl:w-[22%] my-8  mx-4">
                <div class="w-full">
                    <div class="w-full">
                        <img src="<?php echo $guide['image']['url'] ?>" alt="">
                    </div>
                    <div class="mt-8 w-full text-center">
                        <h6 class="cursor-pointer hover:text-secondary">
                            <a
                                href="<?php echo $guide['file'] ?>"><?php echo $guide['title'] ?></a>
                        </h6>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>