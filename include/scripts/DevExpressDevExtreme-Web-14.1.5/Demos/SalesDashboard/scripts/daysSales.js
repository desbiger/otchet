SalesDashboard.daysSalesModel = function () {
    var self = this;

    var gridCustomOptions = {
        allowColumnReordering: true,
        groupPanel: { visible: true },
        columns: [
           {
               dataField: "Product",
               groupIndex: 0
           },
           {
               dataField: "Region",
               selectedFilterOperation: 'startswith'
           },
           {
               dataField: "Sector",
               selectedFilterOperation: 'startswith'
           },
           {
               dataField: "Channel",
               width: 90,
               selectedFilterOperation: 'startswith'
           },
           {
               dataField: "Dynamics",
               width: 175,
               allowFiltering: false,
               allowSorting: false,
               allowGrouping: false,
               cellTemplate: function (container, options) {
                   var data = options.data,
                       options = {
                           dataSource: data.Dynamics,
                           argumentField: "SaleDate",
                           valueField: "Sales",
                           type: "line",
                           lineColor: "#DB2E3E",
                           tooltip: false,
                           showMinMax: false,
                           showFirstLast: false,
                           size: {
                               width: 160,
                               height: 20
                           }
                       };
                   container.dxSparkline(options);
               }
           },
           {
               dataField: "Units",
               width: 70,
               filterOperations: ['<', '>', '='],
               selectedFilterOperation: '>',
               alignment: "right"
           },
           {
               dataField: "Amount",
               width: 90,
               dataType: 'number',
               filterOperations: ['<', '>', '='],
               selectedFilterOperation: '>',
               filterText: '10000',
               sortOrder: 'desc',
               alignment: "right",
               format: "currency"
           }],
        showRowLines: false
    }

    self.init = function() {
        var grid,
            range,
            category = "daysSales";

        range = SalesDashboard.initRangeSelector();
        range.selectionChanged.add(function(e) {
            grid.load({
                startDate: Globalize.format(e.startValue, "yyyy-MM-dd"),
                endDate: Globalize.format(e.endValue, "yyyy-MM-dd")
            }, category);
        });
        range.load(0);

        grid = SalesDashboard.initGrid(gridCustomOptions);
    }
}

SalesDashboard.currentModel = new SalesDashboard.daysSalesModel();
SalesDashboard.currentModel.init();
