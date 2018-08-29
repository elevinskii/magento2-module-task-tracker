define([
    'jquery',
    'uiComponent'
], function($, Component) {
    'use strict';

    return Component.extend({
        defaults: {
            tracks: {
                isLoading: true,
                messageText: true,
                isSuccessMessage: true
            }
        },

        /**
         * @param form
         */
        submitAction: function(form) {
            var self = this;

            if($(form).valid()) {
                this.isLoading = true;
                $.post($(form).attr('action'), $(form).serialize(), function(response) {
                    if(response.redirect.length > 0) {
                        window.location = response.redirect;
                    } else {
                        self.isLoading = false;
                        self.messageText = response.message;
                        self.isSuccessMessage = response.success;
                    }
                }, 'json');
            }
        }
    });
});
