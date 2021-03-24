<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * The send expiry notifications task.
 *
 * @package   enrol_stripepayment
 * @author    Ryan Halferty - 3/23/2021
 */

namespace enrol_stripepayment\task;

defined('MOODLE_INTERNAL') || die();

/**
 * The send expiry notifications task.
 *
 * @package   enrol_stripepayment
 */
class send_expiry_notifications extends \core\task\scheduled_task {

    /**
     * Name for this task.
     *
     * @return string
     */
    public function get_name() {
        return get_string('sendexpirynotificationstask', 'enrol_stripepayment');
    }

    /**
     * Run task for sending expiry notifications.
     */
    public function execute() {
        $enrol = enrol_get_plugin('stripepayment');
        $trace = new \text_progress_trace();
        $enrol->send_expiry_notifications($trace);
    }

}
