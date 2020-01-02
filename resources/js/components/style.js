// $(document).ready(function() {


$(document).ready(function() {
  $('#menu_bar').click(function() {
    if($('#menu_header')[0].style.display == 'block')
    $('#menu_header')[0].style.display = 'none';
    else
    $('#menu_header')[0].style.display = 'block';
    // console.log($('#test')[0]);
  });
});

try{
var textarea = document.querySelector('textarea');

textarea.addEventListener('keyup', function(){
  if(this.scrollTop > 0){
    this.style.height = this.scrollHeight + "px";
  }
});
}
catch (e) {

}
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

// var container = this.$el.querySelector(".messages_box");
// container.scrollTop = container.scrollHeight;
//
// var messageDisplay = vueContent.$refs.messageDisplay;
// messageDisplay.scrollTop = messageDisplay.scrollHeight;
try{
  var container = document.querySelector(".messages_box");

  container.scrollTop = container.scrollHeight;
}
catch (e) {

}


// var scrollHeight = container.scrollHeight;
// container.scrollTop  = scrollHeight;

// $('#smile').click(function(){
//
//     var smiley = this.textContent;
//     $('#description').val($('#description').val()+smiley);
//     console.log($('#description').val());
// });

$('#upload_icon').click(function(){
    $('#upload').click();
});

// $('#upload_icon').click(function(){
//   $('.upload_wrap').css('display', 'block');
// });

$(document).ready(function() {
  $('.image_box').magnificPopup({
    delegate: 'a',
    type: 'image'
  });

});

try{
  var container2 = document.querySelector("#tasks_box");
  var scrollHeight2 = container2.scrollHeight;
  container2.scrollTop  = scrollHeight2;
}
catch (e) {

}

// $('.open_icon_down').click(function(event){
//     let parent = event.target.parentNode.querySelector('.task_box');
//     console.log(event.target.parentNode);
// });

//Open and close task-block

let down = document.getElementsByClassName("open_icon_down_js");
for (let i = 0; i < down.length; i++) {
  down[i].addEventListener("click", function() {
    let panel = this.parentNode;
    // let oo = panel.getElementsByClassName("task_text");
    // panel.style.display = 'none';

    if(this.parentNode.childNodes[4].childNodes.length > 1){
      panel.childNodes[4].childNodes[2].style.display = 'none';
      panel.childNodes[4].childNodes[4].style.display = 'block';
    }

    panel.childNodes[6].style.display = 'block';

    // panel.childNodes[8].style.display = 'none';
    panel.childNodes[8].childNodes[0].childNodes[0].style.display = 'none';
    // console.log(panel.childNodes);
    panel.childNodes[10].childNodes[0].childNodes[0].style.display = 'block';


  });
}


let up = document.getElementsByClassName("open_icon_up_js");
for (let i = 0; i < up.length; i++) {
  up[i].addEventListener("click", function() {
    let panel = this.parentNode;
    // let oo = panel.getElementsByClassName("task_text");
    // panel.style.display = 'none';
    if(this.parentNode.childNodes[4].childNodes.length > 1){
      panel.childNodes[4].childNodes[2].style.display = 'block';
      panel.childNodes[4].childNodes[4].style.display = 'none';
    }

    panel.childNodes[6].style.display = 'none';

    // panel.childNodes[8].style.display = 'none';
    panel.childNodes[8].childNodes[0].childNodes[0].style.display = 'block';
    panel.childNodes[10].childNodes[0].childNodes[0].style.display = 'none';

  });
}


$(document).ready(function() {
let edit = document.getElementsByClassName("edit_icon_task");
for (let j = 0; j < edit.length; j++) {
  edit[j].addEventListener("click", function() {
    // let panel = this.parentNode.parentNode.childNodes[0].childNodes[0].childNodes[1].childNodes[1].innerHTML;
    // // $('#name').val('Test');
    // console.log(panel);
    // console.log(this.parentNode.parentNode.childNodes[0].childNodes[1].childNodes[1].innerHTML);
    let content;
    if(this.parentNode.parentNode.childNodes[4].childNodes.length > 1){
      content = this.parentNode.parentNode.childNodes[4].childNodes[0].innerHTML + this.parentNode.parentNode.childNodes[4].childNodes[4].innerHTML;
      // console.log(content);
    }
    else {
      content = this.parentNode.parentNode.childNodes[4].childNodes[0].innerHTML;
    }

    // console.log(this.parentNode.parentNode.childNodes[0].childNodes[0].childNodes[2].childNodes[1].innerHTML);
    // $('#number').val(this.parentNode.parentNode.childNodes[0].childNodes[1].childNodes[1].innerHTML);
    $('#name').val(this.parentNode.parentNode.childNodes[0].childNodes[0].childNodes[0].innerHTML);
    $('#date').val(this.parentNode.parentNode.childNodes[2].childNodes[2].innerHTML);
    $('#content').val(content);
    $('#task_id').val(this.parentNode.parentNode.childNodes[0].childNodes[0].childNodes[2].childNodes[1].innerHTML);
    $('#check_change').click();
    document.getElementsByClassName("check_delet_wrap")[0].style.display = 'block';
  });
}
});

