<?php
defined('MOODLE_INTERNAL') || die();

return [
    [
        'hook' => core\hook\output\before_standard_head_html_generation::class,
        'callback' => [local_confetti\hook\before_standard_head_html_generation::class, 'callback']
    ],
];
