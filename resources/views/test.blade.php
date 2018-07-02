@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Connection à double authentification') }}</div>

                <?php if(!empty($error) && $error == true): ?>
                    <div class="alert alert-danger" id="id">
                        <p>Vous n'avez pas fourni le bon code !</p>
                    </div>
                <?php endif; ?>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.doubleauthcheck') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="sms" class="col-sm-4 col-form-label text-md-right">{{ __('Code SMS') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('sms') ? ' is-invalid' : '' }}" name="sms" 
                                required autofocus>

                                @if ($errors->has('sms'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sms') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" value="<?php if(!empty(Auth::user()->doubleToken)): echo Auth::user()->doubleToken; endif; ?>" name="token" />

                        {{ csrf_field() }}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Se connecter') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
