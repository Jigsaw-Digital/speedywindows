<?php

function buildTree(array &$elements, $parentId = 0)
{
    $branch = array();
    foreach ($elements as &$element) {
        if ($element->menu_item_parent == $parentId) {
            $children = buildTree($elements, $element->ID);
            if ($children)
                $element->wpse_children = $children;

            $branch[$element->ID] = $element;
            unset($element);
        }
    }
    return $branch;
}

$menu_name = "main-menu";
$mobile_menu = "mobile_menu";
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object($locations[$menu_name]);
$get_mobile_menu = wp_get_nav_menu_object($locations[$mobile_menu]);
$menu_2 = wp_get_nav_menu_items($get_mobile_menu->term_id, array('order' => 'DESC'));
$menu_3 = wp_get_nav_menu_items($menu->term_id, array('order' => 'ASC'));
$get_mobile_menu_items = buildTree($menu_2);
$menuitems = buildTree($menu_3);

?>

<!DOCTYPE html>
<html lang="en">




<head>
    <meta charset="utf-8" />
    <!-- <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous" /> -->
    <link rel="icon" href="./favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <title>Seven Day</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />


    <!-- <link href="<?php bloginfo( 'template_url' ); ?>/css/chunk.css"
        rel="stylesheet" /> -->
    <link href="<?php bloginfo( 'template_url' ); ?>/css/lightbox.css"
        rel="stylesheet" />

    <link href="<?php bloginfo( 'template_url' ); ?>/style.css"
        rel="stylesheet" />
    <link href="<?php bloginfo( 'template_url' ); ?>/css/lightbox.css"
        rel="stylesheet" />
    <link href="<?php bloginfo( 'template_url' ); ?>/css/style.css"
        rel="stylesheet" />
    <link href="<?php bloginfo( 'template_url' ); ?>/css/custom.css"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.css"
        rel="stylesheet" />

    <link
        href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet"
        href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />


    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



</head>

<body class="w-full  font-openSans overflow-x-hidden relative">
    <script>
    var toggleMobileNavItem = function(ele) {
        let child = ele.children[0];
        let parent = ele.parentElement.parentElement;

        if (child.classList.contains('fa-plus')) {
            parent.classList.add('show-items');
            child.classList.remove('fa-plus');
            child.classList.add('fa-times');
        } else {
            parent.classList.remove('show-items');
            child.classList.remove('fa-times');
            child.classList.add('fa-plus');
        }

    }


    // var mobileNavHandler = function() {
    //     let mobileNavItems = document.getElementById('mobile-nav-items');
    //     let showMobileNavItems = mobileNavItems.classList.contains("h-0");
    //     if (showMobileNavItems) {
    //         mobileNavItems.classList.remove('h-0');
    //         mobileNavItems.classList.add('h-full');
    //     } else {
    //         mobileNavItems.classList.remove('h-full');
    //         mobileNavItems.classList.add('h-0');
    //     }
    // }

    window.onload = function() {

    }
    window.onscroll = function() {
        var logo = document.getElementById('logo');

        if (window.pageYOffset > 0) {
            document.getElementById('nav').classList.add('fixed', 'top-0',
                'w-full');
            logo.classList.remove('w-[calc(20%-1rem)]')
            logo.classList.add('w-[13%]')
        } else {
            document.getElementById('nav').classList.remove('fixed',
                'top-0', 'w-full');
            logo.classList.add('w-[calc(20%-1rem)]')
            logo.classList.remove('w-[13%]')
        }
    }
    </script>

<script> 


function navToggle() {
        var btn = document.getElementById('menuBtn');
        var nav = document.getElementById('menu');

        btn.classList.toggle('open');
        nav.classList.toggle('flex');
        nav.classList.toggle('hidden');
    }


