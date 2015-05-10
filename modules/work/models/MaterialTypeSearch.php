<?php

namespace app\modules\work\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\work\models\MaterialType;

/**
 * MaterialTypeSearch represents the model behind the search form about `app\modules\work\models\MaterialType`.
 */
class MaterialTypeSearch extends MaterialType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name_hi', 'name_en', 'unit_type'], 'safe'],
            [['unitcost_1314', 'unitcost_1415', 'unitcost_1516'], 'number'],
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
        $query = MaterialType::find();

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
            'unitcost_1314' => $this->unitcost_1314,
            'unitcost_1415' => $this->unitcost_1415,
            'unitcost_1516' => $this->unitcost_1516,
        ]);

        $query->andFilterWhere(['like', 'name_hi', $this->name_hi])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'unit_type', $this->unit_type]);

        return $dataProvider;
    }
}
