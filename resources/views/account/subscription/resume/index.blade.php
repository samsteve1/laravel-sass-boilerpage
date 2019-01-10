@extends('account.layouts.default')
@section('account.content')
  <div class="card">
    <div class="card-body">
      <p>Resume your subscription.</p>
      <form  action="{{ route('account.subscription.resume.store') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary nt-1">Resume</button>
      </form>
    </div>
  </div>
@endsection
