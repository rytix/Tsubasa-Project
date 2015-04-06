<!DOCTYPE HTML>  
<html language="pt-BR">
    <head>
        <meta charset="UTF-8" > 
        <script type="text/javascript" src="<?php echo base_url("application/libraries/js/jquery-2.1.1.min.js"); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/bootstrap.min.css'); ?>" />    
        <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/datepicker.css'); ?>"  />
        <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/datepicker3.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/font-awesome/css/font-awesome.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('application/libraries/css/toastr.min.css'); ?>" />
        <title><?php echo $title ?></title>            
        <title>Capitão Tsubasa!</title>            </head>
    <body>
        <?php
        $Header = new Header_model();
        $Header->get_header();
        ?>
        <style>
            ul{
                list-style: none;
            }
        </style>

        <div class="container principal">
            <div class="row">
                <form>
                    <div class="page-header">
                        <h2>Campeonatos</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Campeonato</th>
                                    <th>Categorias</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($campeonatos as $cc) {
                                    echo "<tr>";
                                    echo "<td>" . $cc->getCampeonato()->getNome() . "</td>";
                                    echo "<td>" . $cc->getCategoria()->getNome() . "</td>";
                                    echo "<td>
                            <ul>";
                                    echo "<li><a class='btn btn-danger' href='" . base_url('index.php/campeonato/excluir?campeonato=' . $cc->getCampeonato()->getId() . "&categoria=" . $cc->getCategoria()->getId()) . "'><i class='fa fa-trash-o'></i> Excluir</a></li>";

                                    if (!$cc->getTemTime()) {
                                        echo "<li><a class='btn btn-info' href='" . base_url('index.php/campeonato/geratime?campeonato=' . $cc->getCampeonato()->getId() . "&categoria=" . $cc->getCategoria()->getId()) . "'><i class='fa fa-refresh'></i> Gerar Time</a></li>";
                                    }
                                    echo "
				</ul>
                            </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="<?php echo base_url('index.php/campeonato/novo') ?>"><i class="fa fa-plus"></i> Criar</a>
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
    </body>
</html>


