(function() {
jQuery.loadScript = function (url, callback) {
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
$.loadScript("https://maps.googleapis.com/maps/api/js?key=" + $.mapKey + "&libraries=places");
})();
