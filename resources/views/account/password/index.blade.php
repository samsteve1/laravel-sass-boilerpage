
@extends('account.layouts.default')
@section('account.content')
  <div class="panel panel-default">
    <div class="panel-body">
      <form  action="{{ route('account.password.store') }}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="current_password" class="control-label" >{{ __('Current Password') }}</label>
          <input type="password" name="current_password" id="current_password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}"  aria-describedby="currPass">

          @if ($errors->has('current_password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('current_password') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group">
          <label for="password" class="control-label">{{ __('New Password') }}</label>
          <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"  aria-describedby="password">

          @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group">
          <label for="password_confirmation" class="control-label">{{ __('Confirm new Password') }}</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"  aria-describedby="password_confirmation">

          @if ($errors->has('password_confirmation'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
          @endif
        </div>

        <button type="submit" class="btn btn-primary">Change Password</button>

      </form>
    </div>
  </div>
@endsection
