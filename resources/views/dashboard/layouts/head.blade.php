<!-- Title -->
<title> Valex - Premium dashboard ui bootstrap rwd admin html5 template </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@if (App::getLocale() == 'ar')
    <!-- Favicon -->
    <link rel="icon" href="{{ URL::asset('dashboard/img/brand/favicon.png') }}" type="image/x-icon" />
    <!-- Icons css -->
    <link href="{{ URL::asset('dashboard/css/icons.css') }}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{ URL::asset('dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />
    <!--  Sidebar css -->
    <link href="{{ URL::asset('dashboard/plugins/sidebar/sidebar.css') }}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ URL::asset('dashboard/css-rtl/sidemenu.css') }}">
    @yield('css')
    @livewireStyles
    <!--- Style css -->
    <link href="{{ URL::asset('dashboard/css-rtl/style.css') }}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{ URL::asset('dashboard/css-rtl/style-dark.css') }}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{ URL::asset('dashboard/css-rtl/skin-modes.css') }}" rel="stylesheet">
@else
    <!-- Favicon -->
    <link rel="icon" href="{{ URL::asset('dashboard/img/brand/favicon.png') }}" type="image/x-icon" />
    <!-- Icons css -->
    <link href="{{ URL::asset('dashboard/css/icons.css') }}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{ URL::asset('dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />
    <!--  Right-sidemenu css -->
    <link href="{{ URL::asset('dashboard/plugins/sidebar/sidebar.css') }}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ URL::asset('dashboard/css/sidemenu.css') }}">
    @yield('css')
    @livewireStyles
    <!-- Maps css -->
    <link href="{{ URL::asset('dashboard/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <!-- style css -->
    <link href="{{ URL::asset('dashboard/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/css/style-dark.css') }}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{ URL::asset('dashboard/css/skin-modes.css') }}" rel="stylesheet" />
@endif
