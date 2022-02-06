<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="referrer" content="always">
    <link rel="canonical" href="/">

    <meta name="description" content="Open sale is free open source ecommerce store">
    <meta name="keywords"
        content="open sourece, e-commerce, ecommerce, ecommerce store, open store, muath-ye, open-sale, laravel">

    <title>@yield('title', 'Open Sale')</title>

    <link rel="stylesheet" href="/assets/main.css?id=2a47a33993804c88930f">

    <script src="/assets/main.js?id=b22be7e4b2fa278725a2" defer></script>
    <style>
        .text-red-500 {
            --tw-text-opacity: 1;
            color: rgb(239 68 68 / var(--tw-text-opacity));
        }

        .border-red-500 {
            --tw-border-opacity: 1;
            border-color: rgb(239 68 68 / var(--tw-border-opacity));
        }

        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity));
        }

        .bg-gray-200 {
            --tw-bg-opacity: 1;
            background-color: rgb(229 231 235 / var(--tw-bg-opacity));
        }

        .bg-blue-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(37 99 235 / var(--tw-bg-opacity));
        }

        .text-white {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }

        .hover\:bg-blue-500:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(59 130 246 / var(--tw-bg-opacity));
        }

        .focus\:bg-blue-500:focus {
            --tw-bg-opacity: 1;
            background-color: rgb(59 130 246 / var(--tw-bg-opacity));
        }

        .focus\:border-gray-500:focus {
            --tw-border-opacity: 1;
            border-color: rgb(107 114 128 / var(--tw-border-opacity));
        }

    </style>
</head>

<body>
    <div x-data="{ cartOpen: false , isOpen: false }">
        @include('website.include.header')

        @include('website.include.cart')
        <main class="my-8">
            <div class="container mx-auto px-6">
                @yield('content')
            </div>
        </main>

        @include('website.include.footer')
    </div>
</body>

</html>
