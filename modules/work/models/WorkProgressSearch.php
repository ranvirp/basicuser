<?php

namespace app\modules\work\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\work\models\WorkProgress;

/**
 * WorkProgressSearch represents the model behind the search form about `app\models\WorkProgress`.
 */
class WorkProgressSearch extends WorkProgress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'work_id', 'physical', 'financial'], 'integer'],
            [['dateofprogress', 'remarks'], 'safe'],
            [['expenditure'], 'number'],
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

       $this->work_id=$params['work_id'];
        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'work_id' => $this->work_id,
            'physical' => $this->physical,
            'financial' => $this->financial,
            'dateofprogress' => $this->dateofprogress,
            'expenditure' => $this->expenditure,
        ]);
        $query->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
