<?php
/**
 * Header - Topo e Menu de Navegação
 * Farmácia - Sistema de Gerenciamento de Estoque
 */

// Detecta a página atual para marcar o menu ativo
$paginaAtual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Gerenciamento de Estoque - Farmácia">
    <title><?= $tituloPagina ?? 'Farmácia Estoque' ?> | FarmaSystem</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="site-header">
    <div class="header-inner container">
        <div class="logo">
            <span class="logo-icon">⊕</span>
            <div class="logo-text">
                <span class="logo-nome">FarmaSystem</span>
                <span class="logo-sub">Controle de Estoque</span>
            </div>
        </div>

        <button class="menu-toggle" id="menuToggle" aria-label="Abrir menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <nav class="nav-principal" id="navPrincipal" role="navigation" aria-label="Menu principal">
            <ul>
                <li>
                    <a href="index.php" class="<?= $paginaAtual === 'index.php' ? 'ativo' : '' ?>">
                        <span class="nav-icone">📋</span> Estoque
                    </a>
                </li>
                <li>
                    <a href="cadastro.php" class="<?= $paginaAtual === 'cadastro.php' ? 'ativo' : '' ?>">
                        <span class="nav-icone">➕</span> Novo Produto
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<main class="conteudo-principal container" id="conteudo">
