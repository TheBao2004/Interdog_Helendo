@extends('layout.auth')


@section('root')
    <form method="POST" class="box-auth row">

        @csrf

        <div class="col-12">
            <h1 class="text-center">Login</h1>
        </div>
        <hr>

        <div class="col-12 mb-3">
            <div class="form-floating">
                <input type="text" name="email" class="form-control" placeholder="">
                <label>Email</label>
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12 mb-3">
            <div class="form-floating">
                <input type="password" name="password" class="form-control" placeholder="">
                <label>Password</label>
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <hr>

        <div class="text-end col-12 mb-3">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

    </form>
@endsection
