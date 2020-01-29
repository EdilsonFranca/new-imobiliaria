$(document).ready(function() { 
    let campos = document.querySelectorAll(".validate");
    campos.forEach(c => {
      let div = c.parentElement;
      let label = div.children[1];
      if (c.value.length > 0) {
          label.style.top = "-15px",
          label.style.fontSize = "12px",
          label.style.color = "orange";
      }
    });
  });

  $(".validate").on("focus", function(event) {
    const div = $(this).parent(".input-field");
    const label = div.children("label");
    label.css("top", "-15px"),
    label.css("font-size", "12px"),
    label.css("color", "orange");
  })

  $(".validate").on("blur", function(event) {
    const div = $(this).parent(".input-field");
    const label = div.children("label");
      if ($(this).val().length == 0) {
        label.css("top", "12px"),
        label.css("font-size", "15px"),
        label.css("color", "#9e9e9e");
      }
   });