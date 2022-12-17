<div class="card">
    <div class="card-header">
        <h2 class="card-title mb-0">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 mb-0 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </div>

    <div class="card-body">
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="mb-3">
                <x-admin.input
                    id="current_password"
                    type="password"
                    :label="__('Current Password')"
                    :placeholder="__('Current Password')"
                    name="current_password"
                    autocomplete="current-password"
                ></x-admin.input>
                @if( $errors->updatePassword->get('current_password') )
                    <div class="text-danger">
                        @foreach( $errors->updatePassword->get('current_password') as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <x-admin.input
                    id="password"
                    type="password"
                    :label="__('New Password')"
                    :placeholder="__('New Password')"
                    name="password"
                    autocomplete="new-password"
                ></x-admin.input>
                @if( $errors->updatePassword->get('password') )
                    <div class="text-danger">
                        @foreach( $errors->updatePassword->get('password') as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <x-admin.input
                    id="password_confirmation"
                    type="password"
                    :label="__('Confirm Password')"
                    :placeholder="__('Confirm Password')"
                    name="password_confirmation"
                    autocomplete="new-password"
                ></x-admin.input>
            </div>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif

            <button type="submit" class="btn btn-lg btn-primary">{{ __('Save') }}</button>
        </form>
    </div>
</div>
