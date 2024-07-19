<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @method \App\Model\Entity\Category newEmptyEntity()
 * @method \App\Model\Entity\Category newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Category[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Category get($primaryKey, $options = [])
 * @method \App\Model\Entity\Category findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Category[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Category|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Category saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CategoriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('categories');
        $this->setDisplayField('categorie_name');
        $this->setPrimaryKey('categorie_id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('categorie_name')
            ->maxLength('categorie_name', 255)
            ->requirePresence('categorie_name', 'create')
            ->notEmptyString('categorie_name');

        $validator
            ->scalar('categorie_description')
            ->maxLength('categorie_description', 255)
            ->requirePresence('categorie_description', 'create')
            ->notEmptyString('categorie_description');

        $validator
            ->scalar('categorie_img')
            ->maxLength('categorie_img', 255)
            ->requirePresence('categorie_img', 'create')
            ->notEmptyString('categorie_img');

        return $validator;
    }
}
