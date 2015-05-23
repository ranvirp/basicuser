<?php

namespace app\modules\work\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\work\models\MaterialSubCategory;

/**
 * MaterialSubCategorySearch represents the model behind the search form about `app\modules\work\models\MaterialSubCategory`.
 */
class MaterialSubCategorySearch extends MaterialSubCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'material_category_id'], 'integer'],
            [['material_subcategory'], 'safe'],
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
        $query = MaterialSubCategory::find();

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
            'material_category_id' => $this->material_category_id,
        ]);

        $query->andFilterWhere(['like', 'material_subcategory', $this->material_subcategory]);

        return $dataProvider;
    }
}
