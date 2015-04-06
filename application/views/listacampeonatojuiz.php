<!DOCTYPE HTML>  
<html>
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
    <div class="container">
        <div class="row">
            <form>
                <div class="page-header">
                    <h2>Campeonatos</h2>
                    <?php
                    foreach ($campeonatos as $cc) {
                        echo "<h2>teste</h2>";
                    }
                    ?>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Campeonato</th>
                                <th>Data</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($campeonatos as $cc) {
                                echo "<tr>";
                                echo "<td>" . $cc->getNome() . "</td>";
                                echo "<td>" . $cc->getData() . "</td>";
                                echo "<td>
                            <ul>";
                                echo "<li><a class='btn btn-info'><i class='fa fa-refresh' href='" . base_url('index.php/sumula/view') . "'></i> Caddastra Uma Nova Sumula</a></li>";
                                echo "<li>
                                    <a class='btn btn-info'><i class='fa fa-refresh'></i> Gerar Um Novo Agendamento</a>
				</li>";
                                echo "<li>
                                    <a class='btn btn-info'><i class='fa fa-refresh'></i> Excluir Uma Sumula</a>
				</li>";
                                echo "
                            </ul>
                            </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>


        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('application/libraries/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/libraries/js/toastr.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/libraries/js/bootstrap-datepicker.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('application/libraries/js/locales/bootstrap-datepicker.pt-BR.js'); ?>"></script>
</body>
</html>
