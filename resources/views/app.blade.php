<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

{{--        <!-- Fonts -->--}}
{{--        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes

        <script src="{{ mix('js/app.js') }}" defer></script>
        <style>
{{--            preloader animation --}}
            .preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background-color: #fff;
                transition: opacity .5s ease;
            }
            .preloader > .text_logo {
                animation: text-logo-animation 1s linear infinite;
            }
            @keyframes text-logo-animation {
                0% {
                    opacity: 0.1;
                }
                50% {
                    opacity: 0.4;
                    transform: translateY(10px);
                    font-size: 2em;
                }
                75% {
                    opacity: 1;
                    transform: translateY(0);
                    font-size: 2.5em;
                }
                75% {
                    opacity: 0.4;
                    transform: translateY(10px);
                    font-size: 2em;
                }
            }

        </style>
    </head>
    <body class="font-sans antialiased">
    <div class="preloader h-screen flex flex-col justify-center items-center">
        <div
            class="text_logo text-4xl font-bold text-primary"
        >
            Digital<span class="text-secondary">Hajir</span>
        </div>
        <div>
            <svg version="1.1" id="L1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
    <circle fill="none" stroke="#fff" stroke-width="6" stroke-miterlimit="15" stroke-dasharray="14.2472,14.2472" cx="50" cy="50" r="47" >
        <animateTransform
            attributeName="transform"
            attributeType="XML"
            type="rotate"
            dur="5s"
            from="0 50 50"
            to="360 50 50"
            repeatCount="indefinite" />
    </circle>
                <circle fill="none" stroke="#fff" stroke-width="1" stroke-miterlimit="10" stroke-dasharray="10,10" cx="50" cy="50" r="39">
                    <animateTransform
                        attributeName="transform"
                        attributeType="XML"
                        type="rotate"
                        dur="5s"
                        from="0 50 50"
                        to="-360 50 50"
                        repeatCount="indefinite" />
                </circle>
                <g fill="#fff">
                    <rect x="30" y="35" width="5" height="30">
                        <animateTransform
                            attributeName="transform"
                            dur="1s"
                            type="translate"
                            values="0 5 ; 0 -5; 0 5"
                            repeatCount="indefinite"
                            begin="0.1"/>
                    </rect>
                    <rect x="40" y="35" width="5" height="30" >
                        <animateTransform
                            attributeName="transform"
                            dur="1s"
                            type="translate"
                            values="0 5 ; 0 -5; 0 5"
                            repeatCount="indefinite"
                            begin="0.2"/>
                    </rect>
                    <rect x="50" y="35" width="5" height="30" >
                        <animateTransform
                            attributeName="transform"
                            dur="1s"
                            type="translate"
                            values="0 5 ; 0 -5; 0 5"
                            repeatCount="indefinite"
                            begin="0.3"/>
                    </rect>
                    <rect x="60" y="35" width="5" height="30" >
                        <animateTransform
                            attributeName="transform"
                            dur="1s"
                            type="translate"
                            values="0 5 ; 0 -5; 0 5"
                            repeatCount="indefinite"
                            begin="0.4"/>
                    </rect>
                    <rect x="70" y="35" width="5" height="30" >
                        <animateTransform
                            attributeName="transform"
                            dur="1s"
                            type="translate"
                            values="0 5 ; 0 -5; 0 5"
                            repeatCount="indefinite"
                            begin="0.5"/>
                    </rect>
                </g>
</svg>
        </div>
    </div>
        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv

    <script>
        window.addEventListener('load', () => {
            document.querySelector('.preloader').classList.add('hidden');
        });
    </script>
    </body>
</html>
