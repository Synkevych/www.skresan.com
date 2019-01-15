var Number_of_ice_cases = {
    'Crimea': 13.1,
    'Vinnitsa': 12.1,
    'Volyn_region': 8.6,
    'Dnipropetrovsk': 11.6,
    'Donetsk': 8.6,
    'Zhytomyr': 14.8,
    'Transcarpathian': 8.2,
    'Zaporozhye': 12.1,
    'Ivano-Frankivsk': 19.5,
    'Kievskaya': 16.3,
    'Kirovograd': 14.2,
    'Lugansk': 16.9,
    'Lviv': 15.4,
    'Nikolaev': 14.6,
    'Odessa': 16.7,
    'Poltava': 13.6,
    'Rivne': 24.2,
    'Sumy': 4.3,
    'Ternopil': 12.2,
    'Kharkiv': 9.8,
    'Kherson': 11.5,
    'Khmelnitsky': 10,
    'Cherkassy': 13,
    'Chernivtsi': 10.6,
    'Chernihiv': 7.63
 },
    shipping = {
        'Vinnitsa': 1,
        'Zhytomyr': 1,
        'Ivano-Frankivsk': 1,
        'Kievskaya': 1,
        'Volyn_region': 1,
        'Lviv': 1,
        'Rivne': 1,
        'Ternopil': 1,
        'Khmelnitsky': 1,
        'Chernivtsi': 1,

        'Zaporozhye': 20,
        'Kirovograd': 20,
        'Cherkassy': 20,

        'Dnipropetrovsk': 30,
        'Nikolaev': 30,
        'Odessa': 30,
        'Poltava': 30,
        'Sumy': 30,
        'Kharkiv': 30,
        'Kherson': 30,
        'Chernihiv': 30,

        'Donetsk': 1,
        'Transcarpathian': 1,
        'Lugansk': 1,
        'Crimea': 1
    }
$('#calculator_width').on("keyup ", function(){ //показує плошу в вікні площі з введених даних
    var val = parseInt($('#calculator_width').val()) * parseInt($('#calculator_length').val());
    if(val){
    $('#calculator_area').val(val+ ' м.кв');
    console.log(val);
    }
});

$('.calculate').click(function () {
    // По ідеї тут тре забрати всю інфу з інпутів для обрахунікв, порахувати і потім
    // сховати форми і показати результат з кнопокю замовлення
    var width = $('#calculator_width').val(); // ширина
    var length = $('#calculator_length').val(); // довжина
    var area = $('#calculator_area').val() > 1 ? $('#calculator_area').val() : (parseInt(width) * parseInt(length)); // площа
    var region = $('#calculator_region').val(); // регіон
    var type = $('#calculator_type').val(); //тип покриття
if(area){


    console.log('input information', width, length, area, region, type);


    var quantity = $('.calculator_result_quantity'); // кількість сюда записувати
    var price = $('.calculator_result_price'); // ціну сюда


    // quantity 
    var qn = Math.ceil((Math.round(Number_of_ice_cases[region] * parseInt(area) * 0.1) / 2) / 25);
    
    quantity.text(qn); // количество упаковок 

    qn = parseInt(qn);
    var pr = qn < 20 ? qn * 250 : 0; // з доставкою var pr = qn < 20 ? qn * (250 + shipping[region])
        if(qn >= 20 && qn <= 40 ){
            pr =  qn * 230;
        }
        if(qn >= 40 && qn <= 80){
            pr = qn * 200;
        }
        if(qn > 80){
            pr= qn * 180;
        }

    price.text(pr); // цена за упаковки

    $('.calculate_wrapper').addClass('dn');
    $('.calculator_result').removeClass('dn');
}
else{
    alert('Площа покриття не може дорівнювати 0!');
}
});

$('.order').click(function () {
    //тут перевіряємо чи є дані дані реєстрації перед натисненням "Замовит"
    console.log('True');
    // а тут просто забрати те що получилось в калкулейті і відпавити куда там тре
    var quantity = $('.calculator_result_quantity').text();
    var price = $('.calculator_result_price').text();

});

var year = (new Date()).getFullYear();

$('.year').text(year);

$('.radio_box').click(function () {
    if ($('#delivery_2').is(":checked")) {
        $('.delivery-address').removeClass('dn')
    } else {
        $('.delivery-address').addClass('dn')
    }
})

$('.order-form_button').click(function () {
    // тут відправляти інфу по замовленні
   console.log('Hello')
});