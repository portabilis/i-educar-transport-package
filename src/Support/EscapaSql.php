<?php

namespace iEducar\Packages\Transport\Support;

/**
 * Escapa os valores que as classes legadas do transporte interpolam no SQL.
 */
trait EscapaSql
{
    /**
     * Valor para uso entre aspas simples: dobra as aspas e remove o byte nulo.
     */
    protected function sqlTexto($valor): string
    {
        return str_replace(["\0", "'"], ['', "''"], (string) $valor);
    }

    /**
     * Valor para uso sem aspas: o número como está, ou NULL quando não é número.
     */
    protected function sqlNumero($valor): string
    {
        return is_numeric($valor) ? (string) (0 + $valor) : 'NULL';
    }
}
