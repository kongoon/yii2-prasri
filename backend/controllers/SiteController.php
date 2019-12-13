<?php

namespace backend\controllers;

use common\models\FixTransaction;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use kartik\mpdf\Pdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),

                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'pdf', 'preview'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $sql = "
        SELECT
        SUM(CASE WHEN DATE_FORMAT(FROM_UNIXTIME(transaction_at), '%m') = '01' THEN  1 ELSE 0 END) AS m01,
        SUM(CASE WHEN DATE_FORMAT(FROM_UNIXTIME(transaction_at), '%m') = '02' THEN  1 ELSE 0 END) AS m02,
        SUM(CASE WHEN DATE_FORMAT(FROM_UNIXTIME(transaction_at), '%m') = '03' THEN  1 ELSE 0 END) AS m03,
        SUM(CASE WHEN DATE_FORMAT(FROM_UNIXTIME(transaction_at), '%m') = '04' THEN  1 ELSE 0 END) AS m04,
        SUM(CASE WHEN DATE_FORMAT(FROM_UNIXTIME(transaction_at), '%m') = '05' THEN  1 ELSE 0 END) AS m05,
        SUM(CASE WHEN DATE_FORMAT(FROM_UNIXTIME(transaction_at), '%m') = '06' THEN  1 ELSE 0 END) AS m06,
        SUM(CASE WHEN DATE_FORMAT(FROM_UNIXTIME(transaction_at), '%m') = '07' THEN  1 ELSE 0 END) AS m07,
        SUM(CASE WHEN DATE_FORMAT(FROM_UNIXTIME(transaction_at), '%m') = '08' THEN  1 ELSE 0 END) AS m08,
        SUM(CASE WHEN DATE_FORMAT(FROM_UNIXTIME(transaction_at), '%m') = '09' THEN  1 ELSE 0 END) AS m09,
        SUM(CASE WHEN DATE_FORMAT(FROM_UNIXTIME(transaction_at), '%m') = '10' THEN  1 ELSE 0 END) AS m10,
        SUM(CASE WHEN DATE_FORMAT(FROM_UNIXTIME(transaction_at), '%m') = '11' THEN  1 ELSE 0 END) AS m11,
        SUM(CASE WHEN DATE_FORMAT(FROM_UNIXTIME(transaction_at), '%m') = '12' THEN  1 ELSE 0 END) AS m12

        FROM fix_transaction
        WHERE DATE_FORMAT(FROM_UNIXTIME(transaction_at), '%Y') = '" . date('Y') . "'
        ";

        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $data = [
            (int) $data[0]['m01'],
            (int) $data[0]['m02'],
            (int) $data[0]['m03'],
            (int) $data[0]['m04'],
            (int) $data[0]['m05'],
            (int)  $data[0]['m06'],
            (int) $data[0]['m07'],
            (int) $data[0]['m08'],
            (int) $data[0]['m09'],
            (int) $data[0]['m10'],
            (int) $data[0]['m11'],
            (int) $data[0]['m12']
        ];
        return $this->render('index', [
            'data' => $data
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'main_login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionPreview()
    {
        return $this->render('preview');
    }

    public function actionPdf($id)
    {
        $model = FixTransaction::findOne($id);

        $content = $this->renderPartial('_pdf', ['model' => $model]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => 'body{font-family: "sarabun";}',
            // set mPDF properties on the fly
            'options' => ['title' => 'ทดสอบ'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader' => ['ทดสอบ'],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $pdf->options['fontDir'] = array_merge($fontDirs, [
            Yii::getAlias('@webroot') . '/fonts'
        ]);



        $pdf->options['fontdata'] = $fontData + [
            'angsana' => [
                'R' => 'AngsanaNew.ttf',
                'TTCfontID' => [
                    'R' => 1,
                ],
            ],
            'sarabun' => [
                'R' => 'THSarabunNew.ttf',
            ]
        ];

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
}
