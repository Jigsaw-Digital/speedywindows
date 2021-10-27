<?php 
    $title = get_sub_field('title');
    $text_editor = get_sub_field('text_editor');
?>

<div class="bg-white my-10 sm:my-14 md:my-16 w-full ">
    <div
        class="w-full ctr xsm:max-w-screen-xsm sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl  ">
        <div class="w-full text-center">
            <h3
                class="text-4xl sm:text-5xl font-bold text-secondary  border-b border-link_water border-opacity-25 py-4">
                <?php echo $title ?>
            </h3>
            <p class="mt-4">
                <?php echo $text_editor ?>
            </p>
        </div>
    </div>
</div>