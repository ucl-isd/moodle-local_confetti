<?php
namespace local_confetti;

defined('MOODLE_INTERNAL') || die();

class hook {
    /**
     * Hook callback executed by Moodle.
     *
     * @param mixed $hookinstance hook object passed by core (no strict typehint here).
     */
    public static function callback($hookinstance): void {
        global $PAGE;
die('ugh...');
        // Read the comma-separated classes from admin setting.
        $classes = get_config('local_confetti', 'classes'); // e.g. "confetti,celebrate"
        if (empty($classes)) {
            return;
        }

        // Normalize into array of non-empty trimmed class names.
        $classlist = array_values(array_filter(array_map('trim', explode(',', $classes))));

        if (empty($classlist)) {
            return;
        }

        // Optional debug (only during development) - will show in PHP logs or dev console if logging to output.
        debugging('local_confetti hook called; classes: ' . implode(',', $classlist), DEBUG_DEVELOPER);

        // Pass the array to the AMD module.
        $PAGE->requires->js_call_amd('local_confetti/confetti', 'init', [$classlist]);
    }
}
