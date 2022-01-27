<?php 
$accordion = get_sub_field('accordion');
?>


<div class="w-full bg-white overflow-hidden rounded-3xl mt-6 jd-layout-y-spacing">
    <div
        class="w-full  ctr  md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl ">
        <div class="py-16  px-4">
            <p class="">F.A.Q.</p>
            <h6 class="uppercase text-primary text-4xl mt-6">Most frequently
                asked
                questions.
            </h6>
        </div>

    </div>
    <div class="w-full py-8">
        <div
            class="w-full  px-4 md:px-0 ctr  md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl ">
            <?php foreach($accordion as $key => $item) {?>
            <div
                class="accordion w-full overflow-hidden border-t last:border-b  border-gray-400 ">
                <input class="absolute opacity-0 "
                    id="accordion-multi-<?php echo $key ?>" type="checkbox"
                    name="accordions">
                <label class="block p-5 leading-normal cursor-pointer text-base lg:text-2xl"
                    for="accordion-multi-<?php echo $key ?>"><?php echo $item['heading'] ?></label>
                <div
                    class="accordion-content overflow-hidden    leading-normal">
                    <p class="p-5"><?php echo $item['paragraph'] ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>