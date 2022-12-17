<div class="card">
    <div class="card-header">
        <h2 class="card-title mb-0">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 mb-0 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </div>

    <div class="card-body">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')
            <div class="mb-3">
                <x-admin.input
                    id="name"
                    :label="__('Name')"
                    :placeholder="__('Name')"
                    errorName="name"
                    name="name"
                    :value="old('name', $user->name)"
                    required
                    autocomplete="name"
                ></x-admin.input>
            </div>

            <div class="mb-3">
                <x-admin.input
                    id="email"
                    type="email"
                    :label="__('Email')"
                    :placeholder="__('Email')"
                    errorName="email"
                    name="email"
                    :value="old('email', $user->email)"
                    required
                    autocomplete="email"
                ></x-admin.input>
            </div>

            <div>
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
            @if ( session('status') === 'profile-updated' )
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-success"
                >{{ __('Saved.') }}</p>
            @endif

            <button type="submit" class="btn btn-lg btn-primary">{{ __('Save') }}</button>
        </form>
    </div>
</div>
