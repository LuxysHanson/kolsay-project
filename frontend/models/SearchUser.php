<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * SearchUser represents the model behind the search form of `common\models\User`.
 */
class SearchUser extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'city_id', 'status', 'created_at', 'updated_at', 'klass_id', 'country_id', 'school_id'], 'integer'],
            [['name', 'surname', 'middlename', 'role_id', 'my_cource_id', 'answers_id', 'password', 'password_hash', 'verification_token', 'auth_key', 'password_reset_token', 'email', 'photo', 'telephone', 'fioRod', 'placeOfStudy', 'nameOfStudy', 'certificate_ids', 'zap_razdel'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'city_id' => $this->city_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'klass_id' => $this->klass_id,
            'country_id' => $this->country_id,
            'school_id' => $this->school_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'middlename', $this->middlename])
            ->andFilterWhere(['like', 'role_id', $this->role_id])
            ->andFilterWhere(['like', 'my_cource_id', $this->my_cource_id])
            ->andFilterWhere(['like', 'answers_id', $this->answers_id])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'verification_token', $this->verification_token])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'fioRod', $this->fioRod])
            ->andFilterWhere(['like', 'placeOfStudy', $this->placeOfStudy])
            ->andFilterWhere(['like', 'nameOfStudy', $this->nameOfStudy])
            ->andFilterWhere(['like', 'certificate_ids', $this->certificate_ids])
            ->andFilterWhere(['like', 'zap_razdel', $this->zap_razdel]);

        return $dataProvider;
    }
}
