<?php

use iEducar\Legacy\Model;

class clsModulesVeiculo extends Model
{
    use \iEducar\Packages\Transport\Support\EscapaSql;

    public $cod_veiculo;
    public $descricao;
    public $placa;
    public $renavam;
    public $data_licenca;
    public $chassi;
    public $marca;
    public $ano_fabricacao;
    public $ano_modelo;
    public $passageiros;
    public $malha;
    public $ref_cod_tipo_veiculo;
    public $exclusivo_transporte_escolar;
    public $adaptado_necessidades_especiais;
    public $ativo;
    public $descricao_inativo;
    public $ref_cod_empresa_transporte_escolar;
    public $ref_cod_motorista;
    public $observacao;

    public function __construct(
        $cod_veiculo = null,
        $descricao = null,
        $placa = null,
        $renavam = null,
        $chassi = null,
        $marca = null,
        $ano_fabricacao = null,
        $ano_modelo = null,
        $passageiros = null,
        $malha = null,
        $ref_cod_tipo_veiculo = null,
        $exclusivo_transporte_escolar = null,
        $adaptado_necessidades_especiais = null,
        $ativo = null,
        $descricao_inativo = null,
        $ref_cod_empresa_transporte_escolar = null,
        $ref_cod_motorista = null,
        $observacao = null,
        $data_licenca = null
    ) {

        $this->_schema = 'modules.';
        $this->_tabela = "{$this->_schema}veiculo";

        $this->_campos_lista = $this->_todos_campos = ' cod_veiculo, descricao, placa, renavam, chassi, marca, ano_fabricacao,
       ano_modelo, passageiros, malha, ref_cod_tipo_veiculo, exclusivo_transporte_escolar,
       adaptado_necessidades_especiais, ativo, descricao_inativo, ref_cod_empresa_transporte_escolar,
       ref_cod_motorista, observacao, data_licenca';

        if (is_numeric($cod_veiculo)) {
            $this->cod_veiculo = $cod_veiculo;
        }

        if (is_string($descricao)) {
            $this->descricao = $descricao;
        }

        if (is_string($placa)) {
            $this->placa = $placa;
        }

        if (is_string($renavam)) {
            $this->renavam = $renavam;
        }

        if (is_string($marca)) {
            $this->marca = $marca;
        }

        if (is_string($ano_fabricacao)) {
            $this->marca = $marca;
        }

        if (is_string($ano_modelo)) {
            $this->marca = $marca;
        }

        if (is_numeric($passageiros)) {
            $this->passageiros = $passageiros;
        }

        if (is_string($malha)) {
            $this->malha = $malha;
        }

        if (is_numeric($ref_cod_tipo_veiculo)) {
            $this->ref_cod_tipo_veiculo = $ref_cod_tipo_veiculo;
        }

        if (is_string($exclusivo_transporte_escolar)) {
            $this->exclusivo_transporte_escolar = $exclusivo_transporte_escolar;
        }

        if (is_string($adaptado_necessidades_especiais)) {
            $this->adaptado_necessidades_especiais = $adaptado_necessidades_especiais;
        }

        if (is_string($ativo)) {
            $this->ativo = $ativo;
        }

        if (is_string($descricao_inativo)) {
            $this->descricao_inativo = $descricao_inativo;
        }

        if (is_numeric($ref_cod_empresa_transporte_escolar)) {
            $this->ref_cod_empresa_transporte_escolar = $ref_cod_empresa_transporte_escolar;
        }

        if (is_numeric($ref_cod_motorista)) {
            $this->ref_cod_motorista = $ref_cod_motorista;
        }

        if (is_string($observacao)) {
            $this->observacao = $observacao;
        }

        if (is_string($data_licenca)) {
            $this->data_licenca = $data_licenca;
        }
    }

