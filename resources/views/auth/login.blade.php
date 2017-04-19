@extends('layouts.auth')

@section('content')
    <div class="column is-4 is-offset-4">
        <h1 class="title">
          G<i>Zone</i>
        </h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="box">
          <label class="label">Email</label>
          <p class="control">            
            <input type="email" class="input" name="email" value="{{ old('email') }}"  placeholder="jsmith@example.org" required autofocus>
             @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </p>

          <label class="label">Password</label>
          <p class="control">
            <input type="password" class="input" name="password" placeholder="●●●●●●●" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </p>
          <hr>

          <p class="control">
            <button class="button is-primary">Login</button>
            <button class="button is-default">Cancel</button>
          </p>
        </div>
        <p class="has-text-centered">
          <a href="/register">Register an Account</a>         
        </p>
    </div>
@endsection
