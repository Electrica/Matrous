<?php
/** @var modX $modx
 @var Matrous $matrous
 */

$matrous = $modx->getService('matrous', 'Matrous', MODX_CORE_PATH . 'components/matrous/model/', $scriptProperties);

switch ($modx->event->name) {

    case 'OnBeforeCommentSave':
        $comment = $_REQUEST['text'];

        $output = $matrous->filterText($comment);

        $modx->event->params['TicketComment']->set('text', $output);

        break;

}