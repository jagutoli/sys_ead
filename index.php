<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        require("acoes/conexao.php");

        $conexaoClass = new Conexao();
        $conexao = $conexaoClass->conectar();
        
        $nivel = $_SESSION["usuario"][1];
        $nome  = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = 'login.php'</script>";
    }
?>

    <?php require_once ('cabecalho.php'); ?>
    
    <!-- menu lateral com oções para cada nivel de acesso -->
    <section class="principal">
        <div class="w3-sidebar w3-bar-block w3-gray" style="width:200px">
            <a href="index.php"class="w3-bar-item w3-button"> <i class="fa fa-home"></i> HOME</a>
            <?php if($nivel==0): ?>
                <a href="perfil.php" class="w3-bar-item w3-button"><i class="fa fa-graduation-cap"></i> PERFIL DO ALUNO</a>
            <?php endif; ?>
            <?php if($nivel==1): ?>
                <a href="perfil.php" class="w3-bar-item w3-button"><i class="fa fa-address-card"></i> PERFIL DO PROFESSOR</a>
            <?php endif; ?>
            <?php if($nivel==2): ?>
			    <a href="perfil.php" class="w3-bar-item w3-button"><i class="fa fa-gear"></i> PERFIL DO ADM</a>
            <?php endif; ?>
                <a href="" class="w3-bar-item w3-button"><i class="fa fa-comment"></i> COMENTÁRIOS</a>
                <a href="acoes/logout.php" class="w3-bar-item w3-button"><i class="	fa fa-arrow-left"></i> SAIR</a>
        				
                  
    </section>

    </div>
        </div>  
        <div class= "w3-container w3-center">

         <h2> Aqui ficará o conteúdo conforme o perfil </h2>
            <hr>
          <!--<button class="w3-button w3-red w3-large w3-opacity">LOGIN</button> -->
          <div id="content">
            <div id="user">
                <!-- comprimenta o usuario dizendo seu nivel de acesso -->
                <span><?php if($nivel==2)
                    echo ($nivel==2) ? " (Olá ADM)"  : $nome;
                elseif($nivel==1) 
                    echo ($nivel==1) ? " (Olá Prof)" : $nome;
                else    
                    echo ($nivel==0) ? " (Olá aluno)" : $nome;  ?></span>

            </div>
   
           <!-- < ?php
                    /*("SELECT u.*,pu.* FROM usuarios as u INNER JOIN perfil_user as pu ON p.id = pu.id_user WHERE u.email = ? AND u.senha = ?");*/
                        $query = $conexao->prepare(("SELECT u.*,pu.* FROM usuarios as u INNER JOIN perfil_user as pu ON u.id = pu.id_user"));
                        $query->execute();
                
                        $users = $query->fetchAll(PDO::FETCH_ASSOC);

                        for($i = 0; $i < sizeof($users); $i++):
                            $usuarioAtual = $users[$i];
                            $teste = $users[$i];
                    ?>
                    < ?php endfor; ?>
                   < ?php echo $teste["nome"], $usuarioAtual["senha"], $teste["profissao"];?>-->
                   

    <!-- Verificar com Andre o que o codigo abaixo fa-->

    <div>   
        <?php if($nivel==2): ?>

        
            <table width="80%">
                <thead>
                    <tr style="font-weight: bold">
                        <td>Email</td>
                        <td>Senha</td>
                        <td>Nome</td>
                        <td>Nivel</td>
                        <td>ID</td>
                    </tr>                
                </thead>
                <tbody>
                    <?php
                    /*("SELECT u.*,pu.* FROM usuarios as u INNER JOIN perfil_user as pu ON p.id = pu.id_user WHERE u.email = ? AND u.senha = ?");*/
                        $query = $conexao->prepare(("SELECT u.*,pu.* FROM usuarios as u INNER JOIN perfil_user as pu ON u.id = pu.id_user"));
                        $query->execute();
                
                        $users = $query->fetchAll(PDO::FETCH_ASSOC);

                        for($i = 0; $i < sizeof($users); $i++):
                            $usuarioAtual = $users[$i];
                            $teste = $users[$i];
                    ?>
                    <tr>
                        <td><?php echo $usuarioAtual["email"]; ?></td>
                        <td><?php echo $usuarioAtual["senha"]; ?></td>
                        <td><?php echo $usuarioAtual["nome"]; ?></td>
                        <td><?php echo $usuarioAtual["nivel"]; ?></td>
                        <td><?php echo $usuarioAtual["id"]; ?></td>
                    </tr>
                    <?php endfor; ?>
                    <?php echo $teste["nome"], $usuarioAtual["senha"], $teste["cpf"];?>
                </tbody>            
                </table>
                    <?php endif; ?>
            </div>
    <?php require_once ('rodape.php');?>
