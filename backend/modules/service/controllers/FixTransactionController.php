<?php

namespace backend\modules\service\controllers;

use Yii;
use common\models\FixTransaction;
use yii\base\Exception;
use backend\modules\service\models\FixTransactionSearch;
use common\models\SupplyItem;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FixTransactionController implements the CRUD actions for FixTransaction model.
 */
class FixTransactionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all FixTransaction models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FixTransactionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['transaction_by' => Yii::$app->user->getId()]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FixTransaction model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FixTransaction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FixTransaction([
            'transaction_by' => Yii::$app->user->getId(),
            'fix_status_id' => 1
        ]);

        if ($model->load(Yii::$app->request->post())) {

            //$model->transaction_by = Yii::$app->user->getId();
            $model->transaction_at = time();
            //$model->fix_status_id = 1;
            //ถ้าเคยแจ้งซ่อมแล้ว
            if(FixTransaction::findOne(['supply_item_id' => $model->supply_item_id])){
                $current = FixTransaction::find()->where(['supply_item_id' => $model->supply_item_id])
                    ->andWhere(['!=', 'fix_status_id', 4])
                    ->one();

                if($current){
                    Yii::$app->session->setFlash('error', 'อยู่ระหว่างดำเนินการ ไม่สามารถส่งซ่อมได้อีก');
                    return $this->redirect(['index']);
                }
            }

            try {
                $model->photo = $model->upload($model);
                $model->validate();
                $model->save();

                $item = SupplyItem::findOne(['id' => $model->supply_item_id]);
                $item->is_ready = 0;
                $item->save();
                
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');

                Yii::$app->hanuman->sendLine('มีการแจ้งซ่อมใหม่ ครุภัณฑ์: '.$model->supplyItem->name.' อาการ:'.$model->detail);

            }catch(Exception $exception) {
                throw new Exception('เกิดข้อผิดพลาด: '.$exception->getMessage());
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FixTransaction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){

            try {
                $model->photo = $model->upload($model);
                $model->validate();
                $model->save();

                $item = SupplyItem::findOne(['id' => $model->supply_item_id]);
                $item->is_ready = 0;
                $item->save();

                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');

                //Yii::$app->hanuman->sendLine('มีการแจ้งซ่อมใหม่ ครุภัณฑ์: ' . $model->supplyItem->name . ' อาการ:' . $model->detail);
            } catch (Exception $exception) {
                throw new Exception('เกิดข้อผิดพลาด: ' . $exception->getMessage());
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FixTransaction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FixTransaction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FixTransaction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FixTransaction::findOne(['id' => $id, 'transaction_by' => Yii::$app->user->getId()])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDeletePhoto($photo, $id)
    {
        $model = $this->findModel($id);
        $photos = explode(',', $model->photo);
        $photos = array_diff($photos, [$photo]);
        unlink(Yii::getAlias('@webroot') . '/'.$model->uploadFolder. '/' . $photo);

        $photos = implode(',', $photos);
        $model->photo = $photos;
        $model->save();

        Yii::$app->session->setFlash('success', 'ลบไฟล์แล้ว');
        return $this->redirect(['update', 'id' => $model->id]);

    }
}
