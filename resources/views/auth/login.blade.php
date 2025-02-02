<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Backend</title>

    <base href="./">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <main class="col-md-6 mx-sm-auto px-4">
                <div class="pt-3 pb-2 mb-3 border-bottom text-center">
                    <h1 class="h2">WorldSkills Event Platform</h1>
                </div>

                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    @method('POST')
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email"
                        autofocus>
                    @error('email')
                        <span class="d-block invalid-feedback">{{ $message }}</span>
                    @enderror

                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control"
                        placeholder="Password">
                    <button class="btn btn-lg btn-primary btn-block" id="login" type="submit">Sign in</button>
                </form>

            </main>
        </div>
    </div>
</body>

</html>
