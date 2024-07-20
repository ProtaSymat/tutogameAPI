<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * News Entity
 *
 * @property int $news_id
 * @property string $news_titre
 * @property int $user_id
 * @property string $news_img
 * @property string $news_content
 * @property string $news_excerpt
 * @property \Cake\I18n\FrozenTime $news_created
 * @property \Cake\I18n\FrozenTime $news_modified
 *
 * @property \App\Model\Entity\User $user
 */
class News extends Entity
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
        'news_titre' => true,
        'user_id' => true,
        'news_img' => true,
        'news_content' => true,
        'news_excerpt' => true,
        'news_created' => true,
        'news_modified' => true,
        'user' => true,
    ];
}
