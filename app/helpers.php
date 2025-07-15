<?php

if (!function_exists('formatarTelefone')) {
    function formatarTelefone($telefone)
    {
        $telefone = preg_replace('/\D/', '', $telefone);
        if (strlen($telefone) === 11) {
            return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $telefone);
        } elseif (strlen($telefone) === 10) {
            return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefone);
        }
        return $telefone;
    }
}
