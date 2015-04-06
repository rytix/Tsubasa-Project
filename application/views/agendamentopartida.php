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
        <title>Capitão Tsubasa!</title>            
    </head>

    <body>
        <?php
        $Header = new Header_model();
        $Header->get_header();
        ?>
        <div class="container">
            <div class="row">
                <?php echo validation_errors(); ?>
                <?php echo form_open('index.php/partida/cadastropartida'); ?>
                <form>
                    <div class="page-header">
                        <h2>Agendamento do Jogo</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-control">
                                <label for="campenato">Campeonato</label>
                                <select id="campeonato" class="form-control"  >
                                    <?php
                                    foreach ($campeonatos as $row) {
                                        echo '<option value="' . $row->nome . '">' . $row->nome . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select id="categoria" class="form-control"  >
                                    <option>Veterano</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="casa">Casa</label>
                                <select id="casa" class="form-control">
                                    <option>Time 1</option>
                                    <option>Time 2</option>
                                    <option>Time 3</option>
                                    <option>Time 4</option>
                                    <option>Time 5</option>
                                    <option>Time 6</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="visitante">Visitante</label>
                                <select id="visitante" class="form-control">
                                    <option>Time 1</option>
                                    <option>Time 2</option>
                                    <option>Time 3</option>
                                    <option>Time 4</option>
                                    <option>Time 5</option>
                                    <option>Time 6</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="data">Data do Jogo</label>
                                <input id="data" type="text" class="form-control"/>
                                <span class="form-control-feedback fa fa-calendar" ></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="hora">Hora do Jogo</label>
                                <input id="hora" type="time" class="form-control"/>
                                <span class="form-control-feedback fa fa-clock-o" ></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="campo">Campo</label>
                                <input id="campo" type="text" class="form-control"/>              
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
        <script type="text/javascript" src="<?php echo base_url('application/libraries/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('application/libraries/js/toastr.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('application/libraries/js/bootstrap-datepicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('application/libraries/js/locales/bootstrap-datepicker.pt-BR.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('application/libraries/js/locales/select2.js'); ?>"></script>
    </script>
</body>
</html>
