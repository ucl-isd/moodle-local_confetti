// amd/src/confetti.js
define(['jquery', 'core/log'], function($, Log) {

    /**
     * Launch the confetti effect using canvas-confetti.
     */
    function launchConfetti() {
        if (!window.confetti) {
            var script = document.createElement('script');
            script.src = 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js';
            script.onload = function() {
                window.confetti({ particleCount: 100, spread: 70, origin: { y: 0.6 } });
            };
            document.head.appendChild(script);
        } else {
            window.confetti({ particleCount: 100, spread: 70, origin: { y: 0.6 } });
        }
    }
    /**
     * Initialise confetti click handlers.
     *
     * @param {string[]} classes List of CSS class names that should trigger confetti.
     */
    function init(classes) {
        if (!Array.isArray(classes)) {
            classes = [];
        }
        classes.forEach(function(cls) {
            $('.' + cls).on('click', function() {
                launchConfetti();
            });
        });
        Log.debug('Confetti initialised for classes: ' + classes.join(', '));
    }

    return {
        init: init
    };
});