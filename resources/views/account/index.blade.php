@extends('account.layouts.default')
@section('account.content')
  <div class="card">
    <div class="card-body">
      Account Overview
      {{-- {{ dd(auth()->user()->hasTeamSubscription()) }} --}}
    </div>
  </div>
@endsection
