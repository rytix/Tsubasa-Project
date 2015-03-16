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
        <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/font-awesome/css/font-awesome.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/toastr.min.css'); ?>" />
        <title><?php echo $title ?></title>            
    </head>
    <body>
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="javascript:;">
                        <img alt="logo" src="http://3.bp.blogspot.com/-gYpGFzVfHcI/TZynmmaPV0I/AAAAAAAADDg/JVqK4s_Krjo/s320/capit%25C3%25A3o+tsubasa.jpg" style="height: 20px"/>
                        Capitão Tsubasa
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li  class="active" ><a href="symfony/web/app.php/campeonato"  >Campeonato</a></li>
                        <li ><a href="symfony/web/app.php/inscricao"  >Inscrições</a></li>
                        <li ><a href="symfony/web/app.php/juiz"  >Cadastrar Juiz</a></li>
                        <li ><a href="symfony/web/app.php/agendamento"  >Agendamento</a></li>
                        <li ><a href="symfony/web/app.php/sumula"  >Súmula</a></li>
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
                <?php echo form_open('index.php/campeonato/cadastrocampeonato'); ?>
                    <div class="page-header">
                        <h2>Cadastro de Campeonato</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input id="nome" type="text" class="form-control" name="nome">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select id="categoria" class="form-control" name="categoria">
                                    <?php
                                    foreach ($categorias as $key => $categoria) {
                                        echo "<option value='$key'>$categoria</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="juiz">Juiz</label>
                                <select id="juiz" class="form-control" name="juiz">
                                    <?php
                                    foreach ($juizes as $key => $juiz) {
                                        echo "<option value='$key'>$juiz</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="data">Data do Campeonato</label>
                                <input id="data" type="text" class="form-control" name="data"/>
                                <span class="form-control-feedback fa fa-calendar" ></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
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
        <?php
        if (isset($sucesso)) {
            echo "
                <script type=\"text/javascript\">
                    $(document).ready(function(){

                        Command: toastr[\"success\"](\"$sucesso\")

                        toastr.options = {
                          \"closeButton\": true,
                          \"debug\": false,
                          \"newestOnTop\": true,
                          \"progressBar\": false,
                          \"positionClass\": \"toast-top-right\",
                          \"preventDuplicates\": false,
                          \"onclick\": null,
                          \"showDuration\": \"300\",
                          \"hideDuration\": \"1000\",
                          \"timeOut\": \"5000\",
                          \"extendedTimeOut\": \"1000\",
                          \"showEasing\": \"swing\",
                          \"hideEasing\": \"linear\",
                          \"showMethod\": \"fadeIn\",
                          \"hideMethod\": \"fadeOut\"
                      }
                  });
                </script>
                ";
        }
        ?>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url('application/libraries/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('application/libraries/js/toastr.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('application/libraries/js/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('application/libraries/js/locales/bootstrap-datepicker.pt-BR.js'); ?>"></script>
<script type="text/javascript">
    $('input#data').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR"
    });
</script>
</body>
</html>
