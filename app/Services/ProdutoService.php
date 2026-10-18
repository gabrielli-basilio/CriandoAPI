<?php

namespace App\Services;

use App\Models\Produto;

class ProdutoService
{
    public function update(Produto $produto, array $dados): Produto
    {
        $produto->update($dados);

        return $produto;
    }
}