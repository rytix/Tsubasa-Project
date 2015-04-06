<!DOCTYPE HTML> 
<?php

function show_th($ehUmTime, $selected)
{
    switch ($selected) {
        case -1:
            echo '<th>Nome</th>';
            echo '<th>Data</th>';
            echo '<th>Ativo</th>';
            break;
        case 0:
            echo '<th>Nome</th>';
            echo '<th>Sexo</th>';
            echo '<th>Idade Goleiro</th>';
            echo '<th>Idade Jogador</th>';
            break;
        case 1:
            if ($ehUmTime == 1)
            {
                echo '<th>Nome</th>';
            } else
            {
                echo '<th>Nome</th>';
                echo '<th>Campo</th>';
                echo '<th>Data</th>';
                echo '<th>Partida Ativa</th>';
            }
            break;
        case 2:
            echo '<th>Nome</th>';
            echo '<th>Goleiro</th>';
            break;
        case 3:
            //NO
            break;
        case 4:
            //NO
            break;
    }
}

function createHref($selected, $parameters, $value)
{
    $string = '<a href="' . base_url() . 'index.php/home?';
    if ($selected < 0)
    {
        $string .= 'campeonatoID=' . $value->getID() . '">';
        return $string;
    } else
    {
        $string .= 'campeonatoID=' . $parameters[0] . '&';
    }
    if ($selected < 1)
    {
        $string .= 'categoriaID=' . $value->getID() . '">';
        return $string;
    } else
    {
        $string .= 'categoriaID=' . $parameters[1] . '&';
    }
}

function show_title($selected, $ehUmTime)
{
    switch ($selected) {
        case -1:
            return 'Campeonatos';
        case 0:
            return 'Categorias';
        case 1:
            if ($ehUmTime == 1)
            {
                return 'Time';
            } else
            {
                return 'Partidas';
            }
    }
}

function show_tbody($ehUmTime, $data, $selected, $parameters)
{
    foreach ($data as $value)
    {
        echo '<tr>';
        switch ($selected) {
            case -1:
                echo '<td>' . createHref($selected, $parameters, $value) . $value->getNome() . '</a></td>';
                echo '<td>' . $value->getData() . '</td>';
                if ($value->isAtivo())
                {
                    echo '<td>SIM</td>';
                } else
                {
                    echo '<td>NÃO</td>';
                }
                break;
            case 0:
                echo '<td>' . createHref($selected, $parameters, $value) . $value->getNome() . '</a></td>';
                echo '<td>' . $value->getSexo() . '</td>';
                echo '<td>' . $value->getIdadeMinG() . '-' . $value->getIdadeMaxG() . '</td>';
                echo '<td>' . $value->getIdadeMinJ() . '-' . $value->getIdadeMaxJ() . '</td>';
                break;
            case 1:
                if ($ehUmTime == 1 && $value instanceof Time_model)
                {
                    echo '<th>' . $value->getNome() . '</th>';
                } else if ($ehUmTime == 0 && $value instanceof Partida_model)
                {
                    echo '<th>' . $value->getNome() . '</th>';
                    echo '<th>' . $value->getCampo() . '</th>';
                    echo '<th>' . $value->getData() . '</th>';
                    if ($value->getPartidaAtiva())
                    {
                        echo '<td>SIM</td>';
                    } else
                    {
                        echo '<td>NÃO</td>';
                    }
                }
                break;
            case 2:
                echo '<td>' . $value->getSocio()->getNome() . '</th>';
                if ($value->getGoleiro())
                {
                    echo '<td>SIM</td>';
                } else
                {
                    echo '<td>NÃO</td>';
                }
                break;
            case 3:
                //NO
                break;
            case 4:
                //NO
                break;
        }
        echo '</tr>';
    }
}

function create_tables($data, $selected, $parameters)
{
    ?>
    <div class="row">
        <?php echo '<h2>' . show_title($selected, 1) . '</h2>' ?>
        <table class="table">
            <thead>
                <tr>
                    <?php show_th(1, $selected) ?>
                </tr>
            </thead>
            <tbody>
                <?php show_tbody(1, $data, $selected, $parameters) ?>
            </tbody>
        </table>
    </div>
    <?php
    if ($selected == 1)
    {
        ?>
        <div class="row">
            <?php echo '<h2>' . show_title($selected, 0) . '</h2>' ?>
            <table class="table">
                <thead>
                    <tr>
                        <?php show_th(0, $selected) ?>
                    </tr>
                </thead>
                <tbody>
                    <?php show_tbody(0, $data, $selected, $parameters) ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}
?>
<html>
    <head>
        <?php include('head.php'); ?>
        <title>CT Login</title>    
    </head>
    <body>
        <?php $Header = new Header_model();
              $Header->get_header();?>
        <div class="container principal">
            <div class="row">
                <?php create_tables($data, $selected, $parameters) ?>
            </div>
        </div>
    </body>
</html>
