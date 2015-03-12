
<!DOCTYPE HTML>  
<html language="pt-BR" >
    <head>
        ?php $this->load->helper('url'); ?>
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
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li ><a href="symfony/web/app.php/campeonato"  >Campeonato</a></li>
                        <li  class="active" ><a href="symfony/web/app.php/inscricao"  >Inscri��es</a></li>
                        <li ><a href="symfony/web/app.php/juiz"  >Cadastrar Juiz</a></li>
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
        <form>
    <div class="page-header">
        <h2>Inscri��o do Campeonato</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Campeonato</th>
                    <th>Categoria</th>
                    <th>Goleiro</th>
					<th>Selecionar</th>
                </tr>
            </thead>
            <tbody>
            <!-- for -->
                <tr>
                    <td>Copa Jorj�o</td>
                    <td>Veteranos</td>
                    <td><input type="checkbox" /></td>
					<td><input type="checkbox" /></td>
                </tr>
                <tr>
                    <td>Copa Marte</td>
                    <td>Veteranos</td>
                    <td><input type="checkbox" /></td>
					<td><input type="checkbox" /></td>
                </tr>
                <tr>
                    <td>Copa Uranus</td>
                    <td>Veteranos</td>
                    <td><input type="checkbox" /></td>
					<td><input type="checkbox" name="<?php echo "selecionar".countadorDoMathiasHuezento ?>" /></td>
                </tr>
                <!-- endfor -->
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <div class="pull-right">
                    <button class="btn btn-primary">Inscrever-se</button>
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
