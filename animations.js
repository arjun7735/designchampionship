$(document).ready(function () {
  // Initialize ripple effect on .hero section
  try {
    $(".hero").ripples({
      resolution: 1024,
      dropRadius: 20,
      perturbance: 0.04,
    });
  } catch (e) {
    console.error("Ripples error:", e);
  }


  let isMobile = window.innerWidth <= 768;

  window.addEventListener("resize", function () {
    const nowMobile = window.innerWidth <= 768;

    if (nowMobile !== isMobile) {
      location.reload();
    }

    isMobile = nowMobile;
  });



  // Existing counter logic
  $(".counter").each(function () {
    var $this = $(this);
    $this.waypoint(
      function () {
        $this.prop("Counter", 0).animate(
          {
            Counter: $this.attr("data-count"),
          },
          {
            duration: 2000,
            easing: "swing",
            step: function (now) {
              $this.text(Math.ceil(now) + "+");
            },
          }
        );
        this.destroy(); // Run only once
      },
      {
        offset: "80%",
      }
    );
  });



  // Initialize Flickity
  let flkty = new Flickity(".Slider", {
    setGallerySize: false,
    pageDots: false,
    initialIndex: 8 // Start from the middle slide
  });

  // Get the Flickity instance with jQuery for method access
  let $carousel = $(".Slider").flickity();

  // Custom scroll handling to reduce scroll speed
  let allowScroll = true;
  const throttleDuration = 600; // Time in ms between scroll steps (increase this to make slower)
  const deltaThreshold = 3; // Increase this to make the scroll trigger less sensitive

  // Handle mouse wheel input
  $("body").on("mousewheel", function (event) {
    if (!allowScroll) return;

    // Only scroll if the wheel movement is large enough
    if (event.deltaY <= -deltaThreshold) {
      $carousel.flickity("previous");
    } else if (event.deltaY >= deltaThreshold) {
      $carousel.flickity("next");
    }

    // Throttle scroll events (this is the delay between scrolls)
    allowScroll = false;
    setTimeout(() => {
      allowScroll = true;
    }, throttleDuration);
  });

  // FlickityTransformer animations
  const transformer = new FlickityTransformer(flkty, [
    {
      name: "scale",
      stops: [
        [-300, 0.5],
        [0, 0.8],
        [300, 0.5]
      ]
    },
    {
      name: "translateY",
      stops: [
        [-1000, 500],
        [0, 0],
        [1000, 500]
      ]
    },
    {
      name: "rotate",
      stops: [
        [-300, -30],
        [0, 0],
        [300, 30]
      ]
    },
    {
      name: "perspective",
      stops: [
        [0, 600],
        [1, 600]
      ]
    },
    {
      name: "rotateY",
      stops: [
        [-300, 45],
        [0, 0],
        [300, -45]
      ]
    }
  ]);


  


});