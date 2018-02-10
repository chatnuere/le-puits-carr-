(function($) {
  jQuery.loadScript = function(url, callback) {
    jQuery.ajax({
      url: url,
      dataType: 'script',
      success: function() {
        $("body").trigger('googlemapapiloaded');
      },
      async: true
    });
  }
  jQuery.mapKey = "AIzaSyDpUUQbwNX5hWanrLinyiQsTbQgTQNdQlQ";
  jQuery.loadScript("https://maps.googleapis.com/maps/api/js?key=" + jQuery.mapKey + "&libraries=places");
})(jQuery);
