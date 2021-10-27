<?php 
$link_1 = get_sub_field('link_1');
$link_2 = get_sub_field('link_2');
?>


<div class="w-full bg-primary py-5">
    <div class="w-full flex justify-center">
        <div class="flex">
            <div
                class="uppercase bg-secondary hover:bg-secondary_hover px-8 py-2 sm:py-3 sm:px-12 rounded-md text-white  font-bold transition-all ease-in duration-100 hover:text-white">
                <a
                    href="<?php echo $link_1['url'] ?>"><?php echo $link_1['title'] ?></a>
            </div>
            <div
                class="ml-2 uppercase bg-secondary hover:bg-secondary_hover px-8 py-2 sm:py-3 sm:px-12 rounded-md text-white  font-bold transition-all ease-in duration-100 hover:text-white">
                <a
                    href="<?php echo $link_2['url'] ?>"><?php echo $link_2['title'] ?></a>
            </div>
        </div>
    </div>

</div>