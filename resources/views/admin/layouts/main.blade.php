<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')


<body>
@include('admin.includes.header')

<main>


@yield('admin')


        <!-- JAVASCRIPT FILES -->
@include('admin.includes.footerjs')
</main>
    </body>
</html>