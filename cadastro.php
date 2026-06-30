<?php
/**
 * cadastro.php — Formulário de Inserção de Produto
 * Farmácia - Sistema de Gerenciamento de Estoque
 */

require_once 'config/conexao.php';

$tituloPagina = 'Novo Produto';
$erros        = [];
$dados        = ['nome' => '', 'fabricante' => '', 'preco' => '', 'estoque' => ''];

// ── Processamento do formulário ───────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitização básica dos campos
    $dados['nome']       = trim($_POST['nome']       ?? '');
    $dados['fabricante'] = trim($_POST['fabricante'] ?? '');
    $dados['preco']      = trim($_POST['preco']       ?? '');
    $dados['estoque']    = trim($_POST['estoque']     ?? '');

    // ── Validação ─────────────────────────────────────────────
    if (empty($dados['nome'])) {
        $erros['nome'] = 'O nome do produto é obrigatório.';
    } elseif (mb_strlen($dados['nome']) > 150) {
        $erros['nome'] = 'O nome deve ter no máximo 150 caracteres.';
    }

    if (empty($dados['fabricante'])) {
        $erros['fabricante'] = 'O fabricante é obrigatório.';
    } elseif (mb_strlen($dados['fabricante']) > 100) {
        $erros['fabricante'] = 'O fabricante deve ter no máximo 100 caracteres.';
    }

    $preco = str_replace(',', '.', $dados['preco']);
    if (!is_numeric($preco) || $preco < 0) {
        $erros['preco'] = 'Informe um preço válido (ex: 12,90).';
    }

    if (!ctype_digit($dados['estoque']) || (int)$dados['estoque'] < 0) {
        $erros['estoque'] = 'Informe uma quantidade inteira não negativa.';
    }

    // ── Inserção no banco ─────────────────────────────────────
    if (empty($erros)) {
        $pdo  = getConexao();
        $sql  = "INSERT INTO produtos (nome, fabricante, preco, estoque)
                 VALUES (:nome, :fabricante, :preco, :estoque)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome'       => $dados['nome'],
            ':fabricante' => $dados['fabricante'],
            ':preco'      => (float) $preco,
            ':estoque'    => (int)   $dados['estoque'],
        ]);

        header('Location: index.php?msg=cadastrado');
        exit;
    }
}

require_once 'includes/header.php';
?>

<a href="index.php" class="nav-voltar">← Voltar ao Estoque</a>

<div class="pagina-titulo">
    <h1>➕ Novo Produto</h1>
    <p>Preencha os dados para adicionar um produto ao estoque.</p>
</div>

<div class="form-card">
    <h2 class="form-titulo">📋 Dados do Produto</h2>

    <form method="POST" action="cadastro.php" novalidate>

        <div class="form-grade">

            <!-- Nome -->
            <div class="campo campo-full">
                <label for="nome">Nome do Produto <span class="obrigatorio">*</span></label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    value="<?= htmlspecialchars($dados['nome']) ?>"
                    placeholder="Ex: Dipirona 500mg 20 comprimidos"
                    maxlength="150"
                    class="<?= isset($erros['nome']) ? 'erro-campo' : '' ?>"
                    required
                    autofocus
                >
                <?php if (isset($erros['nome'])): ?>
                    <span class="mensagem-erro">⚠ <?= htmlspecialchars($erros['nome']) ?></span>
                <?php endif; ?>
            </div>

            <!-- Fabricante -->
            <div class="campo campo-full">
                <label for="fabricante">Fabricante <span class="obrigatorio">*</span></label>
                <input
                    type="text"
                    id="fabricante"
                    name="fabricante"
                    value="<?= htmlspecialchars($dados['fabricante']) ?>"
                    placeholder="Ex: EMS, Medley, Neo Química…"
                    maxlength="100"
                    class="<?= isset($erros['fabricante']) ? 'erro-campo' : '' ?>"
                    required
                >
                <?php if (isset($erros['fabricante'])): ?>
                    <span class="mensagem-erro">⚠ <?= htmlspecialchars($erros['fabricante']) ?></span>
                <?php endif; ?>
            </div>

            <!-- Preço -->
            <div class="campo">
                <label for="preco">Preço (R$) <span class="obrigatorio">*</span></label>
                <input
                    type="number"
                    id="preco"
                    name="preco"
                    value="<?= htmlspecialchars($dados['preco']) ?>"
                    placeholder="0,00"
                    step="0.01"
                    min="0"
                    class="<?= isset($erros['preco']) ? 'erro-campo' : '' ?>"
                    required
                >
                <?php if (isset($erros['preco'])): ?>
                    <span class="mensagem-erro">⚠ <?= htmlspecialchars($erros['preco']) ?></span>
                <?php endif; ?>
            </div>

            <!-- Estoque -->
            <div class="campo">
                <label for="estoque">Quantidade em Estoque <span class="obrigatorio">*</span></label>
                <input
                    type="number"
                    id="estoque"
                    name="estoque"
                    value="<?= htmlspecialchars($dados['estoque']) ?>"
                    placeholder="0"
                    min="0"
                    step="1"
                    class="<?= isset($erros['estoque']) ? 'erro-campo' : '' ?>"
                    required
                >
                <?php if (isset($erros['estoque'])): ?>
                    <span class="mensagem-erro">⚠ <?= htmlspecialchars($erros['estoque']) ?></span>
                <?php endif; ?>
            </div>

        </div><!-- /.form-grade -->

        <div class="form-acoes">
            <a href="index.php" class="btn btn-outline">Cancelar</a>
            <button type="submit" class="btn btn-destaque">💾 Salvar Produto</button>
        </div>

    </form>
</div>

<?php require_once 'includes/footer.php'; ?>
