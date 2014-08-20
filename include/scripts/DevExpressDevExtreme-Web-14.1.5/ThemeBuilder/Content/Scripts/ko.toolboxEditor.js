(function() {

    var $editor;

    var getWidgetNameByContentType = function(type) {
        var widgetName = null;
        switch(type) {
            case "color": widgetName = "dxColorPicker"; break;
            case "text": widgetName = "dxTextBox"; break;
        }

        return widgetName;
    };

    ko.bindingHandlers.toolboxEditor = {
        init: function(element, valueAccessor, allBindings, viewModel, bindingContext) { 
            var values = valueAccessor(),
                widgetName = getWidgetNameByContentType(values.type),
                value = values.value,
                valueChangeAction = values.valueChangeAction;

            var widgetOptions = { value: value, valueChangeAction: valueChangeAction };

            if(values.type === "color")
                widgetOptions.editAlphaChannel = true;

            var $widgetNode = $("<div />");
            $(element).append($widgetNode);
            $widgetNode[widgetName](widgetOptions);
        },
        update: function(element, valueAccessor, allBindings, viewModel, bindingContext) { }
    };
})();