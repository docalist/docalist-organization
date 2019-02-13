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
 * Champ "person" pour les entités organization : personnes liées.
 *
 * Ce champ permet de créer des relations avec des personnes (dirigeant, membre...)
 *
 * Chaque occurence du champ comporte deux sous-champs :
 * - `type` : type de relation,
 * - `value` : Post ID de la personne liée.
 *
 * Le sous-champ type est associé à une table d'autorité qui indique les types de relations disponibles
 * ("table:org-person-relation" par défaut).
 *
 * @author Daniel Ménard <daniel.menard@laposte.net>
 */
class PersonField extends TypedRelation
{
    public static function loadSchema()
    {
        return [
            'name' => 'organization',
            'label' => __('Personnes liées', 'docalist-people'),
            'description' => __('Personnes liées à cet organisme.', 'docalist-people'),
            'repeatable' => true,
            'fields' => [
                'type' => [
                    'label' => __('Rôle / fonction', 'docalist-people'),
                    'table' => 'table:org-person-relation',
                ],
                'value' => [
                    'label' => __('Personne liée', 'docalist-people'),
                    'relfilter' => 'type:person',
                ],
            ],
        ];
    }
}