</script>

    <div class="relative bg-white z-0">
        <div id="nav" class="z-50 shadow-nav mr-2">
            <div
                class="text-black  bg-white w-full transition-all duration-200 ease-in">
                <div id="nav_padding"
                    class="w-full flex justify-between px-6 py-1 ctr xl:max-w-screen-xl 2xl:max-w-screen-2xl items-center">
                    <div id="logo"
                        class="w-[180px] relative z-10 transition-all duration-200 ease-in">
                        <div class="w-full transition-all duration-200 ease-in">
                            <a href="<?php echo bloginfo('url') ?>">
                                <img loading="lazy"
                                    src="<?php echo bloginfo('template_url') ?>/assets/img/speedy-windows-logo.png"
                                    alt="" title="speedy-windows-logo"
                                    height="auto" width="auto"
                                    class="w-1/2 lg:w-full object-cover transition-all duration-200 ease-in py-4">
                            </a>
                        </div>
                    </div>
                    <div class="w-[80%] hidden lg:flex ">
                        <ul class="flex justify-between w-full">
                            <?php foreach ($menuitems as $item) { ?>
                            <?php $title = $item->title; ?>
                            <?php $url = $item->url;
                                    $children = $item->wpse_children;
                            ?>
                            <li class="uppercase  group cursor-pointer" style="padding:39px 0px;">
                                <a class="hover:text-secondary_hover relative z-20 font-bold"
                                    href="<?php echo $url ?>"><?php echo $title ?></a>
                                <?php if ($children) { ?>

                                <div
                                    class="absolute w-screen top-[87px] left-0 py-6 bg-transparent hidden group-hover:block z-10 capitalize">
                                    <div class="w-full bg-gray-200 py-8 ">
                                        <div class="ctr xl:max-w-screen-xl">
                                            <div
                                                class="w-full flex justify-center ">
                                                <?php foreach ($children as $child) { ?>
                                                <?php $child_title = $child->title;
                                                    $child_url = $child->url;
                                                    $sub_children = $child->wpse_children;
                                                ?>

                                                <div class="w-[20%]">
                                                    <h6 class="uppercase">
                                                        <a class="hover:text-secondary font-bold text-primary"
                                                            href="<?php echo $child_url ?>"><?php echo $child_title ?></a>
                                                    </h6>
                                                    <?php if ($sub_children) { ?>
                                                    <ul class="mt-4">
                                                        <?php foreach ($sub_children as $sub_child) { ?>
                                                        <?php $sub_child_title = $sub_child->title;
                                                                $sub_child_url = $sub_child->url;
                                                        ?>
                                                        <li class="mt-2">
                                                            <a class="hover:text-secondary text-black"
                                                                href="<?php echo $sub_child_url ?>"><?php echo $sub_child_title ?></a>
                                                        </li>
                                                        <?php }?>
                                                    </ul>
                                                    <?php }?>
                                                </div>
                                                <?php }?>
                                                <!-- <div class="w-[20%]">
                                                    <h6 class="uppercase">Doors
                                                    </h6>
                                                    <ul class="mt-4">
                                                        <li>Conservatories</li>
                                                    </ul>
                                                </div>
                                                <div class="w-[20%]">
                                                    <h6 class="uppercase">
                                                        Conservatories and Roofs
                                                    </h6>
                                                    <ul class="mt-4">
                                                        <li>Conservatories</li>
                                                    </ul>
                                                </div>
                                                <div class="w-[20%]">
                                                    <h6 class="uppercase">Other
                                                        Products</h6>
                                                    <ul class="mt-4">
                                                        <li>Conservatories</li>
                                                    </ul>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php }?>
                            </li>
                            
                            <!-- <li class="uppercase">
                                <a href="">About Us</a>
                            </li>
                            <li class="uppercase">
                                Depots
                            </li>
                            <li class="flex items-start uppercase">
                                <div class="text-secondary text-2xl ">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div>
                                    Get In Touch
                                </div>
                            </li> -->
                            <?php } ?>
                            <a class="flex flex-row my-auto bg-primary text-white border border-primary hover:bg-white hover:text-primary p-4" href="/contact-us/">
                                <p class="mx-3 font-bold"> GET STARTED </p>
                            </a>
                        </ul>
                        
                    </div>
                    <div class="w-1/2 my-auto block md:hidden " >  
                        <div class="flex flex-row float-right">
                            <a href="tel:01604 791 791" class="text-right w-1/2 my-auto  text-primary hover:text-tertiary text-xl   mx-2"><i class=" fas fa-phone "></i></a>
                            <button id="menuBtn" class="w-1/2 hamburger focus:outline-none my-auto mx-2 " type="button" onclick="navToggle();">
                                <span class="hamburger__top-bun"></span><span class="hamburger__middle-bun"></span><span class="hamburger__bottom-bun"></span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <div id="menu"
                class=" hidden overflow-hidden transition-all ease-in duration-700 fixed w-screen flex-col  bg-white  p-5 z-50 lg:hidden">
                
                <div  class="nav_container flex flex-col h-full ">
                    <ul
                        class="tfs_mobile_nav_inner_container flex flex-col justify-start ">

                        <?php foreach ($get_mobile_menu_items as $item) { ?>
                        <?php $title = $item->title; ?>
                        <?php $url = $item->url; ?>
                        <?php
                    $children = $item->wpse_children;

                    ?>

                        <li
                            class="font-bold mx-4 my-1 text-base text-primary hover:text-primary_pampadour  no-underline ">
                            <div class="w-full flex items-center ">
                                <div class="w-full">
                                    <a
                                        href="<?php echo $url ?>"><?php echo $title ?></a>
                                </div>
                                <?php if ($children) { ?>
                                    
                                <div id="mobile-nav-child-trigger"
                                    class="w-3/12 text-right text-xl  cursor-pointer"
                                    onclick="handleSubNavItem(this, '<?php echo $title ?>')">
                                    <i
                                        class="fas fa-chevron-down transform transition-all ease-in duration-200"></i>
                                </div>
                                <?php } ?>
                            </div>
                            <?php if ($children) { ?>
                            <ul id="mobile-nav-child-<?php echo $title ?>"
                                class="hidden mt-2 px-4  cursor-pointer text-primary ">

                                <?php foreach ($children as $child) { ?>
                                <?php $child_title = $child->title;
                                    $child_url = $child->url;
                                    ?>
                                <li
                                    class=" text-base hover:text-primary_pampadour">
                                    <a href="<?php echo $child_url ?>">
                                        <?php echo $child_title ?>
                                    </a>
                                </li>

                                <?php } ?>

                            </ul>
                            <?php } ?>
                        </li>
                        <?php } ?>

                    </ul>



                </div>
            </div>

        </div>

        <style>

