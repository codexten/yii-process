<?php

namespace codexten\yii\process\models\query;

/**
 * This is the ActiveQuery class for [[\codexten\yii\process\models\BackgroundProcess]].
 *
 * @see \codexten\yii\process\models\BackgroundProcess
 */
class BackgroundProcessQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \codexten\yii\process\models\BackgroundProcess[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \codexten\yii\process\models\BackgroundProcess|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
