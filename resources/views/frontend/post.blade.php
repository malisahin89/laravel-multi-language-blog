<!DOCTYPE html>
<html lang="tr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#3B82F6">

    
    <title>naber</title>
        
    <meta name="description"
        content="Veniam maxime nihil">
    <meta name="keywords" content="Voluptatibus perfere">
    <meta property="og:title" content="naber">
    <meta property="og:description"
        content="Veniam maxime nihil">
    <meta property="og:image" content="http://laravel-multi-language-blog.test/uploads/posts\InShot_20230529_195716236_1.webp">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1D4ED8',
                    }
                }
            }
        }
    </script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />


        <style>
            .swiper-button-next,
            .swiper-button-prev {
                background: rgba(0, 0, 0, 0.4);
                padding: 20px;
                border-radius: 50%;
                color: white;
            }

            .thumbnail-swiper .swiper-slide {
                opacity: 0.5;
                cursor: pointer;
            }

            .thumbnail-swiper .swiper-slide-thumb-active {
                opacity: 1;
                border: 2px solid #0ea5e9;
                /* Tailwind primary */
            }
        </style>
    </head>

<body class="bg-gray-50 antialiased">
    
    <header class="bg-white/80 backdrop-blur-sm border-b sticky top-0 z-50">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/tr"
                    class="text-2xl font-bold text-gray-900 hover:text-primary transition-colors">
                    🌍 Multiblog
                </a>

                
                <div class="relative group" x-data="{ open: false }" x-init="open = false">
                    <button @click="open = !open"
                        class="flex items-center space-x-1 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <img src="https://flagcdn.com/tr.svg" class="w-6 h-4 rounded-sm shadow"
                            alt="tr">
                        <span class="text-gray-700 font-medium">TR</span>
                    </button>

                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         @click.away="open = false"
                         class="absolute right-0 mt-2 w-48 bg-white border rounded-xl shadow-lg overflow-hidden z-50">
                                                                                <a href="http://laravel-multi-language-blog.test/tr/post/corporis-id-officia"
                                class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors">
                                <img src="https://flagcdn.com/tr.svg" class="w-5 h-3.5 mr-3 rounded-sm"
                                    alt="Türkçe">
                                <span class="text-gray-700">Türkçe</span>
                            </a>
                                                                                <a href="http://laravel-multi-language-blog.test/ru/post/inventore-consectetu"
                                class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors">
                                <img src="https://flagcdn.com/ru.svg" class="w-5 h-3.5 mr-3 rounded-sm"
                                    alt="Русский">
                                <span class="text-gray-700">Русский</span>
                            </a>
                                                                                <a href="http://laravel-multi-language-blog.test/en/post/lorem-praesentium-su"
                                class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors">
                                <img src="https://flagcdn.com/gb.svg" class="w-5 h-3.5 mr-3 rounded-sm"
                                    alt="English">
                                <span class="text-gray-700">English</span>
                            </a>
                                                                                <a href="http://laravel-multi-language-blog.test/fr/post/magni-voluptatem-vel"
                                class="flex items-center px-4 py-3 hover:bg-gray-50 transition-colors">
                                <img src="https://flagcdn.com/fr.svg" class="w-5 h-3.5 mr-3 rounded-sm"
                                    alt="Français">
                                <span class="text-gray-700">Français</span>
                            </a>
                                            </div>
                </div>
            </div>
        </nav>
    </header>

    
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <article class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm p-6 lg:p-8">
                    
                            <div class="relative mb-8">
                    <img src="http://laravel-multi-language-blog.test/uploads/posts\InShot_20230529_195716236_1.webp" alt="Molestiae ipsum dol"
                        class="w-full h-96 object-cover rounded-xl mb-6" loading="lazy">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                        <h1 class="text-4xl font-bold text-white">Molestiae ipsum dol</h1>
                    </div>
                </div>
            
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                <div class="flex items-center gap-4">
                                    </div>

                <div class="flex flex-wrap gap-3 items-center">
                                            <a href="http://laravel-multi-language-blog.test/tr/category/yazilim"
                            class="inline-flex items-center px-3 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium hover:bg-primary/20 transition-colors">
                            Yazılım
                        </a>
                    
                                            <a href="http://laravel-multi-language-blog.test/tr/tag/programlama"
                            class="inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors">
                            Programlama
                        </a>
                                    </div>
            </div>

            
            <div class="prose lg:prose-xl max-w-none mb-8 text-gray-800">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dolor elit, tincidunt vitae porta ac, elementum vel nisl. Fusce at lacus at tellus pretium laoreet luctus at eros. Quisque at erat sed risus finibus tempor. Duis libero turpis, elementum ut ultrices commodo, molestie id lacus. Quisque vel urna tristique, suscipit risus in, venenatis magna. Aenean molestie mattis lectus sed consequat. Maecenas tristique erat vitae arcu facilisis consequat. Morbi tincidunt nulla sed ex molestie, eu posuere nunc feugiat. Nunc condimentum tempor sem ut tempor. Proin placerat condimentum orci, a condimentum nisl lacinia eget. Curabitur in urna vitae leo molestie mollis eu eu purus. Ut ultricies malesuada elementum.

