<?php

use Illuminate\Support\Facades\Gate;

return new class extends clsDetalhe {
    public $titulo;

    public function Gerar()
    {
        $this->titulo = 'Ponto - Detalhe';

        $cod_ponto_transporte_escolar = $_GET['cod_ponto'];
        $tmp_obj = new clsModulesPontoTransporteEscolar($cod_ponto_transporte_escolar);
        $registro = $tmp_obj->detalhe();

        if (! $registro) {
            $this->simpleRedirect('transporte_ponto_lst.php');
        }

        $this->addDetalhe(['Código do ponto', $cod_ponto_transporte_escolar]);
        $this->addDetalhe(['Descrição', $registro['descricao']]);

        if (is_numeric($registro['cep']) && is_numeric($registro['idlog']) && is_numeric($registro['idbai'])) {
            $this->addDetalhe(['CEP', int2CEP($registro['cep'])]);
            $this->addDetalhe(['Município - UF', $registro['municipio'] . ' - '. $registro['sigla_uf']]);
            $this->addDetalhe(['Bairro', $registro['bairro']]);
            $this->addDetalhe(['Zona de localização', $registro['zona_localizacao'] == 1 ? 'Urbana' : 'Rural' ]);
            $this->addDetalhe(['Endereço', $registro['logradouro']]);
            $this->addDetalhe(['Número', $registro['numero']]);
            $this->addDetalhe(['Complemento', $registro['complemento']]);
        }

        if (Gate::allows('modify', 21239)) {
            $this->url_novo = '../module/TransporteEscolar/Ponto';
            $this->url_editar = "../module/TransporteEscolar/Ponto?id={$cod_ponto_transporte_escolar}";
        }

        $this->url_cancelar = 'transporte_ponto_lst.php';

        $this->largura = '100%';

        $this->breadcrumb('Detalhe do ponto', [
        url('intranet/educar_transporte_escolar_index.php') => 'Transporte escolar',
    ]);
    }

    public function Formular()
    {
        $this->title = 'Pontos';
        $this->processoAp = 21239;
    }
};
