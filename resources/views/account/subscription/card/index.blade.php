@extends('account.layouts.default')
@section('account.content')
  <div class="card">
    <div class="card-body">
      <p>Your new card will be used for future payment.</p>
      <form  action="{{ route('account.updatecard.store')}}" method="post" id="card-form">
        @csrf
        <button type="submit" class="btn btn-primary" id="update">Update card</button>

      </form>
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
      let form = $("#card-form")

      $("#update").prop('disabled', true)
      $('<input>').attr({
        type: 'hidden',
        name: 'token',
        value: token.id
      }).appendTo(form)
      form.submit();
      }
    });

    $('#update').click(function(e) {
      handler.open({
        name:'SteveWeb Ltd',
        currency: 'gbp',
        key: '{{ config('services.stripe.key') }}',
        email: '{{ auth()->user()->email }}',
        panelLabel: 'Update card'
      });

      e.preventDefault();
    });
  });
  </script>
@endsection
