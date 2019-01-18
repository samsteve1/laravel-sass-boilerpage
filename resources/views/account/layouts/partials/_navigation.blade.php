<div class="list-group">
  <a href="{{ route('account.index') }}" class="list-group-item list-group-item-action{{ return_if(on_page('account'), ' active')}}">Account Overview</a>
  <a href="{{ route('account.profile.index') }}" class="list-group-item list-group-item-action{{ return_if(on_page('account/profile'), ' active') }}">Profile</a>
  <a href="{{ route('account.password.index') }}" class="list-group-item list-group-item-action{{ return_if(on_page('account/password'), ' active') }}">Change Password</a>
  <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action{{ return_if(on_page('dashboard'), ' active') }}">Dashboard</a>
  <a href="{{ route('account.deactivate.index') }}" class="list-group-item list-group-item-action{{ return_if(on_page('account/deactivate'), ' active') }}">Deactivate account</a>
  <a href="{{ route('account.twofactor.index') }}" class="list-group-item list-group-item-action{{ return_if(on_page('account/twofactor'), ' active') }}">Two factor authentication</a>
  <a href="{{ route('account.tokens.index') }}" class="list-group-item list-group-item-action{{ return_if(on_page('account/tokens'), ' active') }}">API tokens</a>
</div>
<hr>
@subscribed
  @notpiggybacksubscription
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
  @endnotpiggybacksubscription
@endsubscribed
