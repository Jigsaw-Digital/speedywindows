<?php 
    $icons = get_sub_field('icons');
    $banner_title = get_sub_field('banner_title');
    $banner_paragraph = get_sub_field('banner_paragraph');
?>

<div class="relative flex flex-row justify-between w-full bg-tertiary py-8">
    <div
        class="w-full lg:w-4/6  container mx-auto ">
        <div
            class="w-full flex mx-auto  text-white flex-col md:flex-wrap lg:flex-row">
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
    <div class="lg:w-2/6 uppercase -mt-60 lg:-mt-48 xl:-mt-40 2xl:-mt-32 ">
        <div class="hidden lg:block mx-8 2xl:mx-16   bg-secondary text-white p-5">
            <div class="text-2xl my-3"><?php echo $banner_title ?></div>
            <div><?php echo $banner_paragraph ?></div>
        </div>
    </div>
</div>
