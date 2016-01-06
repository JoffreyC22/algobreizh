$(document).ready(function () {
    /// height
    var heightItems = $('.items').height() - 9;
    $('#produit').attr('style', 'height:' + heightItems + 'px');
    //fancybox
    $('.fancybox-commande').fancybox({
        'type': 'iframe',
        'autoSize': false,
        'autoScale': false,
        'width': '90%',
        'height': '90%',
        'openEffect': 'elastic',
        'closeEffect': 'elastic',
        'openSpeed': '450',
        'closeSpeed': '450',
    });
    $('.fancybox-contact').fancybox({
        'type': 'iframe',
        'autoSize': false,
        'autoScale': false,
        'width': '90%',
        'height': '90%',
        'openEffect': 'elastic',
        'closeEffect': 'elastic',
        'openSpeed': '450',
        'closeSpeed': '450',
    });
    $('.fancybox-facture').fancybox({
        'type': 'iframe',
        'autoSize': false,
        'autoScale': false,
        'width': '90%',
        'height': '90%',
        'openEffect': 'elastic',
        'closeEffect': 'elastic',
        'openSpeed': '450',
        'closeSpeed': '450',
    });
    $('.fancybox-panier').fancybox({
        'type': 'iframe',
        'autoSize': false,
        'autoScale': false,
        'width': '90%',
        'height': '90%',
        'openEffect': 'elastic',
        'closeEffect': 'elastic',
        'openSpeed': '450',
        'closeSpeed': '450',
    });
    $('.fancybox-produit').fancybox({
        'type': 'iframe',
        'autoSize': false,
        'autoScale': false,
        'width': '90%',
        'height': '90%',
        'openEffect': 'elastic',
        'closeEffect': 'elastic',
        'openSpeed': '450',
        'closeSpeed': '450',
    });
});