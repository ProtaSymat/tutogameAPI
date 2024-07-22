<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quizs Model
 *
 * @property \App\Model\Table\ChapitresTable&\Cake\ORM\Association\BelongsTo $Chapitres
 *
 * @method \App\Model\Entity\Quiz newEmptyEntity()
 * @method \App\Model\Entity\Quiz newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Quiz[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quiz get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quiz findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Quiz patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quiz[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quiz|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quiz saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quiz[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quiz[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quiz[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quiz[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QuizsTable extends Table
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

        $this->setTable('quizs');
        $this->setDisplayField('titre');
        $this->setPrimaryKey('quiz_id');

        $this->belongsTo('Chapitres', [
            'foreignKey' => 'chapitre_id',
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
            ->integer('chapitre_id')
            ->notEmptyString('chapitre_id');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->requirePresence('titre', 'create')
            ->notEmptyString('titre');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

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
        $rules->add($rules->existsIn('chapitre_id', 'Chapitres'), ['errorField' => 'chapitre_id']);

        return $rules;
    }
}
