<div class="list-group">
  <a href="{{ route('account.index') }}" class="list-group-item list-group-item-action{{ return_if(on_page('account'), ' active')}}">Account Overview</a>
  <a href="{{ route('account.profile.index') }}" class="list-group-item list-group-item-action{{ return_if(on_page('account/profile'), ' active') }}">Profile</a>
  <a href="{{ route('account.password.index') }}" class="list-group-item list-group-item-action{{ return_if(on_page('account/password'), ' active') }}">Change Password</a>
</div>
<hr>
@subscribed
  <div class="list-group">
    @subscriptionNotCancelled
        <a href="{{ route('account.subscription.swap.index') }}" class="list-group-item{{ return_if(on_page('account/subscription/swap'), ' active') }}">Change plan</a>
        <a href="{{ route('account.subscription.cancel.index') }}" class="list-group-item{{ return_if(on_page('account/subscription/cancel'), ' active') }}">Cancel subscription</a>
    @endsubscriptionNotCancelled

    @subscriptionCancelled
      <a href="{{ route('account.subscription.resume.index') }}" class="list-group-item{{ return_if(on_page('account/subscription/resume'), ' active') }}">Resume subscription</a>
    @endsubscriptionCancelled

      <a href="{{ route('account.updatecard.index') }}" class="list-group-item{{ return_if(on_page('account/card'), ' active') }}">Update card</a>

      @teamsubscription
        <a href="{{ route('account.subscription.team.index') }}" class="list-group-item{{ return_if(on_page('account/team'), ' active') }}">Manage team</a>
      @endteamsubscription
  </div>
@endsubscribed
