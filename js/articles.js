$(".btn").click(function () {
    if ($(this).html().includes("More")) {
        $(this).html("Show Less");
    }
    else {
        $(this).html("Read More");
    }
})
