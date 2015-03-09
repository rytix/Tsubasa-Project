<!DOCTYPE HTML>  
<html>
<head>
    <?php $this->load->helper('url'); ?>
    <?php $this->load->helper('form'); ?>
    <?php $this->load->library('form_validation'); ?>
    <script type="text/javascript" src="<?php echo base_url("application/libraries/js/jquery-2.1.1.min.js"); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/bootstrap.min.css'); ?>" />    
    <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/datepicker.css'); ?>"  />
    <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/datepicker3.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/font-awesome.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/toastr.min.css'); ?>" />
    <title>Capit�o Tsubasa!</title>            
</head>

<body>
    <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="javascript:;">
                    <img alt="logo" src="http://3.bp.blogspot.com/-gYpGFzVfHcI/TZynmmaPV0I/AAAAAAAADDg/JVqK4s_Krjo/s320/capit%25C3%25A3o+tsubasa.jpg" style="height: 20px"/>
                    Capit�o Tsubasa
                </a>
            </div>
            <div class="navbar-collapse collapse">��
                <ul class="nav navbar-nav">
                    <li ><a href="symfony/web/app.php/campeonato"  >Campeonato</a></li>
                    <li ><a href="symfony/web/app.php/inscricao"  >Inscri��es</a></li>
                    <li  class="active" ><a href="symfony/web/app.php/juiz"  >Cadastrar Juiz</a></li>
                    <li ><a href="symfony/web/app.php/agendamento"  >Agendamento</a></li>
                    <li ><a href="symfony/web/app.php/sumula"  >S�mula</a></li>
                </ul>
                <div class="pull-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdownn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tsubasa <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:;"><span><i class="fa fa-user"></i>  Perfil</span></a></li>
                                <li><a href="javascript:;"><span><i class="fa fa-power-off"></i>  Sair  </span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php echo validation_errors(); ?>
            <?php echo form_open('index.php/juiz/cadastrojuiz'); ?>
            <form>
                <div class="page-header">
                    <h2>Cadastro de Juiz</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="username">Usu�rio</label>
                            <input type="text" id="username" name="username" class=" form-control"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" id="password" name="password" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password-clone">Repetir Senha</label>
                            <input type="password" id="password-clone" name="password-clone" class=" form-control"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="pull-right">
                                <button class="btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('application/libraries/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/libraries/js/toastr.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/libraries/js/bootstrap-datepicker.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/libraries/js/locales/bootstrap-datepicker.pt-BR.js'); ?>"></script>
    <? php isset($sucesso){

    <script type="text/javascript">
        $(document).ready(function(){

            Command: toastr["success"]("Zoeragem", "Hue")

            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": true,
              "progressBar": false,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
        });
    }
    ?>
    </script>
</body>
</html>

