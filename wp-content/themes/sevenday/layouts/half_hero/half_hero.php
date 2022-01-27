<?php 
    $background_image = get_sub_field('background_image');
    $left_column = get_sub_field('left_column');
    $right_column = get_sub_field('right_column');
    
?>


<div class="relative w-full tracking-tighter font-roboto h-[700px]lg:h-[350px] bg-cover bg-no-repeat p-5 2xl:p-0"style="background-image:linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $background_image['url']?>'); background-position-y: center;">
    <div class="flex flex-wrap container mx-auto my-auto">
        <div class="w-full lg:w-1/2 text-white my-10">
            <?php foreach($left_column as $left) {?>
            <div class="lg:my-10 ">
            <div class=" text-3xl lg:text-4xl">
                <?php echo $left['title']?>
            </div>
            <div class="text-xl lg:text-2xl mb-4">
                <?php echo $left['sub_text']?>
            </div>
            <div class="text-sm  w-full lg:w-1/2 mt-4 mb-8"><?php echo $left['paragraph']?></div>
            <a href="<?php echo $left['link']['url'] ?>"
                class="uppercase mr-1 py-2 px-2 w-3/5 lg:w-1/6 text-center border border-primary bg-primary text-white hover:bg-white  hover:text-primary ">
                <?php echo $left['link']['title'] ?>
            </a>
            </div>
            <?php } ?>
        </div>
        <div class="w-full lg:w-1/2 lg:mb-10 lg:mt-20">
            <?php foreach($right_column as $right) {?>
            <div class="w-3/4 mx-auto my-10 bg-[#3F3F3F] text-white p-5 ">
                <div class=" text-2xl">
                    <?php echo $right['title']?>
                </div>
            
                <div class="text-sm w-full my-4">
                    <?php echo $right['paragraph']?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
