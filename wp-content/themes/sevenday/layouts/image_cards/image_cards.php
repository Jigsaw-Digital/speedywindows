<?php 
$section_heading = get_sub_field('section_heading');
$image_cards = get_sub_field('image_cards');
?>

<div class="bg-white my-10 sm:my-14 md:my-16 w-full ">
    <div
        class="w-full ctr xsm:max-w-screen-xsm sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl  ">
        <div class="w-full text-center">
            <h4 class="text-4xl text-secondary font-bold">
                <?php echo $section_heading ?>
            </h4>
        </div>
        <div class="w-full flex  flex-wrap  mt-8">
            <?php foreach($image_cards as $card) {?>
            <div
                class="w-full sm:w-[45%] lg:w-[30%] p-8 border border-solid border-primary_white_smoke my-4 mx-4">
                <div class="w-full flex flex-col justify-between h-full">
                    <div class="w-full h-[300px] min-h-[300px] max-h-[300px]">
                        <img class="w-full h-full object-contain"
                            src="<?php echo $card['image']['url'] ?>" alt="">
                    </div>
                    <div
                        class="w-full mt-4 flex flex-col justify-between h-full">
                        <div class="w-full mt-4">
                            <h4 class="text-xl font-bold">
                                <?php echo $card['title'] ?>
                            </h4>
                            <div class="w-full mt-4">
                                <p><?php echo $card['paragraph'] ?>
                                </p>
                            </div>
                        </div>

                        <div class="w-full mt-4">
                            <a class="bg-white hover:bg-secondary text-secondary hover:text-white border border-secondary px-4 py-2"
                                href="<?php echo $card['link']['url'] ?>">
                                <?php echo $card['link']['title'] ?>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>