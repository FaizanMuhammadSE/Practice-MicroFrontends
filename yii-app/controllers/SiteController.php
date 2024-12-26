<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        $baseURL = 'http://localhost:4174/';
        // URL to your manifest.json file hosted on Azure or local server
        $manifestUrl = $baseURL . '.vite/manifest.json';

        // Fetch the manifest file content
        $manifestContent = file_get_contents($manifestUrl);

        // Decode the JSON to an associative array
        $manifest = json_decode($manifestContent, true);


        // Decode the JSON response
        $manifest = json_decode($manifestContent, true);

        // Entry points to your React app (usually defined in manifest.json)
        $entryPoint = 'index.html';  // This can vary based on your Vite configuration

        // Extracting the JS and CSS files
        $jsFiles = [];
        $cssFiles = [];

        if (isset($manifest[$entryPoint])) {
            $entryData = $manifest[$entryPoint];

            // Check for JS files
            if (isset($entryData['file'])) {
                $jsFiles[] = $entryData['file'];
            }

            // Check for CSS files
            if (isset($entryData['css'])) {
                $cssFiles = array_merge($cssFiles, $entryData['css']);
            }
        }


        // Pass the extracted JS and CSS files to the view
        return $this->render('index', [
            'baseURL' => $baseURL,
            'jsFiles' => $jsFiles,
            'cssFiles' => $cssFiles,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
