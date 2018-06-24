<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[UserlikeProduct]].
 *
 * @see UserlikeProduct
 */
class UserlikeProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UserlikeProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserlikeProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}