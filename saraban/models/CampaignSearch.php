<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Campaign;

/**
 * CampaignSearch represents the model behind the search form about `app\models\Campaign`.
 */
class CampaignSearch extends Campaign
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'target_age_start', 'target_age_end', 'redirect2publisher', 'publish'], 'integer'],
            [['title', 'target_sex', 'target_provcode', 'target_distcode', 'target_subdistcode', 'target_hospcode', 'target_chronic', 'detail_url', 'thumbnail_url', 'intro', 'startdate', 'enddate', 'userid', 'publisher_id', 'publisher_url', 'hotline_number', 'full_detail'], 'safe'],
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
        $query = Campaign::find();

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
            'target_age_start' => $this->target_age_start,
            'target_age_end' => $this->target_age_end,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
            'redirect2publisher' => $this->redirect2publisher,
            'publish' => $this->publish,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'target_sex', $this->target_sex])
            ->andFilterWhere(['like', 'target_provcode', $this->target_provcode])
            ->andFilterWhere(['like', 'target_distcode', $this->target_distcode])
            ->andFilterWhere(['like', 'target_subdistcode', $this->target_subdistcode])
            ->andFilterWhere(['like', 'target_hospcode', $this->target_hospcode])
            ->andFilterWhere(['like', 'target_chronic', $this->target_chronic])
            ->andFilterWhere(['like', 'detail_url', $this->detail_url])
            ->andFilterWhere(['like', 'thumbnail_url', $this->thumbnail_url])
            ->andFilterWhere(['like', 'intro', $this->intro])
            ->andFilterWhere(['like', 'userid', $this->userid])
            ->andFilterWhere(['like', 'publisher_id', $this->publisher_id])
            ->andFilterWhere(['like', 'publisher_url', $this->publisher_url])
            ->andFilterWhere(['like', 'hotline_number', $this->hotline_number])
            ->andFilterWhere(['like', 'full_detail', $this->full_detail]);

        return $dataProvider;
    }
}
