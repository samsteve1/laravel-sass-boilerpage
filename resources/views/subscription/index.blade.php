@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-8 m-auto">
      <div class="card card-default">
        <div class="card-header">
          Subscription
        </div>
        <div class="card-body">
          <form class="form-horizontal" action="{{ route('subscription.store') }}" method="POST" id="payment-form">
            @csrf
            <div class="form-group row">
              <label for="plan" class="col-sm-2 col-form-label">{{ __('Plan') }}</label>
              <div class="col-sm-10">
                <select class="form-control{{ $errors->has('plan') ? ' is-invalid' : '' }}" name="plan" required>
                  @foreach($plans as $plan)
                    <option value="{{ $plan->gateway_id }}" {{ request('plan') === $plan->slug || old('plan') === $plan->gateway_id ? 'selected="selected"' : '' }}>{{ $plan->name }} (${{ $plan->price }})</option>
                  @endforeach
                </select>
                @if ($errors->has('plan'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('plan') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="coupon" class="col-sm-2 col-form-label">{{ __('Coupon code') }}</label>
              <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('coupon') ? ' is-invalid' : '' }}" id="coupon" name="coupon" placeholder="Coupon Code">
                @if ($errors->has('coupon'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('coupon') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-6 m-auto">
                <button type="submit" class="btn btn-primary" id="pay">Pay</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
  <script src="http://checkout.stripe.com/checkout.js"></script>
  <script>
  $(document).ready(function () {
    let handler =  StripeCheckout.configure({
      key: '{{ config('services.stripe.key') }}',
      locale: 'auto',
      token: function (token) {
      let form = $("#payment-form")

      $("#pay").prop('disabled', true)
      $('<input>').attr({
        type: 'hidden',
        name: 'token',
        value: token.id
      }).appendTo(form)
      form.submit();
      }
    });

    $('#pay').click(function(e) {
      handler.open({
        name:'SteveWeb Ltd',
        description: 'Membership',
        currency: 'gbp',
        key: '{{ config('services.stripe.key') }}',
        email: '{{ auth()->user()->email }}'
      });

      e.preventDefault();
    });
  });
  </script>
@endsection
