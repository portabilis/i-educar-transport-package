<?php

namespace iEducar\Packages\Transport\Permissions;

use App\Models\LegacyUserType;
use App\Support\Permissions\PermissionDefinition;

class PackagePermissions
{
    /**
     * @return array<int, PermissionDefinition>
     */
    public static function definitions(): array
    {
        return [
            new PermissionDefinition(
                name: 'transport-companies.view',
                label: 'Empresas (ver)',
                group: 'Transporte escolar > Cadastros',
                process: 21235,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport-companies.modify',
                label: 'Empresas (cadastrar e alterar)',
                group: 'Transporte escolar > Cadastros',
                process: 21235,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport-companies.view'],
            ),
            new PermissionDefinition(
                name: 'transport-companies.delete',
                label: 'Empresas (excluir)',
                group: 'Transporte escolar > Cadastros',
                process: 21235,
                action: LegacyUserType::CAN_REMOVE,
                requires: ['transport-companies.modify'],
            ),
            new PermissionDefinition(
                name: 'transport-drivers.view',
                label: 'Motoristas (ver)',
                group: 'Transporte escolar > Cadastros',
                process: 21236,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport-drivers.modify',
                label: 'Motoristas (cadastrar e alterar)',
                group: 'Transporte escolar > Cadastros',
                process: 21236,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport-drivers.view'],
            ),
            new PermissionDefinition(
                name: 'transport-drivers.delete',
                label: 'Motoristas (excluir)',
                group: 'Transporte escolar > Cadastros',
                process: 21236,
                action: LegacyUserType::CAN_REMOVE,
                requires: ['transport-drivers.modify'],
            ),
            new PermissionDefinition(
                name: 'transport-vehicles.view',
                label: 'Veículos (ver)',
                group: 'Transporte escolar > Cadastros',
                process: 21237,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport-vehicles.modify',
                label: 'Veículos (cadastrar e alterar)',
                group: 'Transporte escolar > Cadastros',
                process: 21237,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport-vehicles.view'],
            ),
            new PermissionDefinition(
                name: 'transport-vehicles.delete',
                label: 'Veículos (excluir)',
                group: 'Transporte escolar > Cadastros',
                process: 21237,
                action: LegacyUserType::CAN_REMOVE,
                requires: ['transport-vehicles.modify'],
            ),
            new PermissionDefinition(
                name: 'transport-stops.view',
                label: 'Pontos (ver)',
                group: 'Transporte escolar > Cadastros',
                process: 21238,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport-stops.modify',
                label: 'Pontos (cadastrar e alterar)',
                group: 'Transporte escolar > Cadastros',
                process: 21238,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport-stops.view'],
            ),
            new PermissionDefinition(
                name: 'transport-stops.delete',
                label: 'Pontos (excluir)',
                group: 'Transporte escolar > Cadastros',
                process: 21238,
                action: LegacyUserType::CAN_REMOVE,
                requires: ['transport-stops.modify'],
            ),
            new PermissionDefinition(
                name: 'transport-routes.view',
                label: 'Rotas (ver)',
                group: 'Transporte escolar > Cadastros',
                process: 21239,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport-routes.modify',
                label: 'Rotas (cadastrar e alterar)',
                group: 'Transporte escolar > Cadastros',
                process: 21239,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport-routes.view'],
            ),
            new PermissionDefinition(
                name: 'transport-routes.delete',
                label: 'Rotas (excluir)',
                group: 'Transporte escolar > Cadastros',
                process: 21239,
                action: LegacyUserType::CAN_REMOVE,
                requires: ['transport-routes.modify'],
            ),
            new PermissionDefinition(
                name: 'transport-users.view',
                label: 'Usuários de transporte (ver)',
                group: 'Transporte escolar > Movimentações',
                process: 21240,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport-users.modify',
                label: 'Usuários de transporte (cadastrar e alterar)',
                group: 'Transporte escolar > Movimentações',
                process: 21240,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport-users.view'],
            ),
            new PermissionDefinition(
                name: 'transport-users.delete',
                label: 'Usuários de transporte (excluir)',
                group: 'Transporte escolar > Movimentações',
                process: 21240,
                action: LegacyUserType::CAN_REMOVE,
                requires: ['transport-users.modify'],
            ),
            new PermissionDefinition(
                name: 'transport-route-copies.view',
                label: 'Cópia de rotas (ver)',
                group: 'Transporte escolar > Movimentações > Processos',
                process: 21246,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport-route-copies.modify',
                label: 'Cópia de rotas (cadastrar e alterar)',
                group: 'Transporte escolar > Movimentações > Processos',
                process: 21246,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport-route-copies.view'],
            ),
        ];
    }
}
