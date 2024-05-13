<x-layout>

    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
          <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Welcome to KONE!</h1>
            <p class="col-lg-10 fs-4">A minimalist place for everything anime! Find your favorite anime shows, movies; connect with people from around the world.<br/>Join us today for an epic adventure!
            </p>
          </div>
          <div class="col-md-10 mx-auto col-lg-5">
            <form action="/register" method="POST" class="p-4 p-md-5 border rounded-3 bg-body-tertiary" data-bitwarden-watching="1">
              @csrf
              <div class="form-floating mb-3">
                <input type="text" value="{{old('username')}}" name="username" class="form-control" id="floatingInput" placeholder="username">
                <label for="floatingInput">User Name</label>
                @error('username')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input type="email"  value="{{old('email')}}" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                @error('email')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                @error('password')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Confirm Password</label>
                @error('password_confirmation')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">JOIN KONE!</button>
            </form>
          </div>
        </div>
    </div>

  </x-layout>