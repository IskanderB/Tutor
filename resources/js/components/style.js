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
