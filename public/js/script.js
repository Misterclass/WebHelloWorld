function MobileHandle()
{
  $menuButton = $(".mobile-menu");
  $menu = $("ul.mobile-nav");
  $menuButton.on("click", function()
  {
    $menuButton.toggleClass("mobile-menu-active");

    if ($menuButton.hasClass("mobile-menu-active"))
    {
      $menu.css({
        display: "block"
      });
    }
    else
    {
      $menu.css({
        display: "none"
      });
    }
  })

}

$(document).ready(function()
{
  MobileHandle();
})
