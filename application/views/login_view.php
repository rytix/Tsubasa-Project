<!DOCTYPE HTML>  
<html>
    <head>
        <?php include('head.php'); ?>
        <title>CT Login</title>    
    </head>
    <body>
        <?php include('header.php') ?>
        <div class="container geral">
            <div class="row fakemodel">
                <form class="form-signin" role="form">
                    <h2 class="form-signin-heading">Faça a autenticação</h2>
                    <input name="usuario" type="text" class="form-control" placeholder="Usuário" required autofocus>
                    <input name="senha" type="password" class="form-control" placeholder="Senha" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" formmethod="post">Autenticar</button>
                    <?php
                    if (isset($falha))
                    {
                        echo "<p class='erro'>" . $falha . "</p>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>
