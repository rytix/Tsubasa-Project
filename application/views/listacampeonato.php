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
        <style>
            ul{
                list-style: none;
            }
        </style>
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
                        <li ><a href="symfony/web/app.php/campeonato"  >Campeonato</a></li>
                        <li  class="active" ><a href="symfony/web/app.php/inscricao"  >Inscrições</a></li>
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
                <?php foreach ($campeonatos as $cc) {
                    echo "<tr>";
                    echo "<td>".$cc->getCampeonato()->getNome()."</td>";
                    echo "<td>".$cc->getCategoria()->getNome()."</td>";
                    echo "<td>
                            <ul>";
                    echo	"<li><a class='btn btn-danger' href='".  base_url('index.php/campeonato/excluir?campeonato='.$cc->getCampeonato()->getId()."&categoria=".$cc->getCategoria()->getId())."'><i class='fa fa-trash-o'></i> Excluir</a></li>";
                                
		    if(!$cc->getTemTime()){
                    echo	"<li><a class='btn btn-info' href='".  base_url('index.php/campeonato/geratime?campeonato='.$cc->getCampeonato()->getId()."&categoria=".$cc->getCategoria()->getId())."'><i class='fa fa-trash-o'></i> Excluir</a></li>";
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


