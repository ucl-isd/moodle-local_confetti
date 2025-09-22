<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_confetti', get_string('pluginname', 'local_confetti'));

    $settings->add(new admin_setting_configtext(
        'local_confetti/classes',
        get_string('classes', 'local_confetti'),
        get_string('classes_desc', 'local_confetti'),
        'confetti' // Default value.
    ));

    $ADMIN->add('localplugins', $settings);
}
