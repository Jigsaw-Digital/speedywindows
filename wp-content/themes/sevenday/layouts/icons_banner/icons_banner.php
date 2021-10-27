<?php 
    $icons = get_sub_field('icons');
?>

<div class="w-full bg-tertiary py-8">
    <div
        class="ctr lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl w-full">
        <div
            class="w-full flex mx-auto md:justify-center text-white flex-wrap xl:flex-nowrap">
            <?php foreach($icons as $icon) {?>
            <div class="flex lg:w-auto items-center mx-4 py-2">
                <span class="text-white text-4xl"><i
                        class="fas fa-<?php echo $icon['icon'] ?>"></i></span>
                <span
                    class="ml-4 whitespace-nowrap text-primary_v1"><?php echo $icon['text'] ?></span>
            </div>
            <?php }?>

        </div>
    </div>
</div>