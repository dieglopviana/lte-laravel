@extends('layouts.login')
@section('pageTitle', 'Login')

@section('content')

<div class="login-box">
    <!-- Box reset Password -->
    <div class="login-box-body box-reset-password">
        <p class="login-box-msg">Redefinir Senha</p>

        <div class="alert alert-danger alert-dismissible hidden box-reset-password-danger"></div>

        <form name="reset-password">
            @csrf
            <div class="form-group has-feedback">
                <input type="hidden" class="form-control" name="email" id="reset-email" value="{{ $email }}" />

                <input type="email" class="form-control email-reset-password" placeholder="Email" value="{{ $email }}" disabled />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <p class="text-red hidden" id="error-reset-password-email"></p>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" id="reset-password" placeholder="Senha"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <p class="text-red hidden" id="error-password"></p>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password_confirmation" id="reset-password-confirmation" placeholder="Confirme a Senha"/>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                <p class="text-red hidden" id="error-confirm-password"></p>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="checkbox icheck">
                        <a href="{{ route('login.index') }}" class="cancel">Cancelar</a>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat btn-reset">Redefinir Senha</button>
                </div><!-- /.col -->
            </div>
        </form>

    </div><!-- /.login-box-body -->

</div><!-- /.login-box -->

@endsection

@push('jsFooter')

<script type="text/javascript">

    $('form[name="reset-password"]').on('submit', function(event){
        event.preventDefault();

        var email = $('#reset-email').val();
        var password = $('#reset-password').val();
        var confirmPassword = $('#reset-password-confirmation').val();

        var returnFalse = 0;

        if (password == ""){
            returnFalse = 1;
            $('#error-password').html('* Digite sua Senha').removeClass('hidden');
        } else {
            $('#error-password').html('').addClass('hidden');
        }

        if (confirmPassword == ""){
            returnFalse = 1;
            $('#error-confirm-password').html('* Confirme sua Senha').removeClass('hidden');
        } else {
            if (confirmPassword != password){
                returnFalse = 1;
                $('#error-confirm-password').html('* Senhas digitas não conferem').removeClass('hidden');
            } else {
                $('#error-confirm-password').html('').addClass('hidden');
            }
        }

        if (returnFalse == 0){
            $('.btn-reset').addClass('disabled').html('Aguarde...');

            $.ajax({
                url: "{{ route('login.reset-password') }}",
                type: "post",
                data: $('form[name="reset-password"]').serialize(),
                dataType: 'json',
                success: function(response){
                    $('.box-reset-password-danger').html('').removeClass('hidden');

                    if (response.status == 1){
                        $('.box-reset-password-danger').html('').addClass('hidden');
                        window.location.href="{{ route('login.index') }}";
                    } else {
                        var messagesErrors = response.errors.join('<br>');

                        $('.box-reset-password-danger').html(messagesErrors).removeClass('hidden');
                        $('.btn-reset').removeClass('disabled').html('Redefinir Senha');
                    }
                }
            })
        } else {
            return false;
        }
    });

</script>

@endpush
