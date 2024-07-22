<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chapitre Entity
 *
 * @property int $chapitre_id
 * @property int $categorie_id
 * @property string $titre
 * @property string $description
 * @property int $ordre
 * @property string $chapitre_img
 *
 * @property \App\Model\Entity\Category $category
 */
class Chapitre extends Entity
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
        'categorie_id' => true,
        'titre' => true,
        'description' => true,
        'ordre' => true,
        'chapitre_img' => true,
        'category' => true,
    ];
}
