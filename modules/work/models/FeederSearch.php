<?php

namespace app\modules\work\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\work\models\Feeder;

/**
 * FeederSearch represents the model behind the search form about `app\modules\work\models\Feeder`.
 */
class FeederSearch extends Feeder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'substation_id', 'typeofconductor'], 'integer'],
            [['code', 'name_hi', 'name_en', 'description', 'pwtrfcty', 'pwtrfid', 'peakdemand', 'notrf', 'capacity', 'remarks'], 'safe'],
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
        $query = Feeder::find();

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
            'substation_id' => $this->substation_id,
            'typeofconductor' => $this->typeofconductor,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name_hi', $this->name_hi])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'pwtrfcty', $this->pwtrfcty])
            ->andFilterWhere(['like', 'pwtrfid', $this->pwtrfid])
            ->andFilterWhere(['like', 'peakdemand', $this->peakdemand])
            ->andFilterWhere(['like', 'notrf', $this->notrf])
            ->andFilterWhere(['like', 'capacity', $this->capacity])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
