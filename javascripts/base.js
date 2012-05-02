(function() {
  var setupRosterPage;

  $(function() {
    if ($('body').attr('id') === 'roster') setupRosterPage();
    return $('#mailchimp').submit(function() {
      var email, last_name;
      email = $('input[type=email]').val();
      last_name = email.split('@')[0];
      $.ajax({
        url: '/includes/functions.php',
        type: 'POST',
        dataType: 'json',
        data: "email=" + email + "&last_name=" + last_name,
        success: function(response) {
          return console.log(response);
        },
        error: function(response) {
          console.log(response);
          return console.log('fail');
        }
      });
      return false;
    });
  });

  setupRosterPage = function() {
    $('ul#players li').hide();
    $('ul#players li:first').show();
    $('ul#players li:first').addClass('current');
    return $('a[data-roster]').click(function(e) {
      var $current, $target, target;
      $current = $('li.current');
      target = $(e.target).data('roster');
      $target = $("li#" + target);
      $current.fadeOut('fast', function() {
        $current.removeClass('current');
        $target.fadeIn('fast');
        return $target.addClass('current');
      });
      return false;
    });
  };

}).call(this);
