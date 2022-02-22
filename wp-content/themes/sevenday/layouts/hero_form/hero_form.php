<?php 
    $background_image = get_sub_field('background_image');
    $title = get_sub_field('title');
    $sub_text = get_sub_field('sub_text');
    $paragraph = get_sub_field('paragraph');
    $link = get_sub_field('link');
    $icons = get_sub_field('icons');
    $banner_title = get_sub_field('banner_title');
    $banner_paragraph = get_sub_field('banner_paragraph');
?>


<div class="relative w-full  bg-cover bg-no-repeat p-5 2xl:p-0 "style="background-image:linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $background_image['url']?>'); background-position-y: center;">
    <div class="container m-auto flex flex-wrap py-8 sm:py-16 lg:py-40">
        <div class="w-full lg:w-1/2 text-white uppercase container flex flex-col px-0 lg:px-10 my-10  lg:my-auto">
            <div class=" text-3xl lg:text-5xl "><?php echo $title?></div>
            <div class="text-xl lg:text-2xl mb-4"><?php echo $sub_text?></div>
            <div class="text-sm lg:text-base w-full my-4"><?php echo $paragraph?></div>
            <a href="<?php echo $link['url'] ?>"
                class="uppercase mr-1 py-2 px-2 w-full lg:w-1/3 text-center border border-primary bg-primary text-white hover:bg-white  hover:text-primary ">
                <?php echo $link['title'] ?>
            </a>
            
        </div>
        <div class="w-full lg:w-1/3 bg-[#3F3F3F] rounded-lg container m-auto p-10 hero_form">
            <?php echo do_shortcode('[gravityform id="2" title="false" title="true" description="true"]') ?>
        </div>
    </div>
</div>
<div class="relative flex flex-wrap lg:flex-row justify-between w-full bg-tertiary py-8">
    <div
        class="w-full lg:w-4/6  container mx-auto ">
        <div
            class="w-full flex mx-auto  text-white flex-wrap lg:flex-row lg:ml-5">
            <?php foreach($icons as $icon) {?>
            <div class="flex flex-row mx-auto py-2">
                <span class="text-white text-3xl"><i
                        class="fas fa-<?php echo $icon['icon'] ?>"></i></span>
                <span
                    class="mx-4 my-auto whitespace-nowrap text-primary_v1"><?php echo $icon['text'] ?></span>
            </div>
            <?php }?>

        </div>
    </div>
    <div class="hidden lg:block lg:w-2/6 uppercase -mt-60 lg:-mt-48 xl:-mt-40 2xl:-mt-32 ">
    <?php 

            $banner_title = get_sub_field('banner_title');
            $banner_paragraph = get_sub_field('banner_paragraph');

            if( !empty($banner_paragraph) || !empty($banner_title)): ?>
            <div class="mx-8 2xl:mx-16   bg-[#3F3F3F] text-white p-5 ">
                <div class="text-2xl my-3"><?php echo $banner_title ?></div>
                <div><?php echo $banner_paragraph ?></div>
            </div>
        <?php endif; ?>
    </div>
    
</div>
<div class="block lg:hidden w-full uppercase ">
        <div class="bg-[#3F3F3F] text-white p-5">
            <div class="text-2xl my-3"><?php echo $banner_title ?></div>
            <div><?php echo $banner_paragraph ?></div>
        </div>
    </div>