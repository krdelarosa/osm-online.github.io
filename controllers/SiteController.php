<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use ChromePhp;

use app\models\Tenant;
use app\models\Lease;
use app\models\Payment;
use app\models\User;
use app\models\Establishment;
use app\models\Account;

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
        return $this->actionLogin();
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $model = new Account();
        #Yii::$app->user->login();

        $formData = Yii::$app->request->post();

        \ChromePhp::log($model);
        
        if ($model->load($formData) && $model->login()) {
            
            $user = User::findOne($model->u_id);

            #Yii::$app->user->login($model);
            //$this->u_id;

            $establishment = Establishment::findOne(['est_id'=>$user->establishment_id]);
            
            return $this->actionDashboard($establishment->est_id);
        }
        else{
            
            $model->u_password = '';
            return $this->render('login', [ 'model' => $model]);
        }
        
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

    ###########################################################################

    public function actionDashboard($est_id){
        #\ChromePhp::log('$this->est_id: '.$this->est_id);
        #$est_id = User::findOne(Yii::$app->user->id)->establishment_id;
        $tenants = Tenant::findAll(['establishment_id'=>$est_id]);
        $payments = Payment::findAll(['establishment_id'=>$est_id]);

        return $this->render('oms-dashboard',['est_id'=>$est_id,'tenants'=>$tenants,'payments'=>$payments]);
    }

    public function actionAdmin(){
        $establishments = Establishment::find()->all();
        $users = User::find()->all();
        \ChromePhp::log('admin:',$establishments);
        \ChromePhp::log('admin:',$users);
        return $this->render('admin', ['establishments' => $establishments,'users'=>$users]);
    }

    public function actionDirectory($est_id){
        $establishment = Establishment::findOne($est_id);

        $tenants = Tenant::findAll(['establishment_id'=>$est_id]);
        \ChromePhp::log('tenants-controller:',$tenants);
        return $this->render('tenant-directory', ['tenants' => $tenants,'establishment'=>$establishment,'est_id'=>$est_id]);
    }

    public function actionAdd($est_id)
    {
        $new_tenant = new Tenant();
        
        $formData = Yii::$app->request->post();

        if($new_tenant->load($formData)){
            $new_tenant->establishment_id = $est_id;
            if($new_tenant->save() ){
                Yii::$app->getSession()->setFlash('message','Successfully added new occupant!');
                return $this->redirect(['directory','est_id'=>$est_id]);
            }
            else{
                Yii::$app->getSession()->setFlash('message','Failed to add new occupant!');
            }
        }
        return $this->render('new-tenant', ['tenant' => $new_tenant]);
    }

    public function actionView($id)
    {
        $t_id = $id; 
        $tenant = Tenant::findOne($t_id);
        $leases = Lease::findAll(['t_id'=>$t_id]);
        
        \ChromePhp::log('View:', gettype($t_id));

        return $this->render('tenant-profile',['tenant'=>$tenant,'leases'=>$leases]);
    }

    public function actionUpdate($id){

        $tenant = Tenant::findOne($id); 
        $leases = Lease::findAll(['t_id'=>$id]);

        $formData = Yii::$app->request->post();
        
        \ChromePhp::log($formData);  
        \ChromePhp::log($tenant->load($formData));  
        \ChromePhp::log($tenant->save()); 

        if($tenant->load($formData) && $tenant->save()){
            Yii::$app->getSession()->setFlash('message','Successfully updated occupant information!');
            return $this->actionView($id);
        }
        else{
            return $this->render('update-profile',['tenant'=>$tenant,'leases'=>$leases]);
        }
        
    }

    public function actionDelete($id){
        $tenant = Tenant::findOne($id)->delete();
            

        if($tenant){

        # delete all lease and payment data belonging to tenant
        $leases = Lease::deleteAll(['t_id'=>$id]);
        $payments = Payment::deleteAll(['tenant_id'=>$id]);

            Yii::$app->getSession()->setFlash('message','Successfully removed tenant information!');
            return $this->redirect(['directory']);
        }
    }
    
    public function actionAddlease($id){
        
        $new_lease = new Lease();
        $formData = Yii::$app->request->post();

        $new_lease->t_id = $id;
        $new_lease->establishment_id = Tenant::findOne($id)->establishment_id; 

        \ChromePhp::log($formData);

        if($new_lease->load($formData)){
            if($new_lease->save()){
                Yii::$app->getSession()->setFlash('message','Successfully added new lease!');
                $this->redirect(['view','id'=>$id]);
            }
            else{
                Yii::$app->getSession()->setFlash('message','Failed to add new new lease!');
            }
        }
        return $this->render('lease-add', ['lease' => $new_lease,'id' => $id]);
    }

    public function actionViewlease($id){
        $lease = Lease::findOne($id);    
        return $this->render('lease-view',['lease'=>$lease]);
        
    }

    public function actionUpdatelease($id){
        $lease = Lease::findOne($id);    
        
        $formData = Yii::$app->request->post();
        
        if($lease->load($formData) && $lease->save()){
            Yii::$app->getSession()->setFlash('message','Successfully updated lease information!');
            return $this->actionViewlease($id);
        }
        else{
            return $this->render('lease-update',['lease'=>$lease]);
        }
    
    }

    public function actionDeletelease($id){
        $lease = Lease::findOne($id);
        $tenant = Tenant::findOne($lease->t_id);

        $lease->delete();    

        if($lease){
            $payments = Payment::deleteAll(['lease_id'=>$id]);
            
            Yii::$app->getSession()->setFlash('message','Successfully removed tenant information!');
            $this->redirect(['view','id'=>$tenant->t_id]);
        }
    }

    public function actionMonitor($est_id){
        $establishment = Establishment::findOne($est_id);
        $payments = Payment::findAll(['establishment_id'=>$est_id]);
        return $this->render('payment-monitor', ['payments' => $payments,'establishment'=>$establishment,'est_id'=>$est_id]);
    }

    public function actionAddpayment($est_id)
    {
        $new_payment = new Payment();

        $formData = Yii::$app->request->post();

        \ChromePhp::log($new_payment->load($formData));
        \ChromePhp::log($new_payment->save());

        if($new_payment->load($formData)){
            $new_payment->establishment_id = Lease::findOne(['lease_id'=>$new_payment->lease_id])->establishment_id;

            if($new_payment->save() ){
                Yii::$app->getSession()->setFlash('message','Successfully added new payment!');
                
                $lease = Lease::findOne(['lease_id'=>$new_payment->lease_id]);
                $lease->payment_total = $lease->payment_total + $new_payment->amount;
                $lease->save();

                return $this->redirect(['monitor','est_id'=>$est_id]);
            }
            else{
                Yii::$app->getSession()->setFlash('message','Failed to add new payment!');
            }
        }
        return $this->render('payment-add', ['payment' => $new_payment,'est_id'=>$est_id]);
    }

    public function actionPaymentview($id,$est_id)
    {
        $payment = Payment::findOne($id);
        return $this->render('payment-view',['payment'=>$payment,'est_id'=>$est_id]);
    }

    public function actionPaymentupdate($id,$est_id){

        $payment = Payment::findOne($id);
        
        $prev_amount = $payment->amount;

        if($payment->load(yii::$app->request->post()) && $payment->save()){
            Yii::$app->getSession()->setFlash('message','Successfully updated payment information!');
            
            $lease = Lease::findOne(['lease_id'=>$payment->lease_id]);
            $lease->payment_total = ($lease->payment_total-$prev_amount) + $payment->amount;
            $lease->save();

            return $this->render('payment-view',['payment'=>$payment,'est_id'=>$est_id]);
        }
        else{
            return $this->render('payment-update',['payment'=>$payment]);
        }
        
    }

    public function actionPaymentdelete($id,$est_id){
        $payment = Payment::findOne($id)->delete();    

        if($payment){
            #update lease total amount, deduct amount in deleted transaction from total payment
            Yii::$app->getSession()->setFlash('message','Successfully removed payment information!');
            return $this->redirect(['monitor','est_id'=>$est_id]);
        }
    }

    public function actionEstablishment($id){
        #once logged in, check which establishment account is linked to
        #use the est_id to locate establishment to be used
        
        $establishment = Establishment::findOne($id);
        $users = User::findAll(['establishment_id'=>$id]);

        \ChromePhp::log($id);
        \ChromePhp::log($establishment->est_name);
        \ChromePhp::log($users);

        return $this->render('establishment-view', ['establishment' => $establishment,'users',$users]);
    }

    public function actionEstablishmentupdate($id){

        $establishment = Establishment::findOne($id);  

        if($establishment->load(yii::$app->request->post()) && $establishment->save()){
            Yii::$app->getSession()->setFlash('message','Successfully updated establishment information!');
            #add payment amount to lease total_payment, update payment status
            return $this->render('establishment-view',['establishment'=>$establishment]);
        }
        else{
            return $this->render('establishment-update',['establishment'=>$establishment]);
        }
        
    }

    public function actionAddestablishment()
    {
        $new_establishment = new Establishment();

        $formData = Yii::$app->request->post();

        \ChromePhp::log($new_establishment->load($formData));
        \ChromePhp::log($new_establishment->save());

        if($new_establishment->load($formData)){
            if($new_establishment->save() ){
                Yii::$app->getSession()->setFlash('message','Successfully added new establishment!');
                
                return $this->redirect(['admin']);
            }
            else{
                Yii::$app->getSession()->setFlash('message','Failed to add new establishment!');
            }
        }
        return $this->render('establishment-add', ['establishment' => $new_establishment]);
    }

    public function actionDeleteestablishment($id){
        $establishment = Establishment::findOne($id)->delete();    

        if($establishment){
            Yii::$app->getSession()->setFlash('message','Successfully removed establishment information!');
            return $this->redirect(['admin']);
        }
    }

    public function actionViewestablishment($id){
        $establishment = Establishment::findOne($id);    
        return $this->render('establishment-view',['establishment'=>$establishment]);
        
    }

    public function actionUserview($id){
        $user = User::findOne($id);
        $account = Account::findOne(['u_id'=>$id]);

        \ChromePhp::log($user->u_id);

        return $this->render('user-view', ['user' => $user,'account'=>$account]);
    }

    public function actionUserupdate($id){
        $user = User::findOne($id);

        if($user->load(yii::$app->request->post()) && $user->save()){
            Yii::$app->getSession()->setFlash('message','Successfully updated user information!');
            #add payment amount to lease total_payment, update payment status
            return $this->render('user-view',['user'=>$user]);
        }
        else{
            return $this->render('user-update',['user'=>$user]);
        }
    }

    public function actionUseradd($id){
        $new_user = new User();
        
        $formData = Yii::$app->request->post();
        $establishment = Establishment::findOne($id);
        $new_user->establishment_id = $id;

        if($new_user->load($formData)){
            if($new_user->save() ){
                Yii::$app->getSession()->setFlash('message','Successfully added new user!');
                return $this->render('establishment-view',['establishment'=>$establishment]);
            }
            else{
                Yii::$app->getSession()->setFlash('message','Failed to add new user!');
            }
        }
        return $this->render('user-add', ['user' => $new_user]);
    }

    public function actionUserdelete($id){
        $user = User::findOne($id);
        $est_id = $user->establishment_id;
        $user->delete();    

        if($user){
            Yii::$app->getSession()->setFlash('message','Successfully removed user information!');
            #return $this->redirect(['index']);
            return $this->actionDashboard($est_id);
        }
    }

    public function actionAccountupdate($user){
        $account = Account::findOne(['u_id'=>$user->u_id]);
        \ChromePhp::log($user->u_id);
        if($account->load(yii::$app->request->post()) && $account->save()){
            Yii::$app->getSession()->setFlash('message','Successfully updated user information!');
            #add payment amount to lease total_payment, update payment status
            return $this->render('user-view',['user'=>$user]);
        }
        else{
            return $this->render('account-update',['account'=>$account]);
        }
    }
}
