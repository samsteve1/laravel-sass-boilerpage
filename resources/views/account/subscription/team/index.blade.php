@extends('account.layouts.default')
@section('account.content')
  <div class="card">
    <div class="card-body">
    <strong><p>Manage team.</p></strong>
      <form  action="{{ route('account.subscription.team.update') }}" method="post">
        @csrf
        {{ method_field('PATCH') }}

        <div class="form-group">
          <label for="name" class="control-label">Team name</label>
          <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name', $team->name) }}">

          @if ($errors->has('name'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
  <hr>
  <div class="card">
    <div class="card-body">
      @if ($team->users()->count())
        <table class="table table-stripe">
          <thead>
            <tr>
              <th>Member name</th>
              <th>Member email</th>
              <th>Added</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($team->users as $user)
              <tr>
                <td>{{$user->name}}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->pivot->created_at->toDateString() }}</td>
                <td>
                  <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('remove-{{ $user->id }}').submit();">Remove</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <p>You have not added any team members yet.</p>
      @endif

      @foreach ($team->users as $user)
        <form action="{{ route('account.subscription.team.member.destroy', $user) }}" method="post" id="remove-{{ $user->id }}" class="hidden">
          @csrf
          {{ method_field('DELETE') }}
        </form>
      @endforeach

      <form  action="{{ route('account.subscription.team.member.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="email" class="control-label">Add a member by email</label>
          <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">

          @if($errors->has('email'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
        <button type="submit" class="btn btn-primary">Add member<?button>
      </form>

    </div>
  </div>
@endsection
