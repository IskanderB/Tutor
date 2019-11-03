var textarea = document.querySelector('textarea');

textarea.addEventListener('keyup', function(){
  if(this.scrollTop > 0){
    this.style.height = this.scrollHeight + "px";
  }
});

// jQuery(document).ready(function(){
//   jQuery('.scrollbar-inner').scrollbar();
// });

// $(".messages_box").scrollTop($(".messages_box")[0].scrollHeight);

var hint = $('#hint');
$('div[data-hint]').on({
    mouseenter: function(){
        hint.text($(this).data('hint')).show();
    },
    mouseleave: function(){
        hint.hide();
    },
    mousemove: function(e){
        hint.css({top: e.pageY, left: e.pageX});
    }
});

// var container = this.$el.querySelector("#messages_box");
// container.scrollTop = container.scrollHeight;

// var messageDisplay = vueContent.$refs.messageDisplay;
// messageDisplay.scrollTop = messageDisplay.scrollHeight;

var container = document.querySelector(".messages_box");
var scrollHeight = container.scrollHeight;
container.scrollTop  = scrollHeight;

$('#smile').click(function(){

    var smiley = this.textContent;
    $('#description').val($('#description').val()+smiley);
    console.log($('#description').val());
});

// $('#smile').click(
// function(){var smiley = this.textContent;
//
// var cursorIndex = $('#description').attr("selectionStart");
// var lStr =  $('#description').val().substr(0,cursorIndex) + " " + smiley + " ";
// var rStr = $('#description').val().substr(cursorIndex);
//
// $('#description').val(lStr+rStr);
// $('#description').attr("selectionStart",lStr.length);
// });​
