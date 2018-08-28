define([
    'jquery',
    'uiComponent',
    'mage/cookies'
], function($, Component) {
    'use strict';

    return Component.extend({
        defaults: {
            tracks: {
                data: true,
                isLoading: true
            }
        },

        fields: [
            {id: 'id', label: 'Id', sort: 'id'},
            {id: 'name', label: 'Name', sort: 'name'},
            {id: 'status_name', label: 'Status Name', sort: 'status_id'},
            {id: 'description', label: 'Description', sort: 'description'},
            {id: 'assigned_to', label: 'Assigned Person', sort: 'assigned_to'},
            {id: 'start_time', label: 'Start Time', sort: 'start_time'},
            {id: 'end_time', label: 'End Time', sort: 'end_time'},
            {id: 'actions', label: 'Actions', sort: ''}
        ],

        /**
         * @param order
         * @param direction
         */
        setOrder: function(order, direction) {
            this.reloadData({
                order: order,
                direction: direction
            });
        },

        /**
         * @param id
         */
        removeAction: function(id) {
            var self = this,
                params = {
                    id: id,
                    form_key: $.mage.cookies.get('form_key')
                };

            this.isLoading = true;
            $.get(this.removeActionUrl, params, function() {
                self.reloadData({});
            });
        },

        /**
         * Reload model data via ajax request
         *
         * @param params
         */
        reloadData: function(params) {
            var self = this;
            params.form_key = $.mage.cookies.get('form_key');

            this.isLoading = true;
            $.get('', params, function(response) {
                self.data = response;
                self.isLoading = false;
            }, 'json');
        }
    });
});
