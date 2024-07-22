<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tutoriel Entity
 *
 * @property int $tutoriel_id
 * @property int $chapitre_id
 * @property string $titre
 * @property string $description
 * @property \Cake\I18n\FrozenTime $date_publication
 * @property int $ordre
 *
 * @property \App\Model\Entity\Chapitre $chapitre
 */
class Tutoriel extends Entity
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
        'chapitre_id' => true,
        'titre' => true,
        'description' => true,
        'date_publication' => true,
        'ordre' => true,
        'chapitre' => true,
    ];
}
