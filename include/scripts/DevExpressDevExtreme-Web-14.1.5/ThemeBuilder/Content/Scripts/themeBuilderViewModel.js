(function(ThemeBuilder) {

    var ViewModel = function(metadataRepository, historyChangesManager, previewIframeNotifier, cssBeautifier) {
        var exportedMetadata = ko.observableArray(),
            updatePreviewStyles = true,
            initialKeyValuePairs = [],
            defaultCustomColor = "gray",
            defaultCustomPaletteColor = "#606060",
            defaultWidgetGroup = ThemeBuilder.defaultWidgetGroup,
            metadataVersion = ThemeBuilder.metadataVersion,
            $previewIframe = $("#preview-panel-iframe");

        var loadPreviewIframe = function(metadata) {
            var that = this;
            $previewIframe.attr("src", "preview.html");
            var loaded = false;
            $previewIframe.on("load", function() {
                if(!loaded) {
                    previewIframeNotifier.notify($previewIframe, "load", {
                        metadata: metadata,
                        currentTheme: that.currentTheme(),
                        currentColorScheme: that.currentColorScheme(),
                        metadataRepositoryData: ThemeBuilder.metadataRepository.getData(),
                        group: ThemeBuilder.defaultWidgetGroup
                    });
                }
                loaded = true;
            });
        };

        var isThemeChanged = function() {
            var result = true;
            var previousTheme = getThemeById.call(this, this.themeId());
            if(this.currentTheme() === previousTheme.name && this.currentColorScheme() === previousTheme.colorScheme)
                result = false;
            return result;
        };

        var getExportedMetadataValueByKey = function(metadata, key) {
            var result = null;
            for(var i = 0, len = metadata.length; i < len; i++) {
                if(metadata[i].key === key) {
                    result = metadata[i].value;
                    break;
                }
            }

            return result;
        };

        var showFailureMessage = function(message) {
            DevExpress.ui.dialog.alert(message, "Theme Builder");
            this.showApplyButton(false);
        };

        var makeExportedMetadataString = function(metadata) {
            this.exportedMetadataAsString(null);
            if(metadata) {
                var items = "",
                    themeId = "\"themeId\": \"" + metadata.themeId + "\"",
                    hue = "\"hue\": \"" + metadata.hue + "\"",
                    highlightColor = "\"highlightColor\": \"" + metadata.highlightColor + "\"",
                    version = "\"version\": \"" + metadataVersion + "\"";

                if(metadata.items.length)
                    items = "\"items\": [" + metadata.items.join(",\n") + "]";

                this.exportedMetadataAsString("{" + [version, themeId, hue, highlightColor, items].join(",\n") + "}");
            }
        };

        var getLastTreeItemKey = function() {
            var lastItem = this.tree.slice(-1)[0];
            if(lastItem.data)
                return lastItem.data.slice(-1)[0].key;

            return lastItem.children.data.slice(-1)[0].key;
        };

        var _updatedData = [];
        var createDataItem = function(item) {
            _updatedData.push(item);
        };
        var updateTreeData = function(items, valueUpdateFunction, lastTreeItemKey) {
            var that = this;
            $.each(items, function(_, item) {
                if(item.data) {
                    for(var i = 0, len = item.data.length; i < len; i++) {
                        var updatedValue = valueUpdateFunction.call(that, item.data[i]);
                        if(item.data[i].key === lastTreeItemKey) {
                            updatePreviewStyles = true;
                            createDataItem({ key: item.data[i].key, value: updatedValue });
                            metadataRepository.updateData(_updatedData);
                            _updatedData = [];
                        }
                        item.data[i].value(new String(updatedValue));
                        createDataItem({ key: item.data[i].key, value: updatedValue });
                    }
                } else {
                    updateTreeData.call(that, item.children, valueUpdateFunction, lastTreeItemKey);
                }
            });
            this.tree = items;
        };
        
        var updateToolboxGroupsValues = function(valueUpdateFunction) {
            var tree = $.extend(true, [], this.tree),
                lastTreeItemKey = getLastTreeItemKey.call(this);
                
            updatePreviewStyles = false;
            updateTreeData.call(this, tree, valueUpdateFunction, lastTreeItemKey);
        };

        var updateUndoButtonActivity = function(historyItemsCount, indexOfActivHistoryItem) {
            var isButtonDisabled = false;

            if(!historyItemsCount || !indexOfActivHistoryItem) {
                isButtonDisabled = true;
            }

            this.isUndoButtonDisabled(isButtonDisabled);
        };

        var updateRedoButtonActivity = function(historyItemsCount, indexOfActivHistoryItem) {
            var isButtonDisabled = false;

            if(!historyItemsCount || indexOfActivHistoryItem === (historyItemsCount - 1)) {
                isButtonDisabled = true;
            }

            this.isRedoButtonDisabled(isButtonDisabled);
        };

        var makePair = function(data, stringifyData) {
            var result = [];
            for(var i = 0, len = data.length; i < len; i++) {
                var pair = { key: data[i].key, value: data[i].value() };
                if(stringifyData)
                    pair = JSON.stringify(pair);
                result.push(pair);
            }
            return result;
        };

        var convertMetadataToKeyValuePairs = function(stringifyData) {
            var result = [];
            $.each(this.tree || [], function(_, group) {
                if(group.data) {
                    result = result.concat(makePair(group.data, stringifyData));
                } else {
                    $.each(group.children, function(_, child) {
                        result = result.concat(makePair(child.data, stringifyData));
                    });
                }
            });

            return result;
        };

        var createHistoryChangesItem = function() {
            var result = {
                items: convertMetadataToKeyValuePairs.call(this),
                themeId: this.themeId()
            };

            this.historyChangesManager.addItem(result);

            var historyItemsCount = this.historyChangesManager.getItems().length,
                indexOfActivHistoryItem = this.historyChangesManager.getCurrentIndex();

            updateUndoButtonActivity.call(this, historyItemsCount, indexOfActivHistoryItem);
            updateRedoButtonActivity.call(this, historyItemsCount, indexOfActivHistoryItem);
        };

        var useNewMetadata = function(metadata) {
            this.updateThemeId(Number(metadata.themeId));
            updateToolboxGroupsValues.call(this, function(item) {
                return getExportedMetadataValueByKey(metadata.items, item.key);
            });
            this.baseCustomColor(metadata.hue);
            this.customPaletteColor(metadata.highlightColor);
        };

        var applyImportedMetadata = function() {
            var updatedMetadata = "",
                d = $.Deferred();
            try {
                updatedMetadata = JSON.parse(this.exportedMetadataAsString());
            } catch(e) {
                showFailureMessage.call(this, "Metadata has a wrong format");
                d.resolve();
            }
            
            if(!updatedMetadata) {
                showFailureMessage.call(this, "Metadata has a wrong format");
                d.resolve();
            }

            else {
                if(updatedMetadata.version !== metadataVersion) {
                    var that = this;
                    DevExpress.ui.dialog.confirm(
                        "Your version of metadata does not match the Theme Builder v" + metadataVersion + "<br />Do you want to continue?", "Theme Builder")
                        .done(function(dialogResult) {
                        if(dialogResult) {
                            useNewMetadata.call(that, updatedMetadata);
                            d.resolve();
                        } else {
                            that.metadataPopupVisible(false);
                            that.exportedMetadataAsString(null);
                        }
                    });
                } else {
                    useNewMetadata.call(this, updatedMetadata);
                    d.resolve();
                }
            }
            return d.promise();
        };

        var historyChangesHasItems = function() {
            var historyItems = this.historyChangesManager.getItems(),
                historyItemsCount = historyItems.length;

            if(!historyItemsCount)
                return false;

            return true;
        };

        var getThemeById = function(themeId) {
            return $.grep(this.themes, function(theme) {
                return theme.themeId === Number(themeId);
            })[0];
        };

        var updateMetadata = function(itemKey, itemValue, metadata) {
            $.each(metadata, function(_, group) {
                $.each(group, function(_, item) {
                    if(item.Key === itemKey) {
                        item.Value = itemValue;
                        return false;
                    }
                });
            });

            return metadata;
        };

        var refreshToolboxContent = function(value) {
            if(value > 2 & this.customPaletteVisible()) {
                this.customPaletteVisible(false);
                this.magicColorVisible(true);
            }
        };

        var historyChangesManagerNavigated = function(direction, oldThemeId) {
            
            this.loadMetadata(true);

            var historyItemsCount = this.historyChangesManager.getItems().length,
                indexOfCurrentHistoryItem = this.historyChangesManager.getCurrentIndex(),
                data = this.historyChangesManager.getCurrentItem().data;

            if(direction === "back" && !data.items.length)
                data.items = initialKeyValuePairs;

            if(oldThemeId !== this.themeId()) {
                this.currentWidgetGroup(defaultWidgetGroup);
                ThemeBuilder.navigationTreeManager.initTree(data.items, this.currentWidgetGroup());
                this.refreshWidgetsVisibility();
                activateFirstToolboxItem.call(this);
            }
            
            updateToolboxGroupsValues.call(this, function(item) {
                return getExportedMetadataValueByKey(data.items, item.key);
            });

            updateUndoButtonActivity.call(this, historyItemsCount, indexOfCurrentHistoryItem);
            updateRedoButtonActivity.call(this, historyItemsCount, indexOfCurrentHistoryItem);
        };

        var activateFirstToolboxItem = function() {
            $.each(this.tree, function(index, item) {
                item.opened(!index);
            });
        };

        var treeHasOpenedItem = function() {
            var result = false;
            $.each(this.tree, function(_, item) {
                if(item.opened()) {
                    result = true;
                    return false;
                }
            });
            return result;
        };
        
        this._inlineStylesUpdatedCallback = $.noop;
        this.historyChangesManager = historyChangesManager;
        this.themeId = ko.observable(1);
        this.currentTheme = ko.observable("generic");
        this.currentColorScheme = ko.observable("light");
        this.CSSPopupVisible = ko.observable(false);
        this.CSSContent = ko.observable();
        this.baseCustomColor = ko.observable(defaultCustomColor);
        this.customPaletteColor = ko.observable(defaultCustomPaletteColor);
        this.metadataPopupVisible = ko.observable(false);
        this.exportedMetadataAsString = ko.observable(null);
        this.showApplyButton = ko.observable(false);
        this.isUndoButtonDisabled = ko.observable(true);
        this.isRedoButtonDisabled = ko.observable(true);
        this.toolboxItems = ko.observableArray();
        this.currentWidgetGroup = ko.observable(defaultWidgetGroup);
        this.magicColorVisible = ko.observable(false);
        this.customPaletteVisible = ko.observable(true);
        this.widgetsVisible = ko.observable(false);
        this.isMobileTheme = ko.observable(false);
        
        var getDataByKey = function(data, key) {
            var result = null;
            $.each(data, function(_, item) {
                if(item.key === key) {
                    result = item;
                    return false;
                }
            });
            return result;
        };

        this.toolboxValueSubscribe = function(item, value) {
            var metadata = metadataRepository.getData({
                name: this.currentTheme(),
                colorScheme: this.currentColorScheme()
            });

            var currentWidgetGroup = this.currentWidgetGroup();
            
            $.each(metadata[currentWidgetGroup], function(index, metadataItem) {
                if(metadataItem.Key === item.Key) {
                    metadata[currentWidgetGroup][index].Value = value;
                    return false;
                }
            });
            
            if(updatePreviewStyles) {
                previewIframeNotifier.notify($previewIframe, "update", [metadata, this.currentTheme(), this.currentColorScheme(), currentWidgetGroup]);
            }
        };

        this.getTreeItemDataByKey = function(key) {
            var result = null, that = this;
            $.each(this.tree, function(index, item) {
                if(item.data) {
                    result = getDataByKey(item.data, key);
                    if(result)
                        return false;
                } else {
                    $.each(item.children, function(_, child) {
                        result = getDataByKey(child.data, key);
                        if(result)
                            return false;
                    });
                }
                if(result)
                    return false;
            });
            
            return result;
        };

        this.showMagicColor = function() {
            this.magicColorVisible(true);
            this.customPaletteVisible(false);
            this.widgetsVisible(false);
        };

        this.showCustomPalette = function() {
            this.magicColorVisible(false);
            this.customPaletteVisible(true);
            this.widgetsVisible(false);
        };

        this.showWidgets = function() {
            this.magicColorVisible(false);
            this.customPaletteVisible(false);
            this.widgetsVisible(true);
            if(!treeHasOpenedItem.call(this))
                activateFirstToolboxItem.call(this);
        };

        this.toolboxValueUpdated = function() {
            this._inlineStylesUpdatedCallback();
        };
        
        this.selectedTheme = ko.observable();

        this.currentThemeDisplayName = ko.computed(function() {
            var id = this.themeId();
            if(!this.themes) {
                return "Light";
            }
            this.selectedTheme(this.themes[id - 1]);
            return this.themes[id - 1].text;
        }, this);

        this.themesMenuVisible = ko.observable(false);
        this.showThemesMenu = function() {
            this.themesMenuVisible(true);
        };

        this.updateThemeIdFromMenu = function(value) {
            var that = this;
            return DevExpress.ui.dialog.confirm("Are you sure you want to change the base theme?", "Theme Builder").done(function(dialogResult) {
                if(dialogResult) {
                    that.updateThemeId(value.itemData.themeId);
                }
            });
        };

        this.updateThemeId = function(value) {
            var theme = getThemeById.call(this, value);
            this.currentTheme(theme.name);
            this.currentColorScheme(theme.colorScheme);
            this.currentWidgetGroup(defaultWidgetGroup);
            this.init(this.themes, true);
            refreshToolboxContent.call(this, value);
            activateFirstToolboxItem.call(this);
            this.refreshWidgetsVisibility();
            this.isMobileTheme($.inArray(theme.name, ["ios", "ios7", "android", "win8"]) > -1);
            this.themeId(value);
            createHistoryChangesItem.call(this);
        };

        this.loadMetadata = function(checkHistoryChanges) {
            var metadata = metadataRepository.getData({ name: this.currentTheme(), colorScheme: this.currentColorScheme() });
            if(checkHistoryChanges && historyChangesHasItems.call(this)) {
                var currentTheme = getThemeById.call(this, this.historyChangesManager.getCurrentItem().data.themeId);
                metadata = metadataRepository.getData({ name: currentTheme.name, colorScheme: currentTheme.colorScheme });
                $.each(this.historyChangesManager.getCurrentItem().data.items, function(index, item) {
                    updateMetadata(item.key, item.value, metadata);
                });
                this.themeId(currentTheme.themeId);
                this.isMobileTheme($.inArray(currentTheme.name, ["ios", "ios7", "android", "win8"]) > -1);
                this.currentTheme(currentTheme.name);
                this.currentColorScheme(currentTheme.colorScheme);
            }

            if(!historyChangesHasItems.call(this)) {
                initialKeyValuePairs = convertMetadataToKeyValuePairs.call(this);
                createHistoryChangesItem.call(this);
            }

            return metadata;
        };

        this.getCSS = function() {
            previewIframeNotifier.notify($previewIframe, "getCSS", metadataVersion);
        };

        this.cssLoaded = function(content) {
            this.CSSPopupVisible(true);
            this.CSSContent(cssBeautifier.beautify(content));
        };

        this.closeCSSPopup = function() {
            this.CSSPopupVisible(false);
        };

        this._applyCustomColor = function(e) {
            var customThemeCreator = new ThemeBuilder.CustomThemeCreator(e.value);
            updateToolboxGroupsValues.call(this, function (item) {
                return item.type === "color" ?
                    customThemeCreator.getColor(item.value()) :
                    item.value();
            });
            createHistoryChangesItem.call(this);
        };

        this._applyCustomPaletteColor = function(e) {
            var paletteColor = e.value;
            updateToolboxGroupsValues.call(this, function(item) {
                var result = item.value();
                if(item.paletteColorOpacity) {
                    var opacity = Number(item.paletteColorOpacity);
                    if(opacity === 1) {
                        result = paletteColor;
                    }
                    else {
                        var color = new DevExpress.Color(paletteColor);
                        result = "rgba(" + [color.r, color.g, color.b, opacity].join(",") + ")";
                    }
                }

                return result;
            });
            
            createHistoryChangesItem.call(this);
        };

        this.importMetadata = function() {
            var that = this;
            applyImportedMetadata.call(this).done(function() {
                createHistoryChangesItem.call(that);
                that.metadataPopupVisible(false);
                that.exportedMetadataAsString(null);
            });
        };

        this.exportMetadata = function() {
            var result = {
                items: convertMetadataToKeyValuePairs.call(this, true),
                themeId: this.themeId(),
                hue: this.baseCustomColor(),
                highlightColor: this.customPaletteColor()
            };
            this.metadataPopupVisible(true);
            this.showApplyButton(false);
            exportedMetadata(result);
            makeExportedMetadataString.call(this, result);
        };

        this.showMetadataPopup = function() {
            this.showApplyButton(true);
            this.metadataPopupVisible(true);
            exportedMetadata(null);
        };

        this.closeMetadataPopup = function() {
            this.metadataPopupVisible(false);
            this.exportedMetadataAsString(null);
        };

        this.tree = null;
        
        this.init = function(themes, doNotCheckLocalChanges) {
            doNotCheckLocalChanges = doNotCheckLocalChanges || false;
            var that = this;
            this.themes = themes;
            return metadataRepository.init(themes).done(function() {
                var historyItems = that.historyChangesManager.getItems(),
                    lastHistoryItem = null;
                if(historyItems.length && !doNotCheckLocalChanges)
                    lastHistoryItem = historyItems.slice(-1)[0].data.items;

                ThemeBuilder.navigationTreeManager.initTree(lastHistoryItem, that.currentWidgetGroup());
                var metadata = that.loadMetadata(!doNotCheckLocalChanges);
                loadPreviewIframe.call(that, metadata);
            });
        };
        
        this.refreshCurrentWidgetGroup = function() {
            var group = this.currentWidgetGroup();
            this.currentWidgetGroup("");
            this.currentWidgetGroup(group);
        };

        this.refreshWidgetsVisibility = function() {
            var widgetPanelVisible = this.widgetsVisible();
            this.widgetsVisible(!widgetPanelVisible);
            this.widgetsVisible(widgetPanelVisible);
        };

        this.refreshCustomPaletteVisibility = function() {
            var customPaletteVisible = this.customPaletteVisible();
            this.customPaletteVisible(!customPaletteVisible);
            this.customPaletteVisible(customPaletteVisible);
        };

        this.undo = function() {
            this.historyChangesManager.navigateToPreviousItem();
            historyChangesManagerNavigated.call(this, "back", this.themeId());
            this.refreshCurrentWidgetGroup();
        };

        this.redo = function() {
            this.historyChangesManager.navigateToNextItem();
            historyChangesManagerNavigated.call(this, "forward", this.themeId());
            this.refreshCurrentWidgetGroup();
        };
        
        this.setDefault = function() {
            var that = this;
            return DevExpress.ui.dialog.confirm("Are you sure you want to reset all changes?", "Theme Builder").done(function(dialogResult) {
                if(dialogResult) {
                    that.historyChangesManager.clearHistory();
                    that.updateThemeId(1);
                    historyChangesManagerNavigated.call(that, "back", that.themeId());
                    that.refreshWidgetsVisibility();
                    that.refreshCustomPaletteVisibility();
                    that.isUndoButtonDisabled(true);
                    that.isRedoButtonDisabled(true);
                }
            });
        };

        this.sortToolboxEditors = function(a, b) {
            var aOrd = Number(a.name.split(".")[0]),
                bOrd = Number(b.name.split(".")[0]);

            if(!aOrd || b.Ord)
                return 0;

            return aOrd < bOrd ? -1 : 1;
        };

        this.toolboxValueChangedAction = $.proxy(function() {
            createHistoryChangesItem.call(this);
        }, this);

        exportedMetadata.subscribe($.proxy(makeExportedMetadataString, this));

        this.currentTheme.subscribe(function(value) {
            if(value !== "generic")
                this.showMagicColor();
        }, this);

        var itemClick = function(item) {
            var metadata = metadataRepository.getData({
                name: this.currentTheme(),
                colorScheme: this.currentColorScheme()
            });
            this.currentWidgetGroup(item.key);
            previewIframeNotifier.notify($previewIframe, "update", [metadata, this.currentTheme(), this.currentColorScheme(), item.key, true]);
        };

        this.treeItemClick = function(item) {
            itemClick.call(this, item);
        };

        this.treeRootItemClick = function(item) {
            if(item.children.length)
                this.treeItemClick(item.children[0]);
            else
                itemClick.call(this, item);
        };

    };

    ThemeBuilder.ViewModel = ViewModel;

})(ThemeBuilder);