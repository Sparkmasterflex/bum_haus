$ ->
  setupRosterPage() if $('body').attr('id') is 'roster'
  
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

