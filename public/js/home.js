$(document).ready(function() {

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


  var animating = false;
  var cardsCounter = 0;
  var numOfCards = 3;
  var decisionVal = 80;
  var pullDeltaX = 0;
  var deg = 0;
  var $card, $cardReject, $cardLike;

  function pullChange() {
    animating = true;
    deg = pullDeltaX / 10;
    $card.css("transform", "translateX("+ pullDeltaX +"px) rotate("+ deg +"deg)");

    var opacity = pullDeltaX / 100;
    var rejectOpacity = (opacity >= 0) ? 0 : Math.abs(opacity);
    var likeOpacity = (opacity <= 0) ? 0 : opacity;
    $cardReject.css("opacity", rejectOpacity);
    $cardLike.css("opacity", likeOpacity);

    $('.botoesAction').css("opacity", 0)
  };

  function release() {

    if (pullDeltaX >= decisionVal) {
      $card.addClass("to-right");

      setTimeout(function() {
        $card.remove()
      }, 300)

      let user_id = $card.find('.like').data('user-id');
      let rota = $card.find('.like').data('rota-like')

      likeDislike(user_id, 'like', rota)
    } else if (pullDeltaX <= -decisionVal) {
      $card.addClass("to-left");

      setTimeout(function() {
        $card.remove()
      }, 300)

      let user_id = $card.find('.dislike').data('user-id');
      let rota = $card.find('.dislike').data('rota-like')
      likeDislike(user_id, null, rota)
    }

    if (Math.abs(pullDeltaX) >= decisionVal) {
      $card.addClass("inactive");

      setTimeout(function() {
        $card.addClass("below").removeClass("inactive to-left to-right");
        cardsCounter++;
        if (cardsCounter === numOfCards) {
          cardsCounter = 0;
          $(".demo__card").removeClass("below");
        }
      }, 300);
    }

    if (Math.abs(pullDeltaX) < decisionVal) {
      $card.addClass("reset");
    }

    setTimeout(function() {
      $card.attr("style", "").removeClass("reset")
        .find(".demo__card__choice").attr("style", "");

      pullDeltaX = 0;
      animating = false;
    }, 300);
  };

  $(document).on("mousedown touchstart", ".demo__card:not(.inactive)", function(e) {
    if (animating) return;

    $card = $(this);
    $cardReject = $(".demo__card__choice.m--reject", $card);
    $cardLike = $(".demo__card__choice.m--like", $card);
    var startX =  e.pageX || e.originalEvent.touches[0].pageX;

    $(document).on("mousemove touchmove", function(e) {
      var x = e.pageX || e.originalEvent.touches[0].pageX;
      pullDeltaX = (x - startX);
      if (!pullDeltaX) return;
      pullChange();
    });

    $(document).on("mouseup touchend", function() {
    $('.botoesAction').css("opacity", 1)

      $(document).off("mousemove touchmove mouseup touchend");
      if (!pullDeltaX) return; // prevents from rapid click events
      release();
    });
  });


  $('.like').on("click ontouchstart", function(e) {
    $(this).closest('.demo__card').find('.m--like').css('opacity', '1');
    pullDeltaX = 81
    release()
  })

  $(document).on("click ontouchstart", '.dislike', function(e) {
    console.log($(this).data('rota-like'))
    $(this).closest('.demo__card').find('.m--reject').css('opacity', '1');
    pullDeltaX = -81
    release()
  })

  function likeDislike(user_id, action, rota) { 
      $.ajax({
          type: 'POST',
          url: rota,
          data: {user_id: user_id, acao: action},
          success: function(match) {
            
            if(match) {
              $('#areaModal').abrirModal(match)
            }

          }
      })
  }



}); 


  