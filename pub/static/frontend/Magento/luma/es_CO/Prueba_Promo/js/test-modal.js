define(["jquery", "jquery/jquery.cookie"], function ($) {
    "use strict";

    return function (config, element) {
        let options = {
            blockId: config.blockId,
            cookieName: "simplemodal" + config.blockId,
            popupInitTime: config.modalInitTime,
        };

        function hidePopup() {
            let ele = ".simplemodal." + options.blockId;
            $(ele).hide();
        }

        function showPopup() {
            let ele = ".simplemodal." + options.blockId;
            $(ele).show();
        }

        function createCookie(cookieName) {
            $.cookie(cookieName, "dontShow", { expires: 15, path: "/" });
        }

        function removeCookie(cookieName) {
            $.cookie(cookieName, "dontShow", { expires: -1, path: "/" });
        }

        function initModal() {
            let dontShowCookie = $.cookie(options.cookieName);
            if (!dontShowCookie) {
                $('.simplemodal.' + options.blockId + ' .close').on('click', hidePopup);
                $('#dontShow').change(function(){
                    if (this.checked) {
                        createCookie(options.cookieName);
                    } else {
                        removeCookie(options.cookieName);
                    }
                });
                setTimeout(showPopup, options.popupInitTime * 1000);
            }
        }

        initModal();
    };
});
