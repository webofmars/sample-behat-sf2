<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Mink\Driver\Selenium2Driver;

class FeatureContext extends MinkContext
{
    private $screenShotPath;

    public function __construct($screen_shot_path)
    {
        $this->screenShotPath = $screen_shot_path;
    }

    /**
     * Take screen-shot when step fails. Works only with Selenium2Driver.
     *
     * @AfterStep
     * @param AfterStepScope $scope
     */
    public function takeScreenshotAfterFailedStep($scope)
    {
        if (99 === $scope->getTestResult()->getResultCode()) {
            $driver = $this->getSession()->getDriver();

            if (! $driver instanceof Selenium2Driver) {
                return;
            }

            if (! is_dir($this->screenShotPath)) {
                mkdir($this->screenShotPath, 0777, true);
            }

            $filename = sprintf(
                '%s_%s_%s.%s',
                $this->getMinkParameter('browser_name'),
                date('Ymd') . '-' . date('His'),
                uniqid('', true),
                'png'
            );

            $this->saveScreenshot($filename, $this->screenShotPath);
            print("Saved screenshot of faillure in ".$this->screenShotPath."/".$filename."\n");
        }
    }
}
