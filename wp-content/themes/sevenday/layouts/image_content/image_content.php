<?php
$text_content = get_sub_field('text_content');
$image = get_sub_field('image');
$layout_direction = get_sub_field('layout_direction');
?>

<div class="w-full my-10 sm:my-14 md:my-16">
    <div
        class='w-full px-4 flex flex-col <?php echo $layout_direction=="left"?"lg:flex-row":'lg:flex-row-reverse' ?> justify-between'>
        <div class="w-1/2 flex items-start flex-col">
            <?php foreach($text_content as $item) {?>
            <div>
                <h2 class="text-2xl">
                    <?php echo $item['heading'] ?>
                </h2>
            </div>
            <div>
                <p class="text-lg mt-6">
                    <?php echo $item['paragraph'] ?>
                </p>
            </div>
            <div>
                <div class="mt-6 px-4 py-3 rounded-3xl bg-primary_red">
                    <a href="#">
                        <?php echo $item['link']['title'] ?>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="w-1/2">
            <img src="<?php echo $image['url'] ?>" alt="" />
        </div>
    </div>
</div>