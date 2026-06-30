<?php
/**
 * Footer - Rodapé e Scripts
 * Farmácia - Sistema de Gerenciamento de Estoque
 */
?>
</main><!-- /.conteudo-principal -->

<footer class="site-footer">
    <div class="container">
        <p>
            <strong>FarmaSystem</strong> &copy; <?= date('Y') ?>
            &mdash; Sistema de Gerenciamento de Estoque
        </p>
        <p class="footer-dev">Desenvolvido com PHP + PDO &bull; Design Mobile First</p>
    </div>
</footer>

<script>
    // ── Menu hambúrguer (Mobile) ──────────────────────────────────────
    const toggle = document.getElementById('menuToggle');
    const nav    = document.getElementById('navPrincipal');

    if (toggle && nav) {
        toggle.addEventListener('click', () => {
            const aberto = nav.classList.toggle('aberto');
            toggle.setAttribute('aria-expanded', aberto);
            toggle.classList.toggle('ativo', aberto);
        });

        // Fecha o menu ao clicar em qualquer link
        nav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('aberto');
                toggle.setAttribute('aria-expanded', 'false');
                toggle.classList.remove('ativo');
            });
        });
    }

    // ── Confirmação de exclusão ───────────────────────────────────────
    document.querySelectorAll('.btn-excluir').forEach(btn => {
        btn.addEventListener('click', e => {
            const nome = btn.dataset.nome ?? 'este produto';
            if (!confirm(`Deseja realmente excluir "${nome}"?\n\nEsta ação não pode ser desfeita.`)) {
                e.preventDefault();
            }
        });
    });

    // ── Alerta de estoque baixo (≤ 10 unidades) ──────────────────────
    document.querySelectorAll('[data-estoque]').forEach(el => {
        if (parseInt(el.dataset.estoque) <= 10) {
            el.classList.add('estoque-critico');
        }
    });

    // ── Fechar alertas flash ──────────────────────────────────────────
    document.querySelectorAll('.alerta .fechar').forEach(btn => {
        btn.addEventListener('click', () => btn.closest('.alerta').remove());
    });
</script>
</body>
</html>
