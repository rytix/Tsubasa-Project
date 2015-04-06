<!DOCTYPE HTML>
<html>
    <head>
        <?php $this->load->helper('url'); ?>
        <?php $this->load->helper('form'); ?>
        <?php $this->load->library('form_validation'); ?>
        <meta charset="UTF-8" > 
        <script type="text/javascript" src="<?php echo base_url("application/libraries/js/jquery-2.1.1.min.js"); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/bootstrap.min.css'); ?>" />    
        <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/datepicker.css'); ?>"  />
        <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/datepicker3.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/font-awesome/css/font-awesome.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/toastr.min.css'); ?>" />
        <title><?php echo $title ?></title>            
    </head>
    <body>
        <?php
        $Header = new Header_model();
        $Header->get_header();
        ?>
        <div class="container principal">
            <div class="row">
                <?php echo validation_errors(); ?>
                <?php echo form_open($action); ?>
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
                            <select id="categoria" class="form-control" multiple="true" name="categoria[]">
                                <?php
                                foreach ($categorias as $categoria) {
                                    echo "<option value='" . $categoria->getId() . "'>" . $categoria->getNome() . "</option>";
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
                                foreach ($juizes as $juiz) {
                                    echo "<option value='" . $juiz->getId() . "'>" . $juiz->getNome() . "</option>";
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
                          \" hideDuration\": \"1000\",
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
