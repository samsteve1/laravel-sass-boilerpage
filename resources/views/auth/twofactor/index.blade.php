@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 m-auto">
        <div class="card">
          <div class="card-body">
            <h4 class="card-header">Two factor authentication</h4>

            <form  action="{{ route('login.twofactor.verify') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="token" class="form-control-label">Authentication token</label>
                <input type="text" name="token" id="token" class="form-control{{ $errors->has('token') ? ' is-invalid' : '' }}">

                @if ($errors->has('token'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('token') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
