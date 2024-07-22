<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Historique Entity
 *
 * @property int $historique_id
 * @property int $user_id
 * @property int $tutoriel_id
 * @property int $quiz_id
 * @property \Cake\I18n\FrozenTime $date_acces
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Tutoriel $tutoriel
 */
class Historique extends Entity
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
        'tutoriel_id' => true,
        'quiz_id' => true,
        'date_acces' => true,
        'user' => true,
        'tutoriel' => true,
    ];
}
