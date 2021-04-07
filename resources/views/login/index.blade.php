@extends('layouts.login')
@section('pageTitle', 'Login')

@section('content')

<div class="modal fade terms-modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nossos Termos de Uso</h4>
            </div>

            <div class="modal-body">
                <h3 class="text-center">Lorem Ipsum</h3>
                <p class="text-center">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..." <br />"Não há ninguém que ame a dor por si só, que a busque e queira tê-la, simplesmente por ser dor..."</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dictum, lectus nec finibus aliquam, nisi turpis ullamcorper massa, sit amet malesuada felis sem sed neque. Integer et massa eu nunc eleifend eleifend. Curabitur sit amet volutpat lorem. Aenean vehicula posuere lacus eget sollicitudin. Nullam posuere dignissim orci, vel blandit felis tempus a. Phasellus gravida egestas metus id viverra. Sed porta eros sed lectus convallis pharetra. Praesent metus diam, hendrerit nec urna at, sodales lacinia lacus. Vestibulum efficitur iaculis iaculis. Sed sagittis rutrum sollicitudin. Nulla vehicula diam id arcu porta vehicula at sed nulla. Ut molestie et nisi at rutrum. Donec ligula augue, fringilla quis scelerisque vel, gravida eu sapien.</p>
                <p>Donec molestie massa in odio dignissim, at hendrerit nisi tristique. Vivamus vel semper tortor. Cras malesuada sodales egestas. Aliquam tortor diam, iaculis sit amet mi nec, ultrices fermentum lectus. Praesent pulvinar, risus a commodo vehicula, purus turpis rutrum elit, ut ultricies lorem neque eu est. Aliquam sed risus pulvinar, dignissim ligula eget, rutrum risus. Cras luctus quis arcu et semper. Aliquam molestie, justo a facilisis ullamcorper, libero enim vestibulum urna, non tincidunt sem diam eu lectus. Sed euismod mauris quis finibus posuere. Fusce pulvinar hendrerit ex, vel porttitor tortor mollis a. Mauris accumsan fermentum elementum. Etiam fringilla suscipit purus, at commodo arcu maximus et. Duis eget consequat augue.</p>
                <p>Nunc aliquam libero sapien, sit amet vulputate nisl bibendum accumsan. Nunc semper malesuada arcu. Suspendisse molestie ante nec accumsan mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in ante id nulla sodales tincidunt. Donec sodales semper est, ac pellentesque turpis placerat eu. Suspendisse pulvinar vulputate hendrerit. Aliquam fringilla semper leo, rutrum porta urna auctor in. Maecenas ut ex lobortis, laoreet quam a, dignissim tellus.</p>
                <p>Donec pretium cursus urna a porttitor. Proin a urna commodo, dapibus sapien blandit, molestie justo. Fusce consectetur posuere fringilla. Etiam ut tristique leo. Maecenas a consectetur massa. Proin blandit imperdiet felis. Donec luctus sem id fringilla placerat. Aliquam non turpis vestibulum dui luctus feugiat quis non nisi.</p>
            </div>

            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-primary accept-terms" data-dismiss="modal">Fechar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('login.index') }}"><b>Admin</b>LTE - Laravel</a>
    </div><!-- /.login-logo -->

    <div class="login-box-body box-login">
        <p class="login-box-msg">Digite seu usuário e senha:</p>

        <form action="../../index2.html" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Senha"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Lembre de mim
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div><!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OU -</p>
            <a href="javascript:void(0);" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Entrar com o Facebook</a>
            <a href="javascript:void(0);" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Entrar com o Google+</a>
        </div><!-- /.social-auth-links -->

        <a href="javascript:void(0);" class="forgot-password">Esqueci minha senha</a><br>
        <a href="javascript:void(0);" class="text-center register">Cadastre-se</a>

    </div><!-- /.login-box-body -->



    <!-- Box forgot Password -->
    <div class="login-box-body box-forgot-password hidden">
        <p class="login-box-msg">Digite seu email cadastrado:</p>

        <form action="../../index2.html" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <a href="javascript:void(0);" class="cancel">Cancelar</a>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
                </div><!-- /.col -->
            </div>
        </form>

    </div><!-- /.login-box-body -->


    <!-- Box register -->
    <div class="register-box-body box-register hidden">
        <p class="login-box-msg">Informe seus dados para se cadastrar</p>
        <form action="../../index.html" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" id="register-name" placeholder="Nome"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <p class="text-red hidden" id="error-name"></p>
            </div>

            <div class="form-group has-feedback">
                <input type="email" class="form-control" id="register-email" placeholder="Email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <p class="text-red hidden" id="error-email"></p>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" id="register-password" placeholder="Senha"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <p class="text-red hidden" id="error-password"></p>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" id="register-confirm-password" placeholder="Confirme a Senha"/>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                <p class="text-red hidden" id="error-confirm-password"></p>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" class="check-agree-terms" id="register-accept-terms"> Eu aceito os
                            <a href="javascript:void(0);" class="show-terms" data-toggle="modal" data-target=".terms-modal">termos</a>
                        </label>

                        <p class="text-red hidden" id="error-accept-terms"></p>
                    </div>
                </div><!-- /.col -->

                <div class="col-xs-4">
                    <button type="button" class="btn btn-primary btn-block btn-flat" id="btn-register">Cadastrar</button>
                </div><!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OU -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Entrar com o Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Entrar com o Google+</a>
        </div>

        <a href="javascript:void(0);" class="text-center cancel">Já sou cadastrado</a>
    </div><!-- /.form-box -->
</div><!-- /.login-box -->

@endsection

@push('jsFooter')
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });


        $('body').on('click', '.forgot-password', function(){
            $('.box-login').addClass('hidden');
            $('input[type=text]').val('');
            $('input[type=email]').val('');
            $('input[type=password]').val('');

            $('.box-forgot-password').removeClass('hidden');
        })


        $('body').on('click', '.cancel', function(){
            $('.box-login').removeClass('hidden');
            $('input[type=text]').val('');
            $('input[type=email]').val('');
            $('input[type=password]').val('');

            $('.box-forgot-password').addClass('hidden');
            $('.box-register').addClass('hidden');
            $('input').iCheck('uncheck');
        })


        $('body').on('click', '.register', function(){
            $('.box-login').addClass('hidden');
            $('input[type=text]').val('');
            $('input[type=email]').val('');
            $('input[type=password]').val('');

            $('.box-forgot-password').addClass('hidden');
            $('.box-register').removeClass('hidden');
        })

        $('body').on('click', '#btn-register', function(){
            if (validateRegister()){
                alert('aqui');
            }
        })


        function validateRegister(){
            var name = $('#register-name').val();
            var email = $('#register-email').val();
            var password = $('#register-password').val();
            var confirmPassword = $('#register-confirm-password').val();
            var acceptTerms = $('input#register-accept-terms:checked').length;

            var returnFalse = 0;

            if (name == ""){
                returnFalse = 1;
                $('#error-name').html('* Digite seu Nome').removeClass('hidden');
            } else {
                $('#error-name').html('').addClass('hidden');
            }

            if (email == ""){
                returnFalse = 1;
                $('#error-email').html('* Digite seu Email').removeClass('hidden');
            } else {
                $('#error-email').html('').addClass('hidden');
            }

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

            if (acceptTerms == 0){
                returnFalse = 1;
                $('#error-accept-terms').html('* Aceite nossos termos').removeClass('hidden');
            } else {
                $('#error-accept-terms').html('').addClass('hidden');
            }

            return returnFalse == 1 ? false : true;
        }

    });
</script>
@endpush
