jQuery(function($) {
  $('.home-temp').openWeather({
    key: 'c9d49310f8023ee2617a7634de23c2aa',
    lat: 44.936180,
  	lng: -72.208008,
    units: 'f'
  });

  $('.search-toggle').click(function() {
    $(this).parent('.search-form').toggleClass('expanded');
  });
});

document.addEventListener(
"DOMContentLoaded", () => {
  const menu = mmlight( document.querySelector( "#main-menu" ) );
  menu.create( "(max-width: 999px)" );
  menu.init( "Selected" );

  document.querySelector( "a[href='#main-menu']" )
  .addEventListener( "click", ( evnt ) => {
    menu.open();
    evnt.preventDefault();
    evnt.stopPropagation();
  });
}
);
