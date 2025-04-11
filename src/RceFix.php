<?php

namespace fredmansky\rcefix;

use Craft;
use craft\base\Plugin;
use craft\controllers\AssetsController;
use yii\base\ActionEvent;
use yii\base\Event;
use yii\web\BadRequestHttpException;

/**
 * RCE Fix plugin
 *
 * @method static RceFix getInstance()
 * @author Samuel Reichör <admin@fredmansky.com>
 * @copyright Samuel Reichör
 * @license MIT
 */
class RceFix extends Plugin
{
    public string $schemaVersion = '1.0.0';

    public function init(): void
    {
        parent::init();

        $this->attachEventHandlers();
    }

    private function attachEventHandlers(): void
    {
        Event::on(AssetsController::class, AssetsController::EVENT_BEFORE_ACTION, function (ActionEvent $event) {
            if ($event->action->id === 'generate-transform') {
                $handle = Craft::$app->request->getBodyParam('handle');
                if ($handle && !is_string($handle)) {
                    throw new BadRequestHttpException('Invalid transform handle.');
                }
            }
        });
    }
}
