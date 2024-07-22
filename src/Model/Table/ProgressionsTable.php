<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Progressions Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ChapitresTable&\Cake\ORM\Association\BelongsTo $Chapitres
 *
 * @method \App\Model\Entity\Progression newEmptyEntity()
 * @method \App\Model\Entity\Progression newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Progression[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Progression get($primaryKey, $options = [])
 * @method \App\Model\Entity\Progression findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Progression patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Progression[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Progression|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Progression saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Progression[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Progression[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Progression[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Progression[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProgressionsTable extends Table
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

        $this->setTable('progressions');
        $this->setDisplayField('progression_id');
        $this->setPrimaryKey('progression_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('chapitre_id')
            ->notEmptyString('chapitre_id');

        $validator
            ->integer('last_tutoriel_id')
            ->requirePresence('last_tutoriel_id', 'create')
            ->notEmptyString('last_tutoriel_id');

        $validator
            ->boolean('chapitre_termine')
            ->notEmptyString('chapitre_termine');

        $validator
            ->dateTime('date_derniere_progression')
            ->notEmptyDateTime('date_derniere_progression');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('chapitre_id', 'Chapitres'), ['errorField' => 'chapitre_id']);

        return $rules;
    }
}
