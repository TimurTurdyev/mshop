<div class="card">
    <div class="card-header">
        <h2 class="card-title mb-0">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 mb-0 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </div>

    <div class="card-body">
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')
            @if( $errors->userDeletion->get('password') )
                <div class="text-danger">
                    @foreach( $errors->userDeletion->get('password') as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                </div>
            @endif
            <div class="mb-3">
                <x-admin.input
                    id="delete-password"
                    type="password"
                    :label="__('Password')"
                    :placeholder="__('Password')"
                    name="password"
                ></x-admin.input>
            </div>
            <button type="submit" class="btn btn-lg btn-danger"
            >{{ __('Delete Account') }}</button>
        </form>
    </div>
</div>
