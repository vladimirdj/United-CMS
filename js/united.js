$(".dugme").on("click", function(){
  $(".klizac").toggleClass("aktivan")
  if ($(".klizac").hasClass("aktivan"))
    {
      $("body").addClass("non-margin")
    } else {
      $("body").removeClass("non-margin")
    }
})

$(".toggle").on("click", function() {
  $(".toggle").parent().toggleClass('active');
});