Maecenas sodales blandit semper. Sed condimentum aliquet convallis. Nunc lacinia gravida justo ac facilisis. Proin condimentum tincidunt quam vitae vehicula. Quisque tempor, neque a interdum fermentum, est odio pulvinar metus, ac hendrerit dolor ex sit amet leo. Cras efficitur lorem vitae urna faucibus feugiat. Suspendisse suscipit, erat sed cursus cursus, metus dolor commodo lorem, in vestibulum leo dui nec sem. Cras egestas nunc dictum ipsum malesuada elementum. Maecenas at imperdiet ante. Duis sollicitudin egestas odio at dapibus. Ut in rhoncus eros. Mauris tempor congue pellentesque. Sed orci ante, fermentum in nisi ut, ullamcorper vulputate massa.

Nam aliquam sed nisi non ullamcorper. Ut quam purus, semper non placerat sed, porta quis purus. Nullam scelerisque id nisi et auctor. Quisque nec mi fermentum, venenatis ex egestas, consectetur nunc. In mauris sapien, tincidunt id metus id, tempus tempor quam. Proin cursus quis ligula suscipit tristique. Cras posuere rutrum nunc condimentum feugiat. Donec in rhoncus orci. Etiam auctor, lorem at lacinia lacinia, enim leo ultrices urna, a pulvinar massa tellus sed erat. Nam eros turpis, ornare quis accumsan non, eleifend lacinia augue. Nulla in magna eleifend, ornare purus ut, luctus massa. Cras nisl leo, dictum eu feugiat et, dapibus sed nisi.

Vestibulum et neque velit. Quisque gravida enim sed quam vehicula sodales. Suspendisse urna orci, tempus vitae ex at, eleifend tristique nibh. Nunc ac hendrerit ipsum. Etiam ullamcorper elementum justo quis tempor. Duis lacinia ante arcu, in tempus massa pulvinar sed. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla ac velit venenatis, consectetur nisi mollis, auctor eros. Curabitur et efficitur arcu. Nullam ac sapien euismod, sollicitudin felis in, eleifend nibh. Nam blandit orci et risus cursus maximus. Morbi metus arcu, facilisis et iaculis quis, commodo nec quam.

