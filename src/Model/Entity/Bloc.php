<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bloc Entity
 *
 * @property int $bloc_id
 * @property int $tutoriel_id
 * @property string $type_contenue
 * @property string $contenue
 * @property int $ordre
 *
 * @property \App\Model\Entity\Tutoriel $tutoriel
 */
class Bloc extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'tutoriel_id' => true,
        'type_contenue' => true,
        'contenue' => true,
        'ordre' => true,
        'tutoriel' => true,
    ];
}
