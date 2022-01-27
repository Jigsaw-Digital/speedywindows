<?php
    $tabs = get_sub_field('tabs');
?>

<div class="bg-white my-10 sm:my-14 md:my-16 w-full overflow-y-hidden py-10 jd-layout-y-spacing">
    <div
        class="w-full ctr xsm:max-w-screen-xsm sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl">
        <div class="flex flex-col md:flex-row relative z-0">
            <?php foreach($tabs as $key=>$tab) {?>
            <div
                class="md:skew-tab md:py-2 text-center mb-4 md:mb-0 border-t-2 border-white  md:border-t-0 first:border-t-0 shadow-nav md:shadow-none">
                <div id="tab-selector"
                    onclick="goToIndex(this, <?php echo $key ?>)"
                    class="bg-primary_grey pr-10 pl-8 py-4 md:mr-1 hover:bg-gray-200 hover:text-primary cursor-pointer text-white overflow-ellipsis whitespace-nowrap">
                    <?php echo $tab['tab_title']?></div>
            </div>
            <?php }?>
        </div>
        <div class="tab-content md:rounded shadow-tab relative z-10 bg-white">
            <div class="swiper-wrapper">
                <?php foreach($tabs as $key=>$tab) {?>
                <div class="swiper-slide px-6 py-10 ">
                    <div>
                        <?php if($tab['layout_type'] === "Finishes Layout") {?>
                        <div>
                            <?php foreach($tab['finishes']['paragraphs'] as $paragraph) {?>
                            <div>
                                <?php echo $paragraph['paragraph'] ?>
                            </div>
                            <?php }?>
                        </div>
                        <div>
                            <?php foreach($tab['finishes']['finish_type'] as $finishItem) {?>
                            <div class="my-4">
                                <h3 class="text-2xl text-secondary">
                                    <?php echo $finishItem['title'] ?>
                                </h3>
                                <div class="flex flex-wrap">
                                    <?php foreach($finishItem['images'] as $finishImage) {?>
                                    <div class="w-40">
                                        <img class="w-full object-cover"
                                            src="<?php echo $finishImage['image']['url'] ?>"
                                            alt="">
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <?php } else if($tab['layout_type'] === "Text Editor"){?>
                        <div>
                            <?php echo $tab['text_editor'] ?>
                        </div>
                        <?php } else if($tab['layout_type'] === "Content Layout"){?>
                        <?php foreach($tab['tab_content'] as $contentItem) {?>
                        <div
                            class="w-full flex flex-col md:flex-<?php echo $contentItem['content_direction'] === 'row' ?'row':'row-reverse' ?> justify-between items-stretch mb-8 pb-8 border-b border-link_water border-opacity-25">

                            <div style="height:inherit;"
                                class="w-full md:w-[35%] lg:max-h-[400px] ">
  
                                <?php foreach($contentItem['content_images'] as $contentImage) {?>
                                    <img class="w-full h-full object-contain py-10"
                                            src="<?php echo $contentImage['content_image']['url'] ?>"
                                            alt="">
                                <?php }?>

                            </div>
                            <div
                                class="w-full md:w-[65%] md:px-6 lg:px-14 mt-4 md:mt-0 bg-white z-10">
                                <h2 class="text-3xl font-bold text-secondary">
                                    <?php echo $contentItem['content_title'] ?>
                                </h2>
                                <div class="mt-4">
                                    <?php foreach($contentItem['content_paragraphs'] as $paragraph) {?>
                                    <p class="my-3">
                                        <?php echo $paragraph['content_paragraph'] ?>
                                    </p>
                                    <?php }?>
                                </div>
                                <div class="mt-8 flex flex-wrap text-white">
                                    <?php foreach($contentItem['content_links'] as $link) {?>
                                    <a href="<?php echo $link['content_link']['url'] ?>"
                                        class="my-1 uppercase mr-1 py-2 px-2 bg-white text-primary border border-primary hover:text-white hover:bg-primary">
                                        <?php echo $link['content_link']['title'] ?>
                                    </a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        <?php } else if($tab['layout_type'] === "Tables Image") {?>
                        <div class="w-full">
                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-45-percent">
                                    <h3
                                        class="text-3xl text-secondary font-bold">
                                        <?php echo $tab['tables']['heading'] ?>
                                    </h3>
                                    <p class="mt-8">
                                        <?php echo $tab['tables']['paragraph'] ?>
                                    </p>
                                    <?php foreach($tab['tables']['tables'] as $table) { ?>

                                    <table
                                        class="mt-4 bg-white w-full border border-gray-200">
                                        <tbody class="table-row-group  ">
                                            <tr
                                                class="table-row ">
                                                <th
                                                    class="text-left font-light text-primary uppercase py-3 pl-2 pr-1 table-cell ">
                                                    <?php echo $table['table_heading'] ?>
                                                </th>
                                                <th></th>
                                            </tr>
                                            <?php foreach($table['table_rows'] as $row) {?>
                                            <tr
                                                class="table-row border border-grey-300 ">
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
                                        <img src="<?php echo $tab['tables']['image']['url'] ?>"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>

<script>
var firstTab = document.querySelectorAll('#tab-selector')[0];

firstTab.classList.add('active-tab');

var galleryTop = new Swiper('.tab-content', {
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    allowTouchMove: true,
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

var contentImageSlider = new Swiper('.content-slider', {
    allowTouchMove: true,
    navigation: false,
    autoHeight: true,
    nested: true,
    watchOverflow: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
</script>