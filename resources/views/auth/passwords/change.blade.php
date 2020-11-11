@extends('layouts.guest')

@section('tittle', 'Change Password')

@section('content')
    <div class="card">
        <p class="card-header h3 text-center">{{ __('Change Password') }}</p>
        <div class="card-body login-card-body">
            <x-messages />
            <form method="POST" action="{{ route('patch.change_password') }}">
                @csrf
                @method('PATCH')

                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password" placeholder="Current Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-unlock"></span>
                        </div>
                    </div>
                    @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new_password" placeholder="New Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="new_password_confirmation" required autocomplete="current-password" placeholder="Confirm New Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-key"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Change Password') }}</button>
                </div>
            </form>

        </div>
    </div>
@endsection
