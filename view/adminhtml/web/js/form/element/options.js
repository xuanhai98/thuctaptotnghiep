define([
    'underscore',
    'uiRegistry',
    'Magento_Ui/js/form/element/select',
    'Magento_Ui/js/modal/modal'
], function (_, uiRegistry, select, modal) {
    'use strict';

    return select.extend({

        /**
         * On value change handler.
         *
         * @param {String} value
         */
        onUpdate: function (value) {
            console.log('Selected Value: ' + value);

            var field1 = uiRegistry.get('index = field2Depend1');
            if (field1.visibleValue == value) {
                field1.show();
            } else {
                field1.hide();
            }
            return this._super();
        },
    });
});