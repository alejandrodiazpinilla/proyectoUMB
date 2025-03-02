var ldg = $('#loading');    
window.onload = function(){
    ldg.css('display','none');
};
// mostrar preload
function showPreload  (e) {
    ldg.find('> div > span').text('Por favor, espere...').end().show();
}
// ocultar preload
function hiddenPreload (e) {
    ldg.hide();
}