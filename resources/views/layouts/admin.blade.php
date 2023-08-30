<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href={{ asset('/img/apple-icon.png') }}>
    <link rel="icon" type="image/png" href={{ asset('/img/favicon.png') }}>
    <title>
        {{ config('app.name') }} | Dashboard
    </title>
    <!-- Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href={{ asset('/assets/css/nucleo-icons.css') }} rel="stylesheet" />
    <link href={{ asset('/assets/css/nucleo-svg.css') }} rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href={{ asset('assets/css/nucleo-svg.css') }} rel="stylesheet" />
    <!-- CSS Files -->
    {{-- <link id="pagestyle" href={{ asset('assets/css/argon-dashboard.css') }} rel="stylesheet" /> --}}
    <link rel="stylesheet" href={{ asset('assets/css/app.css') }}>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap"
        rel="stylesheet">
    <style>
        /* PrismJS 1.29.0
        https://prismjs.com/download.html#themes=prism-dark&languages=markup+css+clike+javascript+c+csharp+cpp+go+go-module+java+json+kotlin+less+makefile+markdown+markup-templating+php+jsx+tsx+ruby+rust+sass+scss+sql+typescript */
        code[class*=language-],
        pre[class*=language-] {
            color: #fff;
            background: 0 0;
            text-shadow: 0 -.1em .2em #000;
            font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace;
            font-size: 1em;
            text-align: left;
            white-space: pre;
            word-spacing: normal;
            word-break: normal;
            word-wrap: normal;
            line-height: 1.5;
            -moz-tab-size: 4;
            -o-tab-size: 4;
            tab-size: 4;
            -webkit-hyphens: none;
            -moz-hyphens: none;
            -ms-hyphens: none;
            hyphens: none
        }

        @media print {

            code[class*=language-],
            pre[class*=language-] {
                text-shadow: none
            }
        }

        :not(pre)>code[class*=language-],
        pre[class*=language-] {
            background: #4c3f33
        }

        pre[class*=language-] {
            padding: 1em;
            margin: .5em 0;
            overflow: auto;
            border: .3em solid #7a6651;
            border-radius: .5em;
            box-shadow: 1px 1px .5em #000 inset
        }

        :not(pre)>code[class*=language-] {
            padding: .15em .2em .05em;
            border-radius: .3em;
            border: .13em solid #7a6651;
            box-shadow: 1px 1px .3em -.1em #000 inset;
            white-space: normal
        }

        .token.cdata,
        .token.comment,
        .token.doctype,
        .token.prolog {
            color: #997f66
        }

        .token.punctuation {
            opacity: .7
        }

        .token.namespace {
            opacity: .7
        }

        .token.boolean,
        .token.constant,
        .token.number,
        .token.property,
        .token.symbol,
        .token.tag {
            color: #d1939e
        }

        .token.attr-name,
        .token.builtin,
        .token.char,
        .token.inserted,
        .token.selector,
        .token.string {
            color: #bce051
        }

        .language-css .token.string,
        .style .token.string,
        .token.entity,
        .token.operator,
        .token.url,
        .token.variable {
            color: #f4b73d
        }

        .token.atrule,
        .token.attr-value,
        .token.keyword {
            color: #d1939e
        }

        .token.important,
        .token.regex {
            color: #e90
        }

        .token.bold,
        .token.important {
            font-weight: 700
        }

        .token.italic {
            font-style: italic
        }

        .token.entity {
            cursor: help
        }

        .token.deleted {
            color: red
        }
    </style>
    @vite(['resources/scss/argon-dashboard.scss', 'resources/js/app.js'])

    @yield('head')
</head>

<body class="{{ $class ?? '' }}">

    @guest
        @yield('content')
    @endguest

    @auth
        <a href="javascript:;" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 25 25" stroke-width="1.5"
                    stroke="currentColor" width="25px" height="25px">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </div>
        </a>
        @if (in_array(request()->route()->getName(),
                ['sign-in-static', 'sign-up-static', 'login', 'register', 'recover-password', 'rtl', 'virtual-reality']))
            @yield('content')
        @else
            @if (
                !in_array(request()->route()->getName(),
                    ['profile', 'profile-static']))
                <div class="min-height-300 position-absolute w-100"></div>
            @elseif (in_array(request()->route()->getName(),
                    ['profile-static', 'profile', 'dashboard']))
                <div class="position-absolute w-100 min-height-300 top-0" style="background-position-y: 50%;">
                    <span class="mask bg-primary"></span>
                </div>
            @endif
            @include('layouts.navbars.auth.sidenav')
            <main class="main-content border-radius-lg">
                @yield('content')
            </main>
            {{-- @include('components.fixed-plugin') --}}
        @endif
    @endauth

    <!--   Core JS Files   -->
    <script src={{ asset('assets/js/core/popper.min.js') }}></script>
    <script src={{ asset('assets/js/core/bootstrap.min.js') }}></script>
    <script src={{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}></script>
    <script src={{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    {{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/underline@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/raw"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/editorjs-html@3.4.0/build/edjsHTML.js"></script>
    <script src="/assets/js/prism.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/paraswaykole/editor-js-code@latest/dist/bundle.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script type="module" src={{ asset('assets/js/argon-dashboard.js') }}></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    @stack('js')

</body>

</html>
