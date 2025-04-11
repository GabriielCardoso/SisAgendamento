<?php
include("db/conexão.php");
session_start();

    if(isset($_SESSION["loginUser"]) and isset($_SESSION["senhaUser"]) ){
        $loginUser = $_SESSION["loginUser"];
        $senhaUser = $_SESSION["senhaUser"];
        $nomeUser = $_SESSION["nomeUser"];

        $sql = "SELECT * FROM tbusuarios WHERE loginUser = '{$loginUser}' and senhaUser = '{$senhaUser}'";
        $rs = mysqli_query($conexão, $sql);
        $dados = mysqli_fetch_assoc($rs);
        $linha = mysqli_num_rows($rs);

        if( $linha == 0 ) {
            session_unset();
            session_destroy();
            header('Location: login.php');
            exit();
        }
    }else{
        header('Location: login.php');
        exit(); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilo-padrao.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/estilo-padrao.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Sistema de Agendamento PCGO</title>
</head>
<body>
    <header class="bg-dark">
        <div class="container">
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class= "navbar-brand" href="#">
                <img src="img/logo sistema.png" alt="SIS-Agendamento" width="200">
            </a>

        

          
        

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.php?menuop=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?menuop=cadastros">Cadastro</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?menuop=agendamentos">Agendamentos</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?menuop=tco">TCO</a></li>
                </ul>
                <div class="navbar-nav w-100 justify-content-end">
                    <a href="logout.php" class="nav-link">
                        <i class="bi bi-person"></i>
                    <?=$nomeUser?> Sair <i class="bi bi-box-arrow-right"></i>
            </a>

            </div>
        </nav>
        </div>
</header>
    <main>
    <div class="container">

    <?php

    $menuop = (isset($_GET["menuop"]))?$_GET["menuop"]: "home";
    switch ($menuop) {
        case 'home':
            include("paginas/home/home.php");
            break;
        case 'cadastros':
            include("paginas/cadastros/cadastros.php");
            break;
            case 'novo-cad':
                include("paginas/cadastros/novo-cad.php");
                break;
                case 'inserir-cadastro':
                    include("paginas/cadastros/inserir-cadastro.php");
                    break;
                case 'editar-cadastro':
                        include("paginas/cadastros/editar-cadastro.php");
                        break;
                case 'excluir-cadastro':
                        include("paginas/cadastros/excluir-cadastro.php");
                        break;
                case 'atualizar-cadastro':
                        include("paginas/cadastros/atualizar-cadastro.php");
                        break;

        case 'agendamentos':
            include("paginas/agendamentos/agendamentos.php");
            break;

        case 'cad-agendamento':
            include("paginas/agendamentos/cad-agendamento.php");
            break;

            case 'inserir-agendamento':
                include("paginas/agendamentos/inserir-agendamento.php");
                break;

        case 'editar-agendamento':
            include("paginas/agendamentos/editar-agendamento.php");
            break;

        case 'atualizar-agendamento':
            include("paginas/agendamentos/atualizar-agendamento.php");
            break;

        case 'excluir-agendamento':
            include("paginas/agendamentos/excluir-agendamento.php");
            break;

            case 'tco':
                include("paginas/tco/tco.php");
                break;
    
            case 'cad-tco':
                    include("paginas/tco/cad-tco.php");
                break;
    
                case 'inserir-tco':
                    include("paginas/tco/inserir-tco.php");
                break;
    
                case 'editar-tco':
                    include("paginas/tco/editar-tco.php");
                break;

                case 'atualizar-tco':
                    include("paginas/tco/atualizar-tco.php");
                    break;

                case 'excluir-tco':
                    include("paginas/tco/excluir-tco.php");
                    break;
        
            default:
                include("paginas/home/home.php");
                break;
    }
    ?>
    </div>
    </main>
    <footer class="container-fluid fixed-buttom bg-dark">

    <div class="text-center">SIS Agendamento PCGO</div>

    </footer>
    
    <!-- jQuery deve ser o primeiro -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js para o Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<!-- Scripts personalizados -->
<script src="./js/jquery.form.js"></script>
<script src="./js/upload.js"></script>
<script src="./js/validation.js"></script>
</html>