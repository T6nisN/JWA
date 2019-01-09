(function($) {
    "use strict";
    $('.navbar-collapse ul li a').click(function() {
        /* always close responsive nav after click */
        $('.navbar-toggle:visible').click();
    });

    $('#galleryModal').on('show.bs.modal', function (e) {
       $('#galleryImage').attr("src",$(e.relatedTarget).data("src"));
    });
		var userAdjectives = new Array;
    var friendAdjectives = new Array;
    var friendUsername;

    window.onload = function(){

      $("#myBtn").click(function(){
        console.log('Clicked');
        $("#myModal").modal();
      });

      var elements = document.getElementsByName ("adjective");
      var divAnswer = document.getElementById("WhatButton");
      var selectedElements = $('#WhatButton').find('input');
      console.log(selectedElements);
      var adjectivesLimit = 6;
          $('body').on('click', '#WhatButton div span', function(){
            var removeableAdjective = $(this).closest('div').find('input').val();
            console.log(removeableAdjective);
            $(this).closest('div').parentToAnimate($('.adjective-buttons'), 200);
            adjectivesLimit = adjectivesLimit + 1;
            $('#adjectivesLimit').html(adjectivesLimit);
            userAdjectives.remByVal(removeableAdjective);
            friendAdjectives.remByVal(removeableAdjective);
          });


          for (var i=0; i < elements.length; i++) {
              elements[i].onclick = function() {
                  if(!adjectivesLimit == 0){
                    $(this).closest('div').parentToAnimate($('#WhatButton'), 200);
                    userAdjectives.push(this.value);
                    friendAdjectives.push(this.value);
                    adjectivesLimit = adjectivesLimit - 1;
                    $('#adjectivesLimit').html(adjectivesLimit);
                    console.log(userAdjectives);
                  }else{
                      $('#notification').removeClass('success').addClass('error').addClass('active').html('You reached adjectives limit');
                      $('#notification').css('opacity', '1');
                      setTimeout(function () { $('#notification').css('opacity', '0').removeClass('error').removeClass('success').removeClass('active'); }, 5000);
                  }
              };
        }

        function SendFriendArrayToPHP() {
          var friend_data_str = friendAdjectives;
          var friend_data_username = document.getElementById("friendUsername").innerHTML;
          $.ajax({
                 type: 'post',
                 url: 'functions.php',
                 data: {
                          source2: friend_data_str,
                          friend: friend_data_username
                       },
                 success: function( a ) {
                   console.log( a.statusMessage );
                   $('#notification').addClass(a.status).addClass('active').html(a.statusMessage);
                   $('#notification').css('opacity', '1');
                   setTimeout(function () { $('#notification').css('opacity', '0').removeClass('error').removeClass('success').removeClass('active'); }, 5000);
                  }
                 });
      };
      function SendMyArrayToPHP() {
        var data_str = userAdjectives;
        $.ajax({
             type: 'post',
             url: 'functions.php',
             data: {
                      source1: data_str
                    },
             success: function( a ) {
               console.log( a.statusMessage );
               $('#notification').addClass(a.status).addClass('active').html(a.statusMessage);
               $('#notification').css('opacity', '1');
               setTimeout(function () { $('#notification').css('opacity', '0').removeClass('error').removeClass('success').removeClass('active'); }, 5000);
             }
           });
      };
      $('#myAdjectivesArray').on('click', function(){
        console.log('MyAdjectivesArray');
        if(!userAdjectives.length == 0){
          SendMyArrayToPHP();
        }else{
          $('#notification').addClass('error').addClass('active').html('Nothing to send, choose at least 6 adjectives');
          $('#notification').css('opacity', '1');
          setTimeout(function () { $('#notification').css('opacity', '0').removeClass('error').removeClass('success').removeClass('active'); }, 5000);
        }

      });
      $('#friendAdjectivesArray').on('click', function(){
        console.log('FriendAdjectivesArray');
        if(!friendAdjectives.length == 0){
          SendFriendArrayToPHP();
        }else{
          $('#notification').addClass('error').addClass('active').html('Nothing to send, choose at least 6 adjectives');
          $('#notification').css('opacity', '1');
          setTimeout(function () { $('#notification').css('opacity', '0').removeClass('error').removeClass('success').removeClass('active'); }, 5000);
        }
      });
    }

    jQuery.fn.extend({
        // Modified and Updated by MLM
        // Origin: Davy8 (http://stackoverflow.com/a/5212193/796832)
        parentToAnimate: function(newParent, duration) {
            duration = duration || 'slow';

            var $element = $(this);

            newParent = $(newParent); // Allow passing in either a JQuery object or selector
            var oldOffset = $element.offset();
            $(this).appendTo(newParent);
            var newOffset = $element.offset();

            var temp = $element.clone().appendTo('body');

            temp.css({
                'position': 'absolute',
                'left': oldOffset.left,
                'top': oldOffset.top,
                'zIndex': 1000
            });

            $element.hide();

            temp.animate({
                'top': newOffset.top,
                'left': newOffset.left
            }, duration, function() {
                $element.show();
                temp.remove();
            });
        }
    });
    Array.prototype.remByVal = function(val) {
        for (var i = 0; i < this.length; i++) {
            if (this[i] === val) {
                this.splice(i, 1);
                i--;
            }
        }
        return this;
    }

})(jQuery);
$(document).ready(function() {

});
