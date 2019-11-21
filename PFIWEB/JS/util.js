$(document).ready(function(){
    var threadCount = 10;
        $("#thread-srch-btn").click(function(){
            threadCount = threadCount + 10;
            $("#thread-container").load("threadlist.dom.php", {
                threadNewCount: threadCount
        });
    });
});
