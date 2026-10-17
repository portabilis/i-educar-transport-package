<?php

use Illuminate\Support\Facades\Gate;

return new class extends clsCadastro {
    public $cod_rota;

    public function Inicializar()
    {
        $this->cod_rota=$_GET['cod_rota'];

        if (!Gate::allows('modify', 21238)) {
            $this->simpleRedirect("transporte_itinerario_cad.php?cod_rota={$this->cod_rota}");
        }

        $obj  = new clsModulesItinerarioTransporteEscolar();
        $excluiu = $obj->excluirTodos($this->cod_rota);

        if ($excluiu) {
            echo "<script>
                window.location='transporte_rota_det.php?cod_rota={$this->cod_rota}';
                </script>";
        }
        die();
    }

    public function Gerar()
    {
    }

    public function Novo()
    {
    }

    public function Excluir()
    {
    }

    public function Formular()
    {
        $this->title = 'Itinerário';
        $this->processoAp = '21238';
    }
};
