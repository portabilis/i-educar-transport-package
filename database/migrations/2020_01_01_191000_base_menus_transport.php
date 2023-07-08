<?php

use App\Menu;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up(): void
    {
        $transporte = Menu::query()->updateOrCreate(['old' => 69], ['parent_id' => null, 'title' => 'Transporte escolar', 'description' => null, 'link' => '/intranet/educar_transporte_escolar_index.php', 'icon' => 'fa-bus', 'order' => 7, 'type' => 1, 'parent_old' => null, 'process' => 69, 'active' => true]);

        $cadastros = Menu::query()->updateOrCreate(['old' => 20710], ['parent_id' => $transporte->getKey(), 'title' => 'Cadastros', 'order' => 1, 'type' => 2, 'parent_old' => 69]);
        $movimentacoes = Menu::query()->updateOrCreate(['old' => 20711], ['parent_id' => $transporte->getKey(), 'title' => 'Movimentações', 'order' => 2, 'type' => 2, 'parent_old' => 69]);
        $relatorios = Menu::query()->updateOrCreate(['old' => 20712], ['parent_id' => $transporte->getKey(), 'title' => 'Relatórios', 'order' => 3, 'type' => 2, 'parent_old' => 69]);

        $processos = Menu::query()->updateOrCreate(['old' => 21244], ['parent_id' => $movimentacoes->getKey(), 'title' => 'Processos', 'order' => 0, 'type' => 3, 'parent_old' => 20711]);
        Menu::query()->updateOrCreate(['old' => 9998847], ['parent_id' => $relatorios->getKey(), 'title' => 'Cadastrais', 'order' => 1, 'parent_old' => 20712]);

        Menu::query()->updateOrCreate(['old' => 21235], ['parent_id' => $cadastros->getKey(), 'title' => 'Empresas', 'description' => 'Empresas do transporte', 'link' => '/intranet/transporte_empresa_lst.php', 'order' => 0, 'type' => 3, 'parent_old' => 20710, 'process' => 21235, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 21236], ['parent_id' => $cadastros->getKey(), 'title' => 'Motoristas', 'description' => 'Motoristas do transporte', 'link' => '/intranet/transporte_motorista_lst.php', 'order' => 0, 'type' => 3, 'parent_old' => 20710, 'process' => 21236, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 21238], ['parent_id' => $cadastros->getKey(), 'title' => 'Pontos', 'description' => 'Rotas do transporte', 'link' => '/intranet/transporte_ponto_lst.php', 'order' => 0, 'type' => 3, 'parent_old' => 20710, 'process' => 21238, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 21239], ['parent_id' => $cadastros->getKey(), 'title' => 'Rotas', 'description' => 'Pontos do transporte', 'link' => '/intranet/transporte_rota_lst.php', 'order' => 0, 'type' => 3, 'parent_old' => 20710, 'process' => 21239, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 21237], ['parent_id' => $cadastros->getKey(), 'title' => 'Veículos', 'description' => 'Veículos do transporte', 'link' => '/intranet/transporte_veiculo_lst.php', 'order' => 0, 'type' => 3, 'parent_old' => 20710, 'process' => 21237, 'active' => true]);
        Menu::query()->updateOrCreate(['old' => 21240], ['parent_id' => $movimentacoes->getKey(), 'title' => 'Usuários de transporte', 'description' => 'Usuários de transporte', 'link' => '/intranet/transporte_pessoa_lst.php', 'order' => 0, 'type' => 3, 'parent_old' => 20711, 'process' => 21240, 'active' => true]);

        Menu::query()->updateOrCreate(['old' => 21246], ['parent_id' => $processos->getKey(), 'title' => 'Cópia de rotas', 'description' => 'Cópia de rotas do transporte', 'link' => '/intranet/transporte_copia_rotas.php', 'order' => 0, 'type' => 4, 'parent_old' => 21244, 'process' => 21246, 'active' => true]);
    }

    public function down(): void
    {
        Menu::query()->where('old', 21246)->delete();
        Menu::query()->where('old', 21240)->delete();
        Menu::query()->where('old', 21235)->delete();
        Menu::query()->where('old', 21236)->delete();
        Menu::query()->where('old', 21238)->delete();
        Menu::query()->where('old', 21239)->delete();
        Menu::query()->where('old', 21237)->delete();
        Menu::query()->where('old', 21244)->delete();
        Menu::query()->where('old', 9998847)->delete();
        Menu::query()->where('old', 20710)->delete();
        Menu::query()->where('old', 20711)->delete();
        Menu::query()->where('old', 20712)->delete();
        Menu::query()->where('old', 69)->delete();
    }
};