Proin nisl nisi, bibendum sagittis augue quis, aliquam ultricies lacus. Pellentesque eget est orci. Phasellus egestas eu enim non auctor. Phasellus eleifend tellus vel mi scelerisque, quis placerat leo vehicula. Donec porttitor lacus sit amet purus malesuada, id gravida nulla tristique. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin faucibus nec urna vitae pharetra. Proin pellentesque libero felis, nec porta purus viverra a. Curabitur in arcu leo. Maecenas at consectetur lacus.
            </div>










            
   


    <div class="gallery-container mb-12">
        
        <div class="swiper main-swiper rounded-xl shadow-lg">
            <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                        <a href="http://laravel-multi-language-blog.test/uploads/gallery\1.webp" data-fancybox="gallery" data-caption="Image 1">
                            <img src="http://laravel-multi-language-blog.test/uploads/gallery\1.webp" 
                                 alt="Gallery Image 1"
                                 class="w-full h-96 object-cover cursor-zoom-in rounded-xl"
                                 loading="lazy">
                        </a>
                    </div>
                                    <div class="swiper-slide">
                        <a href="http://laravel-multi-language-blog.test/uploads/gallery\2.webp" data-fancybox="gallery" data-caption="Image 2">
                            <img src="http://laravel-multi-language-blog.test/uploads/gallery\2.webp" 
                                 alt="Gallery Image 2"
                                 class="w-full h-96 object-cover cursor-zoom-in rounded-xl"
                                 loading="lazy">
                        </a>
                    </div>
                                    <div class="swiper-slide">
                        <a href="http://laravel-multi-language-blog.test/uploads/gallery\3.webp" data-fancybox="gallery" data-caption="Image 3">
                            <img src="http://laravel-multi-language-blog.test/uploads/gallery\3.webp" 
                                 alt="Gallery Image 3"
                                 class="w-full h-96 object-cover cursor-zoom-in rounded-xl"
                                 loading="lazy">
                        </a>
                    </div>
                                    <div class="swiper-slide">
                        <a href="http://laravel-multi-language-blog.test/uploads/gallery\4.webp" data-fancybox="gallery" data-caption="Image 4">
                            <img src="http://laravel-multi-language-blog.test/uploads/gallery\4.webp" 
                                 alt="Gallery Image 4"
                                 class="w-full h-96 object-cover cursor-zoom-in rounded-xl"
                                 loading="lazy">
                        </a>
                    </div>
                                    <div class="swiper-slide">
                        <a href="http://laravel-multi-language-blog.test/uploads/gallery\1_1.webp" data-fancybox="gallery" data-caption="Image 5">
                            <img src="http://laravel-multi-language-blog.test/uploads/gallery\1_1.webp" 
                                 alt="Gallery Image 5"
                                 class="w-full h-96 object-cover cursor-zoom-in rounded-xl"
                                 loading="lazy">
                        </a>
                    </div>
                                    <div class="swiper-slide">
                        <a href="http://laravel-multi-language-blog.test/uploads/gallery\2_1.webp" data-fancybox="gallery" data-caption="Image 6">
                            <img src="http://laravel-multi-language-blog.test/uploads/gallery\2_1.webp" 
                                 alt="Gallery Image 6"
                                 class="w-full h-96 object-cover cursor-zoom-in rounded-xl"
                                 loading="lazy">
                        </a>
                    </div>
                                    <div class="swiper-slide">
                        <a href="http://laravel-multi-language-blog.test/uploads/gallery\3_1.webp" data-fancybox="gallery" data-caption="Image 7">
                            <img src="http://laravel-multi-language-blog.test/uploads/gallery\3_1.webp" 
                                 alt="Gallery Image 7"
                                 class="w-full h-96 object-cover cursor-zoom-in rounded-xl"
                                 loading="lazy">
                        </a>
                    </div>
                                    <div class="swiper-slide">
                        <a href="http://laravel-multi-language-blog.test/uploads/gallery\4_1.webp" data-fancybox="gallery" data-caption="Image 8">
                            <img src="http://laravel-multi-language-blog.test/uploads/gallery\4_1.webp" 
                                 alt="Gallery Image 8"
                                 class="w-full h-96 object-cover cursor-zoom-in rounded-xl"
                                 loading="lazy">
                        </a>
                    </div>
                            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        
        <div class="swiper thumbnail-swiper mt-4">
            <div class="swiper-wrapper">
                                    <div class="swiper-slide thumbnail-slide">
                        <img src="http://laravel-multi-language-blog.test/uploads/gallery\1.webp" 
                             alt="Thumbnail 1"
                             class="w-full h-20 object-cover rounded-lg border-2 border-transparent transition-all duration-300"
                             loading="lazy">
                    </div>
                                    <div class="swiper-slide thumbnail-slide">
                        <img src="http://laravel-multi-language-blog.test/uploads/gallery\2.webp" 
                             alt="Thumbnail 2"
                             class="w-full h-20 object-cover rounded-lg border-2 border-transparent transition-all duration-300"
                             loading="lazy">
                    </div>
                                    <div class="swiper-slide thumbnail-slide">
                        <img src="http://laravel-multi-language-blog.test/uploads/gallery\3.webp" 
                             alt="Thumbnail 3"
                             class="w-full h-20 object-cover rounded-lg border-2 border-transparent transition-all duration-300"
                             loading="lazy">
                    </div>
                                    <div class="swiper-slide thumbnail-slide">
                        <img src="http://laravel-multi-language-blog.test/uploads/gallery\4.webp" 
                             alt="Thumbnail 4"
                             class="w-full h-20 object-cover rounded-lg border-2 border-transparent transition-all duration-300"
                             loading="lazy">
                    </div>
                                    <div class="swiper-slide thumbnail-slide">
                        <img src="http://laravel-multi-language-blog.test/uploads/gallery\1_1.webp" 
                             alt="Thumbnail 5"
                             class="w-full h-20 object-cover rounded-lg border-2 border-transparent transition-all duration-300"
                             loading="lazy">
                    </div>
                                    <div class="swiper-slide thumbnail-slide">
                        <img src="http://laravel-multi-language-blog.test/uploads/gallery\2_1.webp" 
                             alt="Thumbnail 6"
                             class="w-full h-20 object-cover rounded-lg border-2 border-transparent transition-all duration-300"
                             loading="lazy">
                    </div>
                                    <div class="swiper-slide thumbnail-slide">
                        <img src="http://laravel-multi-language-blog.test/uploads/gallery\3_1.webp" 
                             alt="Thumbnail 7"
                             class="w-full h-20 object-cover rounded-lg border-2 border-transparent transition-all duration-300"
                             loading="lazy">
                    </div>
                                    <div class="swiper-slide thumbnail-slide">
                        <img src="http://laravel-multi-language-blog.test/uploads/gallery\4_1.webp" 
                             alt="Thumbnail 8"
                             class="w-full h-20 object-cover rounded-lg border-2 border-transparent transition-all duration-300"
                             loading="lazy">
                    </div>
                            </div>
        </div>
    </div>

        















            
            <div class="mt-12">
                <h2 class="text-2xl font-bold mb-6">Related Posts</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                            <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                            <a
                                href="http://laravel-multi-language-blog.test/tr/post/yapay-zeka-ve-gelecek-89">
                                                                    <img src="http://laravel-multi-language-blog.test/uploads/posts\InShot_20230529_195408595.webp"
                                        alt="Yapay Zeka ve Gelecek1"
                                        class="w-full h-48 object-cover">
                                                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">
                                        Yapay Zeka ve Gelecek1</h3>
                                    <p class="text-gray-600 text-sm line-clamp-2">
                                        
                                    </p>
                                </div>
                            </a>
                        </div>
                                            <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                            <a
                                href="http://laravel-multi-language-blog.test/tr/post/yapay-zeka-ve-gelecek-85">
                                                                    <img src="http://laravel-multi-language-blog.test/uploads/posts\InShot_20230529_195444504.webp"
                                        alt="Yapay Zeka ve Gelecek2"
                                        class="w-full h-48 object-cover">
                                                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">
                                        Yapay Zeka ve Gelecek2</h3>
                                    <p class="text-gray-600 text-sm line-clamp-2">
                                        
                                    </p>
                                </div>
                            </a>
                        </div>
                                    </div>
            </div>
        
        <div class="mt-12 border-t pt-8 text-center">
            <a href="http://laravel-multi-language-blog.test/tr"
                class="inline-flex items-center text-primary hover:text-primary/80 transition-colors">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Home
            </a>
        </div>
    </article>

    

    

    </main>

    
    <footer class="border-t bg-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center">
            <p class="text-gray-500 text-sm">
                2025 Multiblog •
                <a href="#" class="hover:text-primary transition-colors">Terms</a> •
                <a href="#" class="hover:text-primary transition-colors">Privacy</a>
            </p>
        </div>
    </footer>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const thumbnailSwiper = new Swiper(".thumbnail-swiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
            breakpoints: {
                640: { slidesPerView: 4 },
                1024: { slidesPerView: 6 },
            },
        });

        const mainSwiper = new Swiper(".main-swiper", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: thumbnailSwiper,
            },
        });

        Fancybox.bind('[data-fancybox="gallery"]');
    </script>
</body>

</html>
