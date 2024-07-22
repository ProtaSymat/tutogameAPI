<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Historiques Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TutorielsTable&\Cake\ORM\Association\BelongsTo $Tutoriels
 *
 * @method \App\Model\Entity\Historique newEmptyEntity()
 * @method \App\Model\Entity\Historique newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Historique[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Historique get($primaryKey, $options = [])
 * @method \App\Model\Entity\Historique findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Historique patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Historique[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Historique|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Historique saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Historique[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Historique[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Historique[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Historique[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class HistoriquesTable extends Table
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

        $this->setTable('historiques');
        $this->setDisplayField('historique_id');
        $this->setPrimaryKey('historique_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Tutoriels', [
            'foreignKey' => 'tutoriel_id',
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
            ->integer('tutoriel_id')
            ->notEmptyString('tutoriel_id');

        $validator
            ->integer('quiz_id')
            ->requirePresence('quiz_id', 'create')
            ->notEmptyString('quiz_id');

        $validator
            ->dateTime('date_acces')
            ->notEmptyDateTime('date_acces');

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
        $rules->add($rules->existsIn('tutoriel_id', 'Tutoriels'), ['errorField' => 'tutoriel_id']);

        return $rules;
    }
}
