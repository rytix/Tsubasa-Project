<?php

function url_by_user($usuarioCode) {
    switch ($usuarioCode) {
        case Usuario_model::DIRETOR:
            echo '<li ><a href = "'.base_url('index.php/campeonato/lista').'" >Campeonato</a></li>';
            echo '<li ><a href = "'.base_url('?').'" >Cadastrar Juiz</a></li>';
            break;
        case Usuario_model::JUIZ:
            echo '<li ><a href = "'.base_url('index.php/partida/view').'" >Agendamento</a></li>';
            echo '<li ><a href = "'.base_url('?').'" >Súmula</a></li>';
            break;
        case Usuario_model::SOCIO:
            echo '<li ><a href = "'.base_url('index.php/inscricao').'" >Inscrições</a></li>';
            break;
    }
}
?>
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url('index.php/home')?>">
                <img alt="logo" src="http://3.bp.blogspot.com/-gYpGFzVfHcI/TZynmmaPV0I/AAAAAAAADDg/JVqK4s_Krjo/s320/capit%25C3%25A3o+tsubasa.jpg" style="height: 20px"/>
                Capitão Tsubasa
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php url_by_user($usuarioCode); ?>
            </ul>
            <div class="pull-right">
                <ul class="nav navbar-nav">
                    <li ><a href = "<?php echo base_url('index.php/login')?>" >Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>