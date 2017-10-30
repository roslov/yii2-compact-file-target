<?php
/**
 * @copyright 2017 Oleksandr Roslov
 */

namespace roslov\log;

/**
 * Ignores traces in FileTarget log.
 *
 * Even if `traceLevel` is set greater than 0, the trace data will not be written to a log file.
 * This is needed to have more clean logs on development environment.
 *
 * @author Oleksandr Roslov <tr@dupkiller.net>
 */
class CompactFileTarget extends \yii\log\FileTarget
{
    /**
     * @inheritdoc
     */
    public function formatMessage($message)
    {
        if (isset($message[4])) {
            $message[4] = [];
        }
        return parent::formatMessage($message);
    }
}
