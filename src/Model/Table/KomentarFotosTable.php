<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * KomentarFotos Model
 *
 * @property \App\Model\Table\FotosTable&\Cake\ORM\Association\BelongsTo $Fotos
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\KomentarFoto newEmptyEntity()
 * @method \App\Model\Entity\KomentarFoto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\KomentarFoto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\KomentarFoto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\KomentarFoto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\KomentarFoto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\KomentarFoto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\KomentarFoto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\KomentarFoto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\KomentarFoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\KomentarFoto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\KomentarFoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\KomentarFoto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\KomentarFoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\KomentarFoto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\KomentarFoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\KomentarFoto> deleteManyOrFail(iterable $entities, array $options = [])
 */
class KomentarFotosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('komentar_fotos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Fotos', [
            'foreignKey' => 'Foto_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'User_id',
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
            ->integer('Foto_id')
            ->notEmptyString('Foto_id');

        $validator
            ->integer('User_id')
            ->notEmptyString('User_id');

        $validator
            ->scalar('Isi_komentar')
            ->requirePresence('Isi_komentar', 'create')
            ->notEmptyString('Isi_komentar');

        $validator
            ->date('Tanggal_komentar')
            ->requirePresence('Tanggal_komentar', 'create')
            ->notEmptyDate('Tanggal_komentar');

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
        $rules->add($rules->existsIn(['Foto_id'], 'Fotos'), ['errorField' => 'Foto_id']);
        $rules->add($rules->existsIn(['User_id'], 'Users'), ['errorField' => 'User_id']);

        return $rules;
    }
}
