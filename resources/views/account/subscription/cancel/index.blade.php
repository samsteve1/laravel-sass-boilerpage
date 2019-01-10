@extends('account.layouts.default')
@section('account.content')
  <div class="card">
    <div class="card-body">
    <p>Confirm subscription cancellation.</p>
      <form action="{{ route('account.subscription.cancel.store') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger mt-1">Cancel</button>
      </form>
    </div>
  </div>
@endsection
