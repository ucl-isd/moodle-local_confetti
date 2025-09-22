<?php
defined('MOODLE_INTERNAL') || die();

use local_confetti\hook\before_standard_head_html_generation;

function local_confetti_hook_callbacks(): array {
    return [
        before_standard_head_html_generation::class,
    ];
}
