<?php

namespace iEducar\Packages\Transport\Providers;

use App\Http\Controllers\LegacyController;
use Illuminate\Support\ServiceProvider;

class TransportServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }

        LegacyController::resolver(function ($uri) {
            if (in_array($uri, static::intranet())) {
                return __DIR__ . '/../../ieducar/' . $uri;
            }

            return null;
        });

        LegacyController::resolver(function ($uri) {
            if (in_array($uri, static::module())) {
                return __DIR__ . '/../../ieducar/modules';
            }

            return null;
        });
    }

    public static function module(): array
    {
        return [
            'Api/Views/EmpresaController',
            'Api/Views/MotoristaController',
            'Api/Views/PessoatransporteController',
            'Api/Views/PontoController',
            'Api/Views/RotaController',
            'Api/Views/VeiculoController',
            'TransporteEscolar/Views/EmpresaController',
            'TransporteEscolar/Views/ItinerarioController',
            'TransporteEscolar/Views/MotoristaController',
            'TransporteEscolar/Views/PessoatransporteController',
            'TransporteEscolar/Views/PontoController',
            'TransporteEscolar/Views/RotaController',
            'TransporteEscolar/Views/VeiculoController',
        ];
    }

    public static function intranet(): array
    {
        return [
            'intranet/educar_transporte_escolar_index.php',
            'intranet/ponto_xml.php',
            'intranet/transporte_copia_rotas.php',
            'intranet/transporte_empresa_det.php',
            'intranet/transporte_empresa_lst.php',
            'intranet/transporte_index.php',
            'intranet/transporte_itinerario_cad.php',
            'intranet/transporte_itinerario_del.php',
            'intranet/transporte_motorista_det.php',
            'intranet/transporte_motorista_lst.php',
            'intranet/transporte_pessoa_det.php',
            'intranet/transporte_pessoa_lst.php',
            'intranet/transporte_ponto_det.php',
            'intranet/transporte_ponto_lst.php',
            'intranet/transporte_rota_det.php',
            'intranet/transporte_rota_lst.php',
            'intranet/transporte_veiculo_det.php',
            'intranet/transporte_veiculo_lst.php',
        ];
    }
}