    /**
     * Cria um novo registro.
     *
     * @return bool
     */
    public function cadastra()
    {
        if (is_string($this->descricao) && is_string($this->renavam) && is_numeric($this->passageiros)
            && is_string($this->malha) && is_string($this->adaptado_necessidades_especiais)
            && is_string($this->exclusivo_transporte_escolar) && is_numeric($this->ref_cod_empresa_transporte_escolar)) {
            $db = new clsBanco();

            $campos = '';
            $valores = '';
            $gruda = '';

            if (is_numeric($this->cod_veiculo)) {
                $campos .= "{$gruda}cod_veiculo";
                $valores .= "{$gruda}'{$this->sqlTexto($this->cod_veiculo)}'";
                $gruda = ', ';
            }

            if (is_string($this->descricao)) {
                $descricao = $db->escapeString($this->descricao);
                $campos .= "{$gruda}descricao";
                $valores .= "{$gruda}'{$descricao}'";
                $gruda = ', ';
            }

            if (is_string($this->placa)) {
                $campos .= "{$gruda}placa";
                $valores .= "{$gruda}'{$this->sqlTexto($this->placa)}'";
                $gruda = ', ';
            }

            if (is_string($this->renavam)) {
                $campos .= "{$gruda}renavam";
                $valores .= "{$gruda}'{$this->sqlTexto($this->renavam)}'";
                $gruda = ', ';
            }

            if (is_string($this->data_licenca) && trim($this->data_licenca) != '') {
                $campos .= "{$gruda}data_licenca";
                $valores .= "{$gruda}'{$this->sqlTexto($this->data_licenca)}'";
                $gruda = ', ';
            }

            if (is_string($this->marca)) {
                $campos .= "{$gruda}marca";
                $valores .= "{$gruda}'{$this->sqlTexto($this->marca)}'";
                $gruda = ', ';
            }

            if (is_string($this->chassi)) {
                $campos .= "{$gruda}chassi";
                $valores .= "{$gruda}'{$this->sqlTexto($this->chassi)}'";
                $gruda = ', ';
            }

            if (is_numeric($this->ano_fabricacao)) {
                $campos .= "{$gruda}ano_fabricacao";
                $valores .= "{$gruda}'{$this->sqlTexto($this->ano_fabricacao)}'";
                $gruda = ', ';
            }

            if (is_numeric($this->ano_modelo)) {
                $campos .= "{$gruda}ano_modelo";
                $valores .= "{$gruda}'{$this->sqlTexto($this->ano_modelo)}'";
                $gruda = ', ';
            }

            if (is_numeric($this->passageiros)) {
                $campos .= "{$gruda}passageiros";
                $valores .= "{$gruda}'{$this->sqlTexto($this->passageiros)}'";
                $gruda = ', ';
            }

            if (is_string($this->malha)) {
                $campos .= "{$gruda}malha";
                $valores .= "{$gruda}'{$this->sqlTexto($this->malha)}'";
                $gruda = ', ';
            }

            if (is_numeric($this->ref_cod_tipo_veiculo)) {
                $campos .= "{$gruda}ref_cod_tipo_veiculo";
                $valores .= "{$gruda}'{$this->sqlTexto($this->ref_cod_tipo_veiculo)}'";
                $gruda = ', ';
            }

            if (is_string($this->exclusivo_transporte_escolar)) {
                $campos .= "{$gruda}exclusivo_transporte_escolar";
                $valores .= "{$gruda}'{$this->sqlTexto($this->exclusivo_transporte_escolar)}'";
                $gruda = ', ';
            }

            if (is_string($this->adaptado_necessidades_especiais)) {
                $campos .= "{$gruda}adaptado_necessidades_especiais";
                $valores .= "{$gruda}'{$this->sqlTexto($this->adaptado_necessidades_especiais)}'";
                $gruda = ', ';
            }

            if (is_string($this->ativo)) {
                $campos .= "{$gruda}ativo";
                $valores .= "{$gruda}'{$this->sqlTexto($this->ativo)}'";
                $gruda = ', ';
            }

            if (is_string($this->descricao_inativo)) {
                $campos .= "{$gruda}descricao_inativo";
                $valores .= "{$gruda}'{$this->sqlTexto($this->descricao_inativo)}'";
                $gruda = ', ';
            }

            if (is_numeric($this->ref_cod_empresa_transporte_escolar)) {
                $campos .= "{$gruda}ref_cod_empresa_transporte_escolar";
                $valores .= "{$gruda}'{$this->sqlTexto($this->ref_cod_empresa_transporte_escolar)}'";
                $gruda = ', ';
            }

            if (is_numeric($this->ref_cod_motorista)) {
                $campos .= "{$gruda}ref_cod_motorista";
                $valores .= "{$gruda}'{$this->sqlTexto($this->ref_cod_motorista)}'";
                $gruda = ', ';
            }

            if (is_string($this->observacao)) {
                $observacao = $db->escapeString($this->observacao);
                $campos .= "{$gruda}observacao";
                $valores .= "{$gruda}'{$observacao}'";
                $gruda = ', ';
            }

            $db->Consulta("INSERT INTO {$this->_tabela} ( $campos ) VALUES( $valores )");
            $this->cod_veiculo = $db->InsertId("{$this->_tabela}_seq");

            if ($this->cod_veiculo) {
                $this->detalhe();
            }

            return $this->cod_veiculo;
        }

        return false;
    }

