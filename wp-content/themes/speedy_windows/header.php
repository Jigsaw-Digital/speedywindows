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
    <title>Speedy Windows</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
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
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.css"
        rel="stylesheet" />

    <link
        href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"
    /> -->
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

<body class="w-full bg-primary font-roboto overflow-x-hidden">
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

    var mobileNavHandler = function() {
        let mobileNavItems = document.getElementById('mobile-nav-items');
        let showMobileNavItems = mobileNavItems.classList.contains("h-0");
        if (showMobileNavItems) {
            mobileNavItems.classList.remove('h-0');
            mobileNavItems.classList.add('h-full');
        } else {
            mobileNavItems.classList.remove('h-full');
            mobileNavItems.classList.add('h-0');
        }
    }

    window.onload = function() {


        // let galleryHeight = document.getElementById('gallery-top')
        //     .offsetHeight;
        // // console.log(galleryHeight);
        // document.getElementById('gallery-thumbs').style.height =
        //     `${galleryHeight}px`;
    }
    window.onscroll = function() {

        if (window.pageYOffset > 0) {
            document.getElementById('nav').classList.add('fixed', 'top-0',
                'w-11/12');
        } else {
            document.getElementById('nav').classList.remove('fixed',
                'top-0', 'w-11/12');
        }
    }
    </script>


    <div class="relative w-11/12 mx-auto">
        <div id="nav" class="z-50">
            <div
                class="flex flex-col rounded-b-xl shadow-primary bg-white w-full">
                <div class=" w-full flex justify-between px-6 py-4">
                    <div class="w-2/4 lg:w-2/12">
                        <div class="w-3/4 xsm:w-3/5 sm:w-2/4 lg:w-10/12">
                            <img loading="lazy"
                                src="https://speedywindows.com/wp-content/uploads/2020/05/speedy-windows-logo-e1590743240729.png"
                                alt="" title="speedy-windows-logo" height="auto"
                                width="auto" class="w-full object-cover">
                        </div>
                    </div>
                    <div
                        class="w-8/12  justify-center items-center hidden lg:flex">

                        <h2 class="text-xl">
                            TRADE WINDOW & DOOR SPECIALISTS
                        </h2>
                    </div>
                    <div
                        class="w-2/4 lg:w-2/12 flex justify-end lg:justify-center items-center">
                        <a href="#"
                            class="bg-primary_red px-4 py-3 rounded-3xl text-white uppercase whitespace-nowrap font-medium">
                            Call Now
                        </a>
                    </div>
                </div>
                <div class="bg-secondary flex justify-center py-4">
                    <nav class="hidden lg:block">
                        <ul id="" class="flex">
                            <li
                                class="px-4 uppercase text-primary_grey group relative">
                                <a class="whitespace-nowrap" href=""
                                    aria-current="page">Home</a>
                            </li>
                            <!-- <li
                                class="px-4 uppercase text-primary_grey group relative arrow-down-after">
                                <a class="whitespace-nowrap"
                                    href="#">Windows</a>
                                <ul
                                    class="hidden group-hover:block z-50 absolute top-6  border-t-4 border-primary bg-white  py-8">
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">Casement
                                            Windows</a>
                                    </li>
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">Sash
                                            Windows</a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="px-4 uppercase text-primary_grey group relative arrow-down-after">
                                <a class="whitespace-nowrap" href="#">Doors</a>
                                <ul
                                    class="hidden group-hover:block z-50 absolute top-6  border-t-4 border-primary bg-white  py-8">
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">Composite
                                            Doors</a>
                                    </li>
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">Aluminium
                                            Bi-Fold Door</a>
                                    </li>
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">PVCu
                                            Bi-Fold Door</a>
                                    </li>
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">French
                                            Door</a>
                                    </li>
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">Patio
                                            Door</a>
                                    </li>
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">UPVC
                                            Door</a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="px-4 uppercase text-primary_grey group relative">
                                <a class="whitespace-nowrap" href="">About
                                    Us</a>
                            </li>
                            <li
                                class="px-4 uppercase text-primary_grey group relative arrow-down-after">
                                <a class="whitespace-nowrap" href="#">Help &amp;
                                    Support</a>
                                <ul
                                    class="hidden group-hover:block z-50 absolute top-6  border-t-4 border-primary bg-white  py-8">
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">FAQ</a>
                                    </li>
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">Customer
                                            Services</a>
                                    </li>
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">Delivery</a>
                                    </li>
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">Orders
                                            &amp; Returns</a>
                                    </li>
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">Terms
                                            &amp; Conditions</a>
                                    </li>
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">Security
                                            &amp; Privacy</a>
                                    </li>
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">Installation
                                            Guides</a>
                                    </li>
                                    <li
                                        class="px-8 py-2 hover:text-primary hover:bg-secondary">
                                        <a class="whitespace-nowrap"
                                            href="">Measuring
                                            Guides</a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="px-4 uppercase text-primary_grey group relative">
                                <a class="whitespace-nowrap" href="">Contact
                                    Us</a>
                            </li>
                            <li
                                class="px-4 uppercase text-primary_grey group relative">
                                <a class="whitespace-nowrap" href="">Quotes</a>
                            </li> -->
                        </ul>
                    </nav>
                    <div class="block lg:hidden">
                        <div id="mobile-nav-trigger"
                            onclick="mobileNavHandler()" class="text-primary">
                            <i class="fas fa-bars text-primary"></i>
                        </div>
                    </div>


                </div>
                <div id="mobile-nav-items"
                    class="h-0 overflow-y-hidden lg:hidden transition-all duration-200 ease-in">
                    <ul class="py-4 px-4">
                        <li
                            class="uppercase text-primary_red group  border-b border-gray-100 ">
                            <div
                                class="flex justify-between group-hover:bg-secondary py-2 px-2">
                                <div>Home</div>
                            </div>
                        </li>
                        <!-- <li
                            class="uppercase text-primary_red group  border-b border-gray-100 ">
                            <div
                                class="flex justify-between group-hover:bg-secondary py-2 px-2">
                                <div>Windows</div>
                                <div onclick="toggleMobileNavItem(this)">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <ul class="hidden items">
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">Casement Windows</div>
                                    </div>
                                </li>
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">Sash Windows</div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="uppercase text-primary_red group  border-b border-gray-100 ">
                            <div
                                class="flex justify-between group-hover:bg-secondary py-2 px-2">
                                <div>Doors</div>
                                <div onclick="toggleMobileNavItem(this)">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <ul class="hidden items">
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">Composite Doors</div>
                                    </div>
                                </li>
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">Aluminium Bi-Fold Door
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">Pvcu Bi-fold Doors
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">french door
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">patio door
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">upvc door
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="uppercase text-primary_red group  border-b border-gray-100 ">
                            <div
                                class="flex justify-between group-hover:bg-secondary py-2 px-2">
                                <div>About us</div>
                            </div>
                        </li>
                        <li
                            class="uppercase text-primary_red group  border-b border-gray-100 ">
                            <div
                                class="flex justify-between group-hover:bg-secondary py-2 px-2">
                                <div>Help & Support</div>
                                <div onclick="toggleMobileNavItem(this)">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <ul class="hidden items">
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">faq</div>
                                    </div>
                                </li>
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">Customer Service
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">Delivery
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">Order & Returns
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">Terms & Conditions
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">Securiy & Privacy
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">Installation Guides
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="text-primary_red hover:bg-secondary py-2 border-t border-b border-gray-100">
                                    <div class="flex ">
                                        <div class="ml-8">Measuring Guides
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="uppercase text-primary_red group  border-b border-gray-100 ">
                            <div
                                class="flex justify-between group-hover:bg-secondary py-2 px-2">
                                <div>Contact Us</div>
                            </div>
                        </li>
                        <li
                            class="uppercase text-primary_red group  border-b border-gray-100 ">
                            <div
                                class="flex justify-between group-hover:bg-secondary py-2 px-2">
                                <div>Quotes</div>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>