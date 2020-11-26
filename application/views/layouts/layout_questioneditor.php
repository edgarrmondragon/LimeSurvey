<?php

Yii::import('application.helpers.common_helper', true);
Yii::import('application.helpers.globalsettings_helper', true);

$aData = App()->getController()->aData;

$layoutHelper = new LayoutHelper();

//All paths relative from /application/views

$layoutHelper->showHeaders($aData, false);

$layoutHelper->showadminmenu($aData);

echo "<!-- BEGIN LAYOUT_INSURVEY -->";
// Needed to evaluate EM expressions in question summary
// See bug #11845
LimeExpressionManager::StartProcessingPage(false, true);
$aData['debug'] = $aData;
//$this->_titlebar($aData);
$layoutHelper->rendertitlebar($aData);

//The load indicator for pjax
echo ' <div id="pjax-file-load-container" class="ls-flex-row col-12"><div style="height:2px;width:0px;"></div></div>';

// echo "<pre>".print_r($aData, true)."</pre>";

//The container to hold the vuejs application
echo ' <!-- Survey page, started in Survey_Common_Action::render_wrapped_template() -->
        <div id="vue-apps-main-container" '
    . 'class="ls-flex-row align-items-flex-begin align-content-flex-end col-12" '
    . '>';

$layoutHelper->renderSurveySidemenu($aData);

// TODO: For sake of pjax, we still need this, but hidden.
/*
<div id="vue-topbar-container" class="container-fluid vue-general-topbar" style="width: 100%; padding: 0; margin: 0;">
    <topbar
        initialsid='<?= $aData['sid']; ?>'
        initialtype='<?= 'hide'; ?>'
    />
</div>
 */

echo '<div '
    . 'class="ls-flex-column align-items-flex-start align-content-flex-start col-11 ls-flex-item transition-animate-width main-content-container" '
    . '>';
if (!isset($aData['renderSpecificTopbar'])) {
    $layoutHelper->renderGeneraltopbar($aData);
}

echo '<div id="pjax-content" class="col-12">';

echo '<div id="in_survey_common" '
    . 'class="container-fluid ls-flex-column fill col-12"'
    . '>';

//Rendered through /admin/update/_update_notification
$layoutHelper->updatenotification();
$layoutHelper->notifications();

echo $content;

//$this->_generaltopbarAdditions($aData);
if (!isset($aData['renderSpecificTopbar'])) {
    $layoutHelper->renderGeneralTopbarAdditions($aData);
}
echo "</div>\n";
echo "</div>\n";
echo "</div>\n";
echo "</div>\n";
echo "<!-- END LAYOUT_INSURVEY -->";

// Footer
if (!isset($aData['display']['endscripts']) || $aData['display']['endscripts'] !== false) {
    //Yii::app()->getController()->_loadEndScripts();
    $layoutHelper->loadEndScripts();
}

if (!Yii::app()->user->isGuest) {
    if (!isset($aData['display']['footer']) || $aData['display']['footer'] !== false) {
        //Yii::app()->getController()->_getAdminFooter('http://manual.limesurvey.org', gT('LimeSurvey online manual'));
        $layoutHelper->getAdminFooter('http://manual.limesurvey.org');
    }
} else {
    echo '</body>
    </html>';
}
