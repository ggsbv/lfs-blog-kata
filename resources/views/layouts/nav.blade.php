<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="#">Home</a>

            @if (! Auth::check())
                <a class="nav-link" href="/register">Register</a>
                <a class="nav-link" href="/login">Sign In</a>
            @endif

            <a class="nav-link" href="#">About</a>

            @if (Auth::check())
                <a class="nav-link" href="/posts/create">Create Post</a>
                <a class="nav-link" href="/logout">Sign Out</a>
            @endif


            @if (Auth::check())
                <a href="#" class="nav-link ml-auto">{{ Auth::user()->name }}</a>
            @endif
        </nav>
    </div>
</div>