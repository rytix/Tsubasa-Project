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
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>  
        <title>Capitão Tsubasa!</title>    
        <style type="text/css">
            ul li{
                display: block;
            }
            .adicionar{
                margin: 10px 0px 10px 5px;
            }
        </style>
    </head>

    <body>
        <?php
        $Header = new Header_model();
        $Header->get_header();
        ?>
        <div class="container">
            <div class="row">
                <form>
                    <div class="page-header">
                        <h2>Cadastro de Súmula</h2>
                    </div>
                    <h4 class="page-header">Campeonato</h4>
                    <div class="row">
                        <div class="col-sm-4"> 
                            <div class="form-group">
                                <label for="campenato">Campeonato</label>
                                <select id="campeonato" class="form-control" name="campeonato"  >
                                    <option selected="selected" value=" ">&nbsp;</option>
                                    <?php
                                    foreach ($campeonatocategoria as $cc) {
                                        echo "<option value='" . $cc->getCampeonato()->getId() . "' >" . $cc->getCampeonato()->getNome() . "</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <select id="categoria" class="form-control" name="categoria" >
                                <option selected="selected" value=" ">&nbsp;</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="partida">Partida Ativa</label>
                            <select id="partida" class="form-control"  name="partida">
                                <?php
                                foreach ($partidas as $p) {
                                    echo "<option>" . $p->getNome() . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
            </div>
            <h4 class="page-header">Times</h4>
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <select class="form-control" name="times">
                            <?php
                            foreach ($times as $times) {
                                echo "<option>" . $p->getNome() . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <select class="form-control" name="times">
                            <?php
                            foreach ($times as $times) {
                                echo "<option>" . $p->getNome() . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>WO</label>
                        <input type="checkbox" name = "woA" value = "woA"/>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>WO</label>
                        <input type="checkbox" name = "woB" value = "woB"/>
                    </div>
                </div>
            </div>
            <h4 class="page-header">Jogadores</h4>
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <ul class="list-group">
                            <li>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <select class="form-control">
                                            <option>Jogador do time 1</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Gols</label>
                                        <input class="form-control">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Faltas</label>
                                        <input class="form-control">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Cartão Azul</label>
                                        <input type="checkbox">
                                        <input type="checkbox">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Cartão Vermelho</label>
                                        <input type="checkbox">
                                    </div>
                                </div>
                            </li>

                            <a class="btn btn-primary adicionar pull-right"><span class="fa fa-plus"></span></a> 
                            <a class="btn btn-danger adicionar pull-right"><span class="fa fa-times"></span></a> 
                        </ul>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <ul class="list-group">
                            <li>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <select class="form-control">
                                            <option>Jogador do time 2</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Gols</label>
                                        <input class="form-control">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Faltas</label>
                                        <input class="form-control">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Cartão Azul</label>
                                        <input type="checkbox">
                                        <input type="checkbox">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Cartão Vermelho</label>
                                        <input type="checkbox">
                                    </div>
                                </div>
                            </li>

                            <a class="btn btn-primary adicionar pull-right"><span class="fa fa-plus"></span></a> 
                            <a class="btn btn-danger adicionar pull-right"><span class="fa fa-times"></span></a> 
                        </ul>
                    </div>
                </div>
            </div>
            <h4 class="page-header">Observações<h4>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <textarea class="form-control" name="observacoes"></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12" style="padding-right: 0px">
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
                    <script type="text/javascript" src="<?php echo base_url('application/libraries/js/app.js'); ?>"></script>
                    <script type="text/javascript" src="<?php echo base_url('application/libraries/js/bootstrap-datepicker.js'); ?>"></script>
                    <script type="text/javascript" src="<?php echo base_url('application/libraries/js/locales/bootstrap-datepicker.pt-BR.js'); ?>"></script>	
                    <script type="text/javascript" >
                        var $campeonato = $('#campeonato');
                        var $categoria = $('#categoria');
                        var $partida = $('#partida');

                        $campeonato.change(function () {
                            var url = '<?php echo base_url("index.php/sumula/ajaxCampeonato/__CAMPEONATO__"); ?>';
                            $.ajax({
                                url: url.replace('__CAMPEONATO__', $campeonato.val()),
                                type: 'GET',
                                beforeSend: function () {
                                    //App.blockUI({target: $categoria, iconOnly: true});
                                },
                                success: function (categorias) {
                                    console.log(categorias);
                                    $categoria.prop('readonly', false);
                                    $categoria.empty();
                                    $categoria.append($('<option></option>'));
                                    for (i in categorias) {
                                        $option = $('<option></option>').val(i).text(categorias[i]);
                                        $categoria.append($option);
                                    }
                                    //App.unblockUI($categoria);
                                },
                                error: function () {
                                    //App.unblockUI($categoria);
                                }
                            });
                        });
                    </script>
                    </body>
                    </html>


