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
                name: 'transport:company:view',
                label: 'Empresas (ver)',
                group: 'Transporte escolar > Cadastros',
                process: 21235,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport:company:update',
                label: 'Empresas (cadastrar e alterar)',
                group: 'Transporte escolar > Cadastros',
                process: 21235,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport:company:view'],
            ),
            new PermissionDefinition(
                name: 'transport:company:delete',
                label: 'Empresas (excluir)',
                group: 'Transporte escolar > Cadastros',
                process: 21235,
                action: LegacyUserType::CAN_REMOVE,
                requires: ['transport:company:update'],
            ),
            new PermissionDefinition(
                name: 'transport:driver:view',
                label: 'Motoristas (ver)',
                group: 'Transporte escolar > Cadastros',
                process: 21236,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport:driver:update',
                label: 'Motoristas (cadastrar e alterar)',
                group: 'Transporte escolar > Cadastros',
                process: 21236,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport:driver:view'],
            ),
            new PermissionDefinition(
                name: 'transport:driver:delete',
                label: 'Motoristas (excluir)',
                group: 'Transporte escolar > Cadastros',
                process: 21236,
                action: LegacyUserType::CAN_REMOVE,
                requires: ['transport:driver:update'],
            ),
            new PermissionDefinition(
                name: 'transport:vehicle:view',
                label: 'Veículos (ver)',
                group: 'Transporte escolar > Cadastros',
                process: 21237,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport:vehicle:update',
                label: 'Veículos (cadastrar e alterar)',
                group: 'Transporte escolar > Cadastros',
                process: 21237,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport:vehicle:view'],
            ),
            new PermissionDefinition(
                name: 'transport:vehicle:delete',
                label: 'Veículos (excluir)',
                group: 'Transporte escolar > Cadastros',
                process: 21237,
                action: LegacyUserType::CAN_REMOVE,
                requires: ['transport:vehicle:update'],
            ),
            new PermissionDefinition(
                name: 'transport:stop:view',
                label: 'Pontos (ver)',
                group: 'Transporte escolar > Cadastros',
                process: 21238,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport:stop:update',
                label: 'Pontos (cadastrar e alterar)',
                group: 'Transporte escolar > Cadastros',
                process: 21238,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport:stop:view'],
            ),
            new PermissionDefinition(
                name: 'transport:stop:delete',
                label: 'Pontos (excluir)',
                group: 'Transporte escolar > Cadastros',
                process: 21238,
                action: LegacyUserType::CAN_REMOVE,
                requires: ['transport:stop:update'],
            ),
            new PermissionDefinition(
                name: 'transport:route:view',
                label: 'Rotas (ver)',
                group: 'Transporte escolar > Cadastros',
                process: 21239,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport:route:update',
                label: 'Rotas (cadastrar e alterar)',
                group: 'Transporte escolar > Cadastros',
                process: 21239,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport:route:view'],
            ),
            new PermissionDefinition(
                name: 'transport:route:delete',
                label: 'Rotas (excluir)',
                group: 'Transporte escolar > Cadastros',
                process: 21239,
                action: LegacyUserType::CAN_REMOVE,
                requires: ['transport:route:update'],
            ),
            new PermissionDefinition(
                name: 'transport:transport-user:view',
                label: 'Usuários de transporte (ver)',
                group: 'Transporte escolar > Movimentações',
                process: 21240,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport:transport-user:update',
                label: 'Usuários de transporte (cadastrar e alterar)',
                group: 'Transporte escolar > Movimentações',
                process: 21240,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport:transport-user:view'],
            ),
            new PermissionDefinition(
                name: 'transport:transport-user:delete',
                label: 'Usuários de transporte (excluir)',
                group: 'Transporte escolar > Movimentações',
                process: 21240,
                action: LegacyUserType::CAN_REMOVE,
                requires: ['transport:transport-user:update'],
            ),
            new PermissionDefinition(
                name: 'transport:route-copy:view',
                label: 'Cópia de rotas (ver)',
                group: 'Transporte escolar > Movimentações > Processos',
                process: 21246,
                action: LegacyUserType::CAN_VIEW,
            ),
            new PermissionDefinition(
                name: 'transport:route-copy:update',
                label: 'Cópia de rotas (cadastrar e alterar)',
                group: 'Transporte escolar > Movimentações > Processos',
                process: 21246,
                action: LegacyUserType::CAN_MODIFY,
                requires: ['transport:route-copy:view'],
            ),
        ];
    }
}
