@extends('account.layouts.default')
@section('account.content')
  <div class="card">
    <div class="card-body">
      <h4 class="card-header">Two factor authentication</h4>
        @if (auth()->user()->twoFactorEnabled())
            @include('account.layouts.partials._disable')
        @else
            @if (auth()->user()->twoFactorPendingVerification())
              @include('account.layouts.partials._verify')
            @else
              @include('account.layouts.partials._register')
            @endif
        @endif

    </div>

  </div>
@endsection