$(document).ready(function() {
let edit2 = document.getElementsByClassName("edit_icon_answer");
for (let j = 0; j < edit2.length; j++) {
  edit2[j].addEventListener("click", function() {
    // let panel = this.parentNode.parentNode.childNodes[0].childNodes[0].childNodes[1].childNodes[1].innerHTML;
    // // $('#name').val('Test');
    // console.log(panel);
    // console.log(this.parentNode.parentNode.childNodes[0].childNodes[1].childNodes[1].innerHTML);
    let content;
    if(this.parentNode.parentNode.childNodes[4].childNodes.length > 1){
      content = this.parentNode.parentNode.childNodes[4].childNodes[0].innerHTML + this.parentNode.parentNode.childNodes[4].childNodes[4].innerHTML;
      console.log(content);
    }
    else {
      content = this.parentNode.parentNode.childNodes[4].childNodes[0].innerHTML;
    }

    // console.log(this.parentNode.parentNode.childNodes[0].childNodes[0].childNodes[1].childNodes[1].innerHTML);
    $('#number').val(this.parentNode.parentNode.childNodes[0].childNodes[0].childNodes[1].childNodes[1].innerHTML);
    // $('#name').val(this.parentNode.parentNode.childNodes[0].childNodes[0].childNodes[0].innerHTML);
    // $('#date').val(this.parentNode.parentNode.childNodes[2].childNodes[2].innerHTML);
    $('#content').val(content);
    // $('#task_id').val(this.parentNode.parentNode.childNodes[0].childNodes[0].childNodes[1].childNodes[1].innerHTML);
    $('#check_change').click();
    document.getElementsByClassName("check_delet_wrap")[0].style.display = 'block';
  });
}
});

$(document).ready(function() {
  let btn = document.getElementsByClassName("li_all_users_box");
  for (let j = 0; j < btn.length; j++) {
    btn[j].addEventListener("click", function() {
      // console.log(this.childNodes[2]);
      if(this.childNodes[2].style.display == 'block')
      this.childNodes[2].style.display = 'none';
      else
      this.childNodes[2].style.display = 'block';
      // this.childNodes[0].style.display = 'block';
    });

    // btn[j].addEventListener("mouseover", function() {
    //   // console.log(this.childNodes[2]);
    //   this.childNodes[2].style.display = 'block';
    //   // this.childNodes[0].style.display = 'block';
    // });
    // btn[j].addEventListener("mouseout", function() {
    //   // console.log(this.childNodes[2]);
    //   this.childNodes[2].style.display = 'none';
    //   // this.childNodes[0].style.display = 'block';
    // });
  }
  // console.log(btn);
});

$(document).ready(function() {
  let check_btn = document.getElementsByClassName("check_btn");
  for (let j = 0; j < check_btn.length; j++) {
    check_btn[j].addEventListener("click", function() {
      // console.log(this.parentNode.childNodes[0].childNodes[1].childNodes[1].innerHTML);
      // this.childNodes[0].style.display = 'block';
      $('#task_form')[0].style.display = 'none';
      $('#comment_form')[0].style.display = 'block';
      $('#task_id_com').val(this.parentNode.childNodes[0].childNodes[1].childNodes[1].innerHTML);

    });

    // btn[j].addEventListener("mouseover", function() {
    //   // console.log(this.childNodes[2]);
    //   this.childNodes[2].style.display = 'block';
    //   // this.childNodes[0].style.display = 'block';
    // });
    // btn[j].addEventListener("mouseout", function() {
    //   // console.log(this.childNodes[2]);
    //   this.childNodes[2].style.display = 'none';
    //   // this.childNodes[0].style.display = 'block';
    // });
  }
  // console.log(btn);
});
