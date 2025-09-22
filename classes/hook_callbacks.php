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

namespace local_confetti;

use core\session\utility\cookie_helper;
use html_writer;

/**
 * Allows plugins to add any elements to the footer.
 *
 * @package    local_confetti
 * @copyright  2025 Matthias Opitz <m.opitz@ucl.ac.uk> with help of ChatGPT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hook_callbacks {
    /**s
     * Callback to add head elements.
     *
     * @param \core\hook\output\before_standard_head_html_generation $hook
     */
    public static function before_standard_head_html_generation(
        \core\hook\output\before_standard_head_html_generation $hook,
    ): void {
        global $CFG, $PAGE;
        $classes = get_config('local_confetti', 'classes');
        if (empty($classes)) {
            return;
        }

        $classlist = array_map('trim', explode(',', $classes));
        $PAGE->requires->js_call_amd('local_confetti/confetti', 'init', [$classlist]);
    }

}
