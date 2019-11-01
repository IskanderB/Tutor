var textarea = document.querySelector('textarea');

textarea.addEventListener('keyup', function(){
  if(this.scrollTop > 0){
    this.style.height = this.scrollHeight + "px";
  }
});

jQuery(document).ready(function(){
  jQuery('.scrollbar-inner').scrollbar();
});

$(".messages_box").scrollTop($(".messages_box")[0].scrollHeight);

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
