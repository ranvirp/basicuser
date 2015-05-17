<?php 
namespace app\commands;


	
use Yii;
use yii\console\Controller;
use arogachev\excel\import\basic\Importer;
use app\modules\work\models\Circle;
use app\modules\work\models\Division;
use app\modules\work\models\Substation;
use app\modules\work\models\Feeder;
use app\modules\work\models\Work;
use app\modules\work\models\Agency;







class ExcelImportController extends Controller
{
  public function actionImportCircle($path)
   {
        $importer = new Importer([
            'filePath' => $path,
           // 'useAttributeLabels'=>false,
            'standardModelsConfig' => [
                [
                    'className' => Circle::className(),
                    'standardAttributesConfig' => [
                        [
                            'name' => 'name_en',
                            'valueReplacement' => function($value){ return $value;},
                        ],
                         [
                            'name' => 'name_hi',
                            'valueReplacement' => function($value){ return $value;},
                        ],
                        [
                            'name' => 'code',
                            'valueReplacement' => function ($value) {
                                return $value;
                            },
                        ],
                        /*
                        [
                            'name' => 'author_id',
                            'valueReplacement' => function ($value) {
                                return Author::find()->select('id')->where(['name' => $value]);
                            },
                        ],
                        */
                    ],
                ],
            ],
        ]);
       print $importer->run()?'True':'False';
}
  public function actionImportDivision($path)
   {
        $importer = new Importer([
            'filePath' => $path,
           // 'useAttributeLabels'=>false,
            'standardModelsConfig' => [
                [
                    'className' => Circle::className(),
                    'standardAttributesConfig' => [
                        [
                            'name' => 'name_en',
                            'valueReplacement' => function($value){ return $value;},
                        ],
                         [
                            'name' => 'name_hi',
                            'valueReplacement' => function($value){ return $value;},
                        ],
                        [
                            'name' => 'code',
                            'valueReplacement' => function ($value) {
                                return $value;
                            },
                        ],
                        /*
                        [
                            'name' => 'author_id',
                            'valueReplacement' => function ($value) {
                                return Author::find()->select('id')->where(['name' => $value]);
                            },
                        ],
                        */
                    ],
                ],
            ],
        ]);
       print $importer->run()?'True':'False';
}
    
   
}

?>