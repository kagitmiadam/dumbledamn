$(document).ready(function () {
    $('.profile-field .username').on('click', function(){
        $(this).toggleClass('active');
        $('.profile-field').toggleClass('active');
        $('.profile-menu').toggleClass('active');
        $('.bg-black-container').toggleClass('active');
    });
    $('.equipment-field .equipment-icon').on('click', function(){
        $(this).toggleClass('active');
        $('.equipment-field').toggleClass('active');
        $('.equipment-menu').toggleClass('active');
        $('.bg-black-container').toggleClass('active');
    });
    $('.bg-black-container').on('click', function(){
        $('.profile-field').removeClass('active');
        $('.profile-menu').removeClass('active');
        $('.profile-field .username').removeClass('active');
        $('.equipment-field').removeClass('active');
        $('.equipment-menu').removeClass('active');
        $('.equipment-field .equipment-icon').removeClass('active');
        $('.bg-black-container').removeClass('active');
    });
    $('.sub-menu-field').on('click', function(){
        $(this).toggleClass('active');
    });
    $('.dd-tooltip').tooltip();
});
