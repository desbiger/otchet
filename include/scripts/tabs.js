$(function () {
    var tabContainers = $('div.tabs > div'); // получаем массив контейнеров

    tabContainers.hide();
    var tab_number = (tabContainers.parent().find('.custom-select').length > 0)
        ? tabContainers.parent().find('.custom-select').index()
        : 0;
    //tabContainers.filter(":eq("+tab_number+")").show();

    // далее обрабатывается клик по вкладке
    $('div.tabs ul.tabNavigation a').click(function (e) {
        tabContainers.hide(); // прячем все табы
        tabContainers.filter(this.hash).show(); // показываем содержимое текущего
        $('div.tabs ul.tabNavigation a').removeClass('selected'); // у всех убираем класс 'selected'
        $(this).addClass('selected'); // текушей вкладке добавляем класс 'selected'

	var $this = $(this),
	    tabEvent = $this.attr("data-trigger-event") || false,
	    runEventOnce = $this.attr("data-trigger-event-once") || false;

	if( tabEvent !== false) {
        $(window).trigger(tabEvent);
	    if (runEventOnce !== false) {
		    $this.removeAttr("data-trigger-event");
		    $this.removeAttr("data-trigger-event-once");
	    }
	}

    e.preventDefault();

    }).filter(':eq('+tab_number+')').click();

});