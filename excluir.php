<?php
/**
 * excluir.php — Lógica de Remoção de Produto
 * Farmácia - Sistema de Gerenciamento de Estoque
 *
 * Este arquivo NÃO exibe interface visual.
 * Recebe o ID via GET, valida, remove e redireciona.
 */

require_once 'config/conexao.php';

// ── Valida o ID ───────────────────────────────────────────────
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id <= 0) {
    header('Location: index.php');
    exit;
}

$pdo = getConexao();

// ── Verifica se o produto existe ──────────────────────────────
$stmt = $pdo->prepare("SELECT id FROM produtos WHERE id = :id");
$stmt->execute([':id' => $id]);
$produto = $stmt->fetch();

if (!$produto) {
    header('Location: index.php');
    exit;
}

// ── Remove o produto com prepare/execute (sem SQL Injection) ──
try {
    $stmtDel = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
    $stmtDel->execute([':id' => $id]);

    header('Location: index.php?msg=excluido');
    exit;

} catch (PDOException $e) {
    error_log("Erro ao excluir produto ID {$id}: " . $e->getMessage());
    header('Location: index.php?msg=erro_excluir');
    exit;
}
