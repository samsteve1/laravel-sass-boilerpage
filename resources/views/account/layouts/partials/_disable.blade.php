<p>Two factor authentication is enabled for your account.</p>

<form  action="{{ route('account.twofactor.destroy') }}" method="post">
  @csrf
  {{ method_field('DELETE') }}
  <div class="form-group">
    <button type="submit" class="btn btn-danger">Disable</button>
  </div>
</form>
