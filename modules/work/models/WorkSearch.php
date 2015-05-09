<?php

namespace app\modules\work\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\work\models\Work;

/**
 * WorkSearch represents the model behind the search form about `app\models\Work`.
 */
class WorkSearch extends Work
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'agency_id', 'fundingdept_id', 'work_type_id', 'status', 'scheme_id', 'work_admin', 'substation_id', 'division_id',  'feeder_id'], 'integer'],
            [['name_hi', 'name_en', 'address',  'workid',  'remarks'], 'safe'],
            [['totvalue', 'gpslat', 'gpslong'], 'number'],
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
        $query = Work::find();

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
            'agency_id' => $this->agency_id,
            'totvalue' => $this->totvalue,
            'fundingdept_id' => $this->fundingdept_id,
            'work_type_id' => $this->work_type_id,
            'gpslat' => $this->gpslat,
            'gpslong' => $this->gpslong,
            'status' => $this->status,
            'scheme_id' => $this->scheme_id,
            'work_admin' => $this->work_admin,
            'substation_id' => $this->substation_id,
            'division_id' => $this->division_id,
            'feeder_id' => $this->feeder_id,
        ]);

        $query->andFilterWhere(['like', 'name_hi', $this->name_hi])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'workid', $this->workid])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
