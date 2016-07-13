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
 * The mod_hvp xapi statement event.
 *
 * @package    mod_hvp
 * @copyright  @copyright  2016 Joubel AS <contact@joubel.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_hvp\event;
defined('MOODLE_INTERNAL') || die();

/**
 * The mod_hvp xapi statement event class.
 *
 * @package    mod_hvp
 * @copyright  @copyright  2016 Joubel AS <contact@joubel.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hvp_xapi extends \core\event\base
{
    protected function init()
    {
        $this->data['crud'] = 'r';
        $this->data['edulevel'] = self::LEVEL_PARTICIPATING;
        $this->data['objecttable'] = 'hvp';
    }

    /*
    protected function validate_data() {
        $this->data['action'] .= '_' . $this->data['other']->data->statement->verb->display->{'en-US'};
    }
    */

    /**
     * Get URL related to the action.
     *
     * @return \moodle_url
     */
    public function get_url()
    {
        return new \moodle_url('/mod/hvp/view.php', array('id' => $this->contextinstanceid));
    }

    /**
     * Returns description of what happened.
     *
     * @return string
     */
    public function get_description()
    {
        $verb = $this->data['other']->data->statement->verb->display->{'en-US'};
        return "The user with id '$this->userid' triggered an xAPI '$verb' statement " .
        "on H5P activity with instance id '$this->objectid' ";
    }
}
