function ShowProgress() {
        setTimeout(function () {
            var modal = $('<div />');
            modal.addClass("modalx");
            $('body').append(modal);
            var loading = $(".modalx");
            $(".modalx").css('visibility', 'visible');
            loading.show();
            var top = Math.max($(window).height() / 2 - loading[0].offsetHeight / 2, 0);
            var left = Math.max($(window).width() / 2 - loading[0].offsetWidth / 2, 0);
            loading.css({ top: top, left: left });
        }, 200);
 }
    $(document).ready(function () {
        $(".a").click(function () {
            $(".loading").load(ShowProgress());
        });
    });

