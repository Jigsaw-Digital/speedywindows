<?php 
$image = get_sub_field('image');
$main_heading = get_sub_field('main_heading');
$paragraphs = get_sub_field('paragraphs');
$posts_heading = get_sub_field('posts_heading');
$posts = get_sub_field('posts');
?>

<div class="bg-gray-300 mt-10 sm:mt-14 md:mt-16 w-full ">
    <div
        class="w-full ctr xsm:max-w-screen-xsm sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl  py-20 ">
        <div class="w-full text-white">
            <div class="w-full flex justify-center">
                <img src="<?php echo $image['url'] ?>" alt="">
            </div>
            <div
                class="w-[80%] mx-auto w-full flex flex-col items-center justify-center mt-4 text-center">
                <h4 class="text-2xl font-bold">
                    <?php echo $main_heading ?>
                </h4>
                <?php foreach($paragraphs as $paragraph) {?>
                <p class="mt-4">
                    <?php echo $paragraph['paragraph'] ?>
                </p>
                <?php }?>
            </div>
            <div class="mt-16 text-center">
                <h4 class="text-3xl text-white font-bold">
                    <?php echo $posts_heading ?>
                </h4>
            </div>
            <div class="mt-5 flex flex-wrap justify-between">
                <?php foreach($posts as $post ) {?>
                <div class="w-full sm:w-[45%] lg:w-[30%] my-8 bg-white">
                    <div class="w-full text-primary">
                        <a href="<?php echo $post['post_link']['url'] ?>">
                            <img class="w-full object-cover"
                                src="<?php echo $post['post_image']['url'] ?>"
                                alt="">
                        </a>
                    </div>
                    <div class="w-full mt-4 px-4">
                        <h6 class="text-2xl font-bold hover:underline text-primary">
                            <a href="<?php echo $post['post_link']['url'] ?>">
                                <?php echo $post['post_title'] ?>
                            </a>
                            <!-- Will double glazing reduce noise from outside? -->
                        </h6>
                    </div>
                    <div class="w-full mt-4 px-4">
                        <div class="w-full flex text-sm justify-between text-primary">
                            <p>
                                <?php echo $post['post_date'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="w-full px-4 mt-4 mb-4">
                        <p class="hover:underline text-primary">
                            <a href="<?php echo $post['post_link']['url'] ?>">
                                <?php echo $post['post_paragraph'] ?>
                            </a>

                        </p>
                    </div>

                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>