    /**
     * Edita os dados de um registro.
     *
     * @return bool
     */
    public function edita()
    {
        if (is_numeric($this->cod_veiculo)) {
            $db = new clsBanco();
            $set = '';
            $gruda = '';

            if (is_numeric($this->cod_veiculo)) {
                $set .= "{$gruda}cod_veiculo = '{$this->sqlTexto($this->cod_veiculo)}'";
                $gruda = ', ';
            }

            if (is_string($this->descricao)) {
                $descricao = $db->escapeString($this->descricao);
                $set .= "{$gruda}descricao = '{$descricao}'";
                $gruda = ', ';
            }

            if (is_string($this->placa)) {
                $set .= "{$gruda}placa = '{$this->sqlTexto($this->placa)}'";
                $gruda = ', ';
            }

            if (is_string($this->renavam)) {
                $set .= "{$gruda}renavam = '{$this->sqlTexto($this->renavam)}'";
                $gruda = ', ';
            }

            if (is_string($this->marca)) {
                $set .= "{$gruda}marca = '{$this->sqlTexto($this->marca)}'";
                $gruda = ', ';
            }

            if (is_numeric($this->ano_fabricacao)) {
                $set .= "{$gruda}ano_fabricacao = '{$this->sqlTexto($this->ano_fabricacao)}'";
                $gruda = ', ';
            }

            if (is_numeric($this->ano_modelo)) {
                $set .= "{$gruda}ano_modelo = '{$this->sqlTexto($this->ano_modelo)}'";
                $gruda = ', ';
            }

            if (is_numeric($this->this->passageiros)) {
                $set .= "{$gruda}passageiros = '{$this->sqlTexto($this->passageiros)}'";
                $gruda = ', ';
            }

            if (is_string($this->malha)) {
                $set .= "{$gruda}malha = '{$this->sqlTexto($this->malha)}'";
                $gruda = ', ';
            }

            if (is_numeric($this->ref_cod_tipo_veiculo)) {
                $set .= "{$gruda}ref_cod_tipo_veiculo = '{$this->sqlTexto($this->ref_cod_tipo_veiculo)}'";
                $gruda = ', ';
            }

            if (is_string($this->exclusivo_transporte_escolar)) {
                $set .= "{$gruda}exclusivo_transporte_escolar = '{$this->sqlTexto($this->exclusivo_transporte_escolar)}'";
                $gruda = ', ';
            }

            if (is_string($this->adaptado_necessidades_especiais)) {
                $set .= "{$gruda}adaptado_necessidades_especiais = '{$this->sqlTexto($this->adaptado_necessidades_especiais)}'";
                $gruda = ', ';
            }

            if (is_string($this->ativo)) {
                $set .= "{$gruda}ativo = '{$this->sqlTexto($this->ativo)}'";
                $gruda = ', ';
            }

            if (is_string($this->descricao_inativo)) {
                $set .= "{$gruda}descricao_inativo = '{$this->sqlTexto($this->descricao_inativo)}'";
                $gruda = ', ';
            }

            if (is_numeric($this->ref_cod_empresa_transporte_escolar)) {
                $set .= "{$gruda}ref_cod_empresa_transporte_escolar = '{$this->sqlTexto($this->ref_cod_empresa_transporte_escolar)}'";
                $gruda = ', ';
            }

            if (is_numeric($this->ref_cod_motorista)) {
                $set .= "{$gruda}ref_cod_motorista = '{$this->sqlTexto($this->ref_cod_motorista)}'";
                $gruda = ', ';
            } else {
                $set .= "{$gruda}ref_cod_motorista = NULL ";
                $gruda = ', ';
            }

            if (is_string($this->data_licenca) && trim($this->data_licenca) != '') {
                $set .= "{$gruda}data_licenca = '{$this->sqlTexto($this->data_licenca)}'";
                $gruda = ', ';
            } else {
                $set .= "{$gruda}data_licenca = NULL ";
                $gruda = ', ';
            }

            if (is_string($this->observacao)) {
                $observacao = $db->escapeString($this->observacao);
                $set .= "{$gruda}observacao = '{$observacao}'";
                $gruda = ', ';
            }
            if ($set) {
                $this->detalhe();
                $db->Consulta("UPDATE {$this->_tabela} SET $set WHERE cod_veiculo = '{$this->sqlTexto($this->cod_veiculo)}'");

                return true;
            }
        }

        return false;
    }

