(function(ThemeBuilder) {
    ThemeBuilder.CssTemplateLoader = function(){
        this.load = function(theme, colorScheme) {
            var d = $.Deferred(),
                themeName = (theme ? theme + "-" : "");

            window.cssTemplateLoadedCallback = function(css) {
                d.resolve(css);
            };

            $.ajax({
                url: "Content/Data/theme-builder-" + themeName + colorScheme + ".dxcss",
                dataType: "jsonp",
                crossDomain: true,
                jsonpCallback: "cssTemplateLoadedCallback"
            });

            /*$.ajax({
                url: "Content/Data/theme-builder-" + themeName + colorScheme + ".dxcss"
            }).done(function(css) {
                d.resolve(css);
            });*/

            return d.promise();
        };
    };
})(ThemeBuilder);