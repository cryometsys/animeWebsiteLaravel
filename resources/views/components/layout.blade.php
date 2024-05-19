<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="container">
            <h1 class="logo">KONE</h1>
            @auth
              <nav class="nav">
                  <ul>
                      <li><a href="{{route('overview', ['user' => auth()->user()->username])}}">Profile</a></li>
                      <li><a href="{{route('animelist', ['user' => auth()->user()->username])}}">Anime List</a></li>
                      <li class="search-dropdown">
                          <a href="#">Browse</a>
                          <ul class="search-options">
                              <li><a href="#">Popular</a></li>
                              <li><a href="#">Seasonal</a></li>
                              <li><a href="#">Latest</a></li>
                          </ul>
                      </li>
                      <li><a href="{{route('social', ['user' => auth()->user()->username])}}">Social</a></li>
                  </ul>
              </nav>
              <nav class="nav-right">
                <ul>
                    <li class="search-dropdown">
                    <img src="{{auth()->user()->profilePhoto}}" class="profileAvatar">
                    <ul class="search-options">
                      <li><a href="{{route('overview', ['user' => auth()->user()->username])}}">Profile</a></li>
                      <li><a href="/settings">Settings</a></li>
                    </ul>
                    </li>
                </ul>
              </nav>
            @else
            <nav class="nav">
              <ul>
                <li class="search-dropdown">
                  <a href="#">Search</a>
                  <ul class="search-options">
                    <li><a href="#">Popular</a></li>
                    <li><a href="#">Seasonal</a></li>
                    <li><a href="#">Latest</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">Social</a>
                </li>
              </ul>
            </nav>
            <nav class="nav-right">
              <ul>
                <li>
                  <a href="{{route('login')}}">
                    <button class="loginBtn">Login</button>
                  </a>
                </li>
                <li>
                  <a href="{{route('signup')}}">
                    <button class="signupBtn">Sign Up</button>
                  </a>
                </li>
              </ul>
            </nav>
            @endauth
        </div>
    </header>

    @if(session()->has('success'))
        <div class="container container--narrow">
          <div class="alert alert-success text-center">
            {{session('success')}}
          </div>
        </div>
    @endif

    {{ $slot }}

    <footer class="footer">
        <div class="container-footer">
          <div class="footerBrand">
            <p>KONE</p>
          </div>
          <hr class="footerDivider">
          <div class="socialLinks">
            <a href="#">
              <img src="https://dummyimage.com/40x40/000/fff&text=facebook" alt="Facebook Link" />
            </a>
            <a href="#">
              <img src="https://dummyimage.com/40x40/000/fff&text=twitter" alt="Twitter Link" />
            </a>
            <a href="#">
              <img src="https://dummyimage.com/40x40/000/fff&text=twitter" alt="Twitter Link" />
            </a>
            <a href="#">
              <img src="https://dummyimage.com/40x40/000/fff&text=twitter" alt="Twitter Link" />
            </a>
            <a href="#">
              <img src="https://dummyimage.com/40x40/000/fff&text=instagram" alt="Instagram Link" />
            </a>
          </div>
          <div class="footerWriting">
            <p>Copyright &copy; {{date('Y')}} all rights reserved</p>
          </div>
        </div>
    </footer>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
     