<?php 
    $slides = get_sub_field('slides');
?>

<div class="swiper-container hero-slider h-[800px] relative z-neg-10">
    <div class="swiper-wrapper h-full">
        <!-- <div class="swiper-slide h-full">
            <div class="h-full"
                style="background:radial-gradient(rgba(0,0,0,.5) 0%,rgba(0,0,0,.75) 100%)">
                <div class="h-full flex justify-center" style="background:url(<?php bloginfo('template_url') ?>/assets/img/grid-sml.png) center repeat;
                    ">
                    <img class=""
                        src="<?php echo bloginfo('template_url') ?>/assets/img/slide-1.png"
                        alt="">
                </div>
            </div>
        </div> -->
        <?php foreach($slides as $slide) {?>
        <div class="swiper-slide h-full">
            <div class="h-full"
                style="background:radial-gradient(rgb(85, 141, 76) 0%, rgb(157 220 173) 100%);">
                <div class="h-full flex justify-center" style="background:url(<?php bloginfo('template_url') ?>/assets/img/grid-sml.png) center repeat;
                    ">
                    <div class="h-full flex items-center justify-center">
                        <div class="--h-[80%] --w-[50%] w-100 object-cover">
                            <img class="h-full w-full shadow-secondary"
                                src="<?php echo $slide['slide_image']['url'] ?>"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    </div>

    <div class="swiper-button-prev">
        <div
            class="text-white px-[10px] py-[7px] bg-black rounded-full flex items-center justify-center text-base bg-opacity-20">
            <i class="fas fa-chevron-left"></i>
        </div>
    </div>
    <div class="swiper-button-next">
        <div
            class="text-white px-[10px] py-[7px] bg-black rounded-full flex items-center justify-center text-base bg-opacity-20">
            <i class="fas fa-chevron-right"></i>
        </div>
    </div>

</div>

<script>
const swiper = new Swiper('.hero-slider', {
    autoplay: true,
    loop: true,
    // slidesPerView: 2,
    speed: 1000,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
</script>