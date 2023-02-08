@include('layouts.topbar')
@include('layouts.sidebar')
<main id="main" class="main">
    <section class="section dashboard">
@yield('content')
    </section>
</main>
</div>

@include('layouts.footer')
