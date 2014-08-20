(function(ThemeBuilder) {

    ThemeBuilder.PreviewDataLoader = function(){
        var utils = ThemeBuilder.Utils;

        var getGroups = function(groupedMetadata) {
            var result = [];
            $.each(groupedMetadata, function(theme, groups) {
                $.each(groups, function(name) {
                    if($.inArray(name, result) < 0)
                        result.push(name);
                });
            });

            return result;
        };

        this.load = function(groupedMetadata) {
            var groups = getGroups(groupedMetadata),
                countOfPreviewDeferreds = groups.length,
                previewDataDeferreds = utils.makeArrayOfDeferreds(countOfPreviewDeferreds),
                d = $.Deferred();

            for(var i = 0; i < countOfPreviewDeferreds; i++) {
                previewDataDeferreds[i].resolve(ThemeBuilder["__" + groups[i].replace(".", "_") + "_group"]());
                /*(function(i) {
                    $.getJSON("Content/Data/" + groups[i] + ".group.json", function(data) {
                        previewDataDeferreds[i].resolve(data);
                    }).fail(function(deferredObj, type, err) {
                        throw new Error("Loading of " + groups[i] + '.group.json' + " failed. " + type + ": " + err.message);
                    });
                })(i);*/
            }

            $.when.apply(null, previewDataDeferreds).done(function() {
                d.resolve($.extend(true, [], arguments));
            });

            return d.promise();
        };
    };

})(ThemeBuilder);