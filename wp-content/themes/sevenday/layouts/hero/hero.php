<?php 
    $background_image = get_sub_field('background_image');
    $title = get_sub_field('title');
    $sub_text = get_sub_field('sub_text');
    $paragraph = get_sub_field('paragraph');
    $link = get_sub_field('link');
?>


<div class="relative w-full h-[350px] lg:h-[700px] bg-cover bg-no-repeat p-5 2xl:p-0"style="background-image:linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $background_image['url']?>'); background-position-y: center;">
    <div class="lg:absolute top-1/4 right-0 left-0 text-white uppercase container mx-auto my-auto flex flex-col px-0 lg:px-10">
        <div class=" text-3xl lg:text-5xl "><?php echo $title?></div>
        <div class="text-xl lg:text-2xl mb-4"><?php echo $sub_text?></div>
        <div class="text-sm lg:text-base w-full lg:w-1/2 my-4"><?php echo $paragraph?></div>
        <a href="<?php echo $link['url'] ?>"
            class="uppercase mr-1 py-2 px-2 w-3/5 lg:w-1/6 text-center border border-primary bg-primary text-white hover:bg-white  hover:text-primary ">
            <?php echo $link['title'] ?>
        </a>
    </div>
</div>

