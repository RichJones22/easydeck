

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <!-- Tailwind CSS
               –––––––––––––––––––––––––––––––––––––––––––––––––– -->
{{--                <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">--}}
                <!-- Basic Page Needs
                –––––––––––––––––––––––––––––––––––––––––––––––––– -->
                <meta charset="utf-8">
                <title>Lessons Menu</title>
                <meta name="description" content="Lesson Menu">
                <meta name="author" content="Bruce Howard">
                <!-- Styles -->
                <link rel="stylesheet" href="{{ asset('css/app.css') }}">
                @livewireStyles
            </head>
            <body class="font-serif bg-green text-grey-900">

            <!-- Primary Page Layout

            <!--NewLayout
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
            <div class="h-screen flex flex-wrap">
                <div class="bg-white w-1/4 h-1/8"><livewire:ed-logo /></div>
                <div class="bg-white w-1/2 h-1/8 flex justify-center items-center">B</div>
                <div class="bg-white w-1/4 h-1/8 flex justify-center items-center">C</div>
                <div class="bg-gray-400 text-white w-1/4 h-1/8 flex justify-center items-center" >G</div>
                <div class="bg-gray-600 text-white w-1/2 h-1/8 flex justify-center items-center" >H</div>
                <div class="bg-gray-800 text-white w-1/4 h-1/8 flex justify-center items-center">I</div>
                <div class="bg-gray-400 text-white w-1/4 h-1/8 flex justify-center items-center" >G</div>
                <div class="bg-gray-600 text-white w-1/2 h-1/8 flex justify-center items-center" >H</div>
                <div class="bg-gray-800 text-white w-1/4 h-1/8 flex justify-center items-center">I</div>
            </div>
            <div class="h-screen flex flex-wrap">
                <div class="bg-white w-1/4 h-1/8"><livewire:ed-logo /></div>
                <div class="bg-white w-1/2 h-1/8 flex justify-center items-center">B</div>
                <div class="bg-white w-1/4 h-1/8 flex justify-center items-center">C</div>
                <div class="flex w-1/4 h-3/4 ">
                    <div class="bg-green-400 p-2 m-2 w-full ">D</div>
                </div>
                <div class="flex w-1/2 h-3/4">
                    <div class="bg-red-500 m-2 w-full p-2"><img src="../img/santaSVG.svg" class="h-full w-full"/></div>
                </div>
                <div class="flex  w-1/4 h-3/4 ">
                    <div class="bg-green-400 m-2 w-full p-2">F</div>
                </div>
                <div class="bg-gray-400 text-white w-1/4 h-1/8 flex justify-center items-center" >G</div>
                <div class="bg-gray-600 text-white w-1/2 h-1/8 flex justify-center items-center" >H</div>
                <div class="bg-gray-800 text-white w-1/4 h-1/8 flex justify-center items-center">I</div>
            </div>
            <br/><br/>

            <p class="text-xl bg-blue-100 p-2">lesson playground</p>
            <!--Tailwind REM
           –––––––––––––––––––––––––––––––––––––––––––––––––– -->

            <div class="bg-gray-500 text-8 w-32">
            Tailwind REM
            </div>

            <!--FLEXBOX
           –––––––––––––––––––––––––––––––––––––––––––––––––– -->
            <h1 class="text-xl bg-gray-100 p-2">Flexbox</h1>
            <div class="flex justify-center p-2">
                <div class="text-center bg-red-300 w-32 h-32">First Div</div>
                <div class="text-center bg-yellow-300 w-32 h-32">Second Div</div>
                <div class="text-center bg-blue-300 w-32 h-32">Third Div</div>
            </div>

            <h1 class="text-xl bg-gray-100 p-2">lesson P002b</h1>
{{--            $animals = ['Unicorn', 'Gorilla', 'Horse', 'Wolf';--}}

            $animals = [];
            $animal[] = 'Unicorn';
            $animal[] = 'Gorilla';
            $animal[] = 'Horse';
            $animal[] = 'Wolf';

            print_r($people);
            <h1 class="text-xl bg-gray-100 p-2">lesson L001aEcho</h1>

            @{{echo this}}
            !!quo echo this!!
            @{{@/{{echo this}}}}

            <h1 class="text-xl bg-gray-100 p-2">Flexbox</h1>
            <div class="flex justify-center p-2">
                <div class="text-center bg-red-300 w-32 h-32">First Div</div>
                <div class="text-center bg-yellow-300 w-32 h-32">Second Div</div>
                <div class="text-center bg-blue-300 w-32 h-32">Third Div</div>
            </div>

            <!--SVG's
            –––––––––––––––––––––––––––––––––––––––––––––––––– -->
            <h1 class="text-xl bg-gray-100 p-2">SVG's</h1>

            <!--SVG with Image Tag
            –––––––––––––––––––––––––––––––––––––––––––––––––– -->
            <div>
                <p  class="p-2"> Image Tag</p>
                <img src="../img/svgIcons/svg_atom.svg" class="h-32 w-32"/>
            </div>

            <!--SVG as Object
           –––––––––––––––––––––––––––––––––––––––––––––––––– -->
            <div>
                <p class="p-2">Object</p>
                <object type="image/svg+xml" data="../img/svgIcons/svg_atom.svg" class="h-32 w-32">
                    Your browser does not support SVG
                </object>

            </div>

            <!--SVG with Inline Embed
           –––––––––––––––––––––––––––––––––––––––––––––––––– -->
            <div>
                <p class="p-2">SVG Inline embed</p>
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 256 229" style="enable-background:new 0 0 256 229;" xml:space="preserve" class="h-32 w-32">
                    <g>
                        <path d="M111.8,114.8c0,10.2,8.3,18.6,18.6,18.6s18.6-8.3,18.6-18.6c0-10.2-8.3-18.6-18.6-18.6C120.1,96.3,111.8,104.6,111.8,114.8
                            z"/>
                        <path d="M129.6,64.3c23.5-30.8,44.8-45.1,54.8-45.1c1.4,0,2.5,0.3,3.4,0.8c5.3,3.1,6.3,16.6,2.8,34.5c5.7,1.1,11.1,2.3,16.3,3.7
                            c5.6-27,1.9-45.6-10.6-52.9c-12.7-7.3-30.5-1.3-51.4,17.4c-12,10.8-24.6,25.4-36.3,42.1c-11.7,0.7-23.2,2-34.2,3.8
                            c-7.9-26.6-7.3-44.9-0.8-48.7c0.9-0.5,2-0.8,3.4-0.8c7.3,0,19.3,7.2,32,19.4c3.6-4.5,7.3-8.7,10.9-12.7C97.7,5,78.2-2.3,65,5.4
                            c-12.7,7.3-16.4,25.7-10.6,53.2c0.9,4.3,2,8.8,3.4,13.4C25.6,79.8,2,93.3,2,111.9c0,15.4,16.2,28.6,45.7,37.3l1.2,0.4l0.4-1.2
                            c1.3-4.4,2.9-8.9,4.5-13.4l0.5-1.3l-1.3-0.4c-20.4-6-34.1-14.6-34.1-21.4c0-7.7,16.1-17.6,44.1-24c3.8,10.4,8.5,21.3,13.9,32
                            c-8.1,17.8-14.1,35.3-17.3,50.5c-5.8,27.5-2.1,45.9,10.6,53.2c3.5,2,7.4,3,11.6,3c10.6,0,23.5-6.4,37.6-18.5
                            c-3.9-3.9-7.6-8.1-11.3-12.4c-10.5,8.9-20,14.1-26.1,14.1c-1.3,0-2.5-0.3-3.4-0.8c-8.2-4.8-7.1-32.2,8.4-70.2
                            c24.6,42.4,63.9,87.9,92.4,87.9c4.2,0,8.1-1,11.6-3h0c26.3-15.1,10.1-74-16.5-123.5c-6.3-1-13.2-1.8-20.7-2.4l0.9,1.4
                            c33.3,57.7,38.8,103.6,27.9,109.9c-0.9,0.5-2,0.8-3.4,0.8c-13.1,0-46-24.8-77.8-79.9c-2-3.5-3.9-6.9-5.7-10.3
                            c3.2-6.6,6.9-13.4,10.9-20.4c3.7-6.3,7.3-12.3,11-17.8c3.4-0.1,6.9-0.2,10.5-0.2c66.6,0,109.1,18.2,109.1,30.8
                            c0,6.4-12.2,14.4-30.7,20.4c2,5.3,3.9,10.6,5.5,15.8c27.2-8.7,42.1-21.5,42.1-36.2C254,81.3,190.2,64.6,129.6,64.3z M91.9,90.7
                            c-1.9,3.3-3.8,6.7-5.6,10c-2.5-5.5-4.7-10.9-6.7-16c5.4-0.8,11.1-1.5,17.1-2.1C95.1,85.3,93.5,88,91.9,90.7z"/>
                    </g>
                </svg>
            </div>
            @livewireScripts
            <!-- End Document
              –––––––––––––––––––––––––––––––––––––––––––––––––– -->
            </body>
            </html>
