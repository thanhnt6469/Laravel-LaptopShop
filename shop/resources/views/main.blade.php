<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('head')
</head>
<body>
    <!-- Header -->
    @include('headerDesktop')
    @include('headerMobile')
    <!-- /Header -->

	<!-- Cart -->
    @include('cart')
    <!-- /Cart -->

    <!-- Main -->
    @yield('content')
    <!-- /Main -->
    
    @include('footer')

</body>
</html>
