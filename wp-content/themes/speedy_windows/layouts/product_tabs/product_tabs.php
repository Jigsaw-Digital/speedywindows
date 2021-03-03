<?php 
 $tab1_name = get_sub_field('tab1_name');
 $tab2_name = get_sub_field('tab2_name');
 $tab3_name = get_sub_field('tab3_name');
 $image_content = get_sub_field('image_content');
 $main_heading = get_sub_field('main_heading');
 $sub_heading = get_sub_field('sub_heading'); 
 $product_detail = get_sub_field('product_detail');
 $product_finishing = get_sub_field('product_finishing');
 $multi_variant_product = get_sub_field('multi_variant_product');
 $image_content_v2 = get_sub_field('image_content_v2');
 $image_content_repeat = get_sub_field('image_content_repeat');
 $tables_image = get_sub_field('tables_image');
//  $text_content = get_sub_field('text_content');
// $image = get_sub_field('image');
// $layout_direction = get_sub_field('layout_direction');
?>


<div class="w-full  mt-6 bg-white py-8 rounded-3xl">
    <div
        class=" ctr md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl ">
        <div class="w-full flex flex-col items-center">
            <h2 class="text-4xl text-primary"><?php echo $main_heading ?></h2>
            <p class="text-2xl mt-4"><?php echo $sub_heading ?></p>
        </div>
        <div class="flex flex-col  overflow-hidden w-full mt-8">
            <div id=""
                class="flex justify-start md:justify-between flex-col md:flex-row">
                <div onclick="goToIndex(this, 0)"
                    class="w-4/5 md:w-30-percent text-xl text-center my-4 md:mx-4 uppercase shadow-secondary hover:bg-primary hover:border-primary cursor-pointer border-b-4 border-white active-tab">
                    <p class="py-4">
                        <?php echo $tab1_name ?>
                    </p>
                </div>
                <div onclick="goToIndex(this, 1)"
                    class="w-4/5 md:w-30-percent text-xl text-center my-4 md:mx-4 uppercase shadow-secondary hover:bg-primary hover:border-primary cursor-pointer border-b-4 border-white">
                    <p class="py-4">
                        <?php echo $tab2_name ?>
                    </p>
                </div>
                <div onclick="goToIndex(this, 2)"
                    class="w-4/5 md:w-30-percent text-xl text-center my-4 md:mx-4 uppercase shadow-secondary hover:bg-primary hover:border-primary cursor-pointer border-b-4 border-white">
                    <p class="py-4">
                        <?php echo $tab3_name ?>
                    </p>
                </div>
            </div>
            <div id="" class="mt-10 tab-content">
                <div class="swiper-wrapper h-full">
                    <div class="swiper-slide h-full flex flex-col">
                        <?php foreach($image_content as $content_item) { ?>
                        <div class="w-full">
                            <div
                                class='w-full flex flex-col <?php echo $content_item['layout_direction']=="left"?"lg:flex-row":'lg:flex-row-reverse' ?> justify-evenly'>
                                <div
                                    class="w-full lg:w-1/2 flex items-start justify-around flex-col ">
                                    <?php foreach($content_item['text_content'] as $item) {?>
                                    <?php if($item['heading']) { ?>
                                    <div>
                                        <h2 class="text-2xl">
                                            <?php echo $item['heading'] ?>
                                        </h2>
                                    </div>
                                    <?php } ?>
                                    <?php if($item['paragraph']) { ?>
                                    <div>
                                        <p class="text-lg mt-6">
                                            <?php echo $item['paragraph'] ?>
                                        </p>
                                    </div>
                                    <?php } ?>

                                    <?php if($item['link']) { ?>
                                    <div>
                                        <div
                                            class="mt-6 px-4 py-3 rounded-3xl bg-primary_red">
                                            <a href="#">
                                                <?php echo $item['link']['title'] ?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <?php } ?>
                                </div>
                                <div
                                    class="w-full lg:w-2/5 flex justify-center  <?php echo $content_item['layout_direction']=="left"?"lg:justify-end":'lg:justify-start' ?>">
                                    <img class=""
                                        src="<?php echo $content_item['image']['url'] ?>"
                                        alt="" />
                                </div>
                            </div>
                        </div>
                        <?php if($content_item['bottom_border']=="show") {?>
                        <div
                            class="border-b-4 border-dashed border-primary my-14">
                        </div>
                        <?php }?>
                        <?php } ?>
                        <div class="mt-16 px-10">
                            <div class="flex flex-wrap lg:justify-between">
                                <div
                                    class="w-full mb-4 lg:mb-0 lg:w-30-percent">
                                    <div>
                                        <div class="text-primary_red text-4xl">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <p
                                            class="text-2xl uppercase font-semibold">
                                            MAINTENANCE FREE
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-sm">
                                            Our UPVC frame requires no painting
                                            and
                                            little maintenance
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="w-full mb-4 lg:mb-0 lg:w-30-percent">
                                    <div>
                                        <div class="text-primary_red text-4xl">
                                            <i class="fas fa-check-square"></i>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <p
                                            class="text-2xl uppercase font-semibold">
                                            10 YEAR GUARANTEE
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-sm">
                                            Our window is guaranteed to
                                            befaultless for 10 Years
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="w-full mb-4 lg:mb-0 lg:w-30-percent">
                                    <div>
                                        <div class="text-primary_red text-4xl">
                                            <i class="fas fa-tree"></i>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <p
                                            class="text-2xl uppercase font-semibold">
                                            ENERGY EFFICIENT
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-sm">
                                            A Rated Windows as standard
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 px-10">
                            <div
                                class="border-b-4 border-dashed border-primary">

                            </div>
                        </div>
                        <div class="my-10 px-10 ">
                            <div
                                class="flex flex-col lg:flex-row lg:justify-between  items-center">
                                <div
                                    class="text-white bg-primary w-full sm:w-80 lg:w-1/5 flex justify-center mb-3 py-3 uppercase text-xl rounded-3xl hover:bg-transparent hover:text-primary_red border border-primary">
                                    <a class="" href="#">
                                        HOW TO MEASURE
                                    </a>
                                </div>
                                <div
                                    class="text-white bg-primary_red w-full sm:w-80 lg:w-1/5 flex justify-center mb-3 py-3 uppercase text-xl rounded-3xl hover:bg-transparent hover:text-primary_red border border-primary_red">
                                    <a class="" href="#">
                                        GET A QUOTE
                                    </a>
                                </div>
                                <div
                                    class="text-white bg-primary w-full sm:w-80 lg:w-1/5 flex justify-center mb-3 py-3 uppercase text-xl rounded-3xl hover:bg-transparent hover:text-primary_red border border-primary">
                                    <a class="" href="#">
                                        INSTALLATION HELP
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide h-full flex flex-col">

                        <div class="w-full">
                            <div
                                class='w-full flex flex-col lg:flex-row justify-evenly'>
                                <div
                                    class="w-full lg:w-1/2 flex items-start justify-around flex-col ">
                                    <?php if($product_detail['heading']) { ?>
                                    <div>
                                        <h2 class="text-2xl">
                                            <?php echo $product_detail['heading'] ?>
                                        </h2>
                                    </div>
                                    <?php } ?>
                                    <?php if($product_detail['paragraph']) { ?>
                                    <div>
                                        <p class="text-lg mt-6">
                                            <?php echo $product_detail['paragraph'] ?>
                                        </p>
                                    </div>
                                    <?php } ?>

                                    <?php if($product_detail['link']) { ?>
                                    <div>
                                        <div
                                            class="mt-6 px-4 py-3 rounded-3xl bg-primary_red">
                                            <a href="#">
                                                <?php echo $product_detail['link']['title'] ?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php } ?>

                                </div>
                                <div
                                    class="w-full lg:w-2/5 flex justify-center lg:justify-end">
                                    <img class=""
                                        src="<?php echo $product_detail['image']['url'] ?>"
                                        alt="" />
                                </div>
                            </div>
                            <?php if($product_detail['color_images']) { ?>
                            <div class="w-full justify-evenly ml-4">
                                <div
                                    class="w-full justify-center lg:justify-start lg:w-2/4 flex flex-wrap mt-8">
                                    <?php foreach($product_detail['color_images'] as $image) { ?>
                                    <div class="mx-2 my-2">
                                        <img src="<?php echo $image['color_image']['url'] ?>"
                                            alt="">
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($product_detail['color_images']) { ?>
                            <div class="w-full justify-evenly ml-4">
                                <div
                                    class="w-full justify-center lg:justify-start lg:w-2/4 flex flex-wrap mt-8">
                                    <?php foreach($product_detail['colors'] as $itemColor) { ?>
                                    <div class="">
                                        <p><?php echo $itemColor['color'] ?></p>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($product_detail['bottom_border']=="show") {?>
                            <div
                                class="border-b-4 border-dashed border-primary my-14">
                            </div>
                            <?php }?>
                        </div>
                        <div class="w-full">
                            <?php if($product_finishing['product_finishing']) { ?>
                            <div class="flex flex-wrap justify-between">
                                <?php foreach($product_finishing['product_finishing'] as $finishing_item) {?>
                                <div
                                    class="w-full md:w-45-percent lg:w-30-percent flex flex-col">
                                    <div>
                                        <img src="<?php echo $finishing_item['finishing_image']['url'] ?>"
                                            alt="">
                                    </div>
                                    <div class="mt-2">
                                        <p class="text-2xl">
                                            <?php echo $finishing_item['finishing_name'] ?>
                                        </p>
                                    </div>
                                    <div class="mt-2">
                                        <p class="">
                                            <?php echo $finishing_item['finishing_description'] ?>
                                        </p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <?php if($product_finishing['bottom_border']=="show") {?>
                            <div
                                class="border-b-4 border-dashed border-primary my-14">
                            </div>
                            <?php }?>
                            <?php } ?>
                        </div>

                        <div class="w-full">
                            <?php if($multi_variant_product) { ?>
                            <?php foreach($multi_variant_product as $product) { ?>
                            <div class="w-full">
                                <div
                                    class='w-full flex flex-col <?php echo $product['layout_direction']=="left"?"lg:flex-row":'lg:flex-row-reverse' ?> justify-evenly'>
                                    <div
                                        class="w-full lg:w-2/5 flex flex-col items-center lg:items-start">
                                        <div>
                                            <img class=""
                                                src="<?php echo $product['image']['url'] ?>"
                                                alt="" />
                                        </div>

                                    </div>
                                    <div
                                        class="w-full lg:w-1/2 flex items-start justify-around flex-col ">
                                        <?php foreach($product['text_content'] as $item) {?>
                                        <?php if($item['heading']) { ?>
                                        <div>
                                            <h2 class="text-2xl">
                                                <?php echo $item['heading'] ?>
                                            </h2>
                                        </div>
                                        <?php } ?>
                                        <?php if($item['paragraph']) { ?>
                                        <div>
                                            <p class="text-lg mt-6">
                                                <?php echo $item['paragraph'] ?>
                                            </p>
                                        </div>
                                        <?php } ?>

                                        <?php if($item['link']) { ?>
                                        <div>
                                            <div
                                                class="mt-6 px-4 py-3 rounded-3xl bg-primary_red">
                                                <a href="#">
                                                    <?php echo $item['link']['title'] ?>
                                                </a>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <?php } ?>
                                    </div>

                                </div>
                                <div
                                    class="flex flex-wrap w-full justify-center lg:justify-start lg:w-2/5 mt-2">
                                    <?php foreach($product['variants'] as $productVariants){ ?>
                                    <div class="">
                                        <p
                                            class="bg-primary_red py-2 px-3 mx-2 my-2 rounded-3xl hover:bg-transparent border border-primary_red hover:text-primary_red text-white">
                                            <?php echo $productVariants['variant'] ?>
                                        </p>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <?php if($product['bottom_border']=="show") {?>
                            <div
                                class="border-b-4 border-dashed border-primary my-14">
                            </div>
                            <?php }?>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="w-full">
                            <div class="w-full">
                                <div
                                    class='w-full flex flex-col <?php echo $image_content_v2['layout_direction']=="left"?"lg:flex-row":'lg:flex-row-reverse' ?> justify-evenly'>
                                    <div
                                        class="w-full lg:w-1/2 flex items-start justify-around flex-col ">
                                        <?php foreach($image_content_v2['text_content'] as $item) {?>
                                        <div class="mb-8">
                                            <?php if($item['heading']) { ?>
                                            <div>
                                                <h2 class="text-2xl">
                                                    <?php echo $item['heading'] ?>
                                                </h2>
                                            </div>
                                            <?php } ?>
                                            <?php if($item['paragraph']) { ?>
                                            <div>
                                                <p class="text-lg mt-2">
                                                    <?php echo $item['paragraph'] ?>
                                                </p>
                                            </div>
                                            <?php } ?>

                                            <?php if($item['link']) { ?>
                                            <div>
                                                <div
                                                    class="mt-6 px-4 py-3 rounded-3xl bg-primary_red">
                                                    <a href="#">
                                                        <?php echo $item['link']['title'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div
                                        class="w-full lg:w-2/5 flex flex-col items-center  <?php echo $image_content_v2['layout_direction']=="left"?"lg:items-end":'lg:items-start' ?>">
                                        <?php foreach($image_content_v2['images'] as $images) {?>
                                        <div class="w-full mb-4">
                                            <img class="w-full"
                                                src="<?php echo $images['image']['url'] ?>"
                                                alt="" />

                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php if($image_content_v2['bottom_border']=="show") {?>
                            <div
                                class="border-b-4 border-dashed border-primary my-14">
                            </div>
                            <?php }?>

                        </div>

                        <div class="mt-10 px-10">
                            <div class="flex justify-between flex-wrap">
                                <div
                                    class="w-full mb-4 lg:mb-0 lg:w-30-percent">
                                    <div>
                                        <div class="text-primary_red text-4xl">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <p
                                            class="text-2xl uppercase font-semibold">
                                            MAINTENANCE FREE
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-sm">
                                            Our UPVC frame requires no painting
                                            and
                                            little maintenance
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="w-full mb-4 lg:mb-0 lg:w-30-percent">
                                    <div>
                                        <div class="text-primary_red text-4xl">
                                            <i class="fas fa-check-square"></i>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <p
                                            class="text-2xl uppercase font-semibold">
                                            10 YEAR GUARANTEE
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-sm">
                                            Our window is guaranteed to
                                            befaultless for 10 Years


                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="w-full mb-4 lg:mb-0 lg:w-30-percent">
                                    <div>
                                        <div class="text-primary_red text-4xl">
                                            <i class="fas fa-tree"></i>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <p
                                            class="text-2xl uppercase font-semibold">
                                            ENERGY EFFICIENT

                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-sm">
                                            A Rated Windows as standard


                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 px-10">
                            <div
                                class="border-b-4 border-dashed border-primary">

                            </div>
                        </div>
                        <div class="my-10 px-10">
                            <div
                                class="flex flex-col lg:flex-row lg:justify-between  items-center">
                                <div
                                    class="text-white bg-primary w-full sm:w-80 lg:w-30-percent flex justify-center mb-3 py-3 uppercase text-2xl rounded-3xl hover:bg-transparent hover:text-primary_red border border-primary">
                                    <a class="" href="#">
                                        HOW TO MEASURE
                                    </a>
                                </div>
                                <div
                                    class="text-white bg-primary_red w-full sm:w-80 lg:w-30-percent flex justify-center mb-3 py-3 uppercase text-2xl rounded-3xl hover:bg-transparent hover:text-primary_red border border-primary_red">
                                    <a class="" href="#">
                                        GET A QUOTE
                                    </a>
                                </div>
                                <div
                                    class="text-white bg-primary w-full sm:w-80 lg:w-30-percent flex justify-center mb-3 py-3 uppercase text-2xl rounded-3xl hover:bg-transparent hover:text-primary_red border border-primary">
                                    <a class="" href="#">
                                        INSTALLATION HELP
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide h-full flex flex-col">
                        <div class="w-full">
                            <div class="w-full">
                                <div
                                    class='w-full flex flex-col <?php echo $image_content_repeat['layout_direction']=="left"?"lg:flex-row":'lg:flex-row-reverse' ?> justify-evenly'>
                                    <div
                                        class="w-full lg:w-1/2 flex items-start justify-around flex-col ">
                                        <?php foreach($image_content_repeat['text_content'] as $item) {?>
                                        <?php if($item['heading']) { ?>
                                        <div>
                                            <h2 class="text-2xl">
                                                <?php echo $item['heading'] ?>
                                            </h2>
                                        </div>
                                        <?php } ?>
                                        <?php if($item['paragraph']) { ?>
                                        <div>
                                            <p class="text-lg mt-6">
                                                <?php echo $item['paragraph'] ?>
                                            </p>
                                        </div>
                                        <?php } ?>

                                        <?php if($item['link']) { ?>
                                        <div>
                                            <div
                                                class="mt-6 px-4 py-3 rounded-3xl bg-primary_red">
                                                <a href="#">
                                                    <?php echo $item['link']['title'] ?>
                                                </a>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <?php } ?>
                                    </div>
                                    <div
                                        class="w-full lg:w-2/5 flex justify-center  <?php echo $image_content_repeat['layout_direction']=="left"?"lg:justify-end":'lg:justify-start' ?>">
                                        <img class=""
                                            src="<?php echo $image_content_repeat['image']['url'] ?>"
                                            alt="" />
                                    </div>
                                </div>
                            </div>
                            <?php if($image_content_repeat['bottom_border']=="show") {?>
                            <div
                                class="border-b-4 border-dashed border-primary my-14">
                            </div>
                            <?php }?>
                            <div class="w-full">
                                <div class="flex flex-col lg:flex-row">
                                    <div class="w-full lg:w-45-percent">
                                        <h3 class="text-2xl">
                                            <?php echo $tables_image['heading'] ?>
                                        </h3>
                                        <p class="mt-8">
                                            <?php echo $tables_image['paragraph'] ?>
                                        </p>
                                        <?php foreach($tables_image['tables'] as $table) { ?>

                                        <table
                                            class="mt-4 bg-white w-full border border-gray-200">
                                            <tbody class="table-row-group  ">
                                                <tr
                                                    class="table-row table-row-first-styles bg-primary">
                                                    <th
                                                        class="text-left font-light text-white uppercase py-3 pl-2 pr-1 table-cell ">
                                                        <?php echo $table['table_heading'] ?>
                                                    </th>
                                                    <th></th>
                                                </tr>
                                                <?php foreach($table['table_rows'] as $row) {?>
                                                <tr
                                                    class="table-row table-row-first-styles bg-transparent even:bg-secondary">
                                                    <td
                                                        class="text-left py-2 pl-2 pr-1 table-cell ">
                                                        <?php echo $row['table_row_column_1'] ?>
                                                    </td>
                                                    <td
                                                        class="text-left py-2 pl-2 pr-1 table-cell ">
                                                        <?php echo $row['table_row_column_2'] ?>
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                        <?php }?>

                                    </div>
                                    <div
                                        class="w-full lg:w-45-percent flex justify-end">
                                        <div>
                                            <img src="<?php echo $tables_image['image']['url'] ?>"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 px-10">
                            <div class="flex justify-between flex-wrap">
                                <div
                                    class="w-full mb-4 lg:mb-0 lg:w-30-percent">
                                    <div>
                                        <div class="text-primary_red text-4xl">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <p
                                            class="text-2xl uppercase font-semibold">
                                            MAINTENANCE FREE
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-sm">
                                            Our UPVC frame requires no painting
                                            and
                                            little maintenance
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="w-full mb-4 lg:mb-0 lg:w-30-percent">
                                    <div>
                                        <div class="text-primary_red text-4xl">
                                            <i class="fas fa-check-square"></i>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <p
                                            class="text-2xl uppercase font-semibold">
                                            10 YEAR GUARANTEE
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-sm">
                                            Our window is guaranteed to
                                            befaultless for 10 Years


                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="w-full mb-4 lg:mb-0 lg:w-30-percent">
                                    <div>
                                        <div class="text-primary_red text-4xl">
                                            <i class="fas fa-tree"></i>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <p
                                            class="text-2xl uppercase font-semibold">
                                            ENERGY EFFICIENT

                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-sm">
                                            A Rated Windows as standard
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 px-10">
                            <div
                                class="border-b-4 border-dashed border-primary">

                            </div>
                        </div>
                        <div class="my-10 px-10">
                            <div
                                class="flex flex-col lg:flex-row lg:justify-between  items-center">
                                <div
                                    class="text-white bg-primary w-full sm:w-80 lg:w-30-percent flex justify-center mb-3 py-3 uppercase text-2xl rounded-3xl hover:bg-transparent hover:text-primary_red border border-primary">
                                    <a class="" href="#">
                                        HOW TO MEASURE
                                    </a>
                                </div>
                                <div
                                    class="text-white bg-primary_red w-full sm:w-80 lg:w-30-percent flex justify-center mb-3 py-3 uppercase text-2xl rounded-3xl hover:bg-transparent hover:text-primary_red border border-primary_red">
                                    <a class="" href="#">
                                        GET A QUOTE
                                    </a>
                                </div>
                                <div
                                    class="text-white bg-primary w-full sm:w-80 lg:w-30-percent flex justify-center mb-3 py-3 uppercase text-2xl rounded-3xl hover:bg-transparent hover:text-primary_red border border-primary">
                                    <a class="" href="#">
                                        INSTALLATION HELP
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<script>
var galleryTop = new Swiper('.tab-content', {
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    allowTouchMove: false,
    navigation: false,
    autoHeight: true,
});

var prevElement = document.querySelector('.active-tab');

function goToIndex(ele, index) {
    prevElement && prevElement.classList.remove('active-tab');
    ele.classList.add('active-tab');
    galleryTop.slideTo(index)
    prevElement = ele;
}

// window.onload = function(){

// let galleryHeight = document.getElementById('gallery-top').offsetHeight;
// console.log(galleryHeight);
// document.getElementById('gallery-thumbs').style.height = galleryHeight;
// }
</script>