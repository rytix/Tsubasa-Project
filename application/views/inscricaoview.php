    
<!DOCTYPE HTML>  
<html language="pt-BR" >
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

                <div class="page-header">
                    <h2>Inscri��o do Campeonato</h2>
                </div>

                <div class="row">
                    <?php if (isset($vazio)) { ?>
                        <div class="col-xs-12">
                            <p class="bg-danger">N�o existem campeonatos dispon�veis para voc� se inscrever</p>
                        </div>
                    <?php } else { ?>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('index.php/inscricao/cadastroSocioCampeonato'); ?>
                        <div class="col-xs-12">
                            <div class="form-group">
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
                                            <?php
                                            foreach ($query as $campeonatoCategoria) {
                                                echo "<tr>";
                                                echo "<td>" . $campeonatoCategoria->getCampeonato()->getNome() . "</td>";
                                                echo "<td>" . $campeonatoCategoria->getCategoria()->getNome() . "</td>";
                                                echo "<td><input type=\"checkbox\" name = \"goleiro[]\" value = \"goleiro\"/></td>";
                                                $campeonato = $campeonatoCategoria->getCampeonato()->getId();
                                                $categoria = $campeonatoCategoria->getCategoria()->getId();
                                                echo "<td><input type=\"checkbox\" name = \"selecionar[]\" value = \"$campeonato:$categoria\"/></td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-primary">Inscrever-se</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    <?php } ?>
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
                } elseif (isset($falha)) {
                    echo "
                    <script type=\"text/javascript\">
                    $(document).ready(function(){

                        Command: toastr[\"error\"](\"$falha\")

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