    /**
     * Retorna uma lista de registros filtrados de acordo com os parâmetros.
     *
     * @return array|false
     */
    public function lista(
        $cod_veiculo = null,
        $descricao = null,
        $placa = null,
        $renavam = null,
        $nome_motorista = null,
        $ref_cod_empresa_transporte_escolar = null,
        $marca = null,
        $ativo = null,
        $ref_cod_motorista = null
    ) {
        $db = new clsBanco();

        $sql = "SELECT {$this->_campos_lista}, (
          SELECT
            nome
          FROM
            modules.empresa_transporte_escolar emp,cadastro.pessoa p
          WHERE
            ref_cod_empresa_transporte_escolar = cod_empresa_transporte_escolar AND p.idpes = emp.ref_idpes
         ) AS nome_empresa FROM {$this->_tabela}";
        $filtros = '';
        $whereNomes = '';
        $whereAnd = ' WHERE ';

        if (is_numeric($cod_veiculo)) {
            $filtros .= "{$whereAnd} cod_veiculo = '{$this->sqlTexto($cod_veiculo)}'";
            $whereAnd = ' AND ';
        }

        if (is_string($descricao)) {
            $desc = $db->escapeString($descricao);
            $filtros .= "
        {$whereAnd} translate(upper(descricao),'ÅÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÔÖÚÙÛÜÇÝÑ','AAAAAAEEEEIIIIOOOOOUUUUCYN') LIKE translate(upper('%{$desc}%'),'ÅÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÔÖÚÙÛÜÇÝÑ','AAAAAAEEEEIIIIOOOOOUUUUCYN')";

            $whereAnd = ' AND ';
        }

        if (is_string($placa)) {
            $filtros .= "{$whereAnd} placa = '{$this->sqlTexto($placa)}'";
            $whereAnd = ' AND ';
        }

        if (is_string($renavam)) {
            $filtros .= "{$whereAnd} renavam = '{$this->sqlTexto($renavam)}'";
            $whereAnd = ' AND ';
        }

        if (is_string($nome_motorista)) {
            $whereNomes .= "
        {$whereAnd} translate(upper((SELECT nome FROM modules.motorista m,cadastro.pessoa p WHERE ref_cod_motorista = cod_motorista AND p.idpes = m.ref_idpes)),'ÅÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÔÖÚÙÛÜÇÝÑ','AAAAAAEEEEIIIIOOOOOUUUUCYN') LIKE translate(upper('%{$this->sqlTexto($nome_motorista)}%'),'ÅÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÔÖÚÙÛÜÇÝÑ','AAAAAAEEEEIIIIOOOOOUUUUCYN')";

            $whereAnd = ' AND ';
        }

