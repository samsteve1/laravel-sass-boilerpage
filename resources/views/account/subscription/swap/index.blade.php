@extends('account.layouts.default')
@section('account.content')
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Change plan</h4>
      <p>Current plan: {{ auth()->user()->plan->name }}</p>
      <form action="{{ route('account.subscription.swap.store') }}" method="post">
        @csrf

        <div class="form-group">
          <label for="plan" class="control-label">Plan</label>
          <select name="plan" id="plan" class="form-control{{ $errors->has('plan') ? ' is-invalid' : '' }}">
            @foreach($plans as $plan)
              <option value="{{ $plan->gateway_id }}">{{ $plan->name }}</option>
            @endforeach
          </select>
          @if($errors->has('plan'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('plan') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
@endsection
