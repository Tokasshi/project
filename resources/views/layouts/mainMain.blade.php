<!doctype html>
<html lang="en">

@include('includesIndex.head')


<body id="top">

    <main>

    @include('includesIndex.navbar')
    @include('includesIndex.header')

    @include('includesIndex.featured')





    @yield('content')



    @include('includesIndex.toturial')

    @include('includesIndex.que')

    @include('includesIndex.testimonials')


    @include('includesIndex.contact-us')









    </main>

    @include('includesIndex.footer')



    <!-- JAVASCRIPT FILES -->
    @include('includesIndex.footerjs')


</body>

</html>