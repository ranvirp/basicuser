<?php

namespace app\modules\work\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\work\models\Substation;

/**
 * SubstationSearch represents the model behind the search form about `app\modules\work\models\Substation`.
 */
class SubstationSearch extends Substation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'substation_type', 'division_id'], 'integer'],
            [['code', 'name_hi', 'name_en', 'voltageratio', 'mva', 'mvarmax', 'mvamax', 'notrf', 'capacity', 'remarks'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Substation::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'substation_type' => $this->substation_type,
            'division_id' => $this->division_id,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name_hi', $this->name_hi])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'voltageratio', $this->voltageratio])
            ->andFilterWhere(['like', 'mva', $this->mva])
            ->andFilterWhere(['like', 'mvarmax', $this->mvarmax])
            ->andFilterWhere(['like', 'mvamax', $this->mvamax])
            ->andFilterWhere(['like', 'notrf', $this->notrf])
            ->andFilterWhere(['like', 'capacity', $this->capacity])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
