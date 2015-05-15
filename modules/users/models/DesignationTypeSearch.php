<?php

namespace app\modules\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\users\models\DesignationType;

/**
 * DesignationTypeSearch represents the model behind the search form about `app\modules\masterdata\models\DesignationType`.
 */
class DesignationTypeSearch extends DesignationType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'level_id'], 'integer'],
            [['name_hi', 'name_en', 'shortcode'], 'safe'],
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
        $query = DesignationType::find();

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
            'level_id' => $this->level_id,
        ]);

        $query->andFilterWhere(['like', 'name_hi', $this->name_hi])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'shortcode', $this->shortcode]);

        return $dataProvider;
    }
}
