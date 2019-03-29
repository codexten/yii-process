<?php

namespace codexten\yii\process\models;

use Yii;
use yii\helpers\Url;
use Cocur\BackgroundProcess\BackgroundProcess as Process;

/**
 * This is the model class for table "{{%background_process}}".
 *
 * Database fields:
 *
 * @property int $id
 * @property string $name
 * @property int $pid
 * @property string $comment
 * @property string $run_command
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class BackgroundProcess extends \codexten\yii\db\ActiveRecord
{
    //const STATUS_ACTIVE = 1;
    //const STATUS_INACTIVE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%background_process}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'status', 'created_at', 'updated_at'], 'integer'],
            [['run_command'], 'string'],
            [['name', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'pid' => Yii::t('app', 'Pid'),
            'comment' => Yii::t('app', 'Comment'),
            'run_command' => Yii::t('app', 'Run Command'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }


    /**
     *{@inheritdoc}
     */
    public function canUpdate()
    {
        //if (!Yii::$app->user->can('partner.update')) {
        //    return false;
        //}

        return parent::canUpdate();
    }

    /**
     *{@inheritdoc}
     */
    public function canView()
    {
        //if (!Yii::$app->user->can('partner.view')) {
        //    return false;
        //}

        return parent::canView();
    }

    /**
     *{@inheritdoc}
     */
    public function canDelete()
    {
        //if (!Yii::$app->user->can('partner.delete')) {
        //    return false;
        //}

        return parent::canView();
    }

    /**
     * {@inheritdoc}
     */
    public function getMeta()
    {
        $meta = parent::getMeta();

        //if ($this->canView()) {
        //    $meta['viewUrl'] = Url::to(['@partner/view', 'id' => $this->id]);
        //}
        //if ($this->canUpdate()) {
        //    $meta['updateUrl'] = Url::to(['@partner/update', 'id' => $this->id]);
        //}

        return $meta;
    }

    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        $fields = parent::fields();

        return $fields;
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return [];
    }

    public function isRunning()
    {
        if (!$this->pid) {
            return false;
        }

        $process = Process::createFromPID($this->pid);

        return $process->isRunning();

    }

    public function getLogFile()
    {
        return Yii::getAlias("@runtime/{$this->id}.log");
    }

    public function canRun()
    {
        if ($this->isRunning()) {
            return false;
        }

        return true;
    }

    public function run()
    {
        if (!$this->canRun()) {
            return false;
        }
        $process = new Process($this->run_command);

        $process->run($this->getLogFile(), true);
        $this->pid = $process->getPid();
        $this->save(false);

        return true;
    }

    public function stop()
    {
        if (!$this->isRunning()) {
            return true;
        }
        $process = Process::createFromPID($this->pid);

        return $process->stop();
    }

    /**
     * {@inheritdoc}
     * @return \codexten\yii\process\models\query\BackgroundProcessQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \codexten\yii\process\models\query\BackgroundProcessQuery(get_called_class());
    }

    ///**
    //* statuses
    //* @return array
    //*/
    //public static function statuses()
    //{
    //    return [
    //        self::STATUS_ACTIVE => Yii::t('app', 'Active'),
    //        self::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
    //    ];
    //}
}
