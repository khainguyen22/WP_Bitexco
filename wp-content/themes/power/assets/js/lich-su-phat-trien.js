jQuery(document).ready(function ($) {
    var current_section = $(".period.active");
  
    $(".period").on("click", function () {
      $(".period.active").removeClass("active");
      $(this).addClass("active");
      const section_active = $(this).attr("data-number");
      $(".period-grow.active").removeClass("active");
      $(".period-" + section_active).addClass("active");
      current_section = $(".period.active");
    });
  
    function historical_line() {
      var defaultOffsetTop = document.querySelector(
        ".period-grow.active .period-line"
      ).offsetTop;
      var distance = document.querySelector(
        ".period-grow.active .period-line"
      ).offsetHeight;
  
      $(window).on("scroll", function () {
        var scrollOffsetY = $(window).scrollTop() + 300;
        for (var iterator of $(".year")) {
          if (iterator.offsetTop + defaultOffsetTop <= scrollOffsetY) {
            iterator.classList.add("active");
          } else {
            iterator.classList.remove("active");
          }
        }
  
        var new_line = document.querySelector(".period-grow.active .new-line");
        if (new_line.offsetTop <= scrollOffsetY) {
          var new_line_height = $(window).scrollTop() - defaultOffsetTop + 300;
          new_line.style.height =
            new_line_height >= distance
              ? distance + "px"
              : new_line_height + "px";
        } else {
          new_line.classList.remove("yellow-line");
        }
      });
    }
  
    historical_line();
  
    window.on("resize", function () {
      historical_line();
    });
  
    // Prev Section
    $(".nav.prev").on("click", function () {
      const section_active = current_section.attr("data-number");
      console.log(section_active);
      if (section_active == 1) {
        return;
      }
      $(".period.active").removeClass("active");
      $(".period-grow.active").removeClass("active");
      $(".period-" + (section_active - 1)).addClass("active");
      current_section = $(".period-section .period-" + (section_active - 1));
      current_section.addClass("active");
    });
  
    // Next Section
    $(".nav.next").on("click", function () {
      const section_active = current_section.attr("data-number");
      if (section_active == 3) {
        return;
      }
      $(".period.active").removeClass("active");
      $(".period-grow.active").removeClass("active");
      $(".period-" + (parseInt(section_active) + 1)).addClass("active");
      current_section = $(
        ".period-section .period-" + (parseInt(section_active) + 1)
      );
      current_section.addClass("active");
    });
  });
  