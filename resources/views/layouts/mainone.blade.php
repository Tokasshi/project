<!doctype html>
<html lang="en">
@include('includesOne.head')


<body id="top">

@include('includesOne.navbar')

@include('includesOne.header')

<main>

@yield('index')

@include('includesOne.footer')
@include('includesOne.footerjs')
</main>


</body>
</html>