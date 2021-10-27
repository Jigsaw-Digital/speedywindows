<?php 
$image = get_sub_field('image');
$top_title = get_sub_field('top_title');
$title = get_sub_field('title');
$paragraphs = get_sub_field('paragraphs');
?>

<div class="w-full bg-white my-10 sm:my-14 md:my-16">
    <div
        class="w-full flex flex-col lg:flex-row lg:justify-between lg:items-stretch 2xl:items-center h-full ctr xsm:max-w-screen-xsm sm:max-w-screen-sm md:max-w-screen-md lg:max-w-full">
        <div class="w-full lg:w-1/2 relative ">
            <div class="lg:pr-4 lg:py-2 bg-black w-full h-full lg:skew-image"
                style="">
                <div class="lg:pr-6 bg-secondary w-full h-full lg:skew-image"
                    style="">
                    <div style="" class="w-full h-full lg:skew-image">
                        <img class="w-full  object-cover h-full"
                            src="<?php echo $image['url'] ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2 mt-4 lg:mt-0">
            <div class="lg:px-10 xl:px-24 2xl:px-32">
                <div class="">
                    <p
                        class="uppercase py-2 px-4 bg-tertiary inline rounded-3xl text-secondary font-bold ">
                        <?php echo $top_title ?>
                    </p>
                </div>
                <div class="mt-6">
                    <h4 class="text-3xl font-bold">
                        <?php echo $title ?>
                    </h4>
                </div>
                <?php foreach($paragraphs as $paragraph) {?>
                <div class="mt-4">
                    <p class="">
                        <?php echo $paragraph['paragraph'] ?>
                    </p>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>