<?php

// Conexao com o banco de dados
$con = mysqli_connect('localhost','root',''); // cria conexao
$db  = mysqli_select_db($con,'banco_email'); // seleciona o database

if (isset($_POST['cadastrar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $datahora = date('d/m/Y - H:i:s');


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = 'Email inválido!';
        ?>
        <script type="text/javascript">
            var mensagem = "<?php echo $msg;?>";
            alert(mensagem);
            location.href="index.html"; // redireciona o usuario
        </script>
        <?php
    }

    $sql = "INSERT INTO usuario (nome,email,datahora)
                    VALUES ('$nome','$email','$datahora')";

    $res = mysqli_query($con, $sql);

    if ($res) // se executou o comando com sucesso
    {
        $msg = 'Dados cadastrados com Sucesso!';
        ?>
        <script type="text/javascript">
            var mensagem = "<?php echo $msg;?>";
            alert(mensagem);
            location.href="index.html"; // redireciona o usuario
        </script>
        <?php
    }
    else
    {
        $msg = 'Falha ao gravar os dados!';
        ?>
        <script type="text/javascript">
            var mensagem = "<?php echo $msg;?>";
            alert(mensagem);
            location.href="index.html"; // redireciona o usuario
        </script>
        <?php
    }
}

if (isset($_POST['alterar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['emailnovo'];

    if (isset($_POST['excluir'])){
        $sql = "DELETE FROM usuario 
                WHERE nome = '$nome'";

        $res = mysqli_query($con, $sql);
        if($res){
            $msg = 'Usuário excluído com sucesso!';
            ?>
            <script type="text/javascript">
                var mensagem = "<?php echo $msg;?>";
                alert(mensagem);
                location.href="index.html"; // redireciona o usuario
            </script>
            <?php
        }else{
            $msg = 'Usuário não encontrado!';
            ?>
            <script type="text/javascript">
                var mensagem = "<?php echo $msg;?>";
                alert(mensagem);
                location.href="index.html"; // redireciona o usuario
            </script>
            <?php
        }
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = 'Email inválido!';
        ?>
        <script type="text/javascript">
            var mensagem = "<?php echo $msg;?>";
            alert(mensagem);
            location.href="index.html"; // redireciona o usuario
        </script>
        <?php
    }

    $sql = "UPDATE usuario
            SET email = '$email'
            WHERE nome = '$nome';";

    $res = mysqli_query($con, $sql);

    if ($res) // se executou o comando com sucesso
    {
        $msg = 'Dados atualizados com Sucesso!';
        ?>
        <script type="text/javascript">
            var mensagem = "<?php echo $msg;?>";
            alert(mensagem);
            location.href="index.html"; // redireciona o usuario
        </script>
        <?php
    }
    else
    {
        $msg = 'Falha ao atualizar os dados !';
        ?>
        <script type="text/javascript">
            var mensagem = "<?php echo $msg;?>";
            alert(mensagem);
            location.href="index.html"; // redireciona o usuario
        </script>
        <?php
    }
}



?>