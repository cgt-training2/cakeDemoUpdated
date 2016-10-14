var selector = '.navbar-nav > li > a';

// $this->Js->get('selector');

$(selector).on('click', function(){

    $(selector).removeClass('active');
    $(selector).addClass('active');

});