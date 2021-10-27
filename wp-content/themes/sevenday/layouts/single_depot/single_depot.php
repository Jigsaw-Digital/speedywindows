<?php 
$heading = get_sub_field('heading');
$image = get_sub_field('image');
$section_1_title = get_sub_field('section_1_title');
$section_1_paragraphs = get_sub_field('section_1_paragraphs');
$section_1_link = get_sub_field('section_1_link');
$section_2_title = get_sub_field('section_2_title');
$section_2_paragraph = get_sub_field('section_2_paragraph');
?>

<div class="bg-white my-10 sm:my-14 md:my-16 w-full ">
    <div
        class="w-full ctr xsm:max-w-screen-xsm sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl  ">
        <div class="w-full">
            <div>
                <h4 class="text-3xl text-secondary font-bold">
                    <?php echo $heading ?></h4>
            </div>
            <div class="mt-2 flex flex-col lg:flex-row">
                <div class="w-full lg:w-1/3">
                    <img src="<?php echo $image['url'] ?>" alt="">
                </div>
                <div
                    class="w-full lg:w-2/3 flex flex-col sm:flex-row mt-4 lg:px-10 justify-between">
                    <div class="w-full sm:w-1/2">
                        <div>
                            <h6 class="font-bold">
                                <?php echo $section_1_title ?>
                            </h6>
                        </div>
                        <?php foreach($section_1_paragraphs as $paragraph) {?>
                        <div class="mt-4">
                            <span><?php echo $paragraph['text_1'] ?></span>
                            <span><?php echo $paragraph['text_2'] ?></span>
                        </div>
                        <?php }?>
                        <?php if($section_1_link) {?>
                        <div class="mt-6">
                            <a class="uppercase px-4 py-2 bg-secondary hover:bg-secondary_hover text-white hover:text-secondary font-bold"
                                href="<?php echo $section_1_link['url'] ?>">
                                <?php echo $section_1_link['title'] ?>
                            </a>
                        </div>
                        <?php }?>
                    </div>
                    <div class="w-full sm:w-1/2 mt-4 sm:mt-0">
                        <div>
                            <h6 class="font-bold">
                                <?php echo $section_2_title ?>
                            </h6>
                        </div>
                        <div class="mt-4">
                            <p>
                                <?php echo $section_2_paragraph ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>