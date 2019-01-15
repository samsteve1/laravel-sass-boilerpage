@extends('account.layouts.default')
@section('account.content')
  <div class="card">
    <div class="card-body">
      <h4 class="card-header">Two factor authentication</h4>
    </div>
    <form  action="{{ route('account.twofactor.store') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="dial_code">Dialing code</label>
        <select class="form-control{{ $errors->has('dial_code') ? ' is-invalid' : '' }}" name="dial_code" id="dial_code">
          @foreach($countries as $country)
            <option value="{{ $country->dial_code }}">{{ $country->name }} (+{{ $country->dial_code }})</option>
          @endforeach
        </select>

        @if ($errors->has('dial_code'))
          <span class="invalid-feedback">
            <strong>{{ $errors->first('dial_code') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        <label for="phone_number">Phone number</label>
        <input type="text" name="phone_number" id="phone_number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}">

        @if ($errors->has('phone_number'))
          <span class="invalid-feedback">
            <strong>{{ $errors->first('phone_number') }}</strong>
          </span>
        @endif
      </div>
    </form>
  </div>
@endsection
