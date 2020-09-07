(function ($) {
  console.log('JS attacted');

  $('#check-data-button').click(function(e){
      e.preventDefault();
      console.log('Data checking');
      return false;
  });

})(jQuery);
