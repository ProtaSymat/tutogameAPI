<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chapitres Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\Chapitre newEmptyEntity()
 * @method \App\Model\Entity\Chapitre newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Chapitre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chapitre get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chapitre findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Chapitre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chapitre[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chapitre|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chapitre saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chapitre[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chapitre[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chapitre[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chapitre[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ChapitresTable extends Table
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

        $this->setTable('chapitres');
        $this->setDisplayField('titre');
        $this->setPrimaryKey('chapitre_id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'categorie_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('categorie_id')
            ->notEmptyString('categorie_id');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->requirePresence('titre', 'create')
            ->notEmptyString('titre');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->integer('ordre')
            ->requirePresence('ordre', 'create')
            ->notEmptyString('ordre');

        $validator
            ->scalar('chapitre_img')
            ->maxLength('chapitre_img', 255)
            ->requirePresence('chapitre_img', 'create')
            ->notEmptyString('chapitre_img');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('categorie_id', 'Categories'), ['errorField' => 'categorie_id']);

        return $rules;
    }
}
