<?php 
    $depots = get_sub_field('depots');
?>

<div class="bg-white my-4 w-full ">
    <div
        class="w-full ctr xsm:max-w-screen-xsm sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl  ">
        <div class="w-full">
            <div class="w-full text-center">
                <h3 class="text-3xl font-bold text-secondary">
                    Featured Depot
                </h3>
            </div>
            <div class="w-full flex justify-between mt-6 flex-wrap">
                <?php foreach($depots as $depot) {?>
                <div class="lg:w-[30%] sm:w-[45%] w-full my-4 min-w-[300px]  ">
                    <div class="w-full">
                        <img src="<?php echo $depot['image']['url'] ?>"
                            alt="" />
                    </div>
                    <div class="w-full text-center mt-2">
                        <h6 class="text-3xl font-bold text-secondary">
                            <span><i
                                    class="fas fa-<?php echo $depot['depot_title_icon'] ?>"></i></span>
                            <?php echo $depot['depot_title'] ?>
                        </h6>
                    </div>
                    <div class="w-full text-center mt-4">
                        <a href="<?php echo $depot['depot_link']['url'] ?>"
                            class="text-secondary hover:text-secondary_hover">
                            <?php echo $depot['depot_link']['title'] ?>
                        </a>
                    </div>
                </div>
                <?php }?>

                <!-- <div class="lg:w-[30%] sm:w-[45%] w-full my-4 min-w-[300px] ">
                    <div class="w-full">
                        <img src="<?php echo bloginfo('template_url') ?>/assets/img/Pembroke.jpeg"
                            alt="" />
                    </div>
                    <div class="w-full text-center mt-2">
                        <h6 class="text-4xl font-bold text-secondary">
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            Pemborke
                        </h6>
                    </div>
                    <div class="w-full text-center mt-4">
                        <p class="text-secondary">
                            View depot
                        </p>
                    </div>
                </div>
                <div class="lg:w-[30%] sm:w-[45%] w-full my-4 min-w-[300px] ">
                    <div class="w-full">
                        <img src="<?php echo bloginfo('template_url') ?>/assets/img/Pembroke.jpeg"
                            alt="" />
                    </div>
                    <div class="w-full text-center mt-2">
                        <h6 class="text-4xl font-bold text-secondary">
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            Pemborke
                        </h6>
                    </div>
                    <div class="w-full text-center mt-4">
                        <p class="text-secondary">
                            View depot
                        </p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>