/* HAMBURGER MENU */

.hamburger {
  cursor: pointer;
  width: 48px;
  height: 48px;
  transition: all 0.25s; 
  z-index: 20;
}

.open {
  transform: rotate(90deg);
  transform: translateY(-1px);
  
  
}


.open .hamburger__top-bun {
  transform:
    rotate(45deg)
    translateY(0px);

 
}

.open .hamburger__bottom-bun {
  transform:
    rotate(-45deg)
    translateY(-2px);

}

.open .hamburger__middle-bun {
  display: none;
}

.hamburger__top-bun,
.hamburger__middle-bun,
.hamburger__bottom-bun {
  content: '';
  width: 30px;
  height: 2px;
  color:#558D4C;
  background:#558D4C;
  transform: rotate(0);
  transition: all 0.5s;
  float:right;
  z-index: 30;
}

.hamburger:hover [class*="-bun"] {
  background:#8CE87D;
}

.hamburger__top-bun {
  transform: translateY(-5px);
}

.hamburger__middle-bun {
  transform: translateY(2px);
}

.hamburger__bottom-bun {
  transform: translateY(9px);
}

.open {
  transform: rotate(90deg);
  transform: translateY(-1px);
}

.open .hamburger__top-bun {
  transform:
    rotate(45deg)
    translateY(0px);
}

.open .hamburger__bottom-bun {
  transform:
    rotate(-45deg)
    translateY(0px);
}
.arrow{
        width: 10px;
        height: 10px;
        border-right: 2px solid #000;
        border-bottom: 2px solid #000;
        transform: rotate(45deg);
        margin-top: 7px;
    }
</style>