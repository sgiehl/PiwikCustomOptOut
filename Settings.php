<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\CustomOptOut;

use Piwik\Piwik;
use Piwik\Settings\SystemSetting;
use Piwik\Settings\UserSetting;

/**
 * Defines Settings for CustomOptOut.
 *
 * Usage like this:
 * $settings = new Settings('CustomOptOut');
 * $settings->autoRefresh->getValue();
 * $settings->metric->getValue();
 *
 */
class Settings extends \Piwik\Plugin\Settings
{
    /**
     * @var SystemSetting
     */
    public $enableEditor;

    /**
     * @var SystemSetting
     */
    public $editorTheme;

    /**
     * @var SystemSetting
     */
    public $defaultCssStyles;

    /**
     * @var SystemSetting
     */
    public $defaultCssFile;

    protected function init()
    {
        $this->setIntroduction('Custom OptOut');

        $this->createEnableEditorSetting();
        $this->createThemeSetting();
        $this->createDefaultCssStylesSetting();
        $this->createDefaultCssFileSetting();
    }

    private function createEnableEditorSetting()
    {

        $this->enableEditor = new SystemSetting(
            'enableEditor',
            Piwik::translate('CustomOptOut_ShowEditorOptionName')
        );

        $this->enableEditor->type = static::TYPE_BOOL;
        $this->enableEditor->uiControlType = static::CONTROL_CHECKBOX;
        $this->enableEditor->description = Piwik::translate('CustomOptOut_ShowEditorDescription');
        $this->enableEditor->defaultValue = true;

        $this->addSetting($this->enableEditor);

    }

    private function createThemeSetting()
    {

        $this->editorTheme = new SystemSetting(
            'editorTheme',
            Piwik::translate('CustomOptOut_EditorThemeOptionName')
        );

        $this->editorTheme->type = static::TYPE_STRING;
        $this->editorTheme->uiControlType = static::CONTROL_SINGLE_SELECT;
        $this->editorTheme->description = Piwik::translate('CustomOptOut_EditorThemeDescription');
        $this->editorTheme->defaultValue = 'default';
        $this->editorTheme->availableValues = array(
            'default' => 'Bright Theme',
            'blackboard' => 'Dark Theme',
        );

        $this->addSetting($this->editorTheme);

    }

    private function createDefaultCssStylesSetting()
    {

        $this->defaultCssStyles = new SystemSetting(
            'defaultCssStyles',
            Piwik::translate('CustomOptOut_DefaultCssStyles')
        );

        $this->defaultCssStyles->type = static::TYPE_STRING;
        $this->defaultCssStyles->uiControlType = static::CONTROL_TEXTAREA;
        $this->defaultCssStyles->description = Piwik::translate('CustomOptOut_DefaultCssStylesDescription');
        $this->defaultCssStyles->defaultValue = 'body { font-family: Arial; }';
        $this->defaultCssStyles->readableByCurrentUser = true;

        $this->addSetting($this->defaultCssStyles);

    }

    private function createDefaultCssFileSetting()
    {

        $this->defaultCssFile = new SystemSetting(
            'defaultCssFile',
            Piwik::translate('CustomOptOut_DefaultCssFile')
        );

        $this->defaultCssFile->type = static::TYPE_STRING;
        $this->defaultCssFile->uiControlType = static::CONTROL_TEXT;
        $this->defaultCssFile->description = Piwik::translate('CustomOptOut_DefaultCssFileDescription');
        $this->defaultCssFile->defaultValue = null;
        $this->defaultCssFile->readableByCurrentUser = true;

        $this->addSetting($this->defaultCssFile);

    }
}
