<?php

use App\Models\LegacyOrganization;
use App\Models\LegacyPerson;
use App\Models\LegacyPhone;
use App\Models\PersonHasPlace;

return new class extends clsDetalhe {
    public $titulo;

    public function Gerar()
    {
        // Verificação de permissão para cadastro.
        $this->obj_permissao = new clsPermissoes();

        $this->nivel_usuario = $this->obj_permissao->nivel_acesso($this->pessoa_logada);

        $this->titulo = 'Empresa transporte escolar - Detalhe';

        $cod_empresa_transporte_escolar = $_GET['cod_empresa'];

        $tmp_obj = new clsModulesEmpresaTransporteEscolar($cod_empresa_transporte_escolar);
        $registro = $tmp_obj->detalhe();

        if (! $registro) {
            $this->simpleRedirect('transporte_empresa_lst.php');
        }

        $pessoa = LegacyPerson::query()->with('phones')->find($registro['ref_idpes'], ['idpes', 'email']);
        $juridica = LegacyOrganization::query()->whereKey($registro['ref_idpes'])->first(['idpes', 'cnpj', 'insc_estadual']);
        $endereco = PersonHasPlace::query()->with('place.city')->where('person_id', $registro['ref_idpes'])->first()?->place;
        $telefones = $pessoa?->phones->keyBy('tipo') ?? collect();

        $tel1 = $telefones->get(LegacyPhone::TYPE_LANDLINE);
        $tel2 = $telefones->get(LegacyPhone::TYPE_MOBILE);
        $cel  = $telefones->get(LegacyPhone::TYPE_MOBILE_ALT);
        $fax  = $telefones->get(LegacyPhone::TYPE_FAX);

        $this->addDetalhe(['Código da empresa', $cod_empresa_transporte_escolar]);
        $this->addDetalhe(['Nome fantasia', $registro['nome_empresa']]);
        $this->addDetalhe(['Nome do responsável', $registro['nome_responsavel']]);
        $this->addDetalhe(['CNPJ', empty($juridica?->cnpj) ? '' : int2CNPJ($juridica->cnpj)]);
        $this->addDetalhe(['Endereço', $endereco?->address]);
        $this->addDetalhe(['CEP', $endereco?->postal_code]);
        $this->addDetalhe(['Bairro', $endereco?->neighborhood]);
        $this->addDetalhe(['Cidade', $endereco?->city?->name]);
        if ($tel1?->fone) {
            $this->addDetalhe(['Telefone 1', "({$tel1->ddd}) {$tel1->fone}"]);
        }
        if ($tel2?->fone) {
            $this->addDetalhe(['Telefone 2', "({$tel2->ddd}) {$tel2->fone}"]);
        }
        if ($cel?->fone) {
            $this->addDetalhe(['Celular', "({$cel->ddd}) {$cel->fone}"]);
        }
        if ($fax?->fone) {
            $this->addDetalhe(['Fax', "({$fax->ddd}) {$fax->fone}"]);
        }

        $this->addDetalhe(['E-mail', $pessoa?->email]);

        $this->addDetalhe(['Inscrição estadual', $juridica?->insc_estadual ?: 'isento']);
        $this->addDetalhe(['Observação', $registro['observacao']]);
        $this->url_cancelar = 'transporte_empresa_lst.php';

        $obj_permissao = new clsPermissoes();

        if ($obj_permissao->permissao_cadastra(21235, $this->pessoa_logada, 7, null, true)) {
            $this->url_novo = '../module/TransporteEscolar/Empresa';
            $this->url_editar = "../module/TransporteEscolar/Empresa?id={$cod_empresa_transporte_escolar}";
        }

        $this->largura = '100%';

        $this->breadcrumb('Detalhe da empresa de transporte', [
        url('intranet/educar_transporte_escolar_index.php') => 'Transporte escolar',
    ]);
    }

    public function Formular()
    {
        $this->title = 'Empresas';
        $this->processoAp = 21235;
    }
};
