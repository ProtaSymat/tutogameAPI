<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reponse Entity
 *
 * @property int $reponse_id
 * @property int $question_id
 * @property int $user_id
 * @property string $reponse_choisie
 * @property \Cake\I18n\FrozenTime|null $date_reponse
 * @property string $etat
 *
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\User $user
 */
class Reponse extends Entity
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
        'question_id' => true,
        'user_id' => true,
        'reponse_choisie' => true,
        'date_reponse' => true,
        'etat' => true,
        'question' => true,
        'user' => true,
    ];
}
