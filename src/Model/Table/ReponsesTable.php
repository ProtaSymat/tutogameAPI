<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reponses Model
 *
 * @property \App\Model\Table\QuestionsTable&\Cake\ORM\Association\BelongsTo $Questions
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Reponse newEmptyEntity()
 * @method \App\Model\Entity\Reponse newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Reponse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reponse get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reponse findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Reponse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reponse[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reponse|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reponse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reponse[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Reponse[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Reponse[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Reponse[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ReponsesTable extends Table
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

        $this->setTable('reponses');
        $this->setDisplayField('reponse_choisie');
        $this->setPrimaryKey('reponse_id');

        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->integer('question_id')
            ->notEmptyString('question_id');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('reponse_choisie')
            ->maxLength('reponse_choisie', 255)
            ->requirePresence('reponse_choisie', 'create')
            ->notEmptyString('reponse_choisie');

        $validator
            ->dateTime('date_reponse')
            ->allowEmptyDateTime('date_reponse');

        $validator
            ->scalar('etat')
            ->requirePresence('etat', 'create')
            ->notEmptyString('etat');

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
        $rules->add($rules->existsIn('question_id', 'Questions'), ['errorField' => 'question_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
