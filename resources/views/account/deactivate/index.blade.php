@extends('account.layouts.default')

@section('account.content')
  <div class="card">
    <div class="card-body">
      <form  action="{{ route('account.deactivate.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="password_current">Current password</label>
          <input type="password" name="password_current" id="password_current" class="form-control{{ $errors->has('password_current') ? ' is-invalid' : ''}}">

          @if ($errors->has('password_current'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('password_current') }}</strong>
            </span>
          @endif
        </div>
        @subscribed
          @subscriptionNotCancelled
            <p class="text-danger">This will also cancel your active subscription.</p>
          @endsubscriptionNotCancelled
        @endsubscribed
        <button tyepe="submit" class="btn btn-primary">Deactivate account</button>
      </form>
    </div>
  </div>
@endsection
