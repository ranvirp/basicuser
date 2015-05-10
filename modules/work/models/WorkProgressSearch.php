<?php

namespace app\modules\work\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\work\models\WorkProgress;

/**
 * WorkProgressSearch represents the model behind the search form about `app\modules\work\models\WorkProgress`.
 */
class WorkProgressSearch extends WorkProgress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'work_id', 'phy', 'fin'], 'integer'],
            [['exp'], 'number'],
            [['dateofprogress'], 'safe'],
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
        $query = WorkProgress::find();

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
            'work_id' => $this->work_id,
            'exp' => $this->exp,
            'phy' => $this->phy,
            'fin' => $this->fin,
            'dateofprogress' => $this->dateofprogress,
        ]);

        return $dataProvider;
    }
}
