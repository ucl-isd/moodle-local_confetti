<?php
namespace local_confetti\hook;

use core\hook\output\before_standard_head_html_generation as hook;

class before_standard_head_html_generation {
    /**
     * Hook callback to include our JS.
     *
     * @param hook $hook
     */
    public static function callback(hook $hook): void {
        global $PAGE;

        $classes = get_config('local_confetti', 'classes');
        if (empty($classes)) {
            return;
        }

        $classlist = array_map('trim', explode(',', $classes));
        $PAGE->requires->js_call_amd('local_confetti/confetti', 'init', [$classlist]);
    }
}
