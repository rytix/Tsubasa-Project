<!DOCTYPE HTML> 
<?php

function show_th($selected)
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

function show_title($selected)
{
    switch ($selected) {
        case -1:
            return 'Campeonatos';
        case 0:
            return 'Categorias';
        case 1:
    }
}

function show_tbody($data, $selected, $parameters)
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

                break;
        }
        echo '</tr>';
    }
}

function show_merito($data)
{
    ?>
    <?php
    $value = $data['destaques'];
    ?>  
    <tr> 
        <td> <?php echo $value[0]->getSocio()->getNome();?> </td>
        <td> Artilheiro </td>
    </tr>
    <tr> 
        <td> <?php //echo $value[1]->getSocio()->getNome(); ?> </td>
        <td> Goleiro Menos Vazado </td>
    </tr>
    <tr> 
        <td> <?php echo $value[2]->getSocio()->getNome(); ?> </td>
        <td> Fair Play </td>
    </tr>
    <?php
}

function show_times($data)
{
    ?>
    <?php
    foreach ($data['times'] as $value)
    {
        ?>  
        <tr> 
            <td> <?php echo $value->getNome(); ?> </td>
        </tr>
        <?php
    }
}

function show_jogadores($data)
{
    ?>
    <?php
    foreach ($data['jogadores'] as $value)
    {
        ?>  
        <tr> 
            <td> <?php echo $value->getSocio()->getNome(); ?> </td>
            <td> <?php echo $value->getTime()->getNome(); ?> </td>
        </tr>
        <?php
    }
}

function create_tables($data, $selected, $parameters)
{
    if ($selected == 1)
    {
        ?>
        <div class="row">
            <h2> Destaques: </h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Jogador</th>
                        <th>Mérito</th>
                    </tr>
                </thead>
                <tbody>
                    <?php show_merito($data); ?>
                </tbody>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php show_times($data); ?>
                </tbody>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th>Jogador</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php show_jogadores($data); ?>
                </tbody>
            </table>
        </div>
        <?php
    } else
    {
        ?>
        <div class="row">
            <?php echo '<h2>' . show_title($selected) . '</h2>' ?>
            <table class="table">
                <thead>
                    <tr>
                        <?php show_th($selected) ?>
                    </tr>
                </thead>
                <tbody>
                    <?php show_tbody($data, $selected, $parameters) ?>
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
        <?php
        $Header = new Header_model();
        $Header->get_header();
        ?>
        <div class="container principal">
            <div class="row">
                <?php create_tables($data, $selected, $parameters) ?>
            </div>
        </div>
    </body>
</html>
