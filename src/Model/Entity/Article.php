<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $articles_id
 * @property string $articles_titre
 * @property int $user_id
 * @property string $articles_img
 * @property string $articles_content
 * @property string $articles_excerpt
 * @property \Cake\I18n\FrozenTime $articles_created
 * @property \Cake\I18n\FrozenTime $articles_modified
 *
 * @property \App\Model\Entity\User $user
 */
class Article extends Entity
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
        'articles_titre' => true,
        'user_id' => true,
        'articles_img' => true,
        'articles_content' => true,
        'articles_excerpt' => true,
        'articles_created' => true,
        'articles_modified' => true,
        'user' => true,
    ];
}
