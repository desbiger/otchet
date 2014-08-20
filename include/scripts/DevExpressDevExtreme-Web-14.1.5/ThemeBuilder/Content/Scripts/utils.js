(function(ThemeBuilder) {
    ThemeBuilder.Utils = {
        makeArrayOfDeferreds: function(count) {
            var result = [];
            for(var i = 0; i < count; i++)
                result.push($.Deferred());

            return result;
        },
        getObjectSize: function(obj) {
            var size = 0,
                key;

            for(key in obj)
                if(obj.hasOwnProperty(key))
                    size++;

            return size;
        }
    };
})(ThemeBuilder);