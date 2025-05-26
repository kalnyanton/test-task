@extends('layouts.app')

@section('content')
    <div class="form-container">
        <form action="{{ route('account.register-action') }}" method="post">
            @csrf

            <div class="control-group">
                <label for="username">{{ __('Username') }}</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}"
                       class="@error('username') is-invalid @enderror">
                @error('username')
                <div class="error-box">{{ $message }}</div>
                @enderror
            </div>

            <div class="control-group">
                <label for="phone-number">{{ __('Phone number') }}</label>
                <input type="text" id="phone-number" name="phone_number" value="{{ old('phone_number') }}"
                       class="@error('phone_number') is-invalid @enderror">
                @error('phone_number')
                <div class="error-box">{{ $message }}</div>
                @enderror
            </div>

            <button>{{ __('Register') }}</button>
        </form>
    </div>
    <p class="note">{{ __('Username must be unique') }}</p>
@endsection
