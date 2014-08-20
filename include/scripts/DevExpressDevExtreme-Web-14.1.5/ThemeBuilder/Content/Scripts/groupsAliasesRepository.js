(function(ThemeBuilder) {

    var GroupsAliasesRepository = function() {
        this._aliases = {
            "base":                 { name: "Base", ord: 1 },
            "base.common":          { name: "Common", ord: 11 },
            "base.widgetstates":    { name: "Widget States", ord: 12 },
            "base.typography":      { name: "Typography", ord: 13 },

            "editors":              { name: "Editors", ord: 20 },
            "editors.texteditors":  { name: "Text Editors", ord: 30 },
            "editors.radiogroup":   { name: "dxRadioGroup", ord: 40 },
            "editors.autocomplete": { name: "dxAutocomplete", ord: 50 },
            "editors.checkbox":     { name: "dxCheckBox", ord: 60 },
            "editors.lookup":       { name: "dxLookup", ord: 70 },
            "editors.switch":       { name: "dxSwitch", ord: 80 },
            "editors.calendar":     { name: "dxCalendar", ord: 90 },
            "editors.colorpicker":  { name: "dxColorPicker", ord: 100 },
            "editors.numberbox":    { name: "dxNumberBox", ord: 110 },
            "editors.selectbox":    { name: "dxSelectBox", ord: 120 },
             
            "buttons":              { name: "dxButton", ord: 130 },
            "buttons.default":      { name: "Default Type", ord: 140 },
            "buttons.normal":       { name: "Normal Type", ord: 141 },
            "buttons.success":      { name: "Success Type", ord: 150 },
            "buttons.danger":       { name: "Danger Type", ord: 160 },
            
            "overlays":             { name: "Overlays", ord: 170 },
            "overlays.common":      { name: "Common", ord: 180 },
            "overlays.tooltip":     { name: "dxTooltip", ord: 190 },
            "overlays.toasts":      { name: "dxToast", ord: 200 },
            "overlays.actionsheet": { name: "dxActionSheet", ord: 210 },
            "overlays.dropdownmenu": { name: "dxDropDownMenu", ord: 211 },
            
            "gallery":              { name: "dxGallery", ord: 220 },
            "list":                 { name: "dxList", ord: 230 },
            
            "navigations":          { name: "Navigation", ord: 240 },
            "navigations.tabs":     { name: "dxTabs", ord: 250 },
            "navigations.navbar":   { name: "dxNavbar", ord: 260 },
            "navigations.toolbar":  { name: "dxToolbar", ord: 270 },
            "navigations.menu":     { name: "dxMenu", ord: 280 },
            
            "scrollview":           { name: "dxScrollView", ord: 290 },
            "sliders":              { name: "Sliders", ord: 300 },
            "tileview":             { name: "dxTileView", ord: 310 },
            "datagrid":             { name: "dxDataGrid", ord: 320 }
        };

        this.getAlias = function(group) {
            return this._aliases[group].name;
        };

        this.getOrd = function(group) {
            return this._aliases[group].ord;
        };
    };

    ThemeBuilder.GroupsAliasesRepository = GroupsAliasesRepository;

})(ThemeBuilder);
