<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Progression Entity
 *
 * @property int $progression_id
 * @property int $user_id
 * @property int $chapitre_id
 * @property int $last_tutoriel_id
 * @property bool $chapitre_termine
 * @property \Cake\I18n\FrozenTime $date_derniere_progression
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Chapitre $chapitre
 */
class Progression extends Entity
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
        'user_id' => true,
        'chapitre_id' => true,
        'last_tutoriel_id' => true,
        'chapitre_termine' => true,
        'date_derniere_progression' => true,
        'user' => true,
        'chapitre' => true,
    ];
}
