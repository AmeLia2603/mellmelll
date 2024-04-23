<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fotos Model
 *
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsTo $Albums
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Foto newEmptyEntity()
 * @method \App\Model\Entity\Foto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Foto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Foto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Foto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Foto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Foto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Foto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Foto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Foto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Foto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Foto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Foto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Foto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Foto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Foto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Foto> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FotosTable extends Table
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

        $this->setTable('fotos');
        $this->setDisplayField('Judul_foto');
        $this->setPrimaryKey('id');

        $this->belongsTo('Albums', [
            'foreignKey' => 'Album_id',
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
            ->scalar('Judul_foto')
            ->maxLength('Judul_foto', 255)
            ->requirePresence('Judul_foto', 'create')
            ->notEmptyString('Judul_foto');

        $validator
            ->scalar('Deskripsi_foto')
            ->requirePresence('Deskripsi_foto', 'create')
            ->notEmptyString('Deskripsi_foto');

        $validator
            ->date('Tanggal_unggah')
            ->requirePresence('Tanggal_unggah', 'create')
            ->notEmptyDate('Tanggal_unggah');

        $validator
            ->scalar('Lokasi_file')
            ->maxLength('Lokasi_file', 255)
            ->requirePresence('Lokasi_file', 'create')
            ->notEmptyFile('Lokasi_file');

        $validator
            ->integer('Album_id')
            ->notEmptyString('Album_id');

        $validator
            ->integer('User_id')
            ->notEmptyString('User_id');

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
        $rules->add($rules->existsIn(['Album_id'], 'Albums'), ['errorField' => 'Album_id']);
        $rules->add($rules->existsIn(['User_id'], 'Users'), ['errorField' => 'User_id']);

        return $rules;
    }
}
