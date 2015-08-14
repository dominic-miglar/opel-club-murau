<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            @if($navActive == 'news')
                <a class="blog-nav-item active" href="/news/">Neues</a>
            @else
                <a class="blog-nav-item" href="/news/">Neues</a>
            @endif

            @if($navActive == 'about')
                <a class="blog-nav-item active" href="/about/">Über uns</a>
            @else
                <a class="blog-nav-item" href="/about/">Über uns</a>
            @endif

            @if($navActive == 'gallery')
                <a class="blog-nav-item active" href="/albums/">Galerie</a>
            @else
                <a class="blog-nav-item" href="/albums/">Galerie</a>
            @endif

            @if($navActive == 'members')
                <a class="blog-nav-item active" href="/members/">Mitglieder</a>
            @else
                <a class="blog-nav-item" href="/members/">Mitglieder</a>
            @endif


            @if($navActive == 'cars')
                <a class="blog-nav-item active" href="/cars/">Autos</a>
            @else
                <a class="blog-nav-item" href="/cars/">Autos</a>
            @endif

            {{--
            @if($navActive == 'projects')
                <a class="blog-nav-item active" href="/projects/">Projekte</a>
            @else
                <a class="blog-nav-item" href="/projects/">Projekte</a>
            @endif
            --}}

            @if($navActive == 'contact')
                <a class="blog-nav-item active" href="/contact/">Kontakt</a>
            @else
                <a class="blog-nav-item" href="/contact/">Kontakt</a>
            @endif
        </nav>
    </div>
</div>