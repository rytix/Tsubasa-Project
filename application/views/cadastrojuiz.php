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
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>           
    </head>

    <body>
        <?php
        $Header = new Header_model();
        $Header->get_header();
        ?>

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
                                <label for="username">Usuário</label>
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
                } elseif (isset($error)) {
                echo "
                    <script type=\"text/javascript\">
                    $(document).ready(function(){

                        Command: toastr[\"error\"](\"$error\")

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

    </body>
</html>

