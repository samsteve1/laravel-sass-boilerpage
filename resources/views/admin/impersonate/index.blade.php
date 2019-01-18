@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-8 m-auto">
      <div class="card">
        <div class="card-header">
          <h4 class="header-text">Impersonate a user</h4>
        </div>
        <div class="card-body">
          <form  action="{{ route('admin.impersonate.start') }}" method="post">
            @csrf

            <div class="form-group">
              <label for="email" class="form-control-label">User email</label>
              <input type="text" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
              @if ($errors->has('email'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Impersonate</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
