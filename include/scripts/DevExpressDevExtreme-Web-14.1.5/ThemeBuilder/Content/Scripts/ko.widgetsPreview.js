(function() {

    window.SHOW_ACTIONSHEET = function() {
        $(".dx-action-sheet").dxActionSheet("instance").show();
    };

    window.SHOW_DROPDOWN_MENU = function() {
        $(".dx-dropdownmenu").dxDropDownMenu("instance").option("visible", true);
    };

    window.SHOW_LOAD_PANEL = function() {
        $("#load-panel-sample").dxLoadPanel("instance").option("visible", true);
    };

    window.SHOW_DATE_PICKER = function() {
        $("#date-picker-sample").dxDatePicker("instance").option("visible", true);
    };

    window.SHOW_INFO_TOAST = function() {
        $("#info-toast-sample").dxToast("instance").show();
    };

    window.SHOW_WARNING_TOAST = function() {
        $("#warning-toast-sample").dxToast("instance").show();
    };

    window.SHOW_ERROR_TOAST = function() {
        $("#error-toast-sample").dxToast("instance").show();
    };

    window.SHOW_SUCCESS_TOAST = function() {
        $("#success-toast-sample").dxToast("instance").show();
    };

    window.SHOW_CUSTOM_TOAST = function() {
        $("#custom-toast-sample").dxToast("instance").show();
    };

    window.SHOW_POPUP = function() {
        $("#popup-sample .dx-popup-content").html("<p>The popup contents.</p>");
        $("#popup-sample").dxPopup("instance").option("visible", true);
    };

    window.SHOW_TOOLTIP = function() {
        $("#tooltip-sample .dx-popup-content").html("<p>The tooltip contents.</p>");
        $("#tooltip-sample").dxTooltip("instance").option("visible", true);
    };

    window.SHOW_CONFIRM_DIALOG = function() {
        DevExpress.ui.dialog.confirm("Are you sure?", "Confirm changes");
    };

    window.LOAD_SCROLLVIEW_CONTENT = function($widgetNode, options) {
        $widgetNode.append("<p>Chuck ex ea, aliqua ball tip tail hamburger ham.  Tri-tip cow nulla jerky, exercitation aute commodo ut adipisicing officia flank brisket non prosciutto rump.  Eu fugiat sint, incididunt consectetur velit turducken sausage boudin consequat hamburger corned beef ham hock shoulder.  Biltong frankfurter enim, shankle pork loin ex dolor venison pastrami ground round tenderloin cillum chuck magna.  Doner capicola cillum corned beef aliquip, et leberkas shoulder exercitation.  Nostrud ut reprehenderit drumstick labore kevin ball tip doner enim sint ea t-bone.  Pig velit enim, ball tip reprehenderit pork loin pork belly irure in do magna prosciutto et aute minim.</p>")
         .append("<p>T-bone est meatloaf magna sausage kielbasa non spare ribs veniam nostrud ad proident beef turducken cupidatat.  Quis ribeye sunt, eiusmod jowl ut pariatur irure meatloaf cupidatat hamburger.  T-bone pancetta pastrami eiusmod bresaola minim capicola quis pork loin beef ribs.  Dolore salami bacon nostrud ad bresaola eu, ullamco id chuck anim mollit pork belly.  Meatball flank short loin, ball tip laborum cow porchetta sirloin non ullamco ex swine tempor.</p>")
        .append("<p>Magna drumstick boudin exercitation.  Deserunt dolore doner pork loin meatloaf sausage.  Venison cupidatat quis nisi pork tail chuck.  Ribeye duis bacon commodo eu salami, deserunt occaecat.  Beef consequat fatback landjaeger turkey, minim venison salami andouille adipisicing cow nisi doner shank.</p><p>Tail qui fatback excepteur magna pork chop kielbasa laboris duis labore tongue shank pork belly reprehenderit.  Occaecat chuck ad deserunt.  Flank jerky ad veniam, est pastrami cow doner cupidatat in dolor sausage.  Consectetur sirloin swine, voluptate anim mollit tongue boudin quis.  Sed beef ribs velit rump pariatur fatback duis cupidatat, in leberkas culpa occaecat pork belly cillum pork chop.  Boudin ground round capicola, tongue excepteur esse ad nulla.  Nostrud elit excepteur incididunt id turkey, jerky pastrami eiusmod.</p>")
        .append("<p>Fugiat pork belly pastrami ullamco enim cow kevin nulla voluptate in tempor prosciutto qui.  Shoulder sed officia shankle consequat.  Pork belly aute eu beef ribs nulla.  Labore consequat voluptate pig, turducken proident nisi rump et tail non in.  Frankfurter fugiat cow esse.  Aliqua adipisicing occaecat in deserunt, pig tri-tip ullamco irure.  Boudin in cow, nisi fugiat beef biltong pariatur sunt jerky anim.</p>")
        .append("<p>Sirloin pork est jerky.  Pork loin pork belly shank, beef ribs tail porchetta ribeye ground round filet mignon ut officia.  Id aliquip enim, leberkas chicken exercitation dolore sunt venison.  Magna ground round incididunt voluptate, t-bone sunt tempor pariatur ham boudin venison anim drumstick.  Jowl dolor kielbasa, eiusmod chuck pork belly t-bone ad boudin andouille ham hock shank.  Pork andouille chuck nulla drumstick magna.</p>")
        .append("<p>Anim quis strip steak turkey dolor ex occaecat leberkas culpa.  Nostrud ex occaecat strip steak sed.  Drumstick labore ham laborum.  Sirloin deserunt excepteur shoulder esse.</p>")
        .height(300);

        options.pullDownAction = $.noop;
    };

    window.SET_CALENDAR_VALUE = function($widgetNode, options) {
        options.value = new Date(2014, 5, 2);
    };

    window.LOAD_TYPOGRAPHY_CONTENT = function($widgetNode) {
        $widgetNode.append([
            $("<h1 />").text("h1 heading"),
            $("<h2 />").text("h2 heading"),
            $("<h3 />").text("h3 heading"),
            $("<h4 />").text("h4 heading"),
            $("<h5 />").text("h5 heading"),
            $("<h6 />").text("h6 heading"),
            $("<a />").text("Hyperlink").attr("href", "#").css("display", "block"),
            $("<div />").addClass("dx-field")
                .append([
                     $("<div />").addClass("dx-field-label").text("Fieldset label"),
                     $("<div />").addClass("dx-field-value").text("Fieldset value")
                ])
        ]);
    };

    var transformClickAction = function(clickActionAsString) {
        if(typeof clickActionAsString === "function")
            return clickActionAsString;

        if(clickActionAsString && !window[clickActionAsString])
            throw new Error(clickActionAsString + " is not defined");

        return window[clickActionAsString];
    };

    var invokePrerenderAction = function(prerenderAction, $widgetNode, options) {
        if(window[prerenderAction])
            window[prerenderAction]($widgetNode, options);
    };

    var renderWidgets = function(widgets, $element, useFieldset) {
        for(var i = 0, len = widgets.length; i < len; i++){
            var $widgetBox = $("<div />")
                .addClass("widget-box-" + i)
                .addClass(widgets[i].name.toLowerCase() + "-box")
                .appendTo($element);

            if(widgets[i].title) {
                if(useFieldset) {
                    $widgetBox.addClass("dx-field");
                    $("<div />").addClass("dx-field-label").text(widgets[i].title).appendTo($widgetBox);
                } else {
                    $("<h4 />")
                        .text(widgets[i].title)
                        .addClass("widget-title")
                        .appendTo($widgetBox);
                }
            }

            if($.isFunction($.fn[widgets[i].name])) {
                var $widgetNode = $("<div />");

                if(useFieldset)
                    $widgetNode.addClass("dx-field-value");

                if(widgets[i].id)
                    $widgetNode.attr("id", widgets[i].id);

                $widgetBox.append($widgetNode);

                if(widgets[i].options.clickAction)
                    widgets[i].options.clickAction = transformClickAction(widgets[i].options.clickAction);

                if(widgets[i].prerenderAction)
                    invokePrerenderAction(widgets[i].prerenderAction, $widgetNode, widgets[i].options);

                $widgetNode[widgets[i].name](widgets[i].options);
            }
            else {
                throw new Error("Unable to render widget: " + widgets[i].name);
            }
        }
    };

    ko.bindingHandlers.widgetsPreview = {
        init: function(element, valueAccessor, allBindings, viewModel, bindingContext) { },
        update: function(element, valueAccessor, allBindings, viewModel, bindingContext) {
            
            var values = valueAccessor(),
                widgetGroupName = values.data.name,
                widgets = values.data.widgets,
                useFieldset = values.data.useFieldset;

            if(!values.data.doNotRenderPageTitle)
                $(element).append($("<h2 />")
                    .addClass("widgets-group-header")
                    .text(ThemeBuilder.groupsAliasesRepository.getAlias(values.data.id)));

            $(element).addClass(values.data.id.toLowerCase().replace(/\s|\./g, "-") + "-group");

            if(useFieldset)
                $(element).addClass("dx-fieldset");

            renderWidgets(widgets, $(element), useFieldset);
        }
    };
})();