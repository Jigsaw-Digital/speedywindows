<?php 
    $depots = get_sub_field('depots');
?>

<div class="bg-white my-10 sm:my-14 md:my-16 w-full ">
    <div
        class="w-full ctr xsm:max-w-screen-xsm sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl  ">
        <?php foreach($depots as $depot) {?>
        <div
            class="w-full flex flex-col lg:flex-row border-b border-link_water border-opacity-25 py-8">
            <div class="w-full lg:w-1/2 mb-2 lg:mb-0">
                <div>
                    <h3 class="text-3xl font-bold text-secondary">
                        <span class="">
                            <i
                                class="fas fa-<?php echo $depot['location_icon'] ?>"></i>
                        </span>
                        <?php echo $depot['location'] ?>
                    </h3>
                </div>
                <div class="mt-4">
                    <p>
                        <?php echo $depot['location_detail'] ?>
                    </p>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="w-full flex flex-col sm:flex-row">
                    <div class="w-full sm:w-1/2 mb-4 sm:mb-0 sm:pr-4">
                        <div
                            class="bg-secondary text-white w-full py-2 text-center">
                            <h3 class="text-xl">
                                <?php echo $depot['section_1_title'] ?>
                            </h3>
                        </div>
                        <div>
                            <?php foreach($depot['section_1_item'] as $depotSectionItem) {?>

                            <div class="mt-4">
                                <p class="font-bold">
                                    <?php echo $depotSectionItem['section_1_item_key'] ?>
                                </p>
                                <p class="mt-2">
                                    <?php echo $depotSectionItem['section_1_item_value'] ?>
                                </p>
                            </div>
                            <?php }?>
                            <!-- <div class="mt-4">
                                <p class="font-bold">Depot Manager:
                                </p>
                                <p class="mt-2">Matt Ellis
                                </p>
                            </div> -->
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2">
                        <div
                            class="bg-primary text-white w-full py-2 text-center">
                            <h3 class="text-xl">
                                <?php echo $depot['section_2_title'] ?>
                            </h3>
                        </div>
                        <div>
                            <?php foreach($depot['section_2_item'] as $depotSectionItem) {?>
                            <div class="mt-4">
                                <p class="font-bold">
                                    <?php echo $depotSectionItem['section_2_item_key'] ?>
                                </p>
                                <p class="mt-2">
                                    <?php echo $depotSectionItem['section_2_item_value'] ?>
                                </p>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>