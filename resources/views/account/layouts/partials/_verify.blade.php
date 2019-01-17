<form  action="{{ route('account.twofactor.verify') }}" method="post">
  @csrf
  <div class="form-group">
    <label>Verify token</label>
    <input type="text" name="token" id="token" class="form-control{{ $errors->has('token') ? ' is-invalid' : '' }}">

    @if ($errors->has('token'))
      <span class="invalid-feedback">
        <strong>{{ $errors->first('token') }}</strong>
      </span>
    @endif
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Verify</button>
  </div>

</form>

<hr>
<form  action="{{ route('account.twofactor.destroy') }}" method="post">
  @csrf
  {{ method_field('DELETE') }}

  <button type="submit" class="btn btn-default">Cancel verification</button>
</form>
