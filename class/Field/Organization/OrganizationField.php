<?php
/**
 * This file is part of Docalist People.
 *
 * Copyright (C) 2017-2019 Daniel Ménard
 *
 * For copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Docalist\People\Field\Organization;

use Docalist\Data\Type\TypedRelation;

/**
 * Champ "organization" pour les entités organization : organismes liés.
 *
 * Ce champ permet de créer des relations avec d'autres structures (structure parent, financeur, membres...)
 *
 * Chaque occurence du champ comporte deux sous-champs :
 * - `type` : type de relation,
 * - `value` : Post ID de la structure liée.
 *
 * Le sous-champ type est associé à une table d'autorité qui indique les types de relations disponibles
 * ("table:org-org-relation" par défaut).
 *
 * @author Daniel Ménard <daniel.menard@laposte.net>
 */
class OrganizationField extends TypedRelation
{
    public static function loadSchema(): array
    {
        return [
            'name' => 'organization',
            'label' => __('Organismes liés', 'docalist-people'),
            'description' => __("Relations avec d'autres structures.", 'docalist-people'),
            'repeatable' => true,
            'fields' => [
                'type' => [
                    'label' => __('Relation', 'docalist-people'),
                    'table' => 'table:org-org-relation',
                ],
                'value' => [
                    'label' => __('Structure liée', 'docalist-people'),
                    'relfilter' => 'type:organization',
                ],
            ],
        ];
    }
}
