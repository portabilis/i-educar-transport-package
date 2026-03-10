<?php

use iEducar\Legacy\Model;

class clsModulesPontoTransporteEscolar extends Model
{
    public $cod_ponto_transporte_escolar;
    public $descricao;
    public $cep;
    public $idbai;
    public $idlog;
    public $complemento;
    public $numero;
    public $latitude;
    public $longitude;

    public function __construct($cod_ponto_transporte_escolar = null, $descricao = null)
    {

        $this->_schema = 'modules.';
        $this->_tabela = "{$this->_schema}ponto_transporte_escolar";

        $this->_campos_lista = $this->_todos_campos = ' cod_ponto_transporte_escolar, descricao, cep, idlog, idbai, complemento, numero, latitude, longitude ';

        if (is_numeric($cod_ponto_transporte_escolar)) {
            $this->cod_ponto_transporte_escolar = $cod_ponto_transporte_escolar;
        }

        if (is_string($descricao)) {
            $this->descricao = $descricao;
        }
    }

    /**
     * Cria um novo registro.
     *
     * @return bool
     */
    public function cadastra()
    {
        if (is_string($this->descricao)) {
            $db = new clsBanco();

            $campos = '';
            $valores = '';
            $gruda = '';

            if (is_string($this->descricao)) {
                $descricao = $db->escapeString($this->descricao);
                $campos .= "{$gruda}descricao";
                $valores .= "{$gruda}'{$descricao}'";
                $gruda = ', ';
            }

            if (is_numeric($this->cep)) {
                $campos .= "{$gruda}cep";
                $valores .= "{$gruda} {$this->cep}";
                $gruda = ', ';
            }

            if (is_numeric($this->idlog)) {
                $campos .= "{$gruda}idlog";
                $valores .= "{$gruda} {$this->idlog}";
                $gruda = ', ';
            }

            if (is_numeric($this->idbai)) {
                $campos .= "{$gruda}idbai";
                $valores .= "{$gruda} {$this->idbai}";
                $gruda = ', ';
            }

            if (is_numeric($this->numero)) {
                $campos .= "{$gruda}numero";
                $valores .= "{$gruda}'{$this->numero}'";
                $gruda = ', ';
            }

            if (is_string($this->complemento)) {
                $complemento = $db->escapeString($this->complemento);
                $campos .= "{$gruda}complemento";
                $valores .= "{$gruda}'{$complemento}'";
                $gruda = ', ';
            }

            if (is_numeric($this->latitude)) {
                $campos .= "{$gruda}latitude";
                $valores .= "{$gruda}'{$this->latitude}'";
                $gruda = ', ';
            }

            if (is_numeric($this->longitude)) {
                $campos .= "{$gruda}longitude";
                $valores .= "{$gruda}'{$this->longitude}'";
                $gruda = ', ';
            }

            $db->Consulta("INSERT INTO {$this->_tabela} ( $campos ) VALUES( $valores )");

            $this->cod_ponto_transporte_escolar = $db->InsertId("{$this->_tabela}_seq");

            if ($this->cod_ponto_transporte_escolar) {
                $this->detalhe();
            }

            return $this->cod_ponto_transporte_escolar;
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
        if (is_string($this->cod_ponto_transporte_escolar)) {
            $db = new clsBanco();
            $set = '';
            $gruda = '';

            if (is_string($this->descricao)) {
                $descricao = $db->escapeString($this->descricao);
                $set .= "{$gruda}descricao = '{$descricao}'";
                $gruda = ', ';
            }

            if (is_numeric($this->cep)) {
                $set .= "{$gruda}cep = '{$this->cep}'";
                $gruda = ', ';
            }

            if (is_numeric($this->idlog)) {
                $set .= "{$gruda}idlog = '{$this->idlog}'";
                $gruda = ', ';
            }

            if (is_numeric($this->idbai)) {
                $set .= "{$gruda}idbai = '{$this->idbai}'";
                $gruda = ', ';
            }

            if (is_string($this->complemento)) {
                $complemento = $db->escapeString($this->complemento);
                $set .= "{$gruda}complemento = '{$complemento}'";
                $gruda = ', ';
            }

            if (is_numeric($this->numero)) {
                $set .= "{$gruda}numero = '{$this->numero}'";
                $gruda = ', ';
            }

            if (is_numeric($this->latitude)) {
                $set .= "{$gruda}latitude = '{$this->latitude}'";
                $gruda = ', ';
            }

            if (is_numeric($this->longitude)) {
                $set .= "{$gruda}longitude = '{$this->longitude}'";
                $gruda = ', ';
            }

            if ($set) {
                $this->detalhe();
                $db->Consulta("UPDATE {$this->_tabela} SET $set WHERE cod_ponto_transporte_escolar = '{$this->cod_ponto_transporte_escolar}'");

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
    public function lista($cod_ponto_transporte_escolar = null, $descricao = null)
    {
        $db = new clsBanco();

        $sql = "SELECT cod_ponto_transporte_escolar, descricao, cep, idlog, idbai, complemento, numero, ponto_transporte_escolar.latitude, ponto_transporte_escolar.longitude,
              p.address as logradouro,
              p.id as idtlog,
              p.neighborhood as bairro,
              1 as zona_localizacao,
              c.name as municipio,
              s.abbreviation as sigla_uf,
              p.city_id as idmun,
              p.id as iddis,
              c.name as distrito
            FROM {$this->_tabela}
            LEFT JOIN public.places p ON p.id = ponto_transporte_escolar.idlog
            LEFT JOIN public.cities c ON c.id = p.city_id
            LEFT JOIN public.states s ON s.id = c.state_id
    ";
        $filtros = '';

        $whereAnd = ' WHERE ';

        if (is_numeric($cod_ponto_transporte_escolar)) {
            $filtros .= "{$whereAnd} cod_ponto_transporte_escolar = '{$cod_ponto_transporte_escolar}'";
            $whereAnd = ' AND ';
        }

        if (is_string($descricao)) {
            $desc = $db->escapeString($descricao);
            $filtros .= "{$whereAnd} translate(upper(descricao),'ÅÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÔÖÚÙÛÜÇÝÑ','AAAAAAEEEEIIIIOOOOOUUUUCYN') LIKE translate(upper('%{$desc}%'),'ÅÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÔÖÚÙÛÜÇÝÑ','AAAAAAEEEEIIIIOOOOOUUUUCYN')";
            $whereAnd = ' AND ';
        }

        $countCampos = count(explode(',', $this->_campos_lista)) + 2;
        $resultado = [];

        $sql .= $filtros . $this->getOrderby() . $this->getLimite();

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
        if (is_numeric($this->cod_ponto_transporte_escolar)) {
            $db = new clsBanco();
            $db->Consulta("SELECT cod_ponto_transporte_escolar, descricao, cep, idlog, idbai, complemento, numero, ponto_transporte_escolar.latitude, ponto_transporte_escolar.longitude,
              p.address as logradouro,
              p.id as idtlog,
              p.neighborhood as bairro,
              1 as zona_localizacao,
              c.name as municipio,
              s.abbreviation as sigla_uf,
              p.city_id as idmun,
              p.id as iddis,
              c.name as distrito
            FROM {$this->_tabela}
            LEFT JOIN public.places p ON p.id = ponto_transporte_escolar.idlog
            LEFT JOIN public.cities c ON c.id = p.city_id
            LEFT JOIN public.states s ON s.id = c.state_id
            WHERE cod_ponto_transporte_escolar = '{$this->cod_ponto_transporte_escolar}'");
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
        if (is_numeric($this->cod_ponto_transporte_escolar)) {
            $db = new clsBanco();
            $db->Consulta("SELECT 1 FROM {$this->_tabela} WHERE cod_ponto_transporte_escolar = '{$this->cod_ponto_transporte_escolar}'");
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
        if (is_numeric($this->cod_ponto_transporte_escolar)) {
            $this->detalhe();

            $sql = "DELETE FROM {$this->_tabela} WHERE cod_ponto_transporte_escolar = '{$this->cod_ponto_transporte_escolar}'";
            $db = new clsBanco();
            $db->Consulta($sql);

            return true;
        }

        return false;
    }
}
