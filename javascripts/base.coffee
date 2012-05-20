$ ->
  setupRosterPage() if $('body').attr('id') is 'roster'
  setupHomePage() if $('body').attr('id') is 'home'
  setupEventPage() if $('body').attr('id') is 'events'
  
  $('#mailchimp').submit () ->
    email = $('input[type=email]').val()
    last_name = email.split('@')[0]
    $.ajax
      url: '/includes/functions.php'
      type: 'POST'
      dataType: 'json'
      data: "email=#{email}&last_name=#{last_name}"
      success: (response) ->
        console.log response
      error: (response) ->
        console.log response
        console.log 'fail'
    false
  
  
setupRosterPage = () ->
  $('ul#players li').hide()
  $('ul#players li:first').show()
  $('ul#players li:first').addClass 'current'
  
  $('a[data-roster]').click (e) ->
    $current = $('li.current')
    target = $(e.target).data('roster')
    $target = $("li##{target}")
    $current.fadeOut 'fast', () ->
      $current.removeClass 'current'
      $target.fadeIn 'fast'
      $target.addClass 'current'
    false


setupHomePage = () ->
  $('#fb-wall').fbWall
    id: 'Sparkmasterflex'
    accessToken: 'AAAC7gAoWDQ0BAIOpdjjmOsgPEj7hrCAhPSMDoqRj4gvH0hisICOZBxB2wqzP8eMo7Gzl6zQYSf1LmKzR4CV2cFc4sgpgZD'
    showGuestEntries: true
    showComments: true
    max: 4
    timeConversion: 24

setupEventPage = () ->
  $('form#join-us').submit () ->
    form_data = $(this).serialize()
    $.ajax
      url: '/includes/functions.php'
      method: 'POST'
      data: form_data
      success: (response) ->
        console.log response
    false