        if (is_numeric($ref_cod_empresa_transporte_escolar)) {
            $filtros .= "{$whereAnd} ref_cod_empresa_transporte_escolar = '{$this->sqlTexto($ref_cod_empresa_transporte_escolar)}'";
            $whereAnd = ' AND ';
        }

        if (is_numeric($ref_cod_motorista)) {
            $filtros .= "{$whereAnd} ref_cod_motorista = '{$this->sqlTexto($ref_cod_motorista)}'";
            $whereAnd = ' AND ';
        }

        if (is_string($ativo)) {
            $filtros .= "{$whereAnd} ativo = '{$this->sqlTexto($ativo)}'";
            $whereAnd = ' AND ';
        }

        if (is_string($marca)) {
            $filtros .= "
        {$whereAnd} translate(upper(marca),'ÅÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÔÖÚÙÛÜÇÝÑ','AAAAAAEEEEIIIIOOOOOUUUUCYN') LIKE translate(upper('%{$this->sqlTexto($marca)}%'),'ÅÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÔÖÚÙÛÜÇÝÑ','AAAAAAEEEEIIIIOOOOOUUUUCYN')";
            $whereAnd = ' AND ';
        }

        $countCampos = count(explode(',', $this->_campos_lista)) + 2;
        $resultado = [];

        $sql .= $filtros . $whereNomes . $this->getOrderby() . $this->getLimite();

        $this->_total = $db->CampoUnico("SELECT COUNT(0) FROM {$this->_tabela} {$filtros}");

        $db->Consulta($sql);

        if ($countCampos > 1) {
            while ($db->ProximoRegistro()) {
                $tupla = $db->Tupla();
                $tupla['_total'] = $this->_total;
                $resultado[] = $tupla;
            }
        } else {
            while ($db->ProximoRegistro()) {
                $tupla = $db->Tupla();
                $resultado[] = $tupla[$this->_campos_lista];
            }
        }
        if (count($resultado)) {
            return $resultado;
        }

        return false;
    }

    /**
     * Retorna um array com os dados de um registro.
     *
     * @return array|false
     */
    public function detalhe()
    {
        if (is_numeric($this->cod_veiculo)) {
            $db = new clsBanco();
            $db->Consulta("SELECT {$this->_todos_campos},(
              SELECT
                nome
              FROM
                modules.empresa_transporte_escolar emp,cadastro.pessoa p
              WHERE
                ref_cod_empresa_transporte_escolar = cod_empresa_transporte_escolar AND p.idpes = emp.ref_idpes
             ) AS nome_empresa, (
              SELECT
                nome
              FROM
                modules.motorista m,cadastro.pessoa p
              WHERE
                ref_cod_motorista = cod_motorista AND p.idpes = m.ref_idpes
             ) AS nome_motorista,(SELECT descricao FROM modules.tipo_veiculo where cod_tipo_veiculo = ref_cod_tipo_veiculo) AS descricao_tipo FROM {$this->_tabela} WHERE cod_veiculo = '{$this->sqlTexto($this->cod_veiculo)}'");
            $db->ProximoRegistro();

            return $db->Tupla();
        }

        return false;
    }

    /**
     * Retorna um array com os dados de um registro.
     *
     * @return array|false
     */
    public function existe()
    {
        if (is_numeric($this->cod_veiculo)) {
            $db = new clsBanco();
            $db->Consulta("SELECT 1 FROM {$this->_tabela} WHERE cod_veiculo = '{$this->sqlTexto($this->cod_veiculo)}'");
            $db->ProximoRegistro();

            return $db->Tupla();
        }

        return false;
    }

    /**
     * Exclui um registro.
     *
     * @return bool
     */
    public function excluir()
    {
        if (is_numeric($this->cod_veiculo)) {
            $this->detalhe();

            $sql = "DELETE FROM {$this->_tabela} WHERE cod_veiculo = '{$this->sqlTexto($this->cod_veiculo)}'";
            $db = new clsBanco();
            $db->Consulta($sql);

            return true;
        }

        return false;
    }
}
