(function() {
  var setupEventPage, setupHomePage, setupRosterPage;

  $(function() {
    if ($('body').attr('id') === 'roster') setupRosterPage();
    if ($('body').attr('id') === 'home') setupHomePage();
    if ($('body').attr('id') === 'events') setupEventPage();
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

  setupHomePage = function() {
    return $('#fb-wall').fbWall({
      id: 'Sparkmasterflex',
      accessToken: 'AAAC7gAoWDQ0BAIOpdjjmOsgPEj7hrCAhPSMDoqRj4gvH0hisICOZBxB2wqzP8eMo7Gzl6zQYSf1LmKzR4CV2cFc4sgpgZD',
      showGuestEntries: true,
      showComments: true,
      max: 4,
      timeConversion: 24
    });
  };

  setupEventPage = function() {
    return $('form#join-us').submit(function() {
      var form_data;
      form_data = $(this).serialize();
      $.ajax({
        url: '/includes/functions.php',
        method: 'POST',
        data: form_data,
        success: function(response) {
          return console.log(response);
        }
      });
      return false;
    });
  };

}).call(this);
