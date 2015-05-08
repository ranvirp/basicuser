<?php

namespace app\modules\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\users\models\Designation;

/**
 * DesignationSearch represents the model behind the search form about `app\modules\masterdata\models\Designation`.
 */
class DesignationSearch extends Designation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'designation_type_id', 'level_id'], 'integer'],
            [['officer_name_hi', 'officer_name_en', 'officer_mobile', 'officer_mobile1', 'officer_email', 'officer_userid'], 'safe'],
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
        $query = Designation::find();

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
           // 'id' => $this->id,
            'designation_type_id' => $this->designation_type_id,
            'level_id' => $this->level_id,
        ]);

        $query->andFilterWhere(['like', 'officer_name_hi', $this->officer_name_hi])
            ->andFilterWhere(['like', 'officer_name_en', $this->officer_name_en])
            ->andFilterWhere(['like', 'officer_mobile', $this->officer_mobile])
            ->andFilterWhere(['like', 'officer_mobile1', $this->officer_mobile1])
            ->andFilterWhere(['like', 'officer_email', $this->officer_email])
            ->andFilterWhere(['like', 'officer_userid', $this->officer_userid]);

        return $dataProvider;
    }
}
