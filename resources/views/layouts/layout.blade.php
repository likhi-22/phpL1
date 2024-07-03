<!DOCTYPE html>
<html>
   @include('includes.head')
<body>
    <header>
        @include('includes.header')
    </header>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        @include('includes.footer')
    </footer>
    @include('includes.script')
</body>
</html>