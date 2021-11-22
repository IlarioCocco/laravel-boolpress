{{-- sezione head --}}
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/examples/blog/blog.css" rel="stylesheet">
  </head>
{{-- sezione head --}}



<body class="bg-secondary text-grey">

{{-- div container header --}}
    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-dark" href="#">Subscribe</a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="{{route("homepage")}}">Laravel Boolpress</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-dark" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
            </a>
            <a class="btn btn-sm btn-outline-primary text-dark" href="{{route("login")}}">Sign in</a> 
            <a class="btn btn-sm btn-outline-danger text-dark" href="{{route("register")}}">Sign up</a>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav ">
          <a class="p-2 text-dark" href="{{route("homepage")}}">Home</a>
          <a class="p-2 text-dark" href="{{route("posts.index")}}">Blog</a>
          <a class="p-2 text-dark" href="{{route("posts.index")}}">Chi Sono</a>
          <a class="p-2 text-dark" href="{{route("posts.index")}}">Contatti</a>
        </nav>
      </div>

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Titolo blog post</h1>
          <p class="lead my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi placeat ex quis reiciendis exercitationem tempore hic, explicabo tempora optio similique quas facilis debitis dolores sit. Error sequi cum porro qui.</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continua la lettura...</a></p>
        </div>
      </div>
    </div>
{{-- div container header --}}



{{-- main --}}
    <main role="main" class="container">

        @yield('pageContent')   

    </main><!-- /.container -->
{{-- main --}}



{{-- footer --}}
    <footer class="blog-footer mb-2 bg-dark text-white">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
{{-- footer --}}
   
</body>
</html>
