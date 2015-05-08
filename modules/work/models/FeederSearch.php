<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\work\models\Feeder;

/**
 * FeederSearch represents the model behind the search form about `app\models\Feeder`.
 */
class FeederSearch extends Feeder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'circle_id', 'substation_id'], 'integer'],
            [['shortcode', 'name_en', 'substation_name', 'pwtrfcty', 'pwtrfid', 'typeofconductor', 'peakdemand', 'transformerdesc', 'totalcapacity'], 'safe'],
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
            'circle_id' => $this->circle_id,
            'substation_id' => $this->substation_id,
        ]);

        $query->andFilterWhere(['like', 'shortcode', $this->shortcode])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'substation_name', $this->substation_name])
            ->andFilterWhere(['like', 'pwtrfcty', $this->pwtrfcty])
            ->andFilterWhere(['like', 'pwtrfid', $this->pwtrfid])
            ->andFilterWhere(['like', 'typeofconductor', $this->typeofconductor])
            ->andFilterWhere(['like', 'peakdemand', $this->peakdemand])
            ->andFilterWhere(['like', 'transformerdesc', $this->transformerdesc])
            ->andFilterWhere(['like', 'totalcapacity', $this->totalcapacity]);

        return $dataProvider;
    }
}
