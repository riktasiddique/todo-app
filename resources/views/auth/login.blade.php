<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Log in | {{config('app.name')}}</title>
        {{-- Bootstrap framework --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        {{-- style --}}
        <link rel="stylesheet" href="{{asset('assets/front/css/login.css')}}">
    </head>
    <body class="bg-dark">
        <section class="mt-5">
            <div class="row  justify-content-center mt-5 justify-content-lg-center">
                <div class="col-md-4 mt-5">
                    <h1 class="text-white text-center">Please Log in</h1>
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input name="email" type="email" class="bg-dark w-100 text-white-50" placeholder="Email" value="{{old('email')}}">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input name="password" type="password" class="bg-dark w-100 text-white-50" placeholder="Password">
                        </div>
                        <div class="mb-3 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-light" type="submit">Log in</button>
                          </div>
                    </form>
                    <div class="mt-2">
                        <h6 class="text-white text-center">Don't have an account? <a href="{{route('register') }}">Sing up</a></h6>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>