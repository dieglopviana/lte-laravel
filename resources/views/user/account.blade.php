@extends('layouts.dashboard')
@section('pageTitle', 'Minha Conta')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Minha conta
            <small>altere seus dados</small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box box-primary color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title">Dados da sua conta</h3>
            </div>
            <div class="box-body">
                <div class="alerts"></div>

                <div class="row">
                    <form name="my-account">
                        @csrf
                        <div class="col-md-6">
                            <div class="alert alert-danger alert-dismissible hidden box-account-danger"></div>

                            @if (Session::has('messageSuccessfull'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Muito bem!</h4>
                                    {{ Session::get('messageSuccessfull') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ Auth::user()->name }}">
                                <p class="text-red hidden" id="error-name"></p>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ Auth::user()->email }}" disabled="disabled">
                                <p class="text-red hidden" id="error-email"></p>
                            </div>

                            <div class="form-group link_alterar_senha">
                                <a href="javascript:void(0);" id="link_alterar_senha">Alterar Senha</a>
                            </div>

                            <div id="alterar_senha" class="hidden">
                                <div class="form-group">
                                    <label for="senha">Senha:</label>
                                    <input type="password" class="form-control password" name="password" id="password" placeholder="Senha" value="" disabled="disabled">
                                    <p class="text-red hidden" id="error-password"></p>
                                </div>

                                <div class="form-group" id="div_confirm">
                                    <label for="confirmar_senha">Confirmar Senha:</label>
                                    <input type="password" class="form-control password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Senha" value="" disabled="disabled">
                                    <p class="text-red hidden" id="error-confirm-password"></p>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-salvar">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.box-body -->
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection


@push('jsFooter')

<script type="text/javascript">

    $('body').on('click', '#link_alterar_senha', function(event){
        $('.password').removeAttr('disabled');
        $('#alterar_senha').removeClass('hidden');
    })


    $('form[name="my-account"]').on('submit', function(event){
        event.preventDefault();

        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var passwordConfirmation = $('#password_confirmation').val();

        var returnFalse = 0;

        if (name == ''){
            returnFalse = 1;
            $('#error-name').html('*Digite seu nome').removeClass('hidden');
        } else {
            $('#error-name').html('').addClass('hidden');
        }

        if (email == ''){
            returnFalse = 1;
            $('#error-email').html('*Digite seu email').removeClass('hidden');
        } else {
            $('#error-email').html('').addClass('hidden');
        }

        if (password != ''){
            if (password != passwordConfirmation){
                returnFalse = 1;
                $('#error-confirm-password').html('*Senhas digitas não conferem').removeClass('hidden');
            }
        }

        if (returnFalse == 0){
            $('.btn-salvar').addClass('disabled').html('Aguarde...');
            $('.text-red').html('').addClass('hidden');

            $.ajax({
                url: "{{ route('user.account') }}",
                type: 'post',
                data: $('form[name="my-account"]').serialize(),
                dataType: 'json',
                success: function(response){
                    $('.btn-salvar').removeClass('disabled').html('Salvar');

                    if (response.status == 1){
                        $('.box-account-danger').html('').addClass('hidden');
                        window.location.href="{{ route('user.account') }}";
                    } else {
                        var messagesErrors = response.errors.join('<br>');

                        $('.alert-success').html('').addClass('hidden');
                        $('.box-account-danger').html(messagesErrors).removeClass('hidden');
                    }
                }
            })
        } else {
            return false;
        }
    })

</script>

@endpush
