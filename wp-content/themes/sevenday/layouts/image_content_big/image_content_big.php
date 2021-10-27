<?php 
    $heading  = get_sub_field('heading');
    $sub_heading  = get_sub_field('sub_heading');
    $paragraph_heading = get_sub_field('paragraph_heading');
    $paragraphs = get_sub_field('paragraphs');
    $image = get_sub_field('image');
    $image_overlay_heading = get_sub_field('image_overlay_heading');
    $image_overlay_text = get_sub_field('image_overlay_text');
    $image_overlay_link = get_sub_field('image_overlay_link');
?>


<div
    class="w-full bg-white overflow-hidden rounded-3xl my-10 sm:my-14 md:my-16">
    <div
        class="w-full  ctr  md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl ">
        <div class="py-16  px-4">
            <p class=""><?php echo $sub_heading?></p>
            <h6 class=" text-primary text-4xl mt-6">
                <?php echo $heading ?>
            </h6>
        </div>

    </div>
    <div class="w-full bg-primary_white_smoke py-8">
        <div
            class='w-full ctr md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl flex flex-col lg:flex-row'>
            <div class="w-9/12 flex items-start flex-col px-8">
                <?php if($paragraph_heading) {?>
                <div>
                    <h2 class="text-2xl">
                        <?php echo $paragraph_heading ?>
                    </h2>
                </div>
                <?php } ?>
                <?php foreach($paragraphs as $paragraph) { ?>
                <div>
                    <p class="text-lg mt-6">
                        <?php echo $paragraph['paragraph'] ?>
                    </p>
                </div>
                <?php } ?>
            </div>
            <div class="w-3/12 px-8">
                <div class="relative ">
                    <div class="w-full">
                        <img class="w-full object-cover "
                            src="<?php echo $image['url'] ?>" alt="" />
                    </div>
                    <div
                        class="absolute flex flex-col bg-primary bg-opacity-50 justify-center items-center top-0 h-full text-white w-full px-8 text-center">
                        <p class="text-2xl"><?php echo $image_overlay_heading ?>
                        </p>
                        <p><?php echo $image_overlay_text ?></p>
                        <div class="px-2 py-2 rounded-3xl bg-primary_red mt-4">
                            <a href="#">
                                <?php echo $image_overlay_link['title'] ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>