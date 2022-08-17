<?php

use App\Models\LegacyStudent;

return new class extends clsCadastro {
    public $titulo;


    public function Inicializar()
    {
        return 'Novo';
    }

    public function Gerar()
    {
        $this->titulo = 'Rotas';

        $student = $this->getRequest()->student_id;

        $studentFromDb = LegacyStudent::query()->findOrFail($student);

        $pessoaTransporte = (new clsModulesPessoaTransporte(ref_idpes: $studentFromDb->ref_idpes))->detalhe();

        $lista_rota = (new clsModulesRotaTransporteEscolar())
            ->setOrderby(' descricao asc ')
            ->lista();

        if (is_array($pessoaTransporte)) {
            $this->fexcluir = true;
        }

        $rota_resources = ['' => 'Selecione uma rota'];
        foreach ($lista_rota as $reg) {
            $rota_resources["{$reg['cod_rota_transporte_escolar']}"] = "{$reg['descricao']}";
        }

        $this->campoOculto('cod_pessoa_transporte',
            is_array($pessoaTransporte) ? $pessoaTransporte['cod_pessoa_transporte'] : null
        );

        $this->campoOculto('student', $student);

        $options = [
            'label' => 'Rota',
            'value' => is_array($pessoaTransporte) ? $pessoaTransporte['ref_cod_rota_transporte_escolar'] : null,
            'required' => false,
            'resources' => $rota_resources
        ];
        $this->inputsHelper()->select('transporte_rota', $options);

        $options = [
            'label' => 'Ponto de embarque',
            'value' => is_array($pessoaTransporte) ? $pessoaTransporte['ref_cod_ponto_transporte_escolar'] : null,
            'required' => false, '
            resources' => ['' => 'Selecione uma rota acima']
        ];
        $this->inputsHelper()->select('transporte_ponto', $options);
        $this->campoOculto('transporte_ponto_value', $pessoaTransporte['ref_cod_ponto_transporte_escolar']);
        $options = [
            'label' => 'Destino (Caso for diferente da rota)',
            'value' => is_array($pessoaTransporte) ? $pessoaTransporte['ref_cod_ponto_transporte_escolar'] : null,
            'required' => false
        ];

        if (is_array($pessoaTransporte) && is_int($pessoaTransporte['ref_idpes_destino'])) {
            $person = \App\Models\LegacyPerson::query()->find($pessoaTransporte['ref_idpes_destino']);

            $schoolName = $person->id  . ' - ' . $person->name;
            $this->campoOculto('pessoaj_transporte_destino_value', $schoolName);
            $this->campoOculto('pessoaj_id', $person->id);
        }

        $this->inputsHelper()->simpleSearchPessoaj('transporte_destino', $options);

        $options = [
            'label' => 'Observações do transporte',
            'value' => is_array($pessoaTransporte) ? $pessoaTransporte['observacao'] : null,
            'required' => false,
            'size' => 50,
            'max_length' => 255
        ];
        $this->inputsHelper()->textArea('transporte_observacao', $options);

        $this->nome_acao = 'Novo';
        $this->breadcrumb('Detalhe da rota', [url('intranet/educar_transporte_escolar_index.php') => 'Transporte escolar']);
    }


    public function makeExtra()
    {
        return file_get_contents(__DIR__ . '/public/vendor/transporte.js');
    }

    public function Novo()
    {
        $student = $this->getRequest()->student_id;
        $studentPerson = LegacyStudent::query()->findOrFail($student)->ref_idpes;

        $pt = new clsModulesPessoaTransporte(ref_idpes: $studentPerson);
        $det = $pt->detalhe();

        $id = is_array($det) ? $det['cod_pessoa_transporte'] : null;

        $pt = new clsModulesPessoaTransporte(
            cod_pessoa_transporte: $id,
            ref_cod_rota_transporte_escolar: $this->getRequest()->transporte_rota,
            ref_idpes: $studentPerson,
            ref_cod_ponto_transporte_escolar: $this->getRequest()->transporte_ponto,
            ref_idpes_destino: $this->getRequest()->pessoaj_id,
            observacao: $this->getRequest()->transporte_observacao,
        );

        if (is_null($id)) {
            $pt->cadastra();
            $this->mensagem = 'Rota cadastrada com sucesso!';
        } else {
            $pt->edita();
            $this->mensagem = 'Rota editada com sucesso!';
        }

        return true;
    }

    public function Excluir()
    {
        if((new clsModulesPessoaTransporte($this->cod_pessoa_transporte))->excluir()) {
            $this->mensagem = 'Item excluído com sucesso!';

            $this->simpleRedirect('/intranet/transporte_aluno_cad.php?student_id=' . $this->student);
        } else {
            $this->mensagem = 'Item não encontrado para remoção!';
            return false;
        }
    }

    public function Formular()
    {
        $this->title = 'Rotas';
        $this->processoAp = 21238;
    }
